<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deductions extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_aob')){
            $this->session->set_flashdata('error-msg', 'You Must Login to Continue');
        }
        $this->load->model('cooperative_model');
        $this->load->model('employee_model');
        $this->load->model('deductions_model');
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model', 'cooperative');
        //$this->load->library('form_validation');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['deductions'] = $this->deductions_model->fetch_allDeductions();
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'deductions/index';
        $this->load->view('layout/template', $this->data);
    }

    public function addDeduction()
    {
        $this->data['deductions'] = $this->deductions_model->fetch_allDeductions();
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'deductions/addDeduction';
        $this->load->view('layout/template', $this->data);
    }

    public function farmerDeduction()
    {
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['collectionCenter'] = $this->cooperative->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Deductions";
        $this->data['page_content'] = 'deductions/farmerDeduction';
        $this->load->view('layout/template', $this->data);
    }

    public function collectionCentre()
    {
        $this->data['collectionCenter'] = $this->cooperative_model->fetch_allCollectionCenters();
        $this->data['cooperative'] = $this->cooperative_model->fetch_allCooperatives();
        $this->data['clerk'] = $this->employee_model->fetch_allEmployees();
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'col_centers/index';
        $this->load->view('layout/template', $this->data);
    }

    public function searchCollectionCenter()
    {
        $this->data['pg_title'] = "Search";
        $this->data['page_content'] = 'col_centers/search';
        $this->load->view('layout/template', $this->data);
    }

    public function selectCollectionCenter()
    {
        $forminput = $this->input->post();
        $this->data['center'] = $this->cooperative_model->searchCollectionCenter($forminput);

        if (!$this->data['center']) {
            $this->session->set_flashdata('error-msg', 'No records found');
            redirect('cooperative/searchCollectionCenter');
        }
        $this->data['pg_title'] = "Select";
        $this->data['page_content'] = 'col_centers/select';
        $this->load->view('layout/template', $this->data);
    }

    public function centerMembers($id)
    {
        $this->data['farmers'] = $this->cooperative_model->center_members($id);
        $this->data['pg_title'] = "Selected Center";
        $this->data['page_content'] = 'col_centers/centerMembers';
        $this->load->view('layout/template', $this->data);
    }

    public function milkCollection()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['milk'] = $this->cooperative_model->milk_collections($sdate, $edate);
        $this->data['pg_title'] = "Selected Center";
        $this->data['page_content'] = 'cooperatives/milkCollections';
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
        $this->form_validation->set_rules('deductionName', 'Deduction Name', 'required|is_unique[deductions.deductionName]'); 
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            //return redirect()->back()->withInput()->with('error-msg', $this->validator->getErrors()); 
            redirect(base_url('deductions/index'));
        } else {
            $data = array(
                'deductionName' => $this->input->post('deductionName'),
                'amount' => $this->input->post('amount')
            );
            $this->deduction_model->store_deduction($data);
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

    public function storeMilkCollection()
    {
        $forminput = $this->input->post();
        //var_dump($forminput);die;

        $farmer     =     $forminput['farmerID'];
        $morning    =     $forminput['morning'];
        $evening    =     $forminput['evening'];
        $rejected   =     $forminput['rejected'];
        $total      =     $forminput['total'];
        $userID     =     $this->session->userdata('user_aob')->id; 
        //var_dump($total);die;      
        $i = 0;
        foreach($farmer as $key)
        {
            $mrg = $forminput['morning'][$i];
            $evng = $evening[$i];
            $reject = $rejected[$i];
            $tot = $total[$i];
            //var_dump($tot);die;
            $this->db->insert('milk_collections', ['user_id' => $userID, 'center_id' => $forminput['center_id'], 'collection_date' => $forminput['collection_date'], 'farmerID' => $key, 'morning' => $mrg, 'evening' => $evng, 'rejected' => $reject, 'total' => $tot]);
            $i++;
        }
        //var_dump($evng);die;
        $inserted = $this->db->affected_rows();
        //var_dump($inserted);die;
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Collection Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('cooperative/milkCollection');  
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
    public function deleteCollection($id)
    {
        $delete = $this->cooperative_model->delete_collection($id);
        $this->session->set_flashdata('success-msg', "Data Deleted Successfully!");
        redirect(base_url('cooperative/milkCollection'));
    }


}