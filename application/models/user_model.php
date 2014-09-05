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
                'first_name'  => $query->result()[0]->first_name,
                'last_name'  => $query->result()[0]->last_name,
                'is_supervisor' => $query->result()[0]->is_supervisor,
                'stage_number' => $query->result()[0]->stage_number
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
    
    public function get_department_users($department_id, $stage_number)
    {
        $this->db->select('user_id, department_id, first_name, last_name');
        $this->db->from('tbl_user');   
        $this->db->where('department_id', $department_id);
        $this->db->where('stage_number', $stage_number);
        $resultset = $this->db->get()->result();
        
        if (sizeof($resultset) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'Contractors',
                'count' => count($resultset),
                'records' => $resultset
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No records found',
                'count' => 0,
                'records' => null
            );
        }
    }
    
    public function get_all_contractors()
    {
        $this->db->select('user_id, department_id, first_name, last_name');
        $this->db->from('tbl_user');   
        $this->db->where('department_id', 8);
        $resultset = $this->db->get()->result();
        
        if (sizeof($resultset) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'Contractors',
                'count' => count($resultset),
                'records' => $resultset
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No records found',
                'count' => 0,
                'records' => null
            );
        }
    }
    
    public function get_all_planning_field_engineers()
    {
        $this->db->select('user_id, department_id, first_name, last_name, is_supervisor');
        $this->db->from('tbl_user');   
        $this->db->where('department_id', 3);
        $this->db->where('stage_number', 4);
        $resultset = $this->db->get()->result();
        
        if (sizeof($resultset) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'Contractors',
                'count' => count($resultset),
                'records' => $resultset
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No records found',
                'count' => 0,
                'records' => null
            );
        }
    }
}