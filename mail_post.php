<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('./src/PHPMailer.php');
include('./src/SMTP.php');
include('./src/Exception.php');
require('./config/db.php');
session_start();

if(isset($_POST['mail_send_btn'])){
    $name = $_POST['name'];
    $send_email_to = $_POST['email'];
    $subject = "Greetings Message From Kufa";
    $subject2 = $_POST['subject'];
    $body = "Thank You $name dear for your valuable message";
    $body2 = $_POST['message'];
    $date = date("Y-m-d");
    if($name && $send_email_to && $subject && $body){
        $mail = new PHPMailer(true);
            //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'keya05866@gmail.com';                     //SMTP username
    $mail->Password   = 'dknv xotw dgha oogp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('keya05866@gmail.com', 'Keya  Moni' );
    $mail->addAddress("$send_email_to", "$name");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo("$send_email_to", "$name");
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$body";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
             if($name && $send_email_to && $subject2 && $body2){
     $insert_query = "INSERT INTO contact (name,email,subject,message,date) VALUES ('$name','$send_email_to','$subject2','$body2','$date')";
                mysqli_query($db_connect,$insert_query);
                $_SESSION['contact_success'] = "Your Message Has been Sent";
                header("location: index.php");
             }else{
                $_SESSION['contact_error'] = "You have to fill all information";
                header("location: index.php");
             }
          


    }
      
}
?>