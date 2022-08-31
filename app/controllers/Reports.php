<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends BASE_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('Send_message', 'message');
        $this->load->model('Reports_model', 'reports');
    }
    function carserviceReports()
    {
        $this->data['repairRounds'] = $this->reports->fetch_repairRounds();
        $this->data['cars'] = $this->reports->fetch_carByServices();
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/carReports';
        $this->load->view('layout/template', $this->data);
    }

    function carRepairReport($id)
    {
        $this->data['repairs'] = $this->reports->fetch_carRepairsById($id);
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/cartimesReports';
        $this->load->view('layout/template', $this->data);
    }

    function mechanicReport()
    {
        $this->data['mechanics'] = $this->reports->fetch_mechanicReports();
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/mechanicReports';
        $this->load->view('layout/template', $this->data);
    }

    function mechanicServiceReport($id)//Indivudual Mechanic Repairs
    {
        $this->data['cars'] = $this->reports->fetch_carRepairsByMechanic($id);
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/mechanicIndReports';
        $this->load->view('layout/template', $this->data);
    }

    function paymentReport()
    {
        $this->data['payments'] = $this->reports->fetch_allPayments();
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/paymentReports';
        $this->load->view('layout/template', $this->data);
    }

    function returnReport()
    {
        $this->data['car_returns'] = $this->reports->fetch_allCarReturns();
        // var_dump($this->report->fetch_allCarReturns());die;
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/returnReports';
        $this->load->view('layout/template', $this->data);
    }

    function expenseReport()
    {
        $this->data['expenses'] = $this->reports->fetch_allExpenses();
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/expenseReports';
        $this->load->view('layout/template', $this->data);
    }

    function todaysIncome()
    {
        $this->data['payments'] = $this->reports->fetch_todaysIncome();
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/todayReports';
        $this->load->view('layout/template', $this->data);
    }

}