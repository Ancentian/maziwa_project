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

    function fetch_individualFarmerDeductions() //Individual Deductions
    {
        $this->db->select('individual_deductions.*, farmers_biodata.id as farID,farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID, deductions.id as dedID, deductions.deductionType, deductions.deductionName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('individual_deductions');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = individual_deductions.farmerID');
        $this->db->join('deductions', 'deductions.id = individual_deductions.deduction_id');
        $this->db->join('users', 'users.id = individual_deductions.user_id');
        $this->db->order_by('individual_deductions.date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_generalFarmerDeductions() //General Deductions
    {
        $this->db->select('general_deductions.*, deductions.id as dedID, deductions.deductionType, deductions.deductionName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('general_deductions');
        $this->db->join('deductions', 'deductions.id = general_deductions.deduction_id');
        $this->db->join('users', 'users.id =general_deductions.user_id');
        $this->db->order_by('general_deductions.date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function farmer_deductionsByID($id) //Individual Farmer Deductions
    {
        $this->db->where('individual_deductions.farmerID', $id);
        $this->db->select('individual_deductions.*, farmers_biodata.id as farID,farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID, deductions.id as dedID, deductions.deductionType, deductions.deductionName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('individual_deductions');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = individual_deductions.farmerID');
        $this->db->join('deductions', 'deductions.id = individual_deductions.deduction_id');
        $this->db->join('users', 'users.id = individual_deductions.user_id');
        $this->db->order_by('individual_deductions.date', 'DESC');
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

    /*
        Destroy or Remove a record in the database
    */
    public function delete_payment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
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
}
?>