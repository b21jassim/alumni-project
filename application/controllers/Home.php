<?php
//Check Password /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i ...
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    var $id,$role;
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('pagination');

        if ($this->session->userdata('login'))
        {
            $check = $this->session->userdata('login');
            $this->id = $check['id'];
            $this->role = $check['role'];
        }

    }

    public function index() {
        $data['news'] = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT 5")->result();
        $data['job'] = $this->db->query("SELECT * FROM job ORDER BY id DESC LIMIT 9")->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/index.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function job(){
        $data['job'] = $this->db->order_by('id','desc')->get('job')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/job.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function jobPage($id){
        $data['job'] = $this->db->get_where('job',array('id'=>$id))->row();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/jobPage.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function service(){
        $data['service'] = $this->db->order_by('id','desc')->get('service')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/service.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function event(){
        $data['event'] = $this->db->order_by('id','desc')->get('events')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/event.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function about(){
        $data['about'] = $this->db->order_by('id','desc')->get('about')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/about.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function news(){
        $data['news'] = $this->db->order_by('id','desc')->get('news')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/news.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function contact(){
        $this->load->view('alumni/header.php');
        $this->load->view('alumni/contact.php');
        $this->load->view('alumni/footer.php');
    }

    public function doAddContact() {
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['type'] = $_POST['type'];
        $data['message'] = $_POST['message'];
        if ($this->session->userdata('login'))
            $data['user_id'] = $this->id;
        else
            $data['user_id'] = 0;
        
        if ($_FILES['file']['size'] != 0)
        {
            //file upload ...
            $config['file']['upload_path']          = './assets/uploads/';
            $config['file']['encrypt_name']         = TRUE;
            $ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
            $fileType=$_FILES['file']['type'];
            $config['file']['allowed_types'] = $ext.'|'.$fileType;
            $config['file']['max_size']             = 10000;
            $this->load->library('upload', $config['file'], 'file_upload');
            if ( ! $this->file_upload->do_upload('file'))
            {
                $error = $this->file_upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/service");            
            }
            else
            {
                $data_file = $this->file_upload->data();
                $data['file'] = $data_file['file_name'];
            }
        }

        if ($this->db->insert('contact_us', $data)) {
            $true = "Message Sent Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "home/contact");
        } else {
            $error = "Failed To Send Message ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "home/contact");
        }
    }

    public function alumni(){
        $this->load->view('alumni/header.php');
        $this->load->view('alumni/alumni.php');
        $this->load->view('alumni/footer.php');
    }

    public function register() {
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = 3;
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['status'] = 1;

        $check = $this->Admin_model->checkEmail($data['email']);
        if($check < 1){
            if ($this->db->insert('users', $data)) {
                $true = "User Registered Successfully ...";
                $this->session->set_flashdata('true1', $true);
                redirect(base_url() . "home/alumni");
            } else {
                $error = "Failed To Register User ...";
                $this->session->set_flashdata('error1', $error);
                redirect(base_url() . "home/alumni");
            }    
        }else{
            $error = "This Email is already in use please add another email address ...";
            $this->session->set_flashdata('error1', $error);
            redirect(base_url() . "home/alumni");
        }
    }

    public function company(){
        $this->load->view('alumni/header.php');
        $this->load->view('alumni/company.php');
        $this->load->view('alumni/footer.php');
    }

    public function companyRegister() {
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = 2;
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['status'] = 1;
        $data['description'] = $_POST['description'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];

        $check = $this->Admin_model->checkEmail($data['email']);
        if($check < 1){
            if ($this->db->insert('users', $data)) {
                $true = "User Registered Successfully ...";
                $this->session->set_flashdata('true1', $true);
                redirect(base_url() . "home/company");
            } else {
                $error = "Failed To Register User ...";
                $this->session->set_flashdata('error1', $error);
                redirect(base_url() . "home/company");
            }    
        }else{
            $error = "This Email is already in use please add another email address ...";
            $this->session->set_flashdata('error1', $error);
            redirect(base_url() . "home/company");
        }
    }

    public function profile(){
        $data['user'] = $this->db->get_where('users',array('id'=>$this->id))->row();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/profile.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function editProfile($id) {
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        if(trim(strlen($_POST['password'])) > 0){
            $data['password'] = md5($_POST['password']);
        }
        $data['role'] = $_POST['role'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];

        $check = $this->Admin_model->checkEditedEmail($data['email'],$id);
        if($check < 1){
            if ($this->db->update('users', $data, array('id' => $id))) {
                $true = "User Edited Successfully ...";
                $this->session->set_flashdata('true', $true);
                redirect(base_url() . "home/profile");
            } else {
                $error = "Failed To Edit User ...";
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "home/profile");
            }
        }else{
            $error = "This Email is already in use please add another email address ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "home/profile");
        }
    }

    public function statistics(){
        $data['statistics'] = $this->db->order_by('id','ASC')->get('statistics')->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/statistics.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function notifications(){
        $data['contact'] = $this->db->order_by('id','ASC')->get_where('contact_us',array('user_id'=>$this->id))->result();

        $this->load->view('alumni/header.php');
        $this->load->view('alumni/notifications.php',$data);
        $this->load->view('alumni/footer.php');
    }

    public function findAlimni(){
        if (isset($_POST['search'])) {
            $name = $_POST['name'];
            $data['user'] = $this->db->query(" SELECT * FROM `users` WHERE user_name LIKE '%$name%' AND role = '3' ")->result();
        } else {
            $data['user'] = $this->db->get_where('users',array('id'=>0))->result();
        }

        $this->load->view('alumni/header.php', $data);
        $this->load->view('alumni/findAlumni.php');
        $this->load->view('alumni/footer.php');
    }
}
