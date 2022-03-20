<?php

$callback_transaction_date = "20220128110207";
$date = date_create_from_format('YmdHis', $callback_transaction_date)->format('Y-m-d H:i:s');
date_default_timezone_set("Africa/Nairobi");
$this_time = new DateTime($date);
$mpesa_time = $this_time -> format('H:i');
//echo $date;
echo $mpesa_time;


$timenow = date('H:i');
echo "<br/>";
echo $timenow;
$diff = strtotime($timenow) - strtotime($mpesa_time);
// $days = floor($diff / 86400);
echo "<br/>";
echo $diff;

$min= $diff/60;
echo "<br/>";
echo $min;
$a = new DateTime('09:40');
$b = new DateTime('16:20');
$interval = $a->diff($b);
echo "<br/>";
echo $interval->format("%H");

echo "<br/>";
$sec=date('Y-m-d H:i', (time() - 1000));
echo $sec;
echo "<br/>";
$datetime1 = strtotime('11:14');
$datetime2 = strtotime($timenow);

$secs = $datetime2 - $datetime1;
$days = $secs / 60;
echo $days;

?>