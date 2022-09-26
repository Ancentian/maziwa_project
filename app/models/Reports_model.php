<?php

class Reports_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */

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
            //$edate = date('d/m/Y',strtotime($edate)+86400);
            $this->db->where('milk_collections.collection_date >=',$sdate);
            $this->db->where('milk_collections.collection_date <=',$edate);
            //$this->db->like('farmers_biodata.fname =', $name);
        }
        $this->db->order_by('milk_collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allProductReports()
    {
        $this->db->select('inventory.*, shop_sales.id as salesID, shop_sales.farmerID,shop_sales.itemID, SUM(shop_sales.qty) as totQty, SUM(shop_sales.amount) as totAmount');
        $this->db->from('inventory');
        $this->db->join('shop_sales', 'shop_sales.itemID = inventory.id');
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

    function fetch_repairRounds()
    {
        //$where = "name='Joe' AND status='boss' OR status='active'";
        //$this->db->where($where);
        $status != '1';
        //$where = "status = 0 OR status = '2' ";

        $query = $this->db->query('select * from car_repairs WHERE(repair_status="'.$status.'")');
        $info = $query->result_array();

        $no = 0;
        $no = sizeof($info);
        return $no;
    }   

}
?>
