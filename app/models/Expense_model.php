<?php


class Expense_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function get_all()
    {
        // $this->db->select()->from('expenses');
        // $this->db->order_by('id', 'DESC');
        // $expenses = $this->db->get()->result();
        // return $expenses;

        //SET 1
        $this->db->select('expenses.user_id,employees.id,employees.firstname,employees.lastname,expenses.*');
        $this->db->from('expenses');
        $this->db->join('employees', 'employees.id = expenses.user_id');
        $this->db->order_by('expenses.id', 'DESC');
        $expenses = $this->db->get()->result();
        // var_dump($expenses);die;
        return $expenses;
    }


    // $expenses = $this->db->select('expenses*,employees.fname as name')->from('expenses')->join('employees', 'expenses.user_id = employees.id')->order_by('id', 'DESC')->get("expenses")->result();
    /*
        Store the record in the database
    */
    public function storeExpense($data)
    {
        $this->db->insert('expenses', $data);
        return $this->db->affected_rows();
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('expenses');
        $query = $this->db->get();
        return $query->result_array()[0];
    }


    /*
        Update or Modify a record in the database
    */
    public function update_expense($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('expenses', $data);
        return $this->db->affected_rows();
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('expenses', array('id' => $id));
        return $result;
    }

}
?>