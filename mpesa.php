<?php
require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;
if(isset($_POST['stk'])){
stkPush($_POST['amount']);
$phone = '254'.(int)($_POST['phone']);
$account = $_POST['account'];

}
function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = Carbon::rawParse('now')->format('YmdHms');
    //passkey
    $passKey ="";
    $businessShortCOde =1234567;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    return $mpesaPassword;
}
    

   function newAccessToken()
   {
       $consumer_key="";
       $consumer_secret="";
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
       //    $formatedPhone = substr($phone, 1);//716311660
       //    $code = "254";
       //    $phoneNumber = $code.$formatedPhone;//254716311660    
      
      // .$_POST['phone'] = (int).$_POST['phone'];
    //$var = ltrim($var, '0');

       $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
       $curl_post_data = [
            'BusinessShortCode' =>1234567,
            
            'Password' => lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' =>'254'.(int)($_POST['phone']),
            'PartyB' => 1234567,
          
            'PhoneNumber' => '254'.(int)($_POST['phone']),
            'CallBackURL' => 'https://08b2-105-163-2-167.ngrok.io/tclfinance/callback.php',
         
            'ConfirmationURL'=>'https://08b2-105-163-2-167.ngrok.io/tclfinance/confirmation_url.php',
            'AccountReference' => "Nexpay System",
            
            'TransactionDesc' => $_POST['account'],
        ];

      $phonenumber='254'.(int)($_POST['phone']);
      $account=$_POST['account'];
       $data_string = json_encode($curl_post_data);


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.newAccessToken()));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
       $curl_response = curl_exec($curl);
// echo "</br>";
// echo $account;
      sleep(5); 
       
       header("Location: loading.php?phone=$phonenumber&amount=$amount&account=$account");

       exit();
       //print_r($curl_response);
      


//echo $phonenumber;


//        echo "<script>
//    window.location.href='loading.php?phone='$phonenumber';
//     </script>";
    
   }
