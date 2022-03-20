<?php

session_start();

require_once('Config.php');

$url_success = ""; //Put the link to redirect if the payment was made successfully.
$url_cancel = ""; //Put the link to redirect if the payment was cancelled.
$url_error = ""; //Put the link to redirect if there was an error encountered.

$endpoint = ($configuration->config->env == "live") 
   ? "https://api.safaricom.co.ke/mpesa/stkpushquery/v1/query" 
   : "https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query"; 

$timestamp = date("YmdHis"); 
$password = base64_encode($configuration->config->shortcode . $configuration->config->passkey . $timestamp); 

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url2);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$password));
curl_setopt($curl, CURLOPT_HEADER,false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
$access_token=json_decode($curl_response);

$curl_post_data = array(
              'BusinessShortCode' => $configuration->config->headoffice,
              'Password' => $lipa_na_mpesa_password,
              'Timestamp' => $timestamp,
              'CheckoutRequestID' => $_SESSION['CheckoutRequestID']
 );

$response = $configuration->process_getRequest($endpoint, $access_token);

if($res['ResultCode'] == 0){
   //If the transaction was a success
   header('Location:'.$url_success.'');
   exit();
}elseif($res['ResultCode'] == 1032){
   //If the transaction was a Cancelled
   header('Location:'.$url_cancel.'');
   exit();
}else{
   //Flag any other response as an error
   header('Location:'.$url_error.'');
   exit();
}

?><code></code>