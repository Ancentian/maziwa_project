<?php

class Messages_model extends CI_Model{

    public function __construct()
    {

    }

    /*
        Get all the records from the database
    */
    public function fetch_clients()
    {
        $this->db->select()->from('clients');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_employees()
    {
        $this->db->select()->from('employees');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
        Show Client record in the database
    */
    function show_client($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('clients', $data);
        return $this->db->affected_rows();
    }

    /*
        Store the record in the database
    */
    public function storemessages($data)
    {
        $this->db->insert('messages', $data);
        return $this->db->affected_rows();
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $project = $this->db->get_where('projects', ['id' => $id ])->row();
        return $project;
    }

    /*
        Update or Modify a record in the database
    */
    public function update_client($id, $data)
    {
       $this->db->where('id', $id);
        $this->db->update('clients', $data);
        return $this->db->affected_rows();
    }

    function fetch_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('clients');
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    /*
        Destroy or Remove a record in the database
    */
    public function delete_client($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('clients');
        return $this->db->affected_rows();
    }

}
?>
