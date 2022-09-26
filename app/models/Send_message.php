<?php

class Send_message extends CI_Model 
{

    public $apiURL = "http://sms-backend.fortsortinnovations.co.ke/";
    public $endpoint = "message/send";
    public $CONST_APP_TOKEN = "03a-06b-12c-24d-48e-96f";
    public $REQUEST_APP_TOKEN = "app_token";
    
    
    public function send($msg,$rec) 
    {
        $apidata = $this->employee->fetch_admin();
        $apikey = $apidata['api_key'];
        $password = $apidata['password'];

        //var_dump($apikey);die;

            $dataToPost = ["app_token" => $this->CONST_APP_TOKEN,
                            "user_key"=> "$apikey",
                            "passcode" => "$password",
                            "message" => $msg,
                            "recepients" => [$rec]];
            //add token
            $dataToPost[$this->REQUEST_APP_TOKEN] = $this->CONST_APP_TOKEN;
    
            //Initializes the cURL resource
            $ch = curl_init($this->apiURL.$this->endpoint);
    
            //pass encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataToPost));
    
            //set the content type json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
            //set return type json
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
            //execute request
            $response = curl_exec($ch);
    
            //close cURL resource
            curl_close($ch);
    
            return $response;
        
    }
    // public function send($msg,$rec)
    // {
    //           // authentication
    //     $x_username           = "Fortsort"; // user username here
    //     $x_apikey             = "baak_3hNjwo206GxycsLm21rzatVhomMn7Lz0kShYZoNcM3JKg";

    //     $formattedNumber ="+254".substr($rec, -9);

    //     // id of contact to delete
    //     $params = array(
    //         "phoneNumbers"=>  $formattedNumber,
    //         "message"=>      $msg,
    //         "senderId"=>     "German-Exp" // leave blank if you do not have a custom sender Id
    //     );

    //     $data = json_encode($params);

    //     // endoint
    //     $sendMessageURL     = "https://api.braceafrica.com/v1/sms/send";

    //     $req                  = curl_init($sendMessageURL);

    //     curl_setopt($req, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($req, CURLOPT_TIMEOUT, 60);
    //     curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($req, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($req, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'x-api-user: '.$x_username,
    //         'x-api-key: '.$x_apikey
    //     ));

    //     // read api response
    //     $res              = curl_exec($req);

    //     // close curl
    //     curl_close($req);

       
    // }

    
}