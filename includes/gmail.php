<?php
//Include required PHPMailer files
require '../admin/includes/PHPMailer.php';
require '../admin/includes/SMTP.php';
require '../admin/includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
                    
	//ADMINS EMAIL 
    $mail = new PHPMailer();
    //Set mailer to use smtp
        $mail->isSMTP();
    //Define smtp host
        $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
        $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
    //Port to connect smtp
        $mail->Port = "587";
    //Set gmail username
        $mail->Username = "Admin EveryMina";
    //Set gmail password
        $mail->Password = "37030885";
    //Email subject
        $mail->Subject = "New Registered Member";
    //Set sender email
        $mail->setFrom('barongouse@gmail.com');
    //Enable HTML
        $mail->isHTML(true);
    //Attachment
        // $mail->addAttachment('img/attachment.png');
    //Email body
        $mail->Body = "There is a new registered member";
    //Add recipient
        $mail->addAddress('devngecu@gmail.com');
    //Send
        $mail -> Send();

        //clear all 
        $mail->ClearAllRecipients();
        //Email subject
        // $mail->Subject = "New Registered Member";
        //Email body
        $mail->Body = "There is a new registered member 2";
    //Add recipient
        $mail->addAddress('ngecu16@gmail.com');
    //Closing smtp connection

        $mail -> Send();

        $mail->smtpClose();


                    ?>