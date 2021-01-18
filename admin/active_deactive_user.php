<?php
include "../dbconnection.php";
if(isset($_GET['dummy'])){
    $x=$_GET['dummy'];
  $query ="update tbl_user set status=1 where user_id='$x'";
  mysqli_query($con,$query);
  header('location:all_users.php');

}
if(isset($_GET['dummy1'])){
    $x=$_GET['dummy1'];
  $query ="update tbl_user set status=0 where user_id='$x'";
  mysqli_query($con,$query);
  header('location:all_users.php');

}



?>