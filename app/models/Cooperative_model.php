<?php

class Cooperative_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    function fetch_allDeductions()
    {
        $this->db->select()->from('deductions');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_allCooperatives()
    {
       $this->db->select()->from('cooperatives');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array(); 
    }

    function fetch_allCollectionCenters()
    {
        $this->db->select('collection_centers.*, cooperatives.id as CoopID, cooperatives.cooperativeName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('collection_centers');
        $this->db->join('cooperatives', 'cooperatives.id = collection_centers.cooperative_id');
        $this->db->join('users', 'users.id = collection_centers.clerk_id');
        $this->db->order_by('collection_centers.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function searchCollectionCenter($data)
    {     
        $this->db->like('centerName', $data['centerName']);
        $query = $this->db->get('collection_centers');
        //var_dump($query->result_array());die;
        return $query->result_array();
    }

    public function center_members($id)
    {
        $this->db->where('collection_centers.id', $id);
        $this->db->select('collection_centers.*, farmers_biodata.id as keyID, farmers_biodata.fname, farmers_biodata.lname, farmers_biodata.farmerID, farmers_biodata.center_id')->from('collection_centers');
        $this->db->join('farmers_biodata', 'farmers_biodata.center_id = collection_centers.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_milkCollection($id)
    {
        $this->db->where('milk_collections.id', $id);
        $this->db->select('milk_collections.*, farmers_biodata.id as farID, farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID')->from('milk_collections');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function milk_collections($sdate, $edate)
    {
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
        if($sdate != "" && $edate != ""){
            //var_dump($sdate);die;
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <=',$edate);
        }
        $this->db->order_by('milk_collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_farmerMilkCollectionByID($id)
    {
        $this->db->where('milk_collections.farmerID', $id);
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
        $this->db->order_by('milk_collections.id', 'DESC');
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

    public function store_cooperative($data)
    {
       $this->db->insert('cooperatives', $data);
       return $this->db->affected_rows();
    }

    public function store_collectionCenter($data)
    {
        $this->db->insert('collection_centers', $data);
        return $this->db->affected_rows();
    }

    // public function store_dailyMilk_collections()

    public function collect_car($status_update, $car_id)// Updates Car Collected status to 0
    {
        $status_update = ['status' => '0'];

        $this->db->where('id', $car_id);
        $this->db->update('cars', $status_update);

        return $this->db->affected_rows();
    }

    public function update_milkCollection($id, $data)// Updates Car Collected status to 0
    {
        $this->db->where('id', $id);
        $this->db->update('milk_collections', $data);
        return $this->db->affected_rows();
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete_car($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cars');
        return $this->db->affected_rows();
    }

    public function delete_payment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }

    public function delete_assignment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('car_repairs');
        return $this->db->affected_rows();
    }

    public function delete_appointment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('appointments');
        return $this->db->affected_rows();
    }

    public function delete_estimate($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('repair_estimates');
        return $this->db->affected_rows();
    }

    public function delete_collection($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('milk_collections');
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