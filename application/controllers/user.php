<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function get_department_users()
    {
        $department_id = $_GET['department_id'];
        $stage_number = $_GET['stage_number'];
        
        echo json_encode($this->User_model->get_department_users($department_id, $stage_number));
    }
    
    public function get_all_contractors()
    {
        echo json_encode($this->User_model->get_all_contractors());
    }
    
    public function get_all_planning_field_engineers()
    {
        echo json_encode($this->User_model->get_all_planning_field_engineers());
    }
}