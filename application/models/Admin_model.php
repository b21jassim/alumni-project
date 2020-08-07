<?php

Class Admin_model extends CI_Model {

    public function getRole($id="") {

        $query = $this->db->get('role')->result();
        $result = "";
        foreach ($query as $row) {
            if($id == $row->id){
                $result .= '<option value="'.$row->id.'" selected="selected">'.$row->name.'</option>';
            }else{
                $result .= '<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }
        return $result;
    }

    public function getRoleName($id="") {

        $query = $this->db->get_where('role',array('id' =>$id))->row();
        if(isset($query->name)){
            return $query->name;
        }else{
            return "";
        }
    }

    public function selectCompany($id="") {

        $query = $this->db->get_where('users',array('role'=>2))->result();
        $result = "";
        foreach ($query as $row) {
            if($id == $row->id){
                $result .= '<option value="'.$row->id.'" selected="selected">'.$row->user_name.'</option>';
            }else{
                $result .= '<option value="'.$row->id.'">'.$row->user_name.'</option>';
            }
        }
        return $result;
    }

    public function getUser($id="") {

        $query = $this->db->get_where('users',array('id' =>$id))->row();
        if(isset($query->user_name)){
            return $query->user_name;
        }else{
            return "";
        }
    }

    public function getUserData($id="") {

        $query = $this->db->get_where('users',array('id' =>$id))->row();
        if(isset($query->user_name)){
            return $query;
        }else{
            return "";
        }
    }

    public function approval($select='')
    {
        $outpt .= '<option></option>';
            if($select == 0){
                $selected1 = 'selected';
            }elseif ($select == 1) {
                $selected2 = 'selected';
            }
            elseif ($select == 2) {
                $selected3 = 'selected';
            }
            else{
                $selected1 = '';
                $selected2 = '';
                $selected3 = '';
            }

            $outpt .= '<option value="0" '.$selected1.'>Still Not Approved</option>
                      <option value="1" '.$selected2.'>Approved</option>
                      <option value="2" '.$selected3.'>Rejected</option>
                      ';
            return $outpt;
    }

    public function checkEmail($email)
    {
        return $this->db->get_where('users',array('email'=>$email))->num_rows();
    }

    public function checkStudentID($student_id)
    {
        return $this->db->get_where('users',array('student_id'=>$student_id))->num_rows();
    }

    public function checkEditedEmail($new_email,$id){
        $old_email = $this->db->get_where('users',array('id'=>$id))->row()->email;
        if($old_email == $new_email){
            return 0;
        }else{
           return $this->db->get_where('users',array('email'=>$new_email))->num_rows(); 
        }
    }

    public function checkEditedStudentID($new_student_id,$id){
        $old_student_id = $this->db->get_where('users',array('id'=>$id))->row()->student_id;
        if($old_student_id == $new_student_id){
            return 0;
        }else{
           return $this->db->get_where('users',array('student_id'=>$new_student_id))->num_rows(); 
        }
    }

    public function replys($user){
        $contact = $this->db->get_where('contact_us',array('user_id'=>$user))->result();
        $totalMsg=0;
        foreach ($contact as $contact) {
            $total = $this->db->query(" SELECT count(*) AS total FROM `contact_reply` WHERE contact_id = '$contact->id' AND seen = '0' ")->row();
            $totalMsg = $totalMsg + $total->total;
        }
        return $totalMsg;
    }
}

?>