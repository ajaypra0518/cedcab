<?php
session_start();
include "dbconnection.php";
$pickup=$_POST['pickup'];
$drop =$_POST['drop'];
$car=$_POST['car'];
$distance=$_POST['distance']; 
$weight=$_POST['weight'];
$fare=$_POST['fare'];

if(isset($_SESSION['userlogin']) && isset( $_SESSION['customer_id'])){
 
 $customer=$_SESSION['customer_id'];
$query="INSERT INTO `tbl_ride`(`ride_date`, `from_loc`, `to_loc`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`, `cab_type`)
 VALUES (now(),'$pickup','$drop','$distance','$weight','$fare',1,'$customer','$car')";
 mysqli_query($con,$query);
echo "<script>
alert('Your Ride is Booked But Approvel is Needed From Admin Side')
window.location.href='userdashboard.php';
</script>";
}
else{
    echo "<script>
    alert('Your Have Not Logged In...  ')
    window.location.href='login.php';
    </script>";
   
}




?>