<?php

class SO_model extends CI_Model {
    public function __construct()
    {
         // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_sos($username, $user_id, $department_id, $so_status)
    {
        if ($department_id == 2)
        {
            //$query = $this->db->get_where('tbl_so', array('so_status' => $so_status));
            $query = $this->db->get('tbl_so');
        }
        else
        {
            $query = $this->db->get_where('tbl_so', array('so_user_id' => $user_id));
            //$query = $this->db->get('tbl_so');
        }
        
        if ($query->num_rows() > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'Records Found.',
                'count' => $query->num_rows(),
                'records' => $query->result_array()
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No Records Found.',
                'count' => 0,
                'records' => null
            );
        }
        
        
    }
}