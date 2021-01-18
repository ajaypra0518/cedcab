<?php
session_start();
include "../dbconnection.php";

if(isset($_POST['login'])){
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,md5($_POST['password']));


$query="select * from tbl_user where email_id='$username' AND password='$password'";
$result=mysqli_query($con,$query);
// echo mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            if($row['is_admin']==1){
                $_SESSION['adminlogin']="Hi,Admin";
                $_SESSION['user_id']=$row['user_id'];
                header('location:admin.php');
            }
            if($row['is_admin']==0){
                $_SESSION['userlogin']="Hi,".$row['name'];
                $_SESSION['customer_id']=$row['user_id'];
            
                header('location:../userdashboard.php');
            }
            }
    else{
        header('location:../login.php?idd=false');
    }

}
mysqli_close($con);

?>