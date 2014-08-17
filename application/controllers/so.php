<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class SO extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('So_model');
    }
    
    public function get_all_sos()
    {
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
        $department_id = $this->session->userdata('department_id');
        
        if(isset($_POST['so_status']))
        {
            $so_status = $_POST['so_status'];
        }
        
        if ($username && $user_id)
        {
            echo json_encode($this->So_model->get_all_sos($username, $user_id, $department_id, $so_status));
        }
        else
        {
            echo json_encode(array(
                'status' => 'FAILURE',
                'message' => 'Error!'
            ));
        }
    }
}