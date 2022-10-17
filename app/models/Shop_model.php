<?php

class Shop_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    function fetch_allInventory()
    {
        $this->db->select()->from('inventory');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_farmerShopRecords()
    {
        $this->db->select('farmers_biodata.*, collection_centers.id as colID, collection_centers.centerName, shop_sales.id as salesID, shop_sales.farmerID, sum(shop_sales.amount) as totShopAmount')->from('farmers_biodata');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id', 'left');
        $this->db->join('shop_sales', 'shop_sales.farmerID = farmers_biodata.farmerID');
        $this->db->group_by('shop_sales.farmerID');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function milk_collections()
    {
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
        $this->db->order_by('milk_collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_farmerByID($id)
    {
        $this->db->where('farmers_biodata.farmerID', $id);
        $this->db->select('farmers_biodata.*, collection_centers.id as colID,collection_centers.centerName');
        $this->db->from('farmers_biodata');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetch_shoppingByFarmerID($id, $sdate, $edate)
    {
        $this->db->where('shop_sales.farmerID', $id);
        $this->db->select('shop_sales.*, inventory.id as invID, inventory.itemName, users.id as userID, users.firstname,users.lastname,');
        $this->db->from('shop_sales');
        $this->db->join('inventory', 'inventory.id = shop_sales.itemID');
        $this->db->join('users', 'users.id = shop_sales.user_id');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('shop_sales.date >=',$sdate);
            $this->db->where('shop_sales.date <',$edate);
        }
        $this->db->order_by('shop_sales.created_at');
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
        Store the record in the database
    */
    public function storeCar($data, $data2)//Saves Data to 2 Different Tables The If Statement checks for Errors From The Db
    {
       if($this->db->insert('cars', $data)){
        
        $car_id = $this->db->insert_id();//Insert Id Inserts the ID of the First Saved data to the second Table
        $data2['car_id'] = $car_id;
       //var_dump($car_id);die;
        
       $this->db->insert('car_repairs', $data2);
       }else{
        echo $this->db->error();//Deturns an error If Database Validation Rules are Not Met
       }
       //the other insert
       return $this->db->affected_rows();
    }

    public function store_inventory($data)
    {
       $this->db->insert('inventory', $data);
       return $this->db->affected_rows();
    }

    public function store_collectionCenter($data)
    {
        $this->db->insert('collection_centers', $data);
        return $this->db->affected_rows();
    }

    /*
        Destroy or Remove a record in the database
    */

    public function deleteShoppedItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('shop_sales');
        return $this->db->affected_rows();
    }

    public function get_tothAmount($id)
    {
        $this->db->where('repair_id', $id);
        // $this->db->where('type','Debit');
        $this->db->select('sum(amount_paid) as tot')->from('payments')->group_by('repair_id');
        $query = $this->db->get();
        $tot = $query->row_array()['tot'];
        if($tot > 0){
            
        }else{
            $tot = 0;
        }
        // echo $tot;die;
        return $tot;
    }

}
?>