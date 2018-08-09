<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

require 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Passing `true` enables exceptions


if (isset($_POST['submit'])) {
    $handle = new upload($_FILES['file']);

    if ($handle->uploaded) {
      if ($handle->file_src_name_ext === 'png' || $handle->file_src_name_ext === 'jpg' || $handle->file_src_name_ext === 'jpeg' || $handle->file_src_name_ext === 'gif') {
        $handle->process('./uploads');
        if ($handle->processed) {
          $id = 'errorUpload';
          $message = 'Image attached';
          $imagePath = $handle->file_dst_pathname;
          $handle->clean();
        }
        else {
          $id = 'errorUpload';
          $message = 'error : ' . $handle->error;
          errorMsg($id, $message, 'newnode6');
        }
      }
      else {
        $id = 'errorUpload';
        $message = 'type de fichier invalide';
        errorMsg($id, $message, 'newnode7');
      }
    }

    try {
        // initiation + filter of variables
        $nom       = $_POST['nom'];
        $prenom    = $_POST['prenom'];
        $email     = $_POST['email'];
        $message   = $_POST['message'];
        $formatRep = $_POST['formatRep'];

        $nom_san     = filter_var($nom, FILTER_SANITIZE_STRING);
        $prenom_san  = filter_var($prenom, FILTER_SANITIZE_STRING);
        $email_san = filter_var($email, FILTER_SANITIZE_EMAIL);
        $message_san = filter_var($message, FILTER_SANITIZE_STRING);
        $email_valid = filter_var($email_san, FILTER_VALIDATE_EMAIL);


        //Load Composer's autoloader
        $mail            = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'jujubidoubidou@gmail.com'; // SMTP username
        $mail->Password   = 'jujubidoubidoubi'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('jujubidoubidou@gmail.com');
        $mail->addAddress($email_valid, $prenom_san); // Name is optional
        $mail->addAddress('jujubidoubidou@gmail.com');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment($imagePath);
        // $mail->addAttachment($handle); // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        $mail->Body = $message_san;
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $_POST['object'];
        $mail->Body    = $message_san;
        $mail->AltBody = 'Voici votre message sous format texte';

        $mail->send();
        echo 'Message has been sent';
    }
    catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


}


?>
