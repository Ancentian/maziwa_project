<?php

class Management_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function delete_milkCollection()
    {
        $total = '';
        $this->db->where('total', $total);
        $this->db->delete('milk_collections');
        return $this->db->affected_rows();
    }

}
?>