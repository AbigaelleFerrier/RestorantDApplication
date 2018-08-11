<?php

header("Content-Type: text/plain");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include 'inc/contenuMailCommande.inc.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'auth.smtp.1and1.fr';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'test@asheart.fr';                  // SMTP username
    $mail->Password = '123456789';                        // SMTP password
    $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('Test@asheart.fr', 'Magasin Général');
    $mail->addAddress($rowClt['mailClient'] , $rowClt['nomClient']. ' '. $rowClt['prenomClient'] );     // Add a recipient $mailVers
    
    if (array_key_exists('inputpresent', $_POST)){
        foreach($_POST['inputpresent'] as $Email) {
            
        }
    }

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Votre commande a été enregistrée';
    $mail->Body    = $bodyMessageHTML;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("Mail envoyé");</script>';
} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Mailer Error: ', $mail->ErrorInfo . '");</script>';
}