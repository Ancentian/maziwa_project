<?php

class Reports_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */

    function get_data(){
    $this->db->select('milk_collections.id as milkColID,milk_collections.center_id, SUM(milk_collections.total) as totalMilk, collection_centers.id as colID, collection_centers.centerName');
    $this->db->from('milk_collections');
    $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
    $result = $this->db->get();
    return $result;
  
      // $this->db->select('year,purchase,sale,profit');
      // $result = $this->db->get('account');
      // return $result;
  }

    public function milk_collections($sdate, $edate)
    {
        //var_dump($sdate);die;
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
        if($sdate != "" && $edate != ""){
            $edate = date('d/m/Y',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }
        $this->db->order_by('milk_collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function milk_collectionsByCenter($id, $sdate, $edate)
    {
        $this->db->where('collection_centers.id', $id);
        $this->db->select('milk_collections.*, collection_centers.id as colID, collection_centers.centerName, users.id as userID, users.firstname, users.lastname, farmers_biodata.farmerID, farmers_biodata.fname, farmers_biodata.lname');
        $this->db->from('milk_collections');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->join('users', 'users.id = milk_collections.user_id');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID', 'left');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }
        $this->db->order_by('milk_collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allProductReports($sdate, $edate)
    {
        $this->db->select('inventory.*, shop_sales.id as salesID, shop_sales.date, shop_sales.farmerID,shop_sales.itemID, SUM(shop_sales.qty) as totQty, SUM(shop_sales.amount) as totAmount');
        $this->db->from('inventory');
        $this->db->join('shop_sales', 'shop_sales.itemID = inventory.id');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d', strtotime($edate)+86400);
            $this->db->where('shop_sales.created_at >=',$sdate);
            $this->db->where('shop_sales.created_at <',$edate);
        }
        $this->db->group_by('inventory.id');
        $this->db->order_by('SUM(shop_sales.qty)', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function product_ReportsByID($id)
    {
        $this->db->where('shop_sales.itemID', $id);
        $this->db->select('shop_sales.*, inventory.id as invID, inventory.itemName,farmers_biodata.id as farID, farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID');
        $this->db->from('shop_sales');
        $this->db->join('inventory', 'inventory.id = shop_sales.itemID');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = shop_sales.farmerID');
        $this->db->order_by('shop_sales.qty', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function fetch_todaysIncome()//Used in Reporting Module and Gives a List
    {
        $query = $this->db->query('select * from payments WHERE(created_at LIKE "'.date("Y-m-d").'%")');
        $info = $query->result_array();  
        // var_dump($info);die;      
        return $info;
    }

    public function fetch_eachDaysIncome()//Used In dashBoard and Gives the total Figure
    {
        $this->db->where('created_at LIKE "'.date("Y-m-d").'%"');
        $this->db->select('sum(amount_paid) as tot')->from('payments');
        $query = $this->db->get();
        $tot = $query->row_array()['tot'];
        if($tot > 0){   
        }else{
            $tot = 0;
        }
        // echo $tot;die;
        return $tot;
    }


    public function get_totAmount($id)
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

    function total_income()
    {
        $query = $this->db->query('select *, sum(amount_paid) as totsum from payments');
        $info = $query->result_array();
        $tot = $info[0]['totsum'];
        if(!$tot){
             $tot = 0;
        }
        return $tot;
    }

    function all_collectionCenters()
    {
        $query = $this->db->query('select * from collection_centers');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
    }

    function all_farmers()
    {
        $query = $this->db->query('select * from farmers_biodata');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
    }

    function total_milkCollected()
    {
        $query = $this->db->query('select *, sum(total) as totMilk from milk_collections');
        $info = $query->result_array();
        $tot = $info[0]['totMilk'];
        if(!$tot){
             $tot = 0;
        }
        return $tot;
    }

    function active_bookings()
    {
        $status = '2';
        $query = $this->db->query('select * from bookings WHERE(status="'.$status.'")');
        $info = $query->result_array();

        $no = 0;
        $no = sizeof($info);
        return $no;
    }

    function best_milkProducers()
    {
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.center_id, milk_collections.farmerID, SUM(milk_collections.total) as totalMilk,collection_centers.id as colID, collection_centers.centerName');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = milk_collections.center_id');
        $this->db->group_by('farmers_biodata.farmerID');
        $this->db->order_by('SUM(milk_collections.total)', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }  

    function best_collectionCenters()//Best Five(5)
    {
        $this->db->select('collection_centers.*, milk_collections.id as milkColID, milk_collections.center_id, SUM(milk_collections.total) as totalMilk');
        $this->db->from('collection_centers');
        $this->db->join('milk_collections', 'milk_collections.center_id = collection_centers.id');
        $this->db->group_by('collection_centers.id');
        $this->db->order_by('SUM(milk_collections.total)', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    function all_collectionCentersProduction($sdate, $edate)
    {
        $this->db->select('collection_centers.*, milk_collections.id as milkColID, milk_collections.center_id, milk_collections.collection_date, SUM(milk_collections.morning) as totMorning,SUM(milk_collections.evening) as totEvening,SUM(milk_collections.rejected) as totRejected, SUM(milk_collections.total) as totalMilk, milk_collections.created_at, users.id as userID, users.firstname, users.lastname');
        $this->db->from('collection_centers');
        $this->db->join('milk_collections', 'milk_collections.center_id = collection_centers.id','LEFT');
        $this->db->join('users', 'users.id = collection_centers.clerk_id');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }
        $this->db->group_by('collection_centers.id');
        $this->db->order_by('SUM(milk_collections.total)', 'DESC');
        //$this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    } 

    function all_farmerProduction($sdate, $edate)
    {
        $this->db->select('farmers_biodata.*, milk_collections.id as milkColID, milk_collections.center_id,milk_collections.collection_date, SUM(milk_collections.morning) as totMorning,SUM(milk_collections.evening) as totEvening,SUM(milk_collections.rejected) as totRejected, SUM(milk_collections.total) as totalMilk,collection_centers.id as colID, collection_centers.centerName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('farmers_biodata');
        $this->db->join('milk_collections', 'milk_collections.farmerID = farmers_biodata.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $this->db->join('users', 'users.id = collection_centers.clerk_id');
        if($sdate != "" && $edate != ""){
            //var_dump($sdate);die;
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }
        $this->db->group_by('farmers_biodata.farmerID');
        $this->db->order_by('SUM(milk_collections.total)', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function single_farmerProduction($id, $sdate, $edate)
    {
        $this->db->where('milk_collections.farmerID', $id);
        $this->db->select('milk_collections.*, farmers_biodata.id as farID, farmers_biodata.fname, farmers_biodata.mname, farmers_biodata.lname, farmers_biodata.farmerID,farmers_biodata.center_id,collection_centers.id as colID, collection_centers.centerName,users.id as userID, users.firstname, users.lastname');
        $this->db->from('milk_collections');
        $this->db->join('farmers_biodata', 'farmers_biodata.farmerID = milk_collections.farmerID');
        $this->db->join('collection_centers', 'collection_centers.id = farmers_biodata.center_id');
        $this->db->join('users', 'users.id = collection_centers.clerk_id');
        if($sdate != "" && $edate != ""){
            //var_dump($sdate);die;
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <',$edate);
        }
        $this->db->order_by('milk_collections.total', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
