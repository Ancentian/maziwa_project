<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends BASE_Controller {

	/**
	 * 
	 */
	public function __construct()
	{
		parent::__construct();
        $this->load->model('messages_model');
		$this->load->model('employee_model');
		$this->load->model('send_message');
	}

	public function sendemail()
	{
		$this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'messages/send-email';
        $this->load->view('layout/template', $this->data);
	}

	public function sendsms()
	{
		$this->data['clients'] = $this->messages_model->fetch_clients();
		$this->data['employees'] = $this->employee_model->fetch_employees();
		$this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'messages/send-sms';
        $this->load->view('layout/template', $this->data);
	}

	/*
      Save the submitted record
    */
    public function storemessages()
    {
        $forminput = $this->input->post();
		$data = array('send_to' => json_encode($forminput['send_to']),'message' => $forminput['message']);
		// var_dump($forminput);die;
        $inserted = $this->messages_model->storemessages($data);
        // $recepients = $forminput['send_to'];
        // var_dump($recepients);die;
        $message = $forminput['message'];
        $msg =  $forminput['message'];
         // var_dump($msg);die;
        $rec = $forminput['send_to'];
        // var_dump($msg,$rec);die;
        foreach ($rec as $one) {
            $this->send_message->send($msg, $one);
        }
        
        // var_dump($msg,$rec);die;
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Message Send successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('messages/sendsms');

    }

    public function sendCustomMessages()
    {
    	$forminput = $this->input->post();

    	$recipients = $forminput['recipients'];
        $recipients = explode(',', $recipients);

        $msg = $forminput['message'];
        // var_dump($recipients);die;
        foreach ($recipients as $one) {
        	$this->send_message->send($msg,$one);
        }

        if ($recipients > 0) {
            $this->session->set_flashdata('success-msg', 'Message Send successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('messages/sendsms');

    }
    
}
