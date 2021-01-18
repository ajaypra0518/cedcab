<?php
include "../dbconnection.php";

if(isset($_GET['dummy1'])){
   
    $x=$_GET['dummy1'];
    echo $x;
    $query="update tbl_user set status=1 where user_id='$x'";
    mysqli_query($con,$query);
    header('location:pending_user_request.php');
    die;
    }
?>