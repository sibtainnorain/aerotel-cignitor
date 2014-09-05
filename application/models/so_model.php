<?php

class SO_model extends CI_Model {
    public function __construct()
    {
         // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_sos($user_id, $department_id, $stage_number)
    {
        $so_data_row = array();
        $so_data_arr = array();
        
        try {
            if ($department_id == 2)
            {
                $query = $this->db->get('tbl_so');
            }
            else
            {
                if ($this->session->userdata('is_supervisor') == 'true')
                {
                    $query = $this->db->get_where('tbl_so', array('department_id' => $department_id, 'current_stage_number' => $stage_number));
                }
                else
                {
                    $query = $this->db->get_where('tbl_so', array('user_id' => $user_id));
                }
            }

            if ($query->num_rows() > 0)
            {
                $so_data = $query->result_array();
                
                for($i = 0; $i < count($so_data); $i++)
                {
                    $so_data[$i]['customer_name'] = $this->get_customer_name($so_data[$i]['customer_id']);
                }
                
                return array(
                    'status' => 'SUCCESS',
                    'message' => 'Records Found.',
                    'count' => $query->num_rows(),
                    'records' => $so_data
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
        } catch (Exception $exc) {
            return array(
                    'status' => 'FAILURE',
                    'message' => 'An error occured while fetching the data from server.',
                    'count' => 0,
                    'records' => null
                );
        }
    }
    
    public function get_so_by_id($so_id)
    {
        $this->db->from('tbl_so');   
        $this->db->where('id', $so_id);
        $so_data = $this->db->get()->row_array();
        
        $current_stage_number = $so_data['current_stage_number'];
        $current_stage_data = $this->get_stage_by_number($current_stage_number);
        $next_stage_data = null;
        
        if ($current_stage_number == 6)
        {
            $next_stage_data = $this->get_stage_by_number(7);
        }
        
        $customer_data = $this->get_customer_by_id($so_data['customer_id']);
        
        if (sizeof($so_data) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'One record found',
                'so_data' => $so_data,
                'current_stage_data' => $current_stage_data,
                'next_stage_data' => $next_stage_data,
                'customer_data' => $customer_data
            );
        }
        else
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'No record found',
                'so_data' => null,
                'current_stage_data' => null,
                'next_stage_data' => null,
                'customer_data' => null
            );
        }
        
    }


    public function create_so($txtSoHeader, $country, $customer, $isp, $order_type, $service_type, $technology_type,
                              $admin_address, $admin_cell, $admin_designation, $admin_direct_line, $admin_email,
                              $admin_name, $billing_address, $billing_cell, $billing_designation, $billing_direct_line,
                              $billing_email, $billing_name, $tech_address, $tech_cell, $tech_designation, $tech_direct_line,
                              $tech_email, $tech_name, $finance_description, $end_point_address, $finance_install_charge,
                              $finance_monthly_charge, $start_point, $finance_subtotal, $finance_term, $finance_total,
                              $finance_units, $finance_vat, $gps_coordinates, $vat_number, $special_terms, $registration_number,
                              $installation_address, $bandwidth, $username, $user_id, $department_id, $suburb)
    {
        $so_insert = array('so_header' => $txtSoHeader, 'customer_id' => $customer, 'user_id' => $user_id, 
                           'department_id' => $department_id, 'status_id' => 1, 
                           'current_stage_number' => 1, 'order_type' => $order_type, 
                           'service_type' => $service_type, 
                           'country' => $country, 
                           'technology_type' => $technology_type);

        $this->db->insert('tbl_so', $so_insert);
        $so_id = $this->db->insert_id();
        
        $stage_data_json = json_encode(array('country' => $country, 'isp' => $isp, 'order_type' => $order_type, 'service_type' => $service_type,
                                            'technology_type' => $technology_type, 'admin_address' => $admin_address, 'admin_cell' => $admin_cell, 
                                            'admin_designation' => $admin_designation, 'admin_direct_line' => $admin_direct_line, 
                                            'admin_email' => $admin_email, 'admin_name' => $admin_name, 'billing_address' => $billing_address, 
                                            'billing_cell' => $billing_cell, 'billing_designation' => $billing_designation, 
                                            'billing_direct_line' => $billing_direct_line, 'billing_email' => $billing_email, 
                                            'billing_name' => $billing_name, 'tech_address' => $tech_address, 'tech_cell' => $tech_cell, 
                                            'tech_designation' => $tech_designation, 'tech_direct_line' => $tech_direct_line, 'tech_email' => $tech_email, 
                                            'tech_name' => $tech_name, 'finance_description' => $finance_description, 
                                            'end_point_address' => $end_point_address, 'finance_install_charge' => $finance_install_charge, 
                                            'finance_monthly_charge' => $finance_monthly_charge, 'start_point' => $start_point, 
                                            'finance_subtotal' => $finance_subtotal, 'finance_term' => $finance_term, 'finance_total' => $finance_total, 
                                            'finance_units' => $finance_units, 'finance_vat' => $finance_vat, 'gps_coordinates' => $gps_coordinates, 
                                            'vat_number' => $vat_number, 'special_terms' => $special_terms, 'registration_number' => $registration_number, 
                                            'installation_address' => $installation_address, 'bandwidth' => $bandwidth, 'gps_coordinates' => $gps_coordinates,
                                            'suburb' => $suburb, 'customer_name' => $this->get_customer_by_id($customer)
                    ));
        
        $stage_insert = array('so_id' => $so_id, 'user_id' => $user_id,
                              'department_id' => $department_id, 'stage_number' => 1, 
                              'application_type' => 'web', 'stage_data' => $stage_data_json);
        
        $this->db->insert('tbl_stage_data', $stage_insert);
        
        return array(
                'status' => 'SUCCESS',
                'message' => 'SO created successfully.'
            );
    }
    
    public function get_stage_data($so_id, $stage_id)
    {
        $this->db->from('tbl_stage_data');   
        $this->db->where('so_id', $so_id);
        $this->db->where('stage_id', $stage_id);
        $this->db->order_by('created_date', 'ASC');
        $this->db->limit(1);
        
        $row_data = $this->db->get()->row_array();
        $data = json_decode($row_data['stage_data'], true);
        $data['order_type'] = $this->get_order_type_by_id($data['order_type']);
        $data['service_type'] = $this->get_service_type_by_id($data['service_type']);
        $data['technology_type'] = $this->get_technology_type_by_id($data['technology_type']);
        $data['isp'] = $this->get_isp_by_id($data['isp']);
        $data['country'] = $this->get_country_by_id($data['country']);
        
        $row_data['stage_data'] = json_encode($data);
        return $row_data;
    }
    
    public function get_order_type_by_id($order_type_id)
    {
        $this->db->from('tbl_order_type');   
        $this->db->where('ot_id', $order_type_id);
        return $this->db->get()->row()->ot_name;
        
    }
    
    public function get_service_type_by_id($service_type_id)
    {
        $this->db->from('tbl_service_type');   
        $this->db->where('st_id', $service_type_id);
        return $this->db->get()->row()->st_name;
        
    }
    
    public function get_technology_type_by_id($technology_type_id)
    {
        $this->db->from('tbl_technology_type');   
        $this->db->where('tt_id', $technology_type_id);
        return $this->db->get()->row()->tt_name;
        
    }
    
    public function get_isp_by_id($isp_id)
    {
        $this->db->from('tbl_isp_details');   
        $this->db->where('isp_id', $isp_id);
        return $this->db->get()->row()->isp_name;
    }
    
    public function get_country_by_id($country_id)
    {
        $this->db->from('tbl_country');   
        $this->db->where('country_id', $country_id);
        return $this->db->get()->row()->country_name;
    }
    
    public function get_customer_name($customer_id)
    {
        $this->db->from('tbl_customer');   
        $this->db->where('customer_id', $customer_id);
        return $this->db->get()->row()->customer_name;
    }
    
    public function get_department_by_stage_number($stage_number)
    {
        $this->db->from('tbl_stage');   
        $this->db->where('stage_number', $stage_number);
        return $this->db->get()->row()->department_id;
    }
    
    public function next_stage($current_stage, $next_stage, $so_id, $department_id, $user_id, $stage_data_json)
    {
        $data = array(
                    'current_stage_number' => $next_stage,
                    'department_id' => $this->get_department_by_stage_number($next_stage),
                    'user_id' => null
                );

        $this->db->where('id', $so_id);
        $this->db->update('tbl_so', $data);
        
        $stage_insert = array('so_id' => $so_id, 'user_id' => $user_id,
                              'department_id' => $department_id, 'stage_number' => $current_stage, 
                              'application_type' => 'web', 'stage_data' => $stage_data_json);
        
        $this->db->insert('tbl_stage_data', $stage_insert);
        
        return array(
                'status' => 'SUCCESS',
                'message' => 'SO has been sent to next stage.'
            );
    }
    
    public function get_so_statuses()
    {
        $resultset = $this->db->get('tbl_so_status')->result();
        
        if (sizeof($resultset) > 0)
        {
            return array(
                'status' => 'SUCCESS',
                'message' => 'SO Statuses',
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
    
    public function update_so_status($so_id, $status_id)
    {
        $data = array(
                    'status_id' => $status_id
                );

        $this->db->where('id', $so_id);
        $this->db->update('tbl_so', $data);
        
        return array(
                'status' => 'SUCCESS',
                'message' => 'SO Status has been updated successfully.'
            );
    }
    
    public function get_stage_by_number($stage_number)
    {
        $this->db->from('tbl_stage');   
        $this->db->where(array('stage_number' => (string)$stage_number));
        return $this->db->get()->row_array();
    }
    
    public function get_customer_by_id($customer_id)
    {
        $this->db->from('tbl_customer');   
        $this->db->where('customer_id', $customer_id);
        return $this->db->get()->row_array();
    }
    
    public function get_stage_id($stage_number)
    {
        $this->db->from('tbl_stage');   
        $this->db->where('stage_number', $stage_number);
        return $this->db->get()->row()->customer_name;
    }
    
    public function change_so_owner($so_id, $user_id)
    {
        $data = array(
                    'user_id' => $user_id
                );

        $this->db->where('id', $so_id);
        $this->db->update('tbl_so', $data);
        
//        $this->db->where('so_id', $so_id);
//        $this->db->update('tbl_stage_data', $data);
        
        return array(
                'status' => 'SUCCESS',
                'message' => 'SO owner has been changed successfully.'
            );
    }
    
    public function get_so_history($so_id)
    {
        $this->db->from('tbl_stage_data');
        $this->db->where('so_id', $so_id);
        $this->db->order_by('department_id', 'ASC');
        
        $resultset = $this->db->get()->result();
        
        for($i = 0; $i < count($resultset); $i++) 
        {
            $resultset[$i]->stage_data = json_decode($resultset[$i]->stage_data);
        }
        
        return $resultset;
    }
}