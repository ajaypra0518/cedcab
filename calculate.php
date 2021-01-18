<?php 
include "dbconnection.php";


// $loc=[
//     'Charbagh'=>0,
//     'Indira_Nagar'=>10,
//     'BBD'=>30,
//     'Barabanki'=>60,
//     'Faizabad'=>100,
//     'Basti'=>150,
//     'Gorakhpur'=>210
// ];

$pickup=$_POST['pickup'];
$drop =$_POST['drop'];
$car=$_POST['cars'];
$weight=$_POST['weight'];


$query="select distance from tbl_location where name='$pickup'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);

$query1="select distance from tbl_location where name='$drop'";
$result1=mysqli_query($con,$query1);
$row1=mysqli_fetch_assoc($result1);



if($weight==""){
   $weight=0;
}

$distance= abs($row['distance']-$row1['distance']);
switch($car){
    case "CedMicro":
        $fare=50; $f1=13.50;$f2=12;  $f3=10.20; $f4=8.50;
        $obj=new Cars($distance,$fare,$f1,$f2,$f3,$f4);
        $obj->myLuggage($weight=0 ,$pickup,$drop,$car,$distance);
       
    break;
    case "CedMini":
        $fare=150; $f1=14.50;$f2=13;  $f3=11.20; $f4=9.50;
        $obj=new Cars($distance,$fare,$f1,$f2,$f3,$f4);
        $obj->myLuggage($weight,$pickup,$drop,$car,$distance);

    break;
    case "CedRoyal":
        $fare=200; $f1=15.50;$f2=14;  $f3=12.20; $f4=10.50;
        $obj=new Cars($distance,$fare,$f1,$f2,$f3,$f4);
        $obj->myLuggage($weight,$pickup,$drop,$car,$distance);

    break;
    case "CedSUV":
        $fare=250; $f1=16.50;$f2=15;  $f3=13.20; $f4=11.50;
        $obj=new Cars($distance,$fare,$f1,$f2,$f3,$f4);
        $obj->myLuggage($weight,$pickup,$drop,$car,$distance);
    break;
}




class Cars{
    public $fare;
        function __construct($distance,$fare,$f1,$f2,$f3,$f4){
        if($distance<=10){
            $this->fare=$fare+10*$f1;
        }
        elseif($distance>10 && $distance<=60){
            $this->fare=$fare+10*$f1+($distance-10)*$f2;
        }
        elseif($distance>60 && $distance<=160){
            $this->fare=$fare+10*$f1+50*$f2+($distance-60)*$f3;           
        }
        elseif( $distance>160){
              $this->fare=$fare+10*$f1+50*$f2+100*$f3+($distance-160)*$f4;          
        }      
    }

    function myLuggage($weight,$pickup,$drop,$car,$distance){     
       $fare=$this->fare;
        if($weight!=0 && $weight<=10){
            if($car=="CedSUV"){
                $fare=$fare+50*2;
            }
            else{
                $fare=$fare+50;
            } 
        }
        else if($weight!=0 && $weight>10 && $weight<=20){
            if($car=="CedSUV"){
                $fare=$fare+100*2;
            }
            else{
                $fare=$fare+100;
            }   
        }
        else if($weight!=0 && $weight>20){
            if($car=="CedSUV"){
                $fare=$fare+200*2;
            }
            else{
                $fare=$fare+200;
            }  
        }
        if($pickup=="Indira_Nagar"){
            $pickup="Indira Nagar";
        }
        if($drop=="Indira_Nagar"){
            $drop="Indira Nagar";
        }     
        echo"
       <form action='userloginckeck.php' method='POST'>
       <table>
       <tr><th>PICKUP:</th><td class='output'> <input type='text' name='pickup' value='$pickup' readonly> </td></tr>
       <tr><th>DROP:</th><td class='output'>  <input type='text' name='drop' value='$drop' readonly> </td></tr>
       <tr><th>CAB TYPE:</th><td class='output'> <input type='text' name='car' value='$car' readonly> </td></tr>
       <tr><th>DISTANCE:</th><td class='output'> <input type='text' name='distance' value='$distance' readonly></td></tr>
       <tr><th>LUGGAGE:</th><td class='output'> <input type='text' name='weight' value='$weight' readonly> </td></tr>
       <tr><th>TOTAl FARE:</th><td class='output'> <input type='text' name='fare' value='$fare' readonly> </td></tr>
      
       </table>
       <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>CANCEL</button>
                    <button type='submit' class='btn btn-success' name='booknow'> BOOK NOW </button> 
                </div>
       
       </form>
        ";
    }  
}
?>