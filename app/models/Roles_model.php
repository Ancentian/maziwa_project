<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Roles_model extends CI_Model
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