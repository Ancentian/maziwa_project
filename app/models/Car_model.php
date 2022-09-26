<?php

class Car_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function fetch_allCars()
    {
        $this->db->select()->from('cars');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function fetch_assignments()
    {
        $this->db->select('car_repairs.*,mechanics.id as mid, mechanics.firstname as mfname, mechanics.lastname as mlname, cars.id as cid, cars.car_make, cars.car_model, cars.reg_no, cars.color, cars.status as collect_status, cars.file');
        $this->db->from('car_repairs');
        $this->db->join('cars', 'cars.id = car_repairs.car_id');
        $this->db->join('mechanics', 'mechanics.id = car_repairs.mec_id');
        $this->db->order_by('car_repairs.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all()
    {
        $this->db->select('expenses.user_id,employees.id,employees.firstname,employees.lastname,expenses.*');
        $this->db->from('expenses');
        $this->db->join('employees', 'employees.id = expenses.user_id');
        $this->db->order_by('expenses.id', 'DESC');
        $expenses = $this->db->get()->result();
        // var_dump($expenses);die;
        return $expenses;
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

    public function store_repair($data)
    {
       $this->db->insert('car_repairs', $data);
       return $this->db->affected_rows();
    }

    public function storePayment($repair_id, $data, $discount)
    {
       if ($discount > 0) {
        $discountupdate = ['discount' => $discount];

        $this->db->where('id', $repair_id);
        $this->db->update('car_repairs', $discountupdate);
       }
        
        $this->db->insert('payments', $data);
        return $this->db->affected_rows();
    }

    public function collect_car($status_update, $car_id)// Updates Car Collected status to 0
    {
        $status_update = ['status' => '0'];

        $this->db->where('id', $car_id);
        $this->db->update('cars', $status_update);

        return $this->db->affected_rows();
    }

    public function approve_appointment($id, $data)// Updates Car Collected status to 1
    {
        $this->db->where('id', $id);
        $this->db->update('appointments', $data);
        return $this->db->affected_rows();
    }

    public function decline_appointment($status_update, $id)// Updates Car Collected status to 2 Currently 
    {
        $status_update = ['status' => '2'];

        $this->db->where('id', $id);
        $this->db->update('appointments', $status_update);

        return $this->db->affected_rows();
    }
    /*
        Get an specific record from the database
    */
    public function getCar($id)//Used By both Car Edit Show and Repair Module.
    {
        $this->db->where('id', $id);
        $this->db->select()->from('cars');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function fetch_repairById($id)
    {
        // $this->db->where('id', $id);
        // $this->db->select()->from('car_repairs');
        // $query = $this->db->get();
        // return $query->result_array()[0];

        $this->db->where('car_repairs.id', $id);
        $this->db->select('car_repairs.*,mechanics.id as mid, mechanics.firstname as mfname, mechanics.lastname as mlname,cars.id as carid, cars.mobile_no')->from('car_repairs');
        $this->db->join('mechanics', 'mechanics.id = car_repairs.mec_id');
        $this->db->join('cars', 'cars.id = car_repairs.car_id');
        $this->db->order_by('car_repairs.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array()[0];
    }


    public function fetch_mechanics()
    {
        $this->db->select()->from('employees');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_mechanicRequests()
    {
        $this->db->select()->from('request_mechanics');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_appointments()
    {
        $this->db->select()->from('appointments');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_allEstimates()
    {
        $this->db->select()->from('repair_estimates');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_appointmentById($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('appointments');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    function fetch_requestMechanicById($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('request_mechanics');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function fetch_estimateById($id)
    {
        $this->db->where('id', $id);
        $this->db->from('repair_estimates');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function update_assignmentById($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('car_repairs', $data);
        return $this->db->affected_rows();
    }

    public function postpone_appointment($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('appointments', $data);
        return $this->db->affected_rows();
    }

    public function fetch_paymentById($id)
    {
        $this->db->where('repair_id', $id);
        $this->db->select()->from('payments');
        $query = $this->db->get();
        // var_dump($query->result_array()[0]);die;
        return $query->result_array();
    }

    function print_receiptById($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('payments');
        $query = $this->db->get();
        $payment = $query->result_array()[0];
        return $payment;
    }

    function print_receiptB($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('car_repairs');
        $query = $this->db->get();
        $booking = $query->result_array()[0];
        return $booking;
    }

    function fetch_repairInvoice($id)
    { 
       $this->db->where('car_repairs.id', $id);
        $this->db->select('car_repairs.*,cars.id as cid, cars.fname, cars.lname, cars.car_make, cars.car_model, cars.reg_no, cars.color')->from('car_repairs')->join('cars', 'cars.id = car_repairs.car_id');
        $query = $this->db->get();
        // var_dump(   $query->result_array()[0]);die;
        return $query->result()[0];
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

    /*
        Update or Modify a record in the database
    */
    public function update_car($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('cars', $data);
        return $this->db->affected_rows();
    }

    public function update_results($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('car_repairs', $data);
        //var_dump($this->db->affected_rows());die;
        //var_dump($this->db->update('car_repairs', $data));die;
        return $this->db->affected_rows();

    }

    public function update_estimate($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('repair_estimates', $data);
        return $this->db->affected_rows();
    }

    public function update_mechanicRequest($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('request_mechanics', $data);
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

    public function delete_mechanicRequest($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('request_mechanics');
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