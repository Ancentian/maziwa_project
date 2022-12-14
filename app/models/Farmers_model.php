<?php

class Farmers_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function count_farmers($id)
    {
        $this->db->where('center_id', $id);
        $query = $this->db->get('farmers_biodata');
        echo $query->num_rows();
    }

    public function fetch_farmers()
    {
        $this->db->select('farmers_biodata.*, collection_centers.id as colID, collection_centers.centerName')->from('farmers_biodata');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id', 'left');
        // if($query != '')
        // {
        //     $this->db->like('fname', $query);
        //     $this->db->like('lname', $query);
        //     $this->db->or_like('farmerID', $query);
            //$this->db->or_like('City', $query);
            //$this->db->or_like('PostalCode', $query);
            //$this->db->or_like('Country', $query);
        //}
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function farmer_profile($id)
    {
        // echo $id;die;
        $this->db->where('farmers_biodata.farmerID', $id);
        $this->db->select('farmers_biodata.*, collection_centers.id as colID,collection_centers.centerName');
        $this->db->from('farmers_biodata');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $query = $this->db->get();
        return $query->row_array();
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

    public function fetch_next_of_kin($id)
    {
        $this->db->where('farmer_next_of_kins.farmerID', $id);
        $this->db->select('farmer_next_of_kins.*,farmers_biodata.id as farID, farmers_biodata.farmerID')->from('farmer_next_of_kins');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = farmer_next_of_kins.farmerID');
        $this->db->order_by('farmer_next_of_kins.created_at', 'DESC');
        $this->db->limit(2);
        $query = $this->db->get();
        return $query->result_array();
    }

    function farmer_paymentByID($id)
    {
        $this->db->where('payments.farmerID', $id);
        $this->db->select('payments.*,farmers_biodata.id as farID, farmers_biodata.farmerID');
        $this->db->from('payments');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = payments.farmerID', 'LEFT');
        $this->db->order_by('payments.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
        Store the record in the database
    */
    public function store_farmer($data)
    {
        $this->db->insert('farmers_biodata', $data);
        return $this->db->affected_rows();
    }

    public function store_next_of_kin($data)
    {
        $this->db->insert('farmer_next_of_kins', $data);
        return $this->db->affected_rows();
    }

    function fetch_admin()
    {
        $this->db->limit(1);
        $query = $this->db->get('sms_recipients');

        return $query->row_array();
    }

    public function update_setAdmin($data)
    {
        $this->db->where('id', 1);
        $this->db->update('sms_recipients', $data);
            //return $this->db->affected_rows();    
    }

    function show_employee($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function update_farmer($id, $data)
    {
        $this->db->where('farmerID', $id);
        $this->db->update('farmers_biodata', $data);
        return $this->db->affected_rows();
    }

    function fetch_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

     function fetchprofile_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result()[0];
    }
    /*
        Delete a record in the database
    */
    public function deleteemployee($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function delete_farmer($id)
    {
        $this->db->where('farmerID', $id);
        $this->db->delete('farmers_biodata');
        return $this->db->affected_rows();
    }

}
?>
