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
            <th>User Name</th>
            <th>Date of Signup(YYYY-MM-DD)</th>
            <th>Mobile No.</th>
            <th>Status</th>
            <th>Operation</th>
           
          </tr>
        </thead>

        <tbody>
          <?php
          
          $q="select * from tbl_user ";
          $res=mysqli_query($con,$q);

          while($x=mysqli_fetch_assoc($res))          
          {?>
          <tr>
            <td><?php echo $x['name'];?></td>
            <td><?php echo $x['email_id'];?></td>
            <td><?php echo $x['dateofsignup'];?></td>
            <td><?php echo $x['mobile'];?></td>
            <td><?php 
            if($x['status']==1)
            echo "Active";
            else if($x['status']==0)
            echo "Blocked";
            ?></td>



           <td>
             <?php if($x['status']==0){ ?>
           <a href="active_deactive_user.php?dummy=<?php echo $x['user_id'];?>"><button type="button" class="btn btn-success" 
                   style="font-size:13px;">Active</button>
                </a>
                <?php } ?>
                <?php if($x['status']==1){ ?>
            <a href="active_deactive_user.php?dummy1=<?php echo $x['user_id'];?>"><button type="button" class="btn btn-danger" 
                   style="font-size:13px;">Block</button>
                </a>
            <?php } ?>

            </td> 
            


      
           
          
           
           

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