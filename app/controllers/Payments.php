<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model', 'cooperative');
        $this->load->model('roles_model', 'roles');
        $this->load->model('payments_model');
        $this->load->model('shop_model', 'shop');
        //$this->load->library('convertNumbersIntoWords');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        //$this->data['roles'] = $this->roles->fetch_roles();
        $this->data['pg_title'] = "Payments";
        $this->data['page_content'] = 'payments/index';
        $this->load->view('layout/template', $this->data);
    }

    public function milkRates()
    {
        $this->data['milkRate'] = $this->payments_model->fetch_milkRates();
        $this->data['pg_title'] = "Payments";
        $this->data['page_content'] = 'payments/milkRates';
        $this->load->view('layout/template', $this->data);
    }

    public function searchSchedules()
    {
        $this->data['schedules'] = $this->payments_model->fetch_paymentSchedules();
        $this->data['pg_title'] = "Search Dates";
        $this->data['page_content'] = 'payments/searchSchedules';
        $this->load->view('layout/template', $this->data);
    }

    public function selectSchedule()
    {
        $forminput = $this->input->post();
        $this->data['schedule'] = $this->payments_model->searchSchedule($forminput);

        if (!$this->data['schedule']) {
            $this->session->set_flashdata('error-msg', 'No Such Schedules found');
            redirect('payments/searchSchedules');
        }
        $this->data['pg_title'] = "Select";
        $this->data['page_content'] = 'payments/selectSchedule';
        $this->load->view('layout/template', $this->data);
    }

    public function addPayment()
    {        
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = date('Y-m-d',strtotime(str_replace("/","-",$forminput['sdate'])));
        $edate = date('Y-m-d',strtotime(str_replace("/","-",$forminput['edate'])));
        $this->data['startdate'] = $sdate;
        $this->data['enddate'] = $edate;
        //var_dump($sdate." ".$edate);die;
        $this->data['milkCollection'] = $this->payments_model->monthly_milkCollections($sdate, $edate);
        $this->data['pg_title'] = "Payments";
        $this->data['page_content'] = 'payments/addPayments';
        $this->load->view('layout/template', $this->data);
    }

    public function addMonthPayment()
    {        
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = date('Y-m-d', strtotime("first day of -1 month"));
        $edate = date('Y-m-d', strtotime("last day of -1 month"));
        $this->data['startdate'] = $sdate;
        $this->data['enddate'] = $edate;
        //var_dump($sdate." ".$edate);die;
        $this->data['milkCollection'] = $this->payments_model->monthly_milkCollections($sdate, $edate);
        $this->data['pg_title'] = "Payments";
        $this->data['page_content'] = 'payments/generatePayments';
        $this->load->view('layout/template', $this->data);
    }

    public function makePayment()
    {   
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $date = date($day."/".$month."/".$year);
        $sdate = date('d/m/Y', strtotime("first day of -1 month"));
        $edate = date('d/m/Y', strtotime("last day of -1 month"));
        if (date('d/m/Y') == $date) {
            $this->data['payments'] = $this->payments_model->make_monthylyPayments($sdate, $edate);
        }        
        $data = $this->payments_model->make_monthylyPayments($sdate, $edate);
        $rate = $this->payments_model->fetch_milkRates();
        $milkRate = $rate['milkRate'];

        foreach($data as $fardata)
        {
            $farmerid = $fardata['farmerID'];
            $totmilk = $fardata['totalMilk'];
            $totshop = $fardata['totShopAmount'];
            $i=0;
            //var_dump($totshop);die;
            foreach ($farmerid as $key) 
            {
                $tot_milk = $totmilk[$i];
                $tot_shop = $totshop[$i];
                $this->db->insert('payments', ['from_date' => $sdate, 'to_date' => $edate, 'farmerID' => $key, 'milkRate' => $milkRate, 'total_milk' => $tot_milk, 'shop_total' => $tot_shop]);
            $i++;
            }
             //var_dump($key);die;
        }
        $inserted = $this->db->affected_rows();
        //var_dump($inserted);die;

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Payments Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('payments/monthlyPayments');
    }

    /*
      Display a record
    */
    public function show($id)
    {
        $this->data['expense'] = $this->expense->get($id);
        $this->data['pg_title'] = "Expense";
        $this->data['page_content'] = 'expenses/show';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Create a record page
    */
    public function invoices()
    {
        $this->data['pg_title'] = "Invoice";
        $this->data['page_content'] = 'payments/invoices';
        $this->load->view('layout/template', $this->data);
    }

    public function invoiceView()
    {

        $this->data['pg_title'] = "Invoice View";
        $this->data['page_content'] = 'payments/invoiceView';
        $this->load->view('layout/template', $this->data);
    }

    public function paymentSchedules()
    {
        $sdate = "";$edate ="";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];     
        $this->data['months'] = $this->payments_model->get_last_month(); 
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/paymentSchedules';
        $this->load->view('layout/template', $this->data);
    }

    public function salary()
    {
        $this->data['salary'] = $this->payments_model->farmer_payments();
        $this->data['milkRate'] = $this->payments_model->fetch_milkRates();        
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/salary';
        $this->load->view('layout/template', $this->data);
    }

    public function lastMonths()
    {
        $pm = (int) date('n', strtotime('-1 months'));
        $pmy = (int) date('Y', strtotime('-1 months')); 
        $this->data['months'] = $this->payments_model->get_last_month($pm, $pmy); 
        //var_dump($this->data['months']);die;    
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/months';
        $this->load->view('layout/template', $this->data);
    }

    public function monthlyPayments()
    {
        $sdate = "";$edate ="";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        //echo $forminput;die; 
        $this->data['payments'] = $this->payments_model->fetch_allMonthlyPayments($sdate, $edate);      
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/monthlyPayments';
        $this->load->view('layout/template', $this->data);
    }

    public function payslip($id)//Always based on Monthly basis
    {
        $this->data['milkRate'] = $this->payments_model->fetch_milkRates();
        $this->data['payslip'] = $this->payments_model->farmer_paymentByID($id);
        $this->data['shop'] = $this->payments_model->fetch_shoppingByFarmerID($id);
        $this->data['shopSales'] = $this->payments_model->fetch_sumShoppingByFarmerID($id);
        //var_dump($this->data['deduction']);die;
        $this->data['pg_title'] = "Payslip";
        $this->data['page_content'] = 'payments/payslip';
        $this->load->view('layout/payslip', $this->data);
    }

    public function overallPayments()
    {
        $sdate = "";$edate ="";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        //echo $forminput;die; 
        $this->data['payments'] = $this->payments_model->fetch_allMonthlyPayments($sdate, $edate);      
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/overallPayments';
        $this->load->view('layout/template', $this->data);
    }
    

    /*
      Save the submitted record
    */
    public function addRole()
    {
        $this->form_validation->set_rules('roleName', 'Role Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            redirect(base_url('roles/index'));
        } else {
            $data = array(
                'roleName' => $this->input->post('roleName'),
            );
        $this->roles->store_role($data);
        $this->session->set_flashdata('success-msg', 'Role Added Successfully');
        redirect(base_url('roles/index'));
        }
    }

    public function storeMonthlyPayments()
    {
        $forminput = $this->input->post();
        //var_dump($forminput);die;
        $start = date('Y-m-d',strtotime(str_replace("/","-",$forminput['from_date'])));
        $end = date('Y-m-d',strtotime(str_replace("/","-",$forminput['to_date'])));
        $milkRate = $forminput['milkRate'];
        $farmer = $forminput['farmerID'];
        $total = $forminput['total_milk'];
        $shop = $forminput['shopDeductions'];
        $individual = $forminput['individualDeductions'];
        $general = $forminput['generalDeductions'];
        //$amountEarned = ((int)$milkRate * (int)$total);
        //var_dump($total);die;
        $user = $this->session->userdata('user_aob')->id;

        $i = 0;
        foreach ($farmer as $key) {
            $tot = $total[$i];
            $shopDed = $shop[$i];
            $indDed = $individual[$i];
            $genDed = $general[$i];
            $this->db->insert('payments', ['from_date' => $start, 'to_date' => $end, 'milkRate' => $milkRate, 'farmerID' => $key, 'total_milk' => $tot, 'shopDeductions' => $shopDed, 'individualDeductions' => $indDed, 'generalDeductions' => $genDed, 'created_by' => $user]);
            $i++;
        }
        $inserted = $this->db->affected_rows();
        //var_dump($inserted);die;
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Payment Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect(base_url('payments/monthlyPayments'));
    }

    public function storeSchedules()
    {
        $this->form_validation->set_rules('scheduleName', 'Schedules Name', 'required|is_unique[payment_schedules.scheduleName]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|is_unique[payment_schedules.start_date]');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|is_unique[payment_schedules.end_date]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            redirect(base_url('payments/paymentSchedules'));
        } else {
            $user = $this->session->userdata('user_aob')->id;
            $data = array(
                'scheduleName' => $this->input->post('scheduleName'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'user_id' => $user
            );
            //var_dump($data);die;
            $this->payments_model->store_paymentsSchedules($data);
            $this->session->set_flashdata('success-msg', 'Payments Schedules Created Successfully');
            redirect(base_url('payments/paymentSchedules'));
        }
    }


    /*
      Edit a record page
    */
    public function edit($id)
    {
        $this->data['expense'] = $this->expense->get($id);
        $this->data['pg_title'] = "Edit Leave";
        $this->data['page_content'] = 'expenses/edit';
        $this->load->view('layout/template', $this->data);
    }

    public function editSchedule($id)
    {
        $this->data['schedule'] = $this->payments_model->fetch_scheduleByID($id);
        $this->data['pg_title'] = "Edit Schedule";
        $this->data['page_content'] = 'payments/editSchedule';
        $this->load->view('layout/template', $this->data);
    }

    public function store_milkRates()
    {
        $this->form_validation->set_rules('rateName', 'Rate Name', 'required'); 
        $this->form_validation->set_rules('milkRate', 'Milk Price', 'required');
        $this->form_validation->set_rules('runs_from', 'Runs From', 'required');
        $this->form_validation->set_rules('runs_to', 'Runs To', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('payments/milkRates')); 
        } else {
            $data = array(
                'rateName' => $this->input->post('rateName'),
                'milkRate' => $this->input->post('milkRate'),
                'runs_from' => $this->input->post('runs_from'),
                'runs_to' => $this->input->post('runs_to'),
                'updated_by' => $this->session->userdata('user_aob')->id
            );
            $this->payments_model->update_milkRates($data);
            $this->session->set_flashdata('success-msg', 'Milk Rate Updated Successfully');
            return redirect(base_url('payments/milkRates'));
        }
    }

    public function updateSchedule($id)
    {
        $forminput = $this->input->post();

        $inserted = $this->payments_model->edit_schedule($id, $forminput);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Data Updated Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect(base_url('payments/paymentSchedules'));
    }

    public function print_invoice($id)
    {     
        $data['cooperative'] = $this->cooperative->fetch_allCooperatives();
        $data['payments'] = $this->payments_model->fetch_allMonthlyPaymentsByID($id); 
        $farmerid= $data['payments']['farmerID'];
        $sdate = $data['payments']['from_date'];
        $edate = $data['payments']['to_date'];
        $data['shopping'] = $this->shop->fetch_shoppingInvoiceByFarmerID($farmerid, $sdate, $edate);
        //var_dump($data['shopping']);die;
        //$data['general'] = $this->deductions_model->fetch_generalFarmerDeductions();
        //$data['individual'] = $this->payments_model->fetch_individualFarmerDeductions($id);
        
        // boost the memory limit if it's low ;)
        ini_set('memory_limit', '64M');
        // load library
        $this->load->library('pdf');
        $this->pheight = 0;
        $this->load->library('pdf');
        $pdf = $this->pdf->load_thermal();
        // retrieve data from model or just static date
        $data['title'] = "items";
        $pdf->allow_charset_conversion = true;  // Set by default to TRUE
        $pdf->charset_in = 'UTF-8';
        //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('printfiles/invoice', $data, true);
        $h = 160 + $this->pheight;
        //  $pdf->_setPageSize(array(70, $h), $this->orientation);
        $pdf->_setPageSize(array(70, $h), $pdf->DefOrientation);
        $pdf->WriteHTML($html);
        // render the view into HTML
        // write the HTML into the PDF
        $file_name = preg_replace('/[^A-Za-z0-9]+/', '-', 'ThermalInvoice_' . $tid);
        if ($this->input->get('d')) {
            $pdf->Output($file_name . '.pdf', 'D');
        } else {
            $pdf->Output($file_name . '.pdf', 'I');
        }

        unlink('userfiles/temp/' . $data['qrc']);
    }
    /*
      Delete a record
    */
    public function deleteSchedule($id)
    {
        $item = $this->payments_model->delete_schedule($id);
        $this->session->set_flashdata('success-msg', "Data Deleted Successfully!");
        redirect(base_url('payments/paymentSchedules'));
    }


}