<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('shop_model', 'shop');
        $this->load->model('farmers_model', 'farmers');
        $this->load->model('cooperative_model', 'cooperative');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['farmers'] = $this->shop->fetch_farmerShopRecords();
        //$this->data['collectionCenter'] = $this->cooperative->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Farmers";
        $this->data['pg_title'] = "Shop Records";
        $this->data['page_content'] = 'shop/index';
        $this->load->view('layout/template', $this->data);
    }

    public function inventory()
    {
        $this->data['inventory'] = $this->shop->fetch_allInventory();
        $this->data['pg_title'] = "Inventory";
        $this->data['page_content'] = 'shop/inventory';
        $this->load->view('layout/template', $this->data);
    }

    public function farmers()
    {
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['collectionCenter'] = $this->cooperative->fetch_allCollectionCenters();
        $this->data['pg_title'] = "Farmers";
        $this->data['page_content'] = 'shop/farmers';
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

    public function addShopping()
    {
        $id = $this->input->get('fid');
        //echo $id;die;
        //$this->data['farmerID'] = $id;
        $this->data['farmer'] = $this->shop->fetch_farmerByID($id);
        //var_dump($this->data['farmer']);die;
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['inventory'] = $this->shop->fetch_allInventory();
        $this->data['pg_title'] = "Add Shopping";
        $this->data['page_content'] = 'shop/addShopping';
        $this->load->view('layout/shop', $this->data);
    }

    public function viewShopping()
    {
        $id = $this->input->get('fid');
        $this->data['farmer'] = $this->shop->fetch_farmerByID($id);
        //var_dump($this->data['farmer']);die;
        $this->data['shopping'] = $this->shop->fetch_shoppingByFarmerID($id);
        
        $this->data['farmers'] = $this->farmers->fetch_farmers();
        $this->data['inventory'] = $this->shop->fetch_allInventory();
        $this->data['pg_title'] = "View Shopping";
        $this->data['page_content'] = 'shop/viewShopping';
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
    public function storeInventory()
    {
        $this->form_validation->set_rules('itemName', 'Item Name', 'required|is_unique[inventory.itemName]'); 
        $this->form_validation->set_rules('description', 'Description', ''); 
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error-msg', validation_errors());
            //return redirect()->back()->withInput()->with('error-msg', $this->validator->getErrors()); 
            redirect(base_url('shop/inventory'));
        } else {
            $user_id = $this->session->userdata('user_aob')->id;
            $data = array(
                'itemName' => $this->input->post('itemName'),
                'description' => $this->input->post('description'),
                'user_id' => $user_id
            );
            $this->shop->store_inventory($data);
            $this->session->set_flashdata('success-msg', 'Data Added Successfully');
            redirect(base_url('shop/inventory'));
        }
    }

    public function storeShopSales()
    {
        $forminput = $this->input->post();

        $farmer = $forminput['farmerID'];
        $date = date('Y-m-d',strtotime(str_replace("/","-",$forminput['date'])));
        $itemid = $forminput['itemID'];
        $description = $forminput['description'];
        $qty = $forminput['qty'];
        $unit = $forminput['unit_cost'];
        $amt = $forminput['amount'];
        $comments = $forminput['comments'];
        $user = $this->session->userdata('user_aob')->id;
        //var_dump($itemid);die;
        $i = 0;
        foreach($itemid as $key) 
        {
            //var_dump($key);die;
            $des = $description[$i];
            $quantity = $qty[$i];
            $unit_cost = $unit[$i];
            $amount = $amt[$i];
            $this->db->insert('shop_sales', ['farmerID' => $farmer, 'date' => $date, 'itemID' => $key, 'description' => $des, 'qty' => $quantity, 'unit_cost' => $unit_cost, 'amount' => $amount, 'comments' => $comments, 'user_id' => $user]);
            $i++;
        }
        $inserted = $this->db->affected_rows();
        //var_dump($inserted);die;

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Sales Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('shop/index');
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

    public function deleteShoppedItem($id)
    {
        $farmerID = $this->uri->segment(4);
        //var_dump($farmerID);die;
        $item = $this->shop->deleteShoppedItem($id);
        $this->session->set_flashdata('success-msg', "Entry Deleted Successfully!");
        redirect(base_url('shop/viewShopping/'.$farmerID));
    }


}