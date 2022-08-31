<?php

class Reports_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
        function fetch_carByServices()
    {
        $this->db->select()->from('cars');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_carRepairsById($id)
    {
        $this->db->where('car_repairs.car_id', $id);
        $this->db->select('car_repairs.*,cars.*,mechanics.id, mechanics.firstname as mfname, mechanics.lastname as mlname,');
        $this->db->from('car_repairs');
        $this->db->join('cars', 'cars.id = car_repairs.car_id');
        $this->db->join('mechanics', 'mechanics.id = car_repairs.mec_id');
        $this->db->group_by('car_repairs.id');
        $this->db->order_by('car_repairs.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function fetch_allPayments()
    {
        $this->db->select('payments.*,car_repairs.car_id,car_repairs.total_cost,car_repairs.discount');
        $this->db->from('payments');
        $this->db->join('car_repairs', 'car_repairs.id = payments.repair_id');
        $this->db->order_by('payments.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_bookings()
    {
        $this->db->select('bookings.*,cars.id,cars.car_model,cars.car_make,cars.reg_no,cars.price,cars.file');
        $this->db->from('bookings');
        $this->db->join('cars', 'cars.id = bookings.car_id');
        $this->db->order_by('bookings.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_allCarReturns()
    {
        $this->db->select('cars.*,bookings.car_id,bookings.fname as bname,bookings.lname as bname,bookings.id_number,bookings.phno,bookings.total_cost,bookings.discount,payments.id as pid,payments.booking_id,car_returns.*');
        $this->db->from('cars');
        $this->db->join('bookings', 'bookings.car_id = cars.id');
        $this->db->join('payments', 'payments.booking_id = bookings.id');
        $this->db->join('car_returns', 'car_returns.booking_id = bookings.id');
        $this->db->order_by('car_returns.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_carRepairsByMechanic($id)
    {
        $this->db->where('mechanics.id', $id);
        $this->db->select('mechanics.*,car_repairs.id as crid,car_repairs.car_id,car_repairs.mec_id,car_repairs.repair_status,car_repairs.created_at as repair_date, cars.id as cid, cars.car_model, cars.color, cars.reg_no, cars.car_make, cars.file');
        $this->db->from('mechanics');
        $this->db->join('car_repairs', 'car_repairs.mec_id = mechanics.id');
        $this->db->join('cars', 'cars.id = car_repairs.car_id');
        $this->db->group_by('car_repairs.id');
        $this->db->order_by('car_repairs.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_allExpenses()
    {
        $this->db->select('expenses.*,employees.id,employees.firstname,employees.lastname');
        $this->db->from('expenses');
        $this->db->join('employees', 'employees.id = expenses.user_id');
        $this->db->order_by('expenses.id', 'DESC');
        $query = $this->db->get();
        // var_dump($expenses);die;
        return $query->result_array();
    }

    public function fetch_mechanicReports()
    {
        $this->db->select()->from('mechanics');
        $this->db->order_by('id', 'DESC');
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

    function all_repairs()
    {
        $query = $this->db->query('select * from car_repairs');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
    }

    function all_cars()
    {
        $query = $this->db->query('select * from cars');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
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
