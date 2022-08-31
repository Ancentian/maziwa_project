<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model', 'cooperative');
        $this->load->model('roles_model', 'roles');
        $this->load->model('payments_model');
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

    public function salary()
    {
        $this->data['salary'] = $this->payments_model->farmer_payments();
        $this->data['milkRate'] = $this->payments_model->fetch_milkRates();
        $this->data['pg_title'] = "Salary";
        $this->data['page_content'] = 'payments/salary';
        $this->load->view('layout/template', $this->data);
    }

    public function payslip()
    {
        $this->data['pg_title'] = "Payslip";
        $this->data['page_content'] = 'payments/payslip';
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

    public function store()
    {
        $config['max_size'] = 10000;
        $config['allowed_types'] = '*';
        $config['upload_path'] = FCPATH . 'uploads/expenses';

        $this->load->library('upload', $config);

         if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            // var_dump($_FILES);die;

            $fileInfo = pathinfo($_FILES["file"]["name"]);
            $file =  time().".".$fileInfo['extension'];

            // echo $file;die;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            move_uploaded_file($_FILES["file"]["tmp_name"], FCPATH . "/uploads/expenses/" . $file);
        }

        $forminput = $this->input->post();

        //CALCULATES THE TOTAL OF EXPENSE AMOUNT
        $total = 0;
        foreach ($forminput['amount'] as $key ) {
            $total += $key;
        }
        //END OF CALCULATION

        if ($forminput['by'] == '1') { //Stores Self Expense
            $data = array('user_id' => $forminput['user_id'], 'item_name' => json_encode($forminput['item_name']), 'date' => json_encode($forminput['date']), 'amount' => json_encode($forminput['amount']), 'description' => $forminput['description'], 'total_amount' => $total, 'file' => $file );

        $inserted = $this->expense->storeExpense($data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Expense Added Successfully');
        }else{
            $this->sessison->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('expense/index');

        }else{
            $data = array('user_id' => $forminput['user_id'], 'emp_fname' => $forminput['emp_fname'], 'emp_lname' => $forminput['emp_lname'], 'item_name' => json_encode($forminput['item_name']), 'date' => json_encode($forminput['date']), 'amount' => json_encode($forminput['amount']), 'description' => $forminput['description'], 'total_amount' => $total, 'file' => $file );

        $inserted = $this->expense->storeExpense($data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Expense Added Successfully');
        }else{
            $this->sessison->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('expense/index');
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

    /*
      Update the submitted record
    */
    public function updateExpense(int $id)
    {
        $forminput = $this->input->post();

        //CALCULATES THE TOTAL OF EXPENSE AMOUNT
        $total = 0;
        foreach ($forminput['amount'] as $key ) {
            $total += $key;
        }
        //END OF CALCULATION

        $data = array('user_id' => $forminput['user_id'], 'item_name' => json_encode($forminput['item_name']), 'date' => json_encode($forminput['date']), 'amount' => json_encode($forminput['amount']), 'description' => $forminput['description'], 'total_amount' => $total);

        $inserted = $this->expense->update_expense($id, $data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Expense Updated Successfully');
        }else{
            $this->sessison->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('expense/index');
    }

    public function store_milkRates()
    {
        $this->form_validation->set_rules('rateName', 'Rate Name', 'required'); 
        $this->form_validation->set_rules('milkRate', 'Milk Price', 'required');
        //$user = $this->session->userdata('user_aob')->id;
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('payments/milkRates')); 
        } else {
            $data = array(
                'rateName' => $this->input->post('rateName'),
                'milkRate' => $this->input->post('milkRate'),
                'updated_by' => $this->session->userdata('user_aob')->id
            );
            //var_dump($data);die;
            $this->payments_model->update_milkRates($data);
            $this->session->set_flashdata('success-msg', 'Milk Rate Updated Successfully');
            return redirect('payments/milkRates');
            //return redirect(base_url('payments/milkRates'));
        }
    }
    /*
      Delete a record
    */
    public function delete($id)
    {
        $item = $this->expense->delete($id);
        $this->session->set_flashdata('success', "Deleted Successfully!");
        redirect(base_url('expense/index'));
    }


}