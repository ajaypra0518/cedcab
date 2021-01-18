<?php
  include "../dbconnection.php";
  if(isset($_GET['dummy'])){
      $x=$_GET['dummy'];
      $query="DELETE FROM `tbl_location` WHERE `tbl_location`.`id` = '$x'";
      mysqli_query($con,$query);
      header('location:locationlist.php');
  }

?>