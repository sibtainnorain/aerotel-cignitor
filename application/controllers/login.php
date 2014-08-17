<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
        
    public function index()
    {
        if ($this->session->userdata('username'))
        {
            redirect('home');
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function authenticate()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array(
                'status' => 'FAILURE',
                'message' => validation_errors()
            ));
            return;
        }
        
        $result = $this->User_model->authenticate($_POST['username'], $_POST['password']);
        $result['redirect_url'] = 'home';
        echo json_encode($result);
    }
    
    public function home()
    {
        if (!$this->session->userdata('username'))
        {
            redirect('login');
        }
        else
        {
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */