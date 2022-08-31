<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expense extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('expense_model', 'expense');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['expenses'] = $this->expense->get_all();
        $this->data['pg_title'] = "Expenses";
        $this->data['page_content'] = 'expenses/index';
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
    public function addexpenses()
    {
        $this->data['pg_title'] = "Expense";
        $this->data['page_content'] = 'expenses/add-expense';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Save the submitted record
    */
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