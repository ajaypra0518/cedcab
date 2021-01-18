<?php
include "dbconnection.php";

$x=$_GET['dummy'];
$query="update tbl_ride set status=0 where ride_id='$x'";
mysqli_query($con,$query);
header('location:pending_rides.php');
die;



?>