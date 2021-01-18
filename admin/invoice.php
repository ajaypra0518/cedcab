
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
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="invoice.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
/* td{
    padding:20px ;
    text-align:center;
}
th{
    padding:10px;
    padding-left:20px;
    padding-right:20px;
    text-align:center;
}*/
.sessiondecorate{ 
      margin-right:20px;
      font-weight:bold;
      font-size:20px;
    }
    .content{
        max-width: 70%;
    }

</style>

<body>
      <!---------------------------header----------------------------->
    <?php
    
    include "../dbconnection.php";
    include "admin_header.php";
   if(isset($_GET['dummy'])){
       $x=$_GET['dummy'];
    $query="select * from tbl_ride where ride_id='$x'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);

   }
   
 
 
    
    ?>
      <!---------------------------header----------------------------->

    
    <!-- <div class="container">

    <div class="mx-auto">
    <table border="1">
        <tr><th>PICKUP LOCATION:</th><td class='output'>$pickup</td></tr>
        <tr><th>DROP LOCATION:</th><td class='output'>  $drop</td></tr>
        <tr><th>CAB TYPE:</th><td class='output'>  $car</td></tr>
        <tr><th>:</th><td class='output'> $distance</td></tr>
        <tr><th>LUGGAGE:</th><td class='output'>  $weight KG</td></tr>
        <tr><th>TOTAl FARE:</th><td class='output'>  $fare</td></tr>
        </table>
      
    </div>

    </div> -->

   
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td >
            <div class="content py-5">
                <table class="main " width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <td >
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>PICKUP LOCATION</td>
                                                            <td class="alignright"><?php echo $row['from_loc'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>DROP LOCATION</td>
                                                            <td class="alignright"><?php echo $row['to_loc'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAB TYPE</td>
                                                            <td class="alignright"><?php echo $row['cab_type'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>DISTANCE</td>
                                                            <td class="alignright"><?php echo $row['total_distance'].'  KM';?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LUGGAGE</td>
                                                            <td class="alignright"><?php echo $row['luggage'].'  KG';?></td>
                                                        </tr>

                                                        <tr>
                                                            <td>RIDE STATUS</td>
                                                            <td class="alignright">
                                                            
                                                            
                                                            <?php if($row['status']==0){
                                                                echo "Cancelled";
                                                                }
                                                                else if($row['status']==2){
                                                                echo "Completed";
                                                                }
                                                                ?>
                                                            </td>
                                                            
                                                            
                                                           
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">TOTAL FARE</td>
                                                            <td class="alignright"><?php echo $row['total_fare']?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
        </td>
        <td></td>
    </tr>
</tbody></table>
<div class="text-center"><button onclick=window.print() class="btn btn-primary"> Print Invoice</button></div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="../project.js"></script>
</body>

</html>











