<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL ^ E_NOTICE);

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
      // initiation + filter of variables
      $nom =  $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email =  $_POST['email'] ;
      $objet =  $_POST['object'] ;
      $message = $_POST['message'] ;
      // $document = $_POST['file'] ;
      $formatRep =  $_POST['formatRep'];

      $nom_san = filter_var($nom, FILTER_SANITIZE_STRING);
      $prenom_san = filter_var($prenom, FILTER_SANITIZE_STRING).
      $email_san = filter_var($email, FILTER_SANITIZE_EMAIL);
      $message_san = filter_var($message, FILTER_SANITIZE_STRING);
      $email_valid = filter_var($email_san, FILTER_VALIDATE_EMAIL);


        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'jujubidoubidou@gmail.com';                 // SMTP username
        $mail->Password = 'jujubidoubidoubi';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email_valid, $prenom_san);
        $mail->addAddress('jujubidoubidou@gmail.com');               // Name is optional
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment($document);                          // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $object;
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }




 ?>
