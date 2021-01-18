<?php
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    .mycards{
        border:1px solid black;
       padding-top: 40px;
       padding-bottom: 40px;
    }
    .sessiondecorate{
      margin-right:20px;
      font-weight:bold;
      font-size:20px;
    }
 
</style>

<body>
   <?php include "admin_header.php";
   
   include "../dbconnection.php";
//////////////query for pending rides/////////////////////
$query= "select count(*) as pendingrides from tbl_ride where status=1";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
//////////////query for pending rides/////////////////////

//////////////query for completed rides/////////////////////
$query1= "select count(*) as completedrides from tbl_ride  where status=2 ";
$result1=mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($result1);
//////////////query for completed rides/////////////////////

//////////////query for total fare/////////////////////
$query2= "select count(*) as cancel_rides from tbl_ride  where status=0";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($result2);
//////////////query for total fare/////////////////////


//////////////query for completed rides/////////////////////
$query3= "select count(*) as totalride from tbl_ride ";
$result3=mysqli_query($con,$query3);
$row3=mysqli_fetch_assoc($result3);
//////////////query for completed rides/////////////////////


//////////////query for pending user requests/////////////////////
$query4= "select count(*) as pending_user_req from tbl_user where status=0";
$result4=mysqli_query($con,$query4);
$row4=mysqli_fetch_assoc($result4);
//////////////query for pending user requests/////////////////////


//////////////query for approved user requests/////////////////////
$query5= "select count(*) as approved_user_req from tbl_user where status=1";
$result5=mysqli_query($con,$query5);
$row5=mysqli_fetch_assoc($result5);
//////////////query for approved user requests/////////////////////

//////////////query for all user/////////////////////
$query6= "select count(*) as all_user from tbl_user";
$result6=mysqli_query($con,$query6);
$row6=mysqli_fetch_assoc($result6);
//////////////query for all user//////////////////////

//////////////query for all user/////////////////////
$query7= "select count(*) as servisable_loc from tbl_location where is_available=1";
$result7=mysqli_query($con,$query7);
$row7=mysqli_fetch_assoc($result7);
//////////////query for all user//////////////////////
   
   
   ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-5">
                <div class="col-3">
                  <div class="mycards text-center">
                    <p>Rides Requests</p>
                    <p><?php echo $row['pendingrides']; ?></p>
                    <a href="ride_request.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Rides Requests"></a>
                  </div>
                </div>

                <div class="col-3">
                    <div class="mycards text-center">
                      <p>Completed Rides</p>
                      <p><?php echo $row1['completedrides']; ?></p>
                      <a href="completed_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Completed Rides"></a>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="mycards text-center">
                    <p>Cancelled Rides</p>
                    <p><?php echo $row2['cancel_rides']; ?></p>                   
                      <a href="cancelled_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Canceled Rides"></a>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="mycards text-center">
                    <p>All Rides</p>
                    <p><?php echo $row3['totalride'] ?></p>
                      <a href="all_rides.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="All Rides"></a>
                    </div>
                  </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container">
            <div class="row mt-5 mb-4">
                <!-- <div class="col-3">
                  <div class="mycards text-center">
                    <p>Pending Users Requests</p>
                    <p><?php echo $row4['pending_user_req']; ?></p>
                    <a href="pending_user_request.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Pending Users Requests"></a>
                  </div>
                </div> -->
<!-- 
                <div class="col-3">
                    <div class="mycards text-center">
                      <p>Approved users Requests</p>
                      <p><?php echo $row5['approved_user_req']; ?></p>
                      <a href="approved _users.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Approved users Requests"></a>
                    </div>
                  </div> -->

                  <div class="col-3">
                    <div class="mycards text-center">
                      <p>All Users</p>
                      <p><?php echo $row6['all_user']; ?></p>
                      <a href="all_users.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="All Users"></a>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="mycards text-center">
                      <p>Servicable Locations</p> 
                       <p><?php echo $row7['servisable_loc']; ?></p>
                      <a href="locationlist.php"><input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Servicable Locations"></a>
                    </div>
                  </div>

            </div>
        </div>
    </div>
   
<?php include "../footer.php"?>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="../project.js"></script>
</body>

</html>