<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cooperative extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_aob')){
            $this->session->set_flashdata('error-msg', 'You Must Login to Continue');
        }
        $this->load->model('cooperative_model');
        $this->load->model('employee_model');
        //$this->load->library('form_validation');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['cooperative'] = $this->cooperative_model->fetch_allCooperatives();
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'cooperatives/index';
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
        $this->data['milk'] = $this->cooperative_model->milk_collections();
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

    public function storeCooperative()
    {
        $this->form_validation->set_rules('cooperativeName', 'Cooperative', 'required|is_unique[cooperatives.cooperativeName]'); 
        if ($this->form_validation->run() == FALSE) {
            //$this->session->set_flashdata('error-msg', validation_errors());
            return redirect()->back()->withInput()->with('error-msg', $this->validator->getErrors()); 
            //redirect(base_url('cooperative/index'));
        } else {
            $data = array(
                'cooperativeName' => $this->input->post('cooperativeName')
            );
            $this->cooperative_model->store_cooperative($data);
            $this->session->set_flashdata('success-msg', 'Collection Center Added Successfully');
            redirect(base_url('cooperative/index'));
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
            $data = array('user_id' => $forminput['user_id'], 'item_name' => json_encode($forminput['item_name']), 'date' => json_encode($forminput['date']), 'amount' => json_encode($forminput['amount']), 'description' => $forminput['description'], 'total_amount' => $total, 'file' => $file);

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