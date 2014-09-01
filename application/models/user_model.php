<?php

class User_model extends CI_Model {
    public function __construct()
    {
         // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function authenticate($username, $password, $platform)
    {
        $query = $this->db->get_where('tbl_user', array('username' => $username, 'password' => addslashes(md5($password)), 'platform' => $platform));
        
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
                'last_name'  => $query->result()[0]->last_name,
                'is_supervisor' => $query->result()[0]->is_supervisor
               );
            
            $this->session->set_userdata($user_data);
            
            return array(
                'status' => 'SUCCESS',
                'message' => 'Logged in successfully.',
                'user_data' => $user_data
            );
        }
        else
        {
            return array(
                'status' => 'FAILURE',
                'message' => 'Invalid Username or Passowrd.',
                'user_data' => null
            );
        }
    }
    
    public function get_department_users($department_id, $stage_id)
    {
        $this->db->from('tbl_user');   
        $this->db->where('department_id', $department_id);
        $resultset = $this->db->get()->result_array();
        
        if (sizeof($resultset) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'User records',
                'records' => $resultset,
                'count' => count($resultset)
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No records found',
                'records' => null,
                'count' => 0
            );
        }
        
    }
    
}