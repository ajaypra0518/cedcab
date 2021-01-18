<?php 
session_start();
// echo $_GET['mobile'];

if(isset($_GET['mobile']))
{
$mobile=$_GET['mobile'];
$otp=rand(100000,999999);
$_SESSION['otp']=$otp;
              
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=BCwINHP5XorKu9edqpWQ1RhJxM6AT08sigvjStDynzfkG7Fa2mji17qfr54EJYBPyWvou3wKZ09DkSbn&sender_id=FSTSMS&message=".urlencode("Your One Time Password(OTP).$otp")."&language=english&route=p&numbers=".urlencode("$mobile"),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
//   echo "cURL Error #:" . $err;
echo "no";
} else {
//   echo $response;
echo "yes";
}

}

if(isset($_GET['filmobotp'])){
    $otp=$_GET['filmobotp'];
    // echo $otp;
    // echo "sdksdjkss";
   
 if($_SESSION['otp']==$otp){
     echo "yes";
 }
 else{
     echo "no";
 }
}


?>