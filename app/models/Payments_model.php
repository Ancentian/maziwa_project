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

    function fetch_paymentSchedules()
    {
        $this->db->select()->from('payment_schedules');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function searchSchedule($data)
    {     
        $this->db->where('id', $data['id']);
        $query = $this->db->get('payment_schedules');
        //var_dump($query->result_array());die;
        return $query->result_array();
    }

    function get_scheduleByID($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('payment_schedules');
        $query = $this->db->get();
        return $query->row_array();
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

    function fetch_scheduleByID($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('payment_schedules');
        $query = $this->db->get();
        return $query->row_array();
    }

    function farmer_payments()
    {
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.center_id,milk_collections.farmerID, sum(milk_collections.total) as totalMilk,collection_centers.id as colID, collection_centers.centerName, shop_sales.id as salesID, shop_sales.farmerID, sum(shop_sales.amount) as totShopAmount');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID','LEFT');
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

    public function monthly_milkCollections($sdate, $edate)
    {
        // echo $sdate;die;
      $this->db->select('farmers_biodata.*,sum(milk_collections.total) as milktotal,collection_centers.centerName')->from('farmers_biodata');
      $this->db->join('milk_collections','farmers_biodata.farmerID=milk_collections.farmerID');
      $this->db->join('collection_centers','collection_centers.id=milk_collections.center_id');
       if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }

        $this->db->group_by('milk_collections.farmerID');
        $this->db->order_by('milktotal', 'DESC');
        $query = $this->db->get();
        return $query->result_array(); 
    }
    public function select_deductions($fid,$sdate,$edate){
        // echo $sdate;die;
        $this->db->where('farmerID',$fid);
        $this->db->select('sum(amount) as total')->from('shop_sales');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('shop_sales.date >=',$sdate);
            $this->db->where('shop_sales.date <',$edate);
        }

         $this->db->group_by('shop_sales.farmerID');
         $query = $this->db->get();
         if($query->row_array()['total']){
            return $query->row_array()['total'];
         } else{
            return 0;
         }
        
    }

    public function select_individualDeductions($fid,$sdate,$edate){
        // echo $sdate;die;
        $this->db->where('farmerID',$fid);
        $this->db->select('sum(amount) as totalIndividual')->from('individual_deductions');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('individual_deductions.date >=',$sdate);
            $this->db->where('individual_deductions.date <',$edate);
        }

         $this->db->group_by('individual_deductions.farmerID');
         $query = $this->db->get();
         if($query->row_array()['totalIndividual']){
            return $query->row_array()['totalIndividual'];
         } else{
            return 0;
         }
        
    }

    public function select_generalDeductions($sdate,$edate){
        // echo $sdate;die;
        //$this->db->where('farmerID',$fid);
        $this->db->select('sum(amount) as totalGeneral')->from('general_deductions');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('general_deductions.date >=',$sdate);
            $this->db->where('general_deductions.date <',$edate);
        }

         $this->db->group_by('general_deductions.date');
         $query = $this->db->get();
         if($query->row_array()['totalGeneral']){
            return $query->row_array()['totalGeneral'];
         } else{
            return 0;
         }
        
    }

    function monthly_shopCollections()
    {
        $this->db->select('farmers_biodata.*, shop_sales.id as salesID, shop_sales.farmerID, SUM(shop_sales.amount) as totShopAmount');
        $this->db->from('farmers_biodata');
        //$this->db->join('users', 'users.id = milk_collections.user_id');
        //$this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('shop_sales', 'shop_sales.farmerID = farmers_biodata.farmerID');
        if($sdate != "" && $edate != ""){
            $edate = date('d/m/Y',strtotime($edate)+86400);
            // $this->db->where('milk_collections.collection_date >=',$sdate);
            // $this->db->where('milk_collections.collection_date <',$edate);
            $this->db->where('shop_sales.date >=',$sdate);
            $this->db->where('shop_sales.date <',$edate);
        }
        //var_dump($edate);die;
        $this->db->group_by('shop_sales.farmerID');
        //$this->db->order_by('SUM(milk_collections.total)', 'DESC');
        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function make_monthylyPayments($sdate, $edate)
    {
        //var_dump($edate);die;
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.user_id,milk_collections.center_id,  milk_collections.collection_date,milk_collections.farmerID, SUM(milk_collections.morning) as totMorning, SUM(milk_collections.evening) as totEvening, SUM(milk_collections.rejected) as totRejected, SUM(milk_collections.total) as totalMilk,users.id as userID, users.firstname, users.lastname,collection_centers.id as colID, collection_centers.centerName, shop_sales.id as salesID, shop_sales.farmerID,SUM(shop_sales.amount) as totShopAmount');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID','LEFT');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id','LEFT');
        $this->db->join('shop_sales', 'shop_sales.farmerID = farmers_biodata.farmerID','LEFT');
        if($sdate != "" && $edate != ""){
            //$edate = date('d/m/Y',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <=',$edate);
            $this->db->where('shop_sales.date >=',$sdate);
            $this->db->where('shop_sales.date <=',$edate);
        }
        //$this->db->group_by('farmers_biodata.farmerID');
        $this->db->group_by('shop_sales.farmerID');
        //$this->db->group_by('farmers_biodata.farmerID');
        $this->db->order_by('milk_collections.total', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_last_month($pm, $pmy){
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('MONTH(to_date)', $pm);
        $this->db->where('YEAR(to_date)', $pmy);
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function fetch_allMonthlyPayments($sdate, $edate)
    {
        $this->db->select('payments.*,farmers_biodata.id as farID, farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.center_id, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname');
        $this->db->from('payments');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = payments.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $this->db->join('users', 'users.id = payments.created_by');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('payments.from_date >=',$sdate);
            $this->db->where('payments.to_date <=',$edate);
        }
        //$this->db->group_by('MONTH(payments.from_date), YEAR(payments.from_date)');
        //$this->db->group_by('payments.from_date');
        $this->db->order_by('payments.created_at');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_allMonthlyPaymentsByID($id)
    {
        $this->db->where('payments.id', $id);
        $this->db->select('payments.*,farmers_biodata.id as farID, farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.center_id, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname');
        $this->db->from('payments');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = payments.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $this->db->join('users', 'users.id = payments.created_by');
        //$this->db->order_by('payments.created_at');
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_individualFarmerDeductions($id) //Individual Deductions
    {
        $this->db->where('individual_deductions.farmerID', $id);
        $this->db->select('individual_deductions.id, individual_deductions.deduction_id, individual_deductions.amount, individual_deductions.date, farmers_biodata.id as farID,farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID, deductions.id as dedID, deductions.deductionType, deductions.deductionName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('individual_deductions');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = individual_deductions.farmerID');
        $this->db->join('deductions', 'deductions.id = individual_deductions.deduction_id');
        $this->db->join('users', 'users.id = individual_deductions.user_id');
        $this->db->order_by('individual_deductions.date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function store_paymentsSchedules($data)
    {
        $this->db->insert('payment_schedules', $data);
        return $this->db->affected_rows();
    }

    function edit_staff($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function edit_schedule($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('payment_schedules', $data);
        return $this->db->affected_rows();
    }

    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function delete_schedule($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payment_schedules');
        return $this->db->affected_rows();
    }

}