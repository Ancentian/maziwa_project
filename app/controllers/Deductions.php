<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deductions extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_aob')){
            $this->session->set_flashdata('error-msg', 'You Must Login to Continue');
        }
        $this->load->model('employee_model');
        $this->load->model('deductions_model');
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model');
        $this->load->model('shop_model');
        //$this->load->library('form_validation');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['deductions'] = $this->deductions_model->fetch_deductions();
        $this->data['pg_title'] = "Deductions";
        $this->data['page_content'] = 'deductions/index';
        $this->load->view('layout/template', $this->data);
    }

    public function addDeduction()
    {
        $id = $this->input->get('fid');
        $this->data['deductions'] = $this->deductions_model->fetch_deductions();
        $this->data['farmer'] = $this->shop_model->fetch_farmerByID($id);
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['pg_title'] = "All Deductions";
        $this->data['page_content'] = 'deductions/addDeduction';
        $this->load->view('layout/template', $this->data);
    }

    public function individualDeduction()
    {
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        //var_dump($this->data['farmers']);die;
        $this->data['collectionCenter'] = $this->cooperative_model->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Deductions";
        $this->data['page_content'] = 'deductions/individualDeductions';
        $this->load->view('layout/template', $this->data);
    }

    public function generalDeductions()
    {
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['deductions'] = $this->deductions_model->fetch_deductions();
        $this->data['collectionCenter'] = $this->cooperative_model->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Deductions";
        $this->data['page_content'] = 'deductions/generalDeductions';
        $this->load->view('layout/template', $this->data);
    }

    public function allFarmerDeductions()
    {
        $this->data['deductions'] = $this->deductions_model->fetch_individualFarmerDeductions();
        $this->data['general'] = $this->deductions_model->fetch_generalFarmerDeductions();
        $this->data['pg_title'] = "Deductions";
        $this->data['page_content'] = 'deductions/allDeductions';
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
      Save the submitted record
    */

    public function storeDeduction()
    {
        $this->form_validation->set_rules('deductionType', 'Deduction Type', 'required');
        $this->form_validation->set_rules('deductionName', 'Deduction Name', 'required|is_unique[deductions.deductionName]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            //return redirect()->back()->withInput()->with('error-msg', $this->validator->getErrors()); 
            redirect(base_url('deductions/index'));
        } else {
            $data = array(
                'deductionType' => $this->input->post('deductionType'),
                'deductionName' => $this->input->post('deductionName')
            );
            $this->deductions_model->store_deduction($data);
            $this->session->set_flashdata('success-msg', 'Deduction Added Successfully');
            redirect(base_url('deductions/index'));
        }
    }

    public function storeCollectionCenter()
    {
        $this->form_validation->set_rules('cooperative_id', 'Cooperative', 'required');
        $this->form_validation->set_rules('clerk_id', 'Clerk Name', 'required');
        $this->form_validation->set_rules('centerName', 'Collection Center', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            redirect(base_url('cooperative/collectionCentre'));
        } else {
            $data = array(
                'cooperative_id' => $this->input->post('cooperative_id'),
                'clerk_id' => $this->input->post('clerk_id'),
                'centerName' => $this->input->post('centerName')
            );
            //var_dump($data);die;
            $this->cooperative_model->store_collectionCenter($data);
            $this->session->set_flashdata('success-msg', 'Collection Center Added Successfully');
            redirect(base_url('cooperative/collectionCentre'));
        }
    }

    public function storeIndividualDeduction()
    {
        $forminput = $this->input->post();

        $farmer     =         $forminput['farmerID'];
        $date =               date('Y-m-d',strtotime(str_replace("/","-",$forminput['date'])));
        $deduction_id    =  $forminput['deduction_id'];
        $description    =     $forminput['description'];
        $amount   =           $forminput['amount'];
        $userID     =         $this->session->userdata('user_aob')->id; 
        //var_dump($total);die;      
        $i = 0;
        foreach($deduction_id as $key)
        {
            //$type = $deduction_type[$i];
            $descrptn = $description[$i];
            $amnt = $amount[$i];
            $this->db->insert('individual_deductions', ['farmerID' => $farmer, 'date' => $date, 'deduction_id' => $key, 'description' => $descrptn, 'amount' => $amnt, 'user_id' => $userID]);
            $i++;
        }
        $inserted = $this->db->affected_rows();
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Deductions Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('deductions/allFarmerDeductions');  
    }

    public function storeGeneralDeductions()
    {
        $forminput = $this->input->post();
        $date =               date('Y-m-d',strtotime(str_replace("/","-",$forminput['date'])));
        $deduction_id    =    $forminput['deduction_id'];
        $description    =     $forminput['description'];
        $amount   =           $forminput['amount'];
        $userID     =         $this->session->userdata('user_aob')->id;      
        $i = 0;
        foreach($deduction_id as $key)
        {
            $descrptn = $description[$i];
            $amnt = $amount[$i];
            $this->db->insert('general_deductions', ['deduction_id' => $key, 'description' => $descrptn, 'amount' => $amnt, 'date' => $date, 'user_id' => $userID]);
            $i++;
        }
        $inserted = $this->db->affected_rows();
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Deductions Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('deductions/allFarmerDeductions');  
    }
    /*
      Edit a record page
    */
    public function editCollection($id)
    {
        $this->data['farmers'] = $this->cooperative_model->edit_milkCollection($id);
        $this->data['pg_title'] = "Edit Collection";
        $this->data['page_content'] = 'cooperatives/editCollection';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Update the submitted record
    */
    public function update_milkCollection(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->cooperative_model->update_milkCollection($id, $forminput);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Data Updated Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('cooperative/milkCollection');
    }
    /*
      Delete a record
    */
    public function deleteDeduction($id)
    {
        $delete = $this->deductions_model->delete_deduction($id);
        $this->session->set_flashdata('success-msg', "Data Deleted Successfully!");
        redirect(base_url('deductions/index'));
    }

    public function delete_farmerDeduction($id)
    {
        $delete = $this->deductions_model->delete_farmerDeduction($id);
        $this->session->set_flashdata('success-msg', "Data Deleted Successfully!");
        redirect(base_url('deductions/allFarmerDeductions'));
    }


}