<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	/**
	 * 
	 */
	public function __construct()
	{
		parent::__construct();
        $this->load->model('management_model');
	}

    public function dcollection()
    {
        $delete = $this->management_model->delete_milkCollection();
    }
   
}
