<?php
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required";
} else {
	$body = nl2br($_POST["message"]);


    
}

require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                                     
$mail->Host = 'send.one.com';  
$mail->SMTPAuth = true;                             
$mail->Username = 'info@acgilead.com';                
$mail->Password = 'Testing';                          
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                  

$mail->setFrom("info@acgilead.com"); 
$mail->addAddress("info@acgilead.com");     
$mail->isHTML(true);                        

$mail->Subject = "New Message Received" ;

$mail->Body .= "Name: ";
$mail->Body .= $name;
$mail->Body .= "<br><br>";
$mail->Body .= "Email: ";
$mail->Body .= $email;
$mail->Body .= "<br><br>";
$mail->Body .= "Subject: ";
$mail->Body .= $msg_subject;
$mail->Body .= "<br><br>";
$mail->Body .= "Message: <br>";
$mail->Body .= $body;
$mail->Body .= "<br>";


$mail->AltBody = $body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
} else {
    echo 'success';
}