<?php
require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;
if(isset($_POST['stk'])){
stkPush($_POST['amount']);
//$phone = $_POST['phone'];

}
function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = Carbon::rawParse('now')->format('YmdHms');
    //passkey
    //$passKey ="146d7f37e3d970bb86c2a688ff88188cf18f8899fd6eec00d58edc933d99285f";
    $passKey="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"; 
   $businessShortCOde =4075143;
    //$businessShortCOde=7360076;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    return $mpesaPassword;
}
    

   function newAccessToken()
   {
       //$consumer_key="V3iTCot3nLrlb2lRSPFsaQTwZBgijGqo";
       //$consumer_secret="9Y1LvjKuCeFCvKEy";
       $consumer_key="BhzTERDBffApjKWXiMKCvgdNqHBDI1bu";
       $consumer_secret="mn6B64XU271PYJ6X";
       
       $credentials = base64_encode($consumer_key.":".$consumer_secret);
       $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $access_token=json_decode($curl_response);
       curl_close($curl);
       
       return $access_token->access_token;
   }



   function stkPush($amount)
   {
       //    $user = $request->user;
       //    $amount = $request->amount;
       //    $phone =  $request->phone;
       //    $formatedPhone = substr($phone, 1);//726582228
       //    $code = "254";
       //    $phoneNumber = $code.$formatedPhone;//254726582228     
      
      // .$_POST['phone'] = (int).$_POST['phone'];
//$var = ltrim($var, '0');

       $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
       $curl_post_data = [
            'BusinessShortCode' =>4075143,
            //'BusinessShortCode' =>7360076,
            'Password' => lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' =>'254'.(int)($_POST['phone']),
            'PartyB' => 4075143,
           //'PartyB' => 7360076,
            'PhoneNumber' => '254'.(int)($_POST['phone']),
            'CallBackURL' => 'https://bfd5-105-163-2-40.ngrok.io/TCL/callback.php',
          //'CallBackURL' => 'http://nexpay.co.ke/TCL/callback',
           
            'AccountReference' => "TCL Finance",
            
            'TransactionDesc' => $_POST['account'],
        ];


       $data_string = json_encode($curl_post_data);


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.newAccessToken()));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
       $curl_response = curl_exec($curl);
       print_r($curl_response);
    //    header('location:responses.php');
   }


?>
