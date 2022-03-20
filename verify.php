<?php

include('includes/db.php');
$callback_phone_number=$_GET['phone'];
$callback_amount=$_GET['amount'];
$acount=$_GET['account'];
$callback_mpesa_transaction_id=$_GET['id'];
$date=$_GET['date'];
$time=$_GET['time'];
$callback_result=$_GET['result'];
date_default_timezone_set('Africa/Nairobi');
echo $callback_result;
if ($callback_result == 0) {
$sql = "INSERT INTO transactions (phone_number, amount, mpesa_transaction_id, balance, transaction_date, transaction_time, reason)
VALUES ('".$callback_phone_number."', '".$callback_amount."', '".$callback_mpesa_transaction_id."', '".$callback_result."','".$date."', '".$time."', '".$acount."')";
// if (mysqli_query($con, $sql)) {    

usleep(10000);
echo '<script>
setTimeout(function(){
   window.location = success.php;
}, 10000);
</script>';
}else{

   //sleep(5);
   //header('Refresh: 5: location:success.php');
 //   usleep(10000);
 //   echo '<script>
 //   setTimeout(function(){
 //      window.location = failed.php;
 //   }, 10000);
 //  </script>';
  header('Refresh: 500: url:failed.php');
 echo mysqli_error($con);
 }
//sleep(5);
//header('Refresh: 5: location:success.php');
// usleep(10000);
// echo '<script>
// setTimeout(function(){
//    window.location = failed.php;
// }, 10000);
// </script>';



?>