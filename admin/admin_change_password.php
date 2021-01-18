<?
session_start();
error_reporting(0);
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
    

    if(isset($_SESSION['user_id'])){
        $x=$_SESSION['user_id'];
    
    $query="select * from tbl_user where user_id='$x'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    }
    
    if(isset($_POST['editpassword'])){
        
        $old_password=mysqli_real_escape_string($con,md5($_POST['old_password']));
        $new_password=mysqli_real_escape_string($con,md5($_POST['new_password']));
       
        if($old_password==$row['password']){
        $query1="UPDATE `tbl_user` SET `password` = '$new_password' WHERE `tbl_user`.`user_id` = '$x'";
        $result1=mysqli_query($con,$query1);
        // $_SESSION['check2']=$result1;
        // header("Location: ".$_SERVER['PHP_SELF']);
        // exit;
        }
        else{
            $result1=false;
        }  
    }
    ?>
    
    
    
    <div class="container-fluid loginformbg pb-5 mb-5" >
    <div class="container "  >
        <div class="row" >
          <div class="col-xl-5 col-lg-5 col-md-7 col-sm-8 col-xs-12 mx-auto my-5  " >
            <form class="form1 pb-3 pt-0 px-4 my-4 py-3 pb-4"  method="POST">
        
              <div class="form-group pb-0 mb-0">
                <label>Enter Old Password</label>
                <input type="text" class="form-control  col-12" name="old_password" required>
              </div>
              <div class="form-group mt-2 ">
                <label>Enter New Password</label>
                <input type="text" class="form-control  col-12" name="new_password" required>
            </div>
            <p id="loginstatus" class="mb-1">
            <?php if(isset($_POST['editpassword']) && $result1==false )
                        {
                            echo "<span style='color:red;'>Your Old Password is Wrong</span>";
                          
                        }
                        else if($result1==true){
                            echo "<span style='color:green;'>You have updated your password successfully</span>";
                            ob_end_flush();
                            flush();
                            sleep(2);
                            echo "<script>window.location.href='admin.php'</script>";
                          
                        }
            ?><p>
            
              <button type="submit" class="btn btncol col-12" name="editpassword" onclick="return confirm('Do You Want To Upade')">Click To Save</button>
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