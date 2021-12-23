<?php
namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService{
    private $email;
    private $password;

    public function __construct(){
        $config = include dirname(__DIR__,2).'/config/config.php';
        $this->email = $config["email_user"];
        $this->password = $config["email_password"];
    }

    public function sendMessage($user_email,$user_name,$subject,$text){
        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->SMTPDebug = 1;//don't show text
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username = $this->email;
            $mail->Password = $this->password;
            $mail->setFrom($this->email, 'php_mvc');
            //$mail->addReplyTo('test@hostinger-tutorials.fr', 'Votre nom');
            $mail->addAddress($user_email, 'client');
            //$mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->Subject = $subject;
            //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
            /*$htmlContents = $this->twig->render('email/newuser.html.twig', [
                'email' => $emailclient
            ]);
            $mail->Body = $htmlContents;*/
            $mail->Body = $text ;
            if (!$mail->send()) {
                echo 'Erreur de Mailer : ' . $mail->ErrorInfo;
            } else {
                //echo 'Le message a été envoyé.';
            }
        } catch (phpmailerException $e) {
            //echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
        } catch (Exception $e) {
            //echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
        }
    }
}