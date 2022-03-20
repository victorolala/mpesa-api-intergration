<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Code to Fetch All Data from MySQL Database and Display in html Table</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="container mt-2">
<div class="page-header">
<h2>Customers List</h2>
</div>
<div class="row">
<div class="col-md-8">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">First</th>
<th scope="col">Last</th>
<th scope="col">Email</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php
include('../includes/db.php');
$query="select * from transactions"; // Fetch all the data from the table customers
$result=mysqli_query($con,$query);
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<th scope="row"><?php echo $array[0];?></th>
<td><?php echo $array[1];?></td>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
<td> 
<a href="javascript:void(0)" class="btn btn-primary view" data-id="<?php echo $array[0];?>">View</a>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="3" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>
</tbody>
</table>
</div>
<div class="col-md-4">
<span id="fname"></span><br>
<span id="lname"></span><br>
<span id="email"></span><br>
</div>
</div>        
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
</body>
</html>

<?php
$url = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

// $access_token = ''; // check the mpesa_accesstoken.php file for this. No need to writing a new file here, just combine the code as in the tutorial.
 $shortCode = '4075143'; // provide the short code obtained from your test credentials

 /* This two files are provided in the project. */
 $confirmationUrl = 'http://localhost/tclfinance/confirmation_url.php'; // path to your confirmation url. can be IP address that is publicly accessible or a url
 $validationUrl = 'http://localhost/tclfinance/validation_url.php'; // path to your validation url. can be IP address that is publicly accessible or a url



 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $url);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


 $curl_post_data = array(
   //Fill in the request parameters with valid values
   'ShortCode' => $shortCode,
   'ResponseType' => 'Completed',
   'ConfirmationURL' => $confirmationUrl,
   'ValidationURL' => $validationUrl
 );

 $data_string = json_encode($curl_post_data);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POST, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

 $curl_response = curl_exec($curl);
 print_r($curl_response);

 echo $curl_response;
?>