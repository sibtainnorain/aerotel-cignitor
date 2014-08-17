<?php

class User_model extends CI_Model {
    public function __construct()
    {
         // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function authenticate($username, $password)
    {
        $query = $this->db->get_where('tbl_user', array('username' => $username, 'password' => addslashes(md5($password))));
        if ($query->num_rows() > 0)
        {
            $user_data = array(
                'user_id'  => $query->result()[0]->user_id,
                'username'  => $query->result()[0]->username,
                'email'  => $query->result()[0]->email,
                'department_id'  => $query->result()[0]->department_id,
                'user_type_id'  => $query->result()[0]->user_type_id,
                'user_type'  => $query->result()[0]->user_type,
                'first_name'  => $query->result()[0]->first_name,
                'last_name'  => $query->result()[0]->last_name
               );
            
            $this->session->set_userdata($user_data);
            
            return array(
                'status' => 'SUCCESS',
                'message' => 'Logged in successfully.'
            );
        }
        else
        {
            return array(
                'status' => 'FAILURE',
                'message' => 'Invalid Username or Passowrd.'
            );
        }
    }
    
}