<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Payments_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    function fetch_roles()
    {
        $this->db->select()->from('roles');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_milkRates()
    {
        $this->db->limit(1);
        $query = $this->db->get('milk_rates');
        return $query->row_array();
    }

    function update_milkRates($data)
    {
        //var_dump($data);die;
        $this->db->where('id', 1);
        $this->db->update('milk_rates', $data);
        //$query = $this->db->affected_rows()
    }

    function farmer_payments()
    {
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.center_id,milk_collections.farmerID, sum(milk_collections.total) as totalMilk,collection_centers.id as colID, collection_centers.centerName, shop_sales.id as salesID, shop_sales.farmerID, sum(shop_sales.amount) as totShopAmount');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id', 'LEFT');
        $this->db->join('shop_sales', 'shop_sales.farmerID = farmers_biodata.farmerID', 'LEFT');     
        $this->db->group_by('milk_collections.farmerID');
        $this->db->order_by('milk_collections.farmerID', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function farmer_paymentByID($id)
    {
        $this->db->where('farmers_biodata.farmerID', $id);
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.center_id,milk_collections.farmerID, sum(milk_collections.total) as totalMilk,collection_centers.id as colID, collection_centers.centerName');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID', 'LEFT');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->group_by('milk_collections.farmerID');
        $this->db->order_by('milk_collections.farmerID', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetch_shoppingByFarmerID($id)
    {
        $this->db->where('shop_sales.farmerID', $id);
        $this->db->select('shop_sales.*, inventory.id as invID, inventory.itemName, users.id as userID, users.firstname,users.lastname,');
        $this->db->from('shop_sales');
        $this->db->join('inventory', 'inventory.id = shop_sales.itemID');
        $this->db->join('users', 'users.id = shop_sales.user_id');
        $this->db->order_by('shop_sales.created_at');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_sumShoppingByFarmerID($id)
    {
        $this->db->where('farmers_biodata.farmerID', $id);
        $this->db->select('farmers_biodata.*, shop_sales.id as salesID, shop_sales.farmerID, sum(shop_sales.amount) as totAmount, shop_sales.created_at as createDate');
        $this->db->from('farmers_biodata');
        $this->db->join('shop_sales', 'shop_sales.farmerID = farmers_biodata.farmerID');
        $this->db->order_by('shop_sales.created_at');
        $query = $this->db->get();
        return $query->row_array();
    }

    function check_email($email, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email', $email);
        // $this->db->where('status',$this->status_active);
        $query = $this->db->get();
        $result = $query->result_array();
        $resp = sizeof($result);

        return $resp > 0 ? true : false;
    }

    function store_role($data)
    {
        $this->db->insert('roles', $data);
        return $this->db->affected_rows();
    }

    function edit_staff($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function fetch_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

}