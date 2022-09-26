<?php

class Deductions_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    function fetch_deductions()
    {
        $this->db->select()->from('deductions');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_allFarmerDeductions()
    {
        $this->db->select('farmer_deductions.*, farmers_biodata.id as farID,farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID, deductions.id as dedID, deductions.deductionType, deductions.deductionName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('farmer_deductions');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = farmer_deductions.farmerID');
        $this->db->join('deductions', 'deductions.id = farmer_deductions.deduction_id');
        $this->db->join('users', 'users.id = farmer_deductions.user_id');
        $this->db->order_by('farmer_deductions.date', 'DESC');
        $query = $this->db->get();
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

    public function milk_collections($sdate, $edate)
    {
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
         if($sdate != "" && $edate != ""){
            //$edate = date('d/m/Y',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <=',$edate);
            //$this->db->like('farmers_biodata.fname =', $name);
        }
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

    public function store_deduction($data)
    {
       $this->db->insert('deductions', $data);
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

    public function delete_deduction($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('deductions');
        return $this->db->affected_rows();
    }

    public function delete_farmerDeduction($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('farmer_deductions');
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