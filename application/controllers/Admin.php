<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
       if (! $this->session->userdata('login'))
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}else{
			$check = $this->session->userdata('login');
			if($check['role'] != 1){
				// redirect them to the login page
				redirect('login', 'refresh');
			}
		}

        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('pagination');
    }

    public function index() {

        $this->load->view('admin/header.php');
        $this->load->view('index.php');
        $this->load->view('admin/footer.php');
    }

    public function users() {
        if (isset($_POST['search'])) {
            $name = $_POST['name'];
            $data['user'] = $this->db->query(" SELECT * FROM `users` WHERE user_name LIKE '%$name%' ")->result();
        } else {
            $data['user'] = $this->db->get('users')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/users.php');
        $this->load->view('admin/footer.php');
    }

    public function addUser() {
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['description'] = $_POST['description'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];

        $check = $this->Admin_model->checkEmail($data['email']);
        if($check < 1){
            if ($this->db->insert('users', $data)) {
                $true = "User Added Successfully ...";
                $this->session->set_flashdata('true', $true);
                redirect(base_url() . "admin/users");
            } else {
                $error = "Failed To Add User ...";
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/users");
            }    
        }else{
            $error = "This Email is already in use please add another email address ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/users");
        }
    }

    public function editUser($id) {
        $data['user'] = $this->db->get_where('users', array('id' => $id))->row();

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/editUser.php');
        $this->load->view('admin/footer.php');
    }

    public function doEditUser($id) {
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        if(trim(strlen($_POST['password'])) > 0){
            $data['password'] = md5($_POST['password']);
        }
        $data['role'] = $_POST['role'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['description'] = $_POST['description'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];

        $check = $this->Admin_model->checkEditedEmail($data['email'],$id);
        if($check < 1){
            if ($this->db->update('users', $data, array('id' => $id))) {
                $true = "User Edited Successfully ...";
                $this->session->set_flashdata('true', $true);
                redirect(base_url() . "admin/users");
            } else {
                $error = "Failed To Edit User ...";
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/users");
            }
        }else{
            $error = "This Email is already in use please add another email address ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/users");
        }
    }

    public function deleteUser($id) {
        if ($this->db->delete('users', array('id' => $id))) {
            $true = "User Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/users");
        } else {
            $error = "Failed To Delete User ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/users");
        }
    }

    public function events() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['events'] = $this->db->query(" SELECT * FROM `events` WHERE title LIKE '%$title%' ")->result();
        } else {
            $data['events'] = $this->db->get('events')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/events.php');
        $this->load->view('admin/footer.php');
    }

    public function addEvent() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addEvent.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddEvent() {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

         //file upload ...
        $config['file']['upload_path']          = './assets/uploads/';
        $config['file']['encrypt_name']         = TRUE;
        $config['file']['allowed_types']        = 'jpg|jpeg|png';
        $config['file']['max_size']             = 10000;
        $this->load->library('upload', $config['file'], 'file_upload');
        if ( ! $this->file_upload->do_upload('file'))
        {
            $error = $this->file_upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/events");            
        }
        else
        {
            $data_file = $this->file_upload->data();
            $data['image'] = $data_file['file_name'];
        }
        

        if ($this->db->insert('events', $data)) {
            $true = "Event Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/events");
        } else {
            $error = "Failed To Add Event ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/events");
        }
    }
    
    public function editEvent($id) {
        $data['event'] = $this->db->get_where('events', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editEvent.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditevent($id) {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        if ($_FILES['file']['size'] != 0)
        {
            $config['file']['upload_path']          = './assets/uploads/';
            $config['file']['encrypt_name']         = TRUE;
            $config['file']['allowed_types']  = 'jpg|jpeg|png';
            $this->load->library('upload', $config['file'], 'file_upload');
            if ( ! $this->file_upload->do_upload('file'))
            {
                $error = $this->file_upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/events");          
            }
            else
            {
                $data_file = $this->file_upload->data();
                $data['image'] = $data_file['file_name'];
            }
        }
        
        if ($this->db->update('events', $data, array('id' => $id))) {
            $true = "Event Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/events");
        } else {
            $error = "Failed To Edit Event ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/events");
        }
    }
    
    public function deleteEvent($id) {
        if ($this->db->delete('events', array('id' => $id))) {
            $true = "Event Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/events");
        } else {
            $error = "Failed To Delete Event ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/events");
        }
    }

    public function news() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['news'] = $this->db->query(" SELECT * FROM `news` WHERE title LIKE '%$title%' ")->result();
        } else {
            $data['news'] = $this->db->get('news')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/news.php');
        $this->load->view('admin/footer.php');
    }

    public function addNews() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addNews.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddNews() {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        //file upload ...
        $config['file']['upload_path']          = './assets/uploads/';
        $config['file']['encrypt_name']         = TRUE;
        $config['file']['allowed_types']        = 'jpg|jpeg|png';
        $config['file']['max_size']             = 10000;
        $this->load->library('upload', $config['file'], 'file_upload');
        if ( ! $this->file_upload->do_upload('file'))
        {
            $error = $this->file_upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/events");            
        }
        else
        {
            $data_file = $this->file_upload->data();
            $data['image'] = $data_file['file_name'];
        }
        

        if ($this->db->insert('news', $data)) {
            $true = "News Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/news");
        } else {
            $error = "Failed To Add News ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/news");
        }
    }
    
    public function editNews($id) {
        $data['news'] = $this->db->get_where('news', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editNews.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditNews($id) {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        if ($_FILES['file']['size'] != 0)
        {
            $config['file']['upload_path']          = './assets/uploads/';
            $config['file']['encrypt_name']         = TRUE;
            $config['file']['allowed_types']  = 'jpg|jpeg|png';
            $this->load->library('upload', $config['file'], 'file_upload');
            if ( ! $this->file_upload->do_upload('file'))
            {
                $error = $this->file_upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/events");          
            }
            else
            {
                $data_file = $this->file_upload->data();
                $data['image'] = $data_file['file_name'];
            }
        }
        
        if ($this->db->update('News', $data, array('id' => $id))) {
            $true = "News Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/News");
        } else {
            $error = "Failed To Edit News ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/News");
        }
    }
    
    public function deleteNews($id) {
        if ($this->db->delete('news', array('id' => $id))) {
            $true = "News Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/news");
        } else {
            $error = "Failed To Delete News ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/news");
        }
    }

    public function service() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['service'] = $this->db->query(" SELECT * FROM `service` WHERE title LIKE '%$title%' ")->result();
        } else {
            $data['service'] = $this->db->get('service')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/service.php');
        $this->load->view('admin/footer.php');
    }

    public function addService() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addService.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddService() {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

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
        

        if ($this->db->insert('service', $data)) {
            $true = "Service Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/service");
        } else {
            $error = "Failed To Add Service ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/service");
        }
    }
    
    public function editService($id) {
        $data['service'] = $this->db->get_where('service', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editService.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditService($id) {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        if ($_FILES['file']['size'] != 0){
            //file upload ...
            $config['file']['upload_path']          = './assets/uploads/';
            $config['file']['encrypt_name']         = TRUE;
            $ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['file']['name']);
            $fileType=$_FILES['file']['type'];
            $config['file']['allowed_types'] = $ext.'|'.$fileType;
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
        
        if ($this->db->update('service', $data, array('id' => $id))) {
            $true = "Service Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/service");
        } else {
            $error = "Failed To Edit Service ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/service");
        }
    }
    
    public function deleteService($id) {
        if ($this->db->delete('service', array('id' => $id))) {
            $true = "Service Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/service");
        } else {
            $error = "Failed To Delete Service ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/service");
        }
    }

    public function about() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['about'] = $this->db->query(" SELECT * FROM `about` WHERE title LIKE '%$title%' ")->result();
        } else {
            $data['about'] = $this->db->get('about')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/about.php');
        $this->load->view('admin/footer.php');
    }

    public function addAbout() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addAbout.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddAbout() {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        //file upload ...
        $config['file']['upload_path']          = './assets/uploads/';
        $config['file']['encrypt_name']         = TRUE;
        $config['file']['allowed_types']        = 'jpg|jpeg|png';
        $config['file']['max_size']             = 10000;
        $this->load->library('upload', $config['file'], 'file_upload');
        if ( ! $this->file_upload->do_upload('file'))
        {
            $error = $this->file_upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/about");            
        }
        else
        {
            $data_file = $this->file_upload->data();
            $data['image'] = $data_file['file_name'];
        }

        if ($this->db->insert('about', $data)) {
            $true = "About Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/about");
        } else {
            $error = "Failed To Add About ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/about");
        }

    }
    
    public function editAbout($id) {
        $data['about'] = $this->db->get_where('about', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editAbout.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditAbout($id) {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];

        if ($_FILES['file']['size'] != 0)
        {
            $config['file']['upload_path']          = './assets/uploads/';
            $config['file']['encrypt_name']         = TRUE;
            $config['file']['allowed_types']  = 'jpg|jpeg|png';
            $this->load->library('upload', $config['file'], 'file_upload');
            if ( ! $this->file_upload->do_upload('file'))
            {
                $error = $this->file_upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . "admin/about");          
            }
            else
            {
                $data_file = $this->file_upload->data();
                $data['image'] = $data_file['file_name'];
            }
        }
        
        if ($this->db->update('about', $data, array('id' => $id))) {
            $true = "About Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/about");
        } else {
            $error = "Failed To Edit About ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/about");
        }
    }
    
    public function deleteAbout($id) {
        if ($this->db->delete('about', array('id' => $id))) {
            $true = "About Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/about");
        } else {
            $error = "Failed To Delete About ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/about");
        }
    }

    public function job() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['job'] = $this->db->query(" SELECT * FROM `job` WHERE title LIKE '%$title%' ")->result();
        } else {
            $data['job'] = $this->db->get('job')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/job.php');
        $this->load->view('admin/footer.php');
    }

    public function addJob() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addJob.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddJob() {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];
        $data['company'] = $_POST['company'];
        

        if ($this->db->insert('job', $data)) {
            $true = "Job Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/job");
        } else {
            $error = "Failed To Add Job ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/job");
        }
    }
    
    public function editJob($id) {
        $data['job'] = $this->db->get_where('job', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editJob.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditJob($id) {
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['date'] = $_POST['date'];
        $data['company'] = $_POST['company'];
        
        if ($this->db->update('job', $data, array('id' => $id))) {
            $true = "job Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/job");
        } else {
            $error = "Failed To Edit job ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/job");
        }
    }
    
    public function deleteJob($id) {
        if ($this->db->delete('job', array('id' => $id))) {
            $true = "Job Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/job");
        } else {
            $error = "Failed To Delete Job ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/job");
        }
    }

    public function statistics() {
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $data['statistics'] = $this->db->query(" SELECT * FROM `statistics` WHERE name LIKE '%$title%' ")->result();
        } else {
            $data['statistics'] = $this->db->get('statistics')->result();
        }

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/statistics.php');
        $this->load->view('admin/footer.php');
    }

    public function addStatistics() {
        $this->load->view('admin/header.php');
        $this->load->view('admin/addStatistics.php');
        $this->load->view('admin/footer.php');
    }

    public function doAddStatistics() {
        $data['name'] = $_POST['name'];
        $data['number'] = $_POST['number'];        

        if ($this->db->insert('statistics', $data)) {
            $true = "Statistics Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/statistics");
        } else {
            $error = "Failed To Add Statistics ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/statistics");
        }
    }
    
    public function editStatistics($id) {
        $data['statistics'] = $this->db->get_where('statistics', array('id' => $id))->row();

        $this->load->view('admin/header.php');
        $this->load->view('admin/editStatistics.php',$data);
        $this->load->view('admin/footer.php');
    }

    public function doEditStatistics($id) {
        $data['name'] = $_POST['name'];
        $data['number'] = $_POST['number'];
        
        if ($this->db->update('statistics', $data, array('id' => $id))) {
            $true = "Statistics Edited Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/statistics");
        } else {
            $error = "Failed To Edit Statistics ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/statistics");
        }
    }
    
    public function deleteStatistics($id) {
        if ($this->db->delete('statistics', array('id' => $id))) {
            $true = "Statistics Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/statistics");
        } else {
            $error = "Failed To Delete Statistics ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/statistics");
        }
    }

    public function contact() {    
        $data['contact'] = $this->db->order_by('id','desc')->get('contact_us')->result();

        $this->load->view('admin/header.php', $data);
        $this->load->view('admin/contact.php');
        $this->load->view('admin/footer.php');
    }


    public function deleteContact($id) {
        if ($this->db->delete('contact_us', array('id' => $id))) {
            $true = "Contact Row Deleted Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/contact");
        } else {
            $error = "Failed To Delete Contact Row ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/contact");
        }
    }

    public function addReply($id){
        $data['message'] = $_POST['message'];
        $data['contact_id'] = $id;

        if ($this->db->insert('contact_reply', $data)) {
            $true = "Reply Added Successfully ...";
            $this->session->set_flashdata('true', $true);
            redirect(base_url() . "admin/contact");
        } else {
            $error = "Failed To Add Reply ...";
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . "admin/contact");
        }
    }
}
