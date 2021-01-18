<?php
session_start();

if(isset($_GET['idd'])){
$_SESSION['iddd']=$_GET['idd'];
// unset($_GET);
header("Location: ".$_SERVER['PHP_SELF']);
exit;
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
    margin-bottom:6rem;
    margin-top:70px;
  }
  #loginstatus{
    color:red;
  }



</style>


<body>
  <!---------------------------header----------------------------->
  <?php include "header.php"; ?>
  <!---------------------------header----------------------------->


<div class="container-fluid loginformbg" >
<div class="container" >
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-7 col-sm-8 col-xs-12 mx-auto">

        <form action="./admin/adminlogin.php" class="form1 py-4 px-4" method="POST">
        <h3 class="text-center">Login</h3>
          <div class="form-group mt-4">
            <label>User Name</label>
            <input type="text" class="form-control col-12" name="username" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control  col-12" name="password" required>
          </div>
          <p id="loginstatus" class="mb-1"><?php 

          if(isset($_SESSION['iddd'])){
            echo "User Name Or Password is Invalid";
            unset($_SESSION['iddd']);
          }
          ?></p>

          <button type="submit" class="btn btncol col-12" name="login" id="login">Submit </button>

        </form>
      </div>
    </div>
  </div>

</div>



  <!---------------------------footer----------------------------->
  <?php include "footer.php";?>
  <!---------------------------footer----------------------------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="project.js"></script>
</body>

</html>