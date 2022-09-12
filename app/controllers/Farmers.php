<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Farmers extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model', 'cooperative');
        $this->load->model('shop_model', 'shop');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['collectionCenter'] = $this->cooperative->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Farmers";
        $this->data['page_content'] = 'farmers/index';
        $this->load->view('layout/template', $this->data);
    }

    public function collectionCentre()
    {
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'col_centers/index';
        $this->load->view('layout/template', $this->data);
    }

    public function farmerProfile($id)
    {
        $this->data['farmer'] = $this->farmers->farmer_profile($id);
        $this->data['milk'] = $this->cooperative->fetch_farmerMilkCollectionByID($id);
        $this->data['shopping'] = $this->shop->fetch_shoppingByFarmerID($id);
        //var_dump($this->farmers->farmer_profile($id));die;
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'farmers/profile';
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
    public function storeFarmer()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('mname', 'Middle Name', '');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('farmerID', 'Farmer ID', 'required|is_unique[farmers_biodata.farmerID]');
        $this->form_validation->set_rules('contact1', 'Contact 1', 'required');
        $this->form_validation->set_rules('contact2', 'Contact 2', '');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('join_date', 'Join Date', 'required');
        $this->form_validation->set_rules('center_id', 'Collection Center', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            redirect(base_url('farmers/index'));
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'farmerID' => $this->input->post('farmerID'),
                'contact1' => $this->input->post('contact1'),
                'contact2' => $this->input->post('contact2'),
                'gender' => $this->input->post('gender'),
                'join_date' => $this->input->post('join_date'),
                'center_id' => $this->input->post('center_id'),
                'location' => $this->input->post('location'),
                'marital_status' => $this->input->post('marital_status')
            );
            $this->farmers->store_farmer($data);
            $this->session->set_flashdata('success-msg', 'Farmer Added Successfully');
            redirect(base_url('farmers/index'));
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
    public function editFarmer($id)
    {
        $this->data['collectionCenter'] = $this->cooperative->fetch_allCollectionCenters();
        $this->data['farmer'] = $this->farmers->fetch_farmerByID($id);
        $this->data['pg_title'] = "Edit Farmer";
        $this->data['page_content'] = 'farmers/edit';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Update the submitted record
    */
    public function updateFarmer($id)
    {
        $forminput = $this->input->post();

        //var_dump($forminput);die;

        $inserted = $this->farmers->update_farmer($id, $forminput);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Farmer Updated Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect(base_url('farmers/index'));
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