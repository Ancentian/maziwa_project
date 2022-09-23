<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BASE_Controller {

	/**
	 * 
	 */
	public function __construct()
	{
		parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('reports_model');
        $this->load->model('payments_model');
	}

	public function index()
	{
        $this->data['totMilk'] = $this->reports_model->total_milkCollected();
        $this->data['collectionCenters'] = $this->reports_model->all_collectionCenters();
        $this->data['allFarmers'] = $this->reports_model->all_farmers();
        $this->data['milkRate'] = $this->payments_model->fetch_milkRates();
		$this->data['pg_title'] = "Dashboard";
		$this->data['page_content'] = 'admin/index';
		$this->load->view('layout/template', $this->data);
	}

	function myprofile()
    {
        $this->data['pg_title'] = "My Profile";
        $this->data['page_content'] = 'admin/myprofile';
        $this->load->view('layout/template', $this->data);
    }
    
	public function quotations()
	{
		$this->data['pg_title'] = "Quotations";
        $this->data['page_content'] = 'quotations/index';
        $this->load->view('layout/template', $this->data);
	}
	public function addquotation()
	{
		$this->data['title'] = "Quotations";
        $this->data['page_content'] = 'quotations/add-quotation';
        $this->load->view('layout/template', $this->data);
    }

    function updatepass()
    {
        $forminput = $this->input->post();
        // echo $forminput['pconfirm']."<br>".$forminput['password'];
        // die;
        if ($forminput['password'] != $forminput['pconfirm']) {
            $this->session->set_flashdata('error-msg', 'Passwords do not match!');
            redirect('main/myprofile');
        }
        $inserted = $this->auth_model->updatepass($forminput['password']);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Password updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('main/myprofile');
    }
    
}
