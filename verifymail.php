<?php

session_start();

if(isset($_POST['forotp'])){

ini_set("SMTP","ssl://smtp.gmail.com");
// ini_set("smtp_port","587");
// if (isset($_POST['click'])) {
  
 
     $email=$_POST['email'];
       echo $email;
       $otpp=rand(222222,999999);
       echo $otpp;
     $msg= "One Time Password(OTP): ".$otpp;
     $_SESSION['otp']=$otpp;
   
     
   

   require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";// IP address or domain name
$mail->SMTPAuth = true;

$mail->SMTPSecure = "tls";

$mail->Port = 587;  //Email Port
$mail->Username = "ajayprajapati0518@gmail.com";// Email address of your server
$mail->Password = "istbhqzvaiikbkha";// Email password

$mail->From = "ajayprajapati0518@gmail.com"; //email address
$mail->FromName = "Test Mail";
$mail->AddAddress($email);
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

                                 // Set email format to HTML
    $mail->Subject = 'Test Email one';
    $mail->Body    = $msg;
   
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    echo 0;
// echo "Message could not be sent. <p>";
// echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
    // echo "Message could  be sent. <p>";
    echo 1;
}
    
}


if(isset($_POST['forsession'])){
    $otp=$_POST['filotp'];
    // echo $otp;
    // echo "sdksdjkss";
    // echo $_SESSION['otp'];

 if($_SESSION['otp']==$otp){
     echo "yes";
 }
 else{
     echo "no";
 }
}
    



?>