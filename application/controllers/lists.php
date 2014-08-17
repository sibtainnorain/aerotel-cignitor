<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class Lists extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lists_model');
    }
    
    public function get_country_list()
    {
        echo json_encode($this->Lists_model->get_country_list());
    }
    
    public function get_service_type_list()
    {
        echo json_encode($this->Lists_model->get_service_type_list());
    }
    
    public function get_order_type_list()
    {
        echo json_encode($this->Lists_model->get_order_type_list());
    }
    
    public function get_technology_type_list()
    {
        echo json_encode($this->Lists_model->get_technology_type_list());
    }
    
    public function get_isp_list()
    {
        echo json_encode($this->Lists_model->get_isp_list());
    }
    
    public function get_suburb_list()
    {
        echo json_encode($this->Lists_model->get_suburb_list());
    }
    
    public function get_customer_list()
    {
        echo json_encode($this->Lists_model->get_customer_list());
    }
}