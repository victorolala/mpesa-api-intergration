<?php
include('../includes/db.php');
$id = $_POST['id'];
$query="SELECT * from transactions WHERE id = '" . $id . "'";
$result = mysqli_query($con,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($con);
}
?>