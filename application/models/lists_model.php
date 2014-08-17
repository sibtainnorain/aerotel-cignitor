<?php

class Lists_model extends CI_Model {
    public function __construct()
    {
         // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_country_list()
    {
        $query = $this->db->get('tbl_country');
        
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
    
    public function get_service_type_list()
    {
        $query = $this->db->get('tbl_service_type');
        
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
    
    public function get_order_type_list()
    {
        $query = $this->db->get('tbl_order_type');
        
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
    
    public function get_technology_type_list()
    {
        $query = $this->db->get('tbl_technology_type');
        
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
    
    public function get_isp_list()
    {
        $query = $this->db->get('tbl_isp_details');
        
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
    
    public function get_suburb_list()
    {
        $query = $this->db->get('tbl_suburb');
        
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
    
    public function get_customer_list()
    {
        $query = $this->db->get('tbl_customer');
        
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