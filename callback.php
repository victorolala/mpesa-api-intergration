
<?php
include('includes/db.php');
$callback_data = json_decode(file_get_contents('php://input'), true);

print_r($callback_data);
date_default_timezone_set('Africa/Nairobi');
if(isset($callback_data['Body'])){
   $callback_body = $callback_data['Body'];
   $callback_message = $callback_body['stkCallback'];
   $callback_result = $callback_message['ResultCode'];
   $callback_result_desc = $callback_message['ResultDesc'];
   $callback_merchant_request_id = $callback_message['MerchantRequestID'];
   $callback_checkout_request_id = $callback_message['CheckoutRequestID'];
}

if($callback_result == 0){
      $callback_amount = $callback_message['CallbackMetadata']['Item'][0]['Value'];
      $callback_mpesa_transaction_id = $callback_message['CallbackMetadata']['Item'][1]['Value'];
      $callback_balance = $callback_message['CallbackMetadata']['Item'][2]['Value'];
      $callback_transaction_date = $callback_message['CallbackMetadata']['Item'][3]['Value'];
      $callback_phone_number = $callback_message['CallbackMetadata']['Item'][4]['Value'];

      

      $date = date_create_from_format('YmdHis', $callback_transaction_date)->format('Y-m-d');
      $time = date_create_from_format('YmdHis', $callback_transaction_date)->format('H:i');
      $sql = "INSERT INTO transactions (phone_number, amount, mpesa_transaction_id, balance, transaction_date, transaction_time)
      VALUES ('".$callback_phone_number."', '".$callback_amount."', '".$callback_mpesa_transaction_id."', '".$callback_balance."','".$date."', '".$time."')";
  // if (mysqli_query($con, $sql)) {    

    if (mysqli_query($con, $sql)) {
      echo '<script>
      setTimeout(function(){
         window.location.href = "success.php";
      }, 20000);
     </script>';
    }else{
      //sleep(5);
      //header('Refresh: 5: location:success.php');
      echo '<script>
      setTimeout(function(){
         window.location.href = "failed.php";
      }, 20000);
     </script>';
     
    echo mysqli_error($con);
    }
    
      

  echo $callback_result;
echo $callback_result_desc;
}

   

 ?>