<?php
session_start();
$x=$_SESSION['customer_id'];

if(!isset( $_SESSION['userlogin'])){
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ola Cab</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .mycards {
    border: 1px solid black;
    padding-top: 60px;
    padding-bottom: 60px;
    border-radius: 5px;
  }

  .sessiondecorate {
    margin-right: 20px;
    font-weight: bold;
    font-size: 20px;
  }

  .rowadjust {
    margin-top: 120px;
    margin-bottom: 120px;
  }

  ul li {
    margin: 0 20px;
  }
</style>

<body>

  <?php
include "dbconnection.php";
//////////////query for pending rides/////////////////////
$query= "select count(*) as pendingrides from tbl_ride where customer_user_id='$x' AND status=1";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
//////////////query for pending rides/////////////////////

//////////////query for completed rides/////////////////////
$query1= "select count(*) as completedrides from tbl_ride where  customer_user_id='$x' AND status=2 ";
$result1=mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($result1);
//////////////query for completed rides/////////////////////

//////////////query for total fare/////////////////////
$query2= "select sum(total_fare) as totalfare from tbl_ride where customer_user_id='$x' AND status=2";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($result2);
//////////////query for total fare/////////////////////


//////////////query for completed rides/////////////////////
$query3= "select count(*) as totalride from tbl_ride where customer_user_id='$x'";
$result3=mysqli_query($con,$query3);
$row3=mysqli_fetch_assoc($result3);
//////////////query for completed rides/////////////////////
include "userheader.php";
?>

 

<div class="container-fluid px-0">
  <div class="container">
    <div class="row rowadjust">
      <div class="col-3">
        <div class="mycards text-center">
          <p>Pending Rides</p>
          <p><?php echo $row['pendingrides']; ?></p>

          <a href="pending_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value=" Pending Rides "></a>
        </div>
      </div>

      <div class="col-3">
        <div class="mycards text-center">
          <p>Completed Rides</p>
          <p><?php echo $row1['completedrides']; ?></p>
          <a href="completed_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Completed Rides "></a>
        </div>
      </div>

      <div class="col-3">
        <div class="mycards text-center">
          <p>All Rides</p>
          <p><?php echo $row3['totalride'] ?></p>
          <a href="all_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="All Rides"></a>
        </div>
      </div>

      <div class="col-3">
        <div class="mycards text-center">
          <p>Total Expense</p>
          <p><?php echo $row2['totalfare']; if( $row2['totalfare']=='')echo 0; ?></p>
          <a href="#"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Total Expense"></a>
        </div>
      </div>

    </div>
  </div>
</div>



  <?php include "footer.php"?>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="project.js"></script>
</body>

</html>