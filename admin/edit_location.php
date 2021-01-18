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


    .loginformbg{
    background-color:#CDDC39;
 
  }
  .btncol{
    background-color:rgba(0, 0, 0, 0.623);
    color:white;
  }

  .form1 {
    border: 1px solid black;
    padding: 10px;
    /* margin-top:200px; */
    border-radius: 5px;
    /* margin-bottom:6rem;
    margin-top:70px; */
  }
  #signstatus{
      color:green;
  }
   
     /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
 
</style>

<body>
   <?php include "admin_header.php";
    include "../dbconnection.php";


    if(isset($_GET['dummy'])){
        $x=$_GET['dummy'];
        $query="select * from tbl_location where id='$x'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
    }


    if(isset($_POST['editlocation'])){
       $location=$_POST['location'];
       $distance=$_POST['distance'];
       $available=$_POST['available'];
     $query1="UPDATE `tbl_location` SET `name` = '$location', `distance` = '$distance', `is_available` = '$available' WHERE `tbl_location`.`id` = '$x'";
    $result1=mysqli_query($con,$query1);
    }

   ?>
  


  <div class="container-fluid loginformbg" >
<div class="container"  >
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-7 col-sm-8 col-xs-12 mx-auto my-5" >
        <form class="form1 pb-3 pt-0 px-4 my-4 py-3 pb-5"  method="POST">
      
          <div class="form-group mt-4 mb-0">
            <label>Location:</label>
            <input type="text" class="form-control col-12" name="location" value="<?php echo $row['name'] ?>" required>
          </div>

          <div class="form-group mt-2 ">
            <label>Distance:</label>
            <input type="number" class="form-control  col-12" name="distance"  value="<?php echo $row['distance'] ?>"  required>
        </div>
        <div class="form-group mt-2 ">
            <label>Is Available:</label>
            <input type="number" class="form-control  col-12" name="available" value="<?php echo $row['is_available'] ?>"required>
        </div>

        <p id="signstatus" class="mb-1">
        <?php
         if(isset($_POST['editlocation'])){
        if($result1==true){
            echo "Location Edited SuccessFully";
            ob_end_flush();
            flush();
            sleep(2);
            echo "<script>window.location.href='locationlist.php'</script>";
            die;
        }
    }

        ?>
        </p>
        
          <button type="submit" class="btn btncol col-12" name="editlocation" onclick="return confirm('Do You Want To Edit Location')">Click To Save</button>

        </form>
      </div>
    </div>
  </div>

</div>






    <?php include "../footer.php"?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="../project.js"></script>
  <script>

</script>
</body>

</html>