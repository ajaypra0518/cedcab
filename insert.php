<?php
include "dbconnection.php";

           

$email = mysqli_real_escape_string($con,$_POST['email']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$mobile =mysqli_real_escape_string($con,$_POST['mobile']);
$password =mysqli_real_escape_string($con,md5($_POST['password']));

$query="select email_id from tbl_user where email_id='$email'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    echo "exist";
    die;
}
else{
$query="INSERT INTO `tbl_user`(`email_id`, `name`, `dateofsignup`, `mobile`, `status`, `password`, `is_admin`)  VALUES ('$email','$name',now(),'$mobile',1,'$password',0)";
$sql=mysqli_query($con,$query);

if ($sql==true) {
     echo "insert";
}else{
    echo "not_insert";
}
}

 mysqli_close($con);


?>