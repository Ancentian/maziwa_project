<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends BASE_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Reports_model', 'reports');
        $this->load->model('Send_message', 'message');
    }
    function milk_CollectionReports()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        //var_dump($sdate);die;
        $edate = $forminput['edate'];
        $this->data['milkCollection'] = $this->reports->milk_collections($sdate, $edate);
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/milkCollectionReports';
        $this->load->view('layout/template', $this->data);
    }

    function collection_centerReports($id)
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['milkCollection'] = $this->reports->milk_collectionsByCenter($id, $sdate, $edate);
        //var_dump($this->data['milkCollection']);die;
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/collectionCenterReports';
        $this->load->view('layout/template', $this->data);
    }

    function allProductsReport()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['items'] = $this->reports->allProductReports($sdate, $edate);
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/allProductsReport';
        $this->load->view('layout/template', $this->data);
    }

    function product_Reports($id)
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['items'] = $this->reports->product_ReportsByID($id, $sdate, $edate);
        $this->data['pg_title'] = "Reports";
        $this->data['page_content'] = 'reports/productReports';
        $this->load->view('layout/template', $this->data);
    }

}