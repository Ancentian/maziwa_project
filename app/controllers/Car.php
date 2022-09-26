<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends BASE_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('Employee_model', 'employee');
        $this->load->model('Send_message', 'message');
    }
    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['cars'] = $this->car->fetch_allCars();
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'cars/index';
        $this->load->view('layout/template', $this->data);
    }

    public function addCar()
    {
        $this->data['mechanic'] = $this->employee->fetch_mechanics();
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'cars/addCar';
        $this->load->view('layout/template', $this->data);
    }
    /*
      Display a record
    */
      public function editCar($id)
    {
        $this->data['car'] = $this->car->getCar($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'cars/edit-car';
        $this->load->view('layout/template', $this->data);
    }

    public function showCar($id)
    {
        $this->data['car'] = $this->car->getCar($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'cars/show';
        $this->load->view('layout/template', $this->data);
    }

    public function addRepair($id)
    {
        $this->data['car'] = $this->car->getCar($id);
        $this->data['mechanic'] = $this->employee->fetch_mechanics();
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'cars/repairs';
        $this->load->view('layout/template', $this->data);
    }

    public function assignments()
    {
        $this->data['car_repairs'] = $this->car->fetch_assignments();
        $data['tot']     = $this->car->get_totAmount( $data['payment']['repair_id']);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'assignments/index';
        $this->load->view('layout/template', $this->data);
    }

    public function showAssignment($id)
    {
        $this->data['repair'] = $this->car->fetch_repairById($id);
        $this->data['payments'] = $this->car->fetch_paymentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'assignments/show';
        $this->load->view('layout/template', $this->data);
    }

    public function editAssignment($id)
    {
        $this->data['repair'] = $this->car->fetch_repairById($id);
        $this->data['mechanic'] = $this->employee->fetch_mechanics();
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'assignments/edit';
        $this->load->view('layout/template', $this->data); 
    }

    public function addResults($id)
    {
        $this->data['repair'] = $this->car->fetch_repairById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'assignments/addResult';
        $this->load->view('layout/template', $this->data);
    }

    public function indexPayment()
    {
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'payments/index';
        $this->load->view('layout/template', $this->data);
    }

    public function addPayment($id)
    {
        $this->data['repair'] = $this->car->fetch_repairById($id);
        $this->data['payments'] = $this->car->fetch_paymentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'payments/add-payment';
        $this->load->view('layout/template', $this->data);
    }

    public function appointments()
    {
        $this->data['appointments'] = $this->car->fetch_appointments();
        $this->data['pg_title'] = "Appointment";
        $this->data['page_content'] = 'appointments/index';
        $this->load->view('layout/template', $this->data);
    }

    public function showAppointment($id)
    {
        $this->data['appointment'] = $this->car->fetch_appointmentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'appointments/show';
        $this->load->view('layout/template', $this->data);
    }

     public function approveAppointment($id)
    {
        $this->data['appointment'] = $this->car->fetch_appointmentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'appointments/approve';
        $this->load->view('layout/template', $this->data);
    }

    public function declineAppointment($id)
    {
        $this->data['appointment'] = $this->car->fetch_appointmentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'appointments/decline';
        $this->load->view('layout/template', $this->data);
    }

    public function postponeAppointment($id)
    {
        $this->data['appointment'] = $this->car->fetch_appointmentById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'appointments/postpone';
        $this->load->view('layout/template', $this->data);
    }

    public function estimates()
    {
        $this->data['estimates'] = $this->car->fetch_allEstimates();
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'estimator/index';
        $this->load->view('layout/template', $this->data);
    }

    public function createEstimate($id)
    {
        $this->data['estimate'] = $this->car->fetch_estimateById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'estimator/create';
        $this->load->view('layout/template', $this->data);
    }

    public function showEstimate($id)
    {
        $this->data['estimate'] = $this->car->fetch_estimateById($id);
        $this->data['pg_title'] = "Car";
        $this->data['page_content'] = 'estimator/show';
        $this->load->view('layout/template', $this->data);
    }

    public function addexpenses()
    {
        $this->data['pg_title'] = "Expense";
        $this->data['page_content'] = 'expenses/add-expense';
        $this->load->view('layout/template', $this->data);
    }

    public function mechanicRequests()
    {
        $this->data['mechanic_requests'] = $this->car->fetch_mechanicRequests();
        $this->data['pg_title'] = "Appointment";
        $this->data['page_content'] = 'appointments/mechanic-requests';
        $this->load->view('layout/template', $this->data);
    }

    public function showMechanicRequest($id)
    {
        $this->data['mechanic_requests'] = $this->car->fetch_requestMechanicById($id);
        $this->data['pg_title'] = "Appointment";
        $this->data['page_content'] = 'appointments/show-requests';
        $this->load->view('layout/template', $this->data);
    }

    public function editMechanicRequest($id)
    {
        $this->data['mechanic'] = $this->employee->fetch_mechanics();
        $this->data['mechanic_requests'] = $this->car->fetch_requestMechanicById($id);
        $this->data['pg_title'] = "Appointment";
        $this->data['page_content'] = 'appointments/edit-requests';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Save the submitted record
    */
    public function storeCar()
    {
        $config['max_size'] = 10000;
        $config['allowed_types'] = '*';
        $config['upload_path'] = FCPATH . 'res/cars';

        $this->load->library('upload', $config);

         if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            // var_dump($_FILES);die;

            $fileInfo = pathinfo($_FILES["file"]["name"]);
            $file =  time().".".$fileInfo['extension'];

            // echo $file;die;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            move_uploaded_file($_FILES["file"]["tmp_name"], FCPATH . "/res/cars/" . $file);
        }

        $forminput = $this->input->post();

        // Calculates total Of An Array Submitted from The Input Fields
        $total_cost = 0;
        foreach ($forminput['cost'] as $key) {
               $total_cost += $key;
            }

        //The End of Calculation

        //$car_id = $forminput['car_id'];

        $data = array('fname' => $forminput['fname'], 'mname' => $forminput['mname'], 'lname' => $forminput['lname'], 'id_no' => $forminput['id_no'], 'mobile_no' => $forminput['mobile_no'], 'car_make' => $forminput['car_make'], 'car_model' => $forminput['car_model'], 'reg_no' => $forminput['reg_no'], 'color' => $forminput['color'], 'fuel' => $forminput['fuel'], 'transmission' => $forminput['transmission'], 'car_description' => $forminput['car_description'], 'status' => $forminput['status'], 'file' => $file);

        $data2 = array('car_id' => $forminput['car_id'], 'pick_date' =>$forminput['pick_date'], 'mec_id' => $forminput['mec_id'], 'autopart' => json_encode($forminput['autopart']), 'description' => json_encode($forminput['description']), 'cost' => json_encode($forminput['cost']), 'total_cost' => $total_cost);

        $inserted = $this->car->storeCar($data, $data2);
        
        if($inserted > 0){
            // success
            $this->session->set_flashdata('success-msg', 'Car Added Successfully');
        }else{
            //failure
            $this->session->set_flashdata('error-msg', 'Err! Try again');
        }
        redirect('car/index');
    }

    public function storeRepair()
    {
        $forminput = $this->input->post();

        $total_cost = 0;
        foreach ($forminput['cost'] as $key) {
               $total_cost += $key;
            }
        
        $data = array('car_id' => $forminput['car_id'], 'pick_date' =>$forminput['pick_date'], 'mec_id' => $forminput['mec_id'], 'autopart' => json_encode($forminput['autopart']), 'description' => json_encode($forminput['description']), 'cost' => json_encode($forminput['cost']), 'total_cost' => $total_cost);

        // foreach($radiologydetails as $key){
        //     $totrad += $key['cost'];
        // }

        $inserted = $this->car->store_repair($data);

        if ($inserted > 0) {
            
            $this->session->set_flashdata('success-msg', 'Task Assigned to Mechanic');
        }else{

            $this->session->set_flashdata('error-msg', 'Err! Try again');
        }
        redirect('car/assignments');
    }

    function storePayment()
    {
        $forminput = $this->input->post();
        
        $data = array('repair_id' => $forminput['repair_id'],'fname' => $forminput['fname'],'lname' => $forminput['lname'],'pmnt_mode' =>$forminput['pmnt_mode'], 'amount_paid' => $forminput['amount_paid'], 'phno' => $forminput['phno'], 'transaction_no' => $forminput['transaction_no'], 'remarks' => $forminput['remarks'], 'received_by' => $forminput['received_by'] );

        $repair_id = $forminput['repair_id'];
        $discount = $forminput['discount'];
        // var_dump($forminput);die;
        $inserted = $this->car->storePayment( $repair_id, $data, $discount);

        //Defines The Data To Be Included On SMS
        $userfname = $forminput['fname'];
        $userlname = $forminput['lname'];
        $amnt = $forminput['amount_paid'];
        $rec = $forminput['phno'];
        $msg = "Hello $userfname $userlname Your Payment of Ksh. $amnt/= has Been Received. Thanks For Trusting Fortsort Services.";

        $this->message->send($msg, $rec);

        if($inserted > 0){
            // success
            $this->session->set_flashdata('success-msg', 'Payment Added Successfully');
        }else{
            //failure
            $this->session->set_flashdata('error-msg', 'Err! Try again');
        }
        redirect('car/addPayment/'.$forminput['repair_id']);
    } 

    /*
      Edit a record page
    */
    public function edit($id)
    {
        $this->data['expense'] = $this->expense->get($id);
        $this->data['pg_title'] = "Edit Leave";
        $this->data['page_content'] = 'expenses/edit';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Update the submitted record
    */
    public function updateCar(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->car->update_car($id, $forminput); 
         
        if ($inserted > 0) {
        $this->session->set_flashdata('success-msg', 'Car Details Updated successfully');

        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/index');
    }

    public function updateResults(int $id)
    {
        $forminput = $this->input->post();

        $data = array('car_id' => $forminput['car_id'], 'pick_date' =>$forminput['pick_date'], 'mec_id' => $forminput['mec_id'], 'autopart' => json_encode($forminput['autopart']), 'description' => json_encode($forminput['description']), 'results' => json_encode($forminput['results']), 'repair_status' => $forminput['repair_status']); 

        //var_dump($data);die;

        $inserted = $this->car->update_results($id, $data);

        if ($forminput['repair_status'] == '1') { //Checks if the car Status is complete or Incomplete to send SMS

            $userdata = $this->car->fetch_repairById($id);
            $rec = $userdata['mobile_no'];

            //var_dump($userphone);die;
            //Send SMS
            $msg =  "Hello, Car Repair has been Completed and Ready for Collection.";
            //$rec = "0795974284";
            $this->message->send($msg,$rec);
            //End SMS
        }

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Results Updated Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Please Try Again');
        }

        return redirect('car/assignments');
    }

    public function updateAssignment(int $id)
    {
        $forminput = $this->input->post();

        $total_cost = 0;
        foreach ($forminput['cost'] as $key) {
               $total_cost += $key;
            }

        $data = array('car_id' => $forminput['car_id'], 'pick_date' =>$forminput['pick_date'], 'mec_id' => $forminput['mec_id'], 'autopart' => json_encode($forminput['autopart']), 'description' => json_encode($forminput['description']), 'cost' => json_encode($forminput['cost']), 'total_cost' => $total_cost);

        $inserted = $this->car->update_assignmentById($id, $data);

        if ($inserted > 0) {
           $this->session->set_flashdata('success-msg', 'Assignment Updated Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Please Try Again');
        }

        return redirect('car/assignments');
    }

    public function collectCar(int $car_id)
    {
        $status_update = ['status' => '0'];

        // echo $mvtid;die;
        $inserted = $this->car->collect_car($status_update, $car_id);
        //var_dump($status_update);die;


        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Success! Car Collected');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/assignments');
    }

    public function approveAppointmentReq(int $id)
    {
        $forminput = $this->input->post();

        $status_update =  "1";

        $data = array( 'date' => $forminput['date'], 'status' => $status_update, 'remarks' => $forminput['remarks']);
        // echo $mvtid;die;
        $inserted = $this->car->approve_appointment($id, $data);
        //var_dump($status_update);die;

        $userdata = $this->car->fetch_appointmentById($id); 
            $userfname = $userdata['fname']; 
            $userlname = $userdata['lname'];  
            $rec = $userdata['phone_no'];

            $date = $forminput['date'];
        
        $msg = "Hello $userfname $userlname, Your Appointment Request has been Approved! to be on $date.";
        // var_dump($msg);die;

        $this->message->send($msg, $rec);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Success! Appointment Approved');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/appointments');
    }

    public function declineAppointmentReq(int $id)
    {
        $forminput = $this->input->post();
        
        $status_update =  "2";

        $data = array( 'date' => $forminput['date'], 'status' => $status_update, 'remarks' => $forminput['remarks']);
        // echo $mvtid;die;
        $inserted = $this->car->approve_appointment($id, $data);
        //var_dump($status_update);die;

        $userdata = $this->car->fetch_appointmentById($id); 
            $userfname = $userdata['fname']; 
            $userlname = $userdata['lname'];  
            $rec = $userdata['phone_no'];

            $date = $forminput['date'];
            $remarks = $forminput['remarks'];
        
        $msg = "Hello $userfname $userlname, Your Appointment Request has been Declined! Since: $remarks";
        // var_dump($msg);die;

        $this->message->send($msg, $rec);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Success! Appointment Approved');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/appointments');
    }

    public function updateAppointment(int $id)
    {
        $forminput = $this->input->post();

        $data = array( 'date' => $forminput['date'], 'status' => $forminput['status'], 'remarks' => $forminput['remarks']);

        //var_dump($data);die;

        $inserted = $this->car->postpone_appointment($id, $data);

        $userdata = $this->car->fetch_appointmentById($id); 
            $userfname = $userdata['fname']; 
            $userlname = $userdata['lname'];  
            $userphone = $userdata['phone_no'];

            $remarks = $forminput['remarks'];
            $date = $forminput['date'];
        
        $msg = "Hello $userfname $userlname, Your Appointment Request has been Postponed! to $date, Because $remarks.";
        // var_dump($msg);die;

        $this->message->send($msg, $userphone);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Appointment Postponed successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/appointments');

    }

    public function updateEstimate(int $id)
    {
        $forminput = $this->input->post();

        $state = "1";

        $total = 0;
        foreach ($forminput['cost'] as $key) {
           $total += $key;
        }

        $data = array('state' => $state, 'cost' => json_encode($forminput['cost']), 'total_cost' => $total ); 

        $userdata = $this->car->fetch_estimateById($id);
        $fullname = $userdata['fullname'];

        //$cost = $forminput['cost'];
        // $cst = "";
        // foreach (json_decode($forminput['cost'],true) as $one) {
        //     $cst = $one['cost'];
        // }

        //var_dump($one['cost']);die;

        $msg = "Dear $fullname, We received your request For service estimates, Your Parts Estimate 
        Totals to Ksh. $total. Thanks for Trusting German Experts.";
        //var_dump($msg);die;
        $rec = $userdata['phone_no'];

        $this->message->send($msg, $rec);

        $inserted = $this->car->update_estimate($id, $data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Service Estimate Updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/estimates');

    }

    function updateMechanicRequest(int $id)
    {
        $forminput = $this->input->post();

        $status = "1";

        $data = array('status' => $status, 'assigned_to' => $forminput['assigned_to']);

        $request_details = $this->car->fetch_requestMechanicById($id);
        $ownerfname = $request_details['fname'];
        $ownerlname = $request_details['lname'];
        $ownercontact = $request_details['phno'];
        $carmake = $request_details['car_make'];
        $carmodel = $request_details['car_model'];
        $location = $request_details['location'];

        $msg =  "Dear Technician, You have been assigned to attend an emergency Call in $location, Owners Name: $ownerfname $ownerlname, Contact: $ownercontact, Make: $carmake Model: $carmodel. Kindly Follow Up.";

        //Fetch Mechanic Contact
        $id = $forminput['assigned_to'];
        $recdata = $this->employee->fetch_MechanicbyId($id);

        $rec = $recdata['phone_no'];
        //End of fetch Mechanic Contact
        //var_dump($contact);die;

        $this->message->send($msg, $rec);

        $inserted = $this->car->update_mechanicRequest($id, $data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Status Updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/mechanicRequests');
    }
    /*
      Delete a record
    */
    public function deleteCar(int $id)
    {
        $inserted = $this->car->delete_car($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Car deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/index');
    }

    public function deletePayment(int $id)
    {
        $inserted = $this->car->delete_payment($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Payment deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/assignments');
    }

    public function deleteAssignment(int $id)
    {
        $inserted = $this->car->delete_assignment($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Assignment deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('car/assignments');
    }

    function deleteAppointment(int $id)
    {
        $inserted = $this->car->delete_appointment($id);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Appointment Deleted Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again!');
        }

        return redirect('car/appointments');
    }

    function deleteEstimate(int $id)
    {
        $inserted = $this->car->delete_estimate($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Estimate Deleted Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again!');
        }
        return redirect('car/estimates');
    }

    function deleteMechanicRequest(int $id)
    {
        $inserted = $this->car->delete_mechanicRequest($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Record Deleted Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again!');
        }
        return redirect('car/mechanicRequests');
    }

     function print(int $id)
    {
        // echo $this->input->get('d');die;
        $data['payment'] = $this->car->print_receiptById($id);
        $data['repair'] = $this->car->print_receiptB($data['payment']['repair_id']);
        $data['tot']     = $this->car->get_totAmount( $data['payment']['repair_id']);

        // boost the memory limit if it's low ;)
         ini_set('memory_limit', '64M');
        // load library
        $this->load->library('pdf');
        $this->pheight = 0;
        $this->load->library('pdf');
        $pdf = $this->pdf->load_thermal();
        // retrieve data from model or just static date
        $data['title'] = "items";
        $pdf->allow_charset_conversion = true;  // Set by default to TRUE
        $pdf->charset_in = 'UTF-8';
        //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('printfiles/receipt', $data, true);
        $h = 160 + $this->pheight;
        //  $pdf->_setPageSize(array(70, $h), $this->orientation);
        $pdf->_setPageSize(array(70, $h), $pdf->DefOrientation);
        $pdf->WriteHTML($html);
        // render the view into HTML
        // write the HTML into the PDF
        $file_name = preg_replace('/[^A-Za-z0-9]+/', '-', 'Carbook_' . $id);
        if ($this->input->get('d')) {
            $pdf->Output($file_name . '.pdf', 'D');
        } else {
            $pdf->Output($file_name . '.pdf', 'I');
        }

        unlink('userfiles/temp/' . $data['qrc']);
    }

    public function print_i(int $id)
    {
        $data['repair'] = $this->car->fetch_repairInvoice($id);
        // boost the memory limit if it's low ;)
         ini_set('memory_limit', '64M');
        // load library
        $this->load->library('pdf');
        $this->pheight = 0;
        $this->load->library('pdf');
        $pdf = $this->pdf->load_thermal();
        // retrieve data from model or just static date
        $data['title'] = "items";
        $pdf->allow_charset_conversion = true;  // Set by default to TRUE
        $pdf->charset_in = 'UTF-8';
        //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('printfiles/invoice', $data, true);
        $h = 160 + $this->pheight;
        //  $pdf->_setPageSize(array(70, $h), $this->orientation);
        $pdf->_setPageSize(array(70, $h), $pdf->DefOrientation);
        $pdf->WriteHTML($html);
        // render the view into HTML
        // write the HTML into the PDF
        $file_name = preg_replace('/[^A-Za-z0-9]+/', '-', 'Garage_' . $id);
        if ($this->input->get('d')) {
            $pdf->Output($file_name . '.pdf', 'D');
        } else {
            $pdf->Output($file_name . '.pdf', 'I');
        }

        unlink('userfiles/temp/' . $data['qrc']);
    }

}