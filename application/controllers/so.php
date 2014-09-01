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
        $user_id = $_GET['user_id'];
        $department_id = $_GET['department_id'];

        echo json_encode($this->So_model->get_all_sos($user_id, $department_id));
    }
    
    public function get_so_details()
    {
        $this->load->view('header');
        $this->load->view('so_details');
        $this->load->view('footer');
    }
    
    public function create_so()
    {
        $username = $this->session->userdata('username');
        $user_id = (int) $this->session->userdata('user_id');
        $department_id = (int) $this->session->userdata('department_id');
        
        if (!$username)
        {
            echo json_encode(array(
                'status' => 'FAILURE',
                'message' => 'Error!'
            ));
        }
        else
        {
            $txtSoHeader = $_GET['txtSoHeader'];
            $country = (int) $_GET['country_dd'];
            $customer = (int) $_GET['customer_dd'];
            $isp = $_GET['isp_dd'];
            $order_type = $_GET['order_type_dd'];
            $service_type = $_GET['service_type_dd'];
            $technology_type = $_GET['technology_type_dd'];
            //$status = $_GET['status'];

            $admin_address = $_GET['txtAdminAddress'];
            $admin_cell = $_GET['txtAdminCell'];
            $admin_direct_line = $_GET['txtAdminDirectLine'];
            $admin_designation = $_GET['txtAdminDesignation'];
            $admin_name = $_GET['txtAdminName'];
            $admin_email = $_GET['txtAdminEmail'];
            
            $billing_address = $_GET['txtBillingAddress'];
            $billing_cell = $_GET['txtBillingCell'];
            $billing_direct_line = $_GET['txtBillingDirectLine'];
            $billing_designation = $_GET['txtBillingDesignation'];
            $billing_name = $_GET['txtBillingName'];
            $billing_email = $_GET['txtBillingEmail'];
            
            $tech_address = $_GET['txtTechAddress'];
            $tech_cell = $_GET['txtTechCell'];
            $tech_direct_line = $_GET['txtTechDirectLine'];
            $tech_designation = $_GET['txtTechDesignation'];
            $tech_name = $_GET['txtTechName'];
            $tech_email = $_GET['txtTechEmail'];
            
            $finance_description = $_GET['txtFinanceDescription'];
            $finance_end_point_address = $_GET['txtFinanceEndPointAddress'];
            $finance_install_charge = $_GET['txtFinanceInstallCharge'];
            $finance_monthly_charge = $_GET['txtFinanceMonthlyCharge'];
            $finance_start_point = $_GET['txtFinanceStartPoint'];
            $finance_term = $_GET['txtFinanceTerm'];
            $finance_subtotal = $_GET['txtFinanceSubTotal'];
            $finance_total = $_GET['txtFinanceTotal'];
            $finance_units = $_GET['txtFinanceUnits'];
            $finance_vat = $_GET['txtFinanceVat'];
            
            $gps_coordinates = $_GET['txtGpsCoordinates'];
            $vat_number = $_GET['txtVatNumber'];
            $special_terms = $_GET['txtSpecialTerms'];
            $registration_number = $_GET['txtRegistrationNumber'];
            $installation_address = $_GET['txtInstallationAddress'];
            $bandwidth = $_GET['txtBandwidth'];
            
            echo json_encode($this->So_model->create_so($txtSoHeader, $country, $customer, $isp, $order_type, $service_type, $technology_type, $admin_address,
                                                        $admin_cell, $admin_designation, $admin_direct_line, $admin_email, $admin_name,
                                                        $billing_address, $billing_cell, $billing_designation, $billing_direct_line,
                                                        $billing_email, $billing_name, $tech_address, $tech_cell, $tech_designation, $tech_direct_line,
                                                        $tech_email, $tech_name, $finance_description, $finance_end_point_address, $finance_install_charge,
                                                        $finance_monthly_charge, $finance_start_point, $finance_subtotal, $finance_term, $finance_total,
                                                        $finance_units, $finance_vat, $gps_coordinates, $vat_number, $special_terms, $registration_number,
                                                        $installation_address, $bandwidth, $username, $user_id, $department_id));
        }
        
    }
    
    public function next_stage()
    {
        $current_stage = $_GET['current_stage'];
        $next_stage = $_GET['next_stage'];
        $so_id = $_GET['so_id'];
        $department_id = $_GET['department_id'];
        $user_id = $_GET['user_id'];
        
        if ($current_stage == 1)
        {
            $notes = $_GET['next_stage_notes'];
            echo json_encode($this->So_model->next_stage($current_stage, $next_stage, $notes, $so_id, $department_id, $user_id));
        }
        else if ($current_stage == 2)
        {
            $notes = $_GET['next_stage_notes'];
            $checked_by = $_GET['txtCheckedBy'];
            $date_passed = $_GET['txtDatePassed'];
            
            echo json_encode($this->So_model->next_stage($current_stage, $next_stage, $notes, $so_id, $department_id, $user_id, $checked_by, $date_passed));
        }
        else if ($current_stage == 6)
        {
            $notes = $_GET['notes'];
            $date_of_boq_submission = $_GET['date_of_boq_submission'];
            $stage = $_GET['stage'];
            
            echo json_encode($this->So_model->next_stage($current_stage, $next_stage, $notes, $so_id, $department_id, $user_id, $date_of_boq_submission, $stage));
        }
    }
    
    public function get_so_by_id()
    {
        echo json_encode($this->So_model->get_so_by_id($_GET['so_id']));
    }
    
    public function update_so_status()
    {
        $so_id = $_GET['so_id'];
        $status_id = $_GET['update_status_dd'];
        
        echo json_encode($this->So_model->update_so_status($so_id, $status_id));
    }
    
    public function get_so_statuses()
    {
        echo json_encode($this->So_model->get_so_statuses());
    }
}