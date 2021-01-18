<?
session_start();
if(!isset( $_SESSION['adminlogin'])){
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ola Cab</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>
<style>
   
    .sessiondecorate{
      margin-right:20px;
      font-weight:bold;
      font-size:20px;
    }
 
</style>

<body>
   <?php include "admin_header.php";
    include "../dbconnection.php";
   ?>
  

   <h2 class="text-center mt-2">All Users</h2>
<div class="container">
<div style="font-size:14px;overflow-x:scroll;" class="text-center">
    <div>
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Distance</th>
            <th>Availability</th>
          
            <!-- <th>Block</th> -->
            
          </tr>
        </thead>

        <tbody>
          <?php
          
          $q="select * from tbl_location ";
          $res=mysqli_query($con,$q);

          while($x=mysqli_fetch_assoc($res))          
          {?>
          <tr>
            <td><?php echo $x['name'];?></td>
            <td><?php echo $x['distance'];?></td>
            <td><?php echo $x['is_available'];?></td>
            
           
            <!-- <td><a href="admin_signup_allow.php?dummy=/<?php //echo $x['user_id'];?>"><button type="button" class="btn btn-success" 
                  onclick="return confirm('Are you sure you want to Cancel the ride')"  style="font-size:13px;">Block</button>
                </a>
            </td>           -->
           
           

          </tr>


          <?php
          }
          ?>
        </tbody>

      </table>

    </div>
  </div>

</div>




    <?php include "../footer.php"?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="project.js"></script>
  <script>
$(document).ready(function () {
    $('#myTable').DataTable({
    });
});
</script>
</body>

</html>