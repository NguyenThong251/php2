<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require_once "vendor/autoload.php";

// $mail = new PHPMailer(true);

// // Sử dụng SMTP
// $mail->isSMTP();
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;		
// $mail->CharSet ='utf-8';									
// $mail->Host	 = 'smtp.gmail.com';					
// $mail->SMTPAuth = true;							
// $mail->Username = 'ht01252004@gmail.com';				
// $mail->Password = 'wiky qxtt dudd evtc';												
// $mail->Port	 = 587;
// $mail->isHTML(true);
// try {
//     $mail->send();
//     echo "Message has been sent successfully";
// } catch (Exception $e) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }
namespace model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{
public function mailer($recipient, $subject, $body){
    require_once "vendor/autoload.php";
    
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug=3; // fix bug
    // Sử dụng SMTP
    $mail->isSMTP();
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
    $mail->CharSet ='utf-8';                                   
    $mail->Host  = 'smtp.gmail.com';                       
    $mail->SMTPAuth = true;                            
    $mail->Username = 'ht01252004@gmail.com';                
    $mail->Password = 'jmsq cich opyx ygcr';                                                
    $mail->Port     = 587;
    $mail->isHTML(true);
    $mail->setFrom('ht01252004@gmail.com', 'Your Name');
    $mail->addAddress($recipient);
    $mail->Subject = $subject;
    $mail->Body = $body;

    try {
        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Failed to send email
    }
}
}