<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/loading.css ">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <meta http-equiv = "refresh" content = "2; url = sucsess.php" /> -->
<title>Payment</title>
</head>
<body>
<!-- about -->
<!-- <div class="about">
   <a class="bg_links social portfolio" href="https://www.rafaelalucas.com" target="_blank">
      <span class="icon"></span>
   </a>
   <a class="bg_links social dribbble" href="https://dribbble.com/rafaelalucas" target="_blank">
      <span class="icon"></span>
   </a>
   <a class="bg_links social linkedin" href="https://www.linkedin.com/in/rafaelalucas/" target="_blank">
      <span class="icon"></span>
   </a>
   <a class="bg_links logo"></a>
</div> -->
<!-- end about -->
<?php
error_reporting(E_ERROR | E_PARSE);
include('includes/db.php');
$phonenumber = $_GET['phone'];
$amount = $_GET['amount'];
$account = $_GET['account'];

if(isset($phonenumber) && isset($amount)){
	$query = mysqli_query($con, "SELECT * FROM transactions WHERE phone_number = '$phonenumber' AND amount ='$amount' ");
while ($row = mysqli_fetch_array($query)) {
  
  $date = $row['transaction_time'];
}
}


date_default_timezone_set("Africa/Nairobi");

$timenow = date('H:i');

$datetime1 = strtotime($date);
$datetime2 = strtotime($timenow);

$secs = $datetime2 - $datetime1;
$days = $secs / 60;


//echo $interval->format("%H");


?>

<div class="content">
<div id="container">	
	
	<div class="product-details">
		
	<h1>Waiting for Payment...</h1>
	<span class="hint-star star">
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star-o" aria-hidden="true"></i>
	</span>
		
			<!-- <p class="information">" Let's spread the joy , here is Christmas , the most awaited day of the year.Christmas Tree is what one need the most. Here is the correct tree which will enhance your Christmas.</p>

		 -->
		
<div class="control pr-5">
	
	<button class="btn ">
	 <span class="price">KES <?php echo $amount ?>.00</span>
   <span class="shopping-cart">KES <?php echo $amount ?>.00</span>
   <span class="buy"><?php echo $phonenumber ?></span>
 </button>
	
</div>
			
</div>
	
<div class="product-image">
	
	<!-- <img src="https://images.unsplash.com/photo-1606830733744-0ad778449672?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzl8fGNocmlzdG1hcyUyMHRyZWV8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
	 -->
    <div class="loading">
<p>Processing...</p></br>
      <span></span>
   </div>

<div class="info">
	<h2> Description</h2>
	<ul>
		<li><strong><?php echo $account ?> </strong> </li>
		 
		<!--<li><strong>Decoration: </strong>balls and bells</li>
		<li><strong>Material: </strong>Eco-Friendly</li> -->
		
	</ul>
</div>



</div>
<!-- <div class="loading">
<p>Waiting Payment...</p></br>
      <span></span>
   </div>
</div> -->
</div>
<script type="text/javascript">
$(document).ready(function($){
$('body').on('click', '.view', function () {
var id = $(this).data('id');
// ajax
$.ajax({
type:"POST",
url: "ajax-fetch-record.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#fname').html(res.fname);
$('#lname').html(res.lname);
$('#email').html(res.email);
}
});
});
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if($days<=5){
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
}

?>
