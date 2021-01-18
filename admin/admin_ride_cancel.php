<?php
include "../dbconnection.php";

if(isset($_GET['dummy'])){
$x=$_GET['dummy'];
$query="update tbl_ride set status=0 where ride_id='$x'";
mysqli_query($con,$query);
header('location:ride_request.php');
die;
}

if(isset($_GET['dummy1'])){
    $x=$_GET['dummy1'];
    $query="update tbl_ride set status=2 where ride_id='$x'";
    mysqli_query($con,$query);
    header('location:ride_request.php');
    die;
    }
?>