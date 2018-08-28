<?php
session_start();

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous

    //var_dump($_SESSION);
    //var_dump($_SESSION['Post-Mail']['files']);

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
    try {

        // FR mode
        $mail->setLanguage('fr', '/optional/path/to/language/directory/');

        // Server settings
            $mail->CharSet      = 'UTF-8';
            $mail->SMTPDebug    = 0;                            // Enable verbose debug output
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host         = 'auth.smtp.1and1.fr';         // Specify main and backup SMTP servers
            $mail->SMTPAuth     = true;                         // Enable SMTP authentication
            $mail->Username     = 'test@asheart.fr';            // SMTP username
            $mail->Password     = '123456789';                  // SMTP password
            $mail->SMTPSecure   = 'ssl';                        // Enable TLS encryption, `ssl` also accepted
            $mail->Port         =  465;                         // TCP port to connect to

        // Recipients //
            $mail->setFrom('Test@asheart.fr', 'Restorant d\'Application - Lycéé Emile Peytavin');
       
            if (isset($_SESSION['Post-Mail']['ClientSelectionner'])){
                foreach($_SESSION['Post-Mail']['ClientSelectionner'] as $Email) {
                    $mail->addAddress($Email);   
                }
            }
            else {
                $req = "SELECT * FROM `client` WHERE `mail` IS NOT NULL ORDER BY `fidelite` DESC";
                $traitement = $connect ->prepare($req);
                $traitement -> execute();

                while($row = $traitement->fetch()) {
                    $mail->addAddress($row['mail']);
                }
            }

        // Attachments //
            if(isset($_SESSION['Post-Mail']['files'])) {
                $mail->addAttachment($_SESSION['Post-Mail']['files']['cheminFile']['tmp_name'], 'Menu_du_Restaurant_d\'Application_-_Lycéé_Emile_Peytavin');
            }
                    
        //Content //
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $_SESSION['Post-Mail']['titreMail'] . ' # Restorant d\'Application - Lycéé Emile Peytavin';
            $mail->Body    = include 'mail.php';
            $mail->AltBody = include 'mailTxt.php';

        $mail->send();
        echo '<script>alert("Mail envoyé");</script>';

    } 

    catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: ', $mail->ErrorInfo . '");</script>';
    }

}