<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends BASE_Controller {
    public $hash_key = 'HHZASm9pZ7h!pDpDB3_X$a_4Ash+dNbVnuYy5S%-HUPdNUA2x?';

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('roles_model', 'roles');
    }

    public function index()
    {
        $this->data['roles'] = $this->roles->fetch_roles();
        $this->data['employees'] = $this->employee_model->fetch_allEmployees();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'employees/index';
        $this->load->view('layout/template', $this->data);
    }

    public function staffList()
    {
        $this->data['roles'] = $this->roles->fetch_roles();
        $this->data['employees'] = $this->employee_model->fetch_allEmployees();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'employees/empList';
        $this->load->view('layout/template', $this->data);
    }

    public function profile()
    {
        $this->data['pg_title'] = "Profile";
        $this->data['page_content'] = 'employees/profile';
        $this->load->view('layout/template', $this->data);
    }

    public function users()
    {
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'employees/empList';
        $this->load->view('layout/template', $this->data);
    }

     /*
      Show a record page
    */
    public function Showstaff(int $id) 
    {
        $this->data['employee'] = $this->employee_model->fetch_byId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Show Staff";
        $this->data['page_content'] = 'staff/show-staff';
        $this->load->view('layout/template', $this->data);
    }
     /*
      edit employee profile
    */
    function editprofile()
    {
        $this->data['employee'] = $this->employee_model->fetch_byId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Update Profile";
        $this->data['page_content'] = 'admin/edit-profile';
        $this->load->view('layout/template', $this->data);
    }

    function setAdmin()
    {
        $this->data['admin'] = $this->employee_model->fetch_admin();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'staff/set-admin';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Store a new record 
    */

    public function addUser()
    {
        $forminput = $this->input->post();

        if ($forminput['password'] != $forminput['pconfirm']) {
            $this->session->set_flashdata('error-msg', 'Passwords do not match!');
            redirect('employee/index');
        } elseif ($forminput['password'] = $forminput['pconfirm']) {
            $password = $this->generate_hash($forminput['password']);
        } else{
            $password = $this->generate_hash('pass12345');
        }

        $data = array('firstname' => $forminput['firstname'], 'lastname' => $forminput['lastname'], 'email' => $forminput['email'], 'password' => $password, 'role_id' => $forminput['role_id']  );

        $inserted = $this->employee_model->store_employee($data);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff Added successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/index');
    }

    public function generate_hash($password)
    {
        return md5($this->hash_key . $password);
    }

    public function check_email($email, $table)
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

    public function updateSetAdmin()
    {
        $forminput = $this->input->post();

        $data = array( 'api_key' => $forminput['api_key'], 'password' => $forminput['password'], 'recipients' => $forminput['recipients']);

        $inserted = $this->employee_model->update_setAdmin($data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Admins Added successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/setAdmin'); 
    }
    /*
      Edit a record page
    */
    function editStaff($id)
    {
        $this->data['roles'] = $this->roles->fetch_roles();
        $this->data['staff'] = $this->employee_model->fetch_byId($id);
        //var_dump($this->data['staff']);die;
        $this->data['pg_title'] = "Update Profile";
        $this->data['page_content'] = 'employees/editStaff';
        $this->load->view('layout/template', $this->data);
    }
    /*
      update a record page
    */
    public function updateStaff(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->edit_employee($id, $forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/staffList');
    }
    /*
      update employee Profile
    */
    public function updateprofile(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->edit_employee($id, $forminput);
        if ($inserted > 0) {
            $userdata = $this->employee_model->fetchprofile_byId($id);
            // var_dump($userdata);die;
            $this->session->unset_userdata('user_aob');
            $this->session->set_userdata('user_aob',$userdata);
            $this->session->set_flashdata('success-msg', 'Profile updated successfully');
             
        } else {
            $this->session->set_flashdata('error-msg', 'Err!, please try again');
        }
        redirect('main/myprofile');
    }

    /*
      Delete a record
    */
    public function deleteStaff($id)
    {
        $delete = $this->employee_model->delete_staff($id);
        $this->session->set_flashdata('success-msg', "User Deleted Successfully!");
        redirect('employee/staffList');
    }



}