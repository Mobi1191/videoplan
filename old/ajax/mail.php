<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/5/2018
 * Time: 5:02 PM
 */
require '../vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
if(!isset($_POST['subject']) || !isset($_POST['body'])){
    echo json_encode(array('success' => '0', 'msg' => 'Parameters are invalid'));
    exit();
}

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.1and1.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@videodup.com';                 // SMTP username
    $mail->Password = '12345678';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply@videodup.com', 'Mailer');
    $mail->addAddress('ask@videodup.com', 'basic email');     // Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['body'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
     echo json_encode(
        array(
            'success' => '1',
            'msg' => "Message has been sent!!!"
        ));
} catch (Exception $e) {
    echo json_encode(
        array(
            'success' => '0',
            'msg' => "Message could not be sent. <br>". 'Mailer Error: ' . $mail->ErrorInfo
        ));
}