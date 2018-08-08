<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);


if($_POST){
 $nom =  $_POST['nom'];
 $prenom = $_POST['prenom'];
 $mail =  $_POST['email'] ;
 $objet =  $_POST['object'] ;
 $message = $_POST['message'] ;
 $document = $_POST['file'] ;
 $formatRep =  $_POST['formatRep'] ;

    echo $nom . '<br>';
    echo $prenom . '<br>';
    echo $mail . '<br>';
    echo $objet . '<br>';
    echo $message . '<br>';
    echo $document . '<br>';
    echo $formatRep . '<br>';
}

 // Filtrage des données
 function verif_formulaire(){
   $nom_san = filter_var($nom, FILTER_SANITIZE_STRING);
   $prenom_san = filter_var($prenom, FILTER_SANITIZE_STRING).
   $email_san = filter_var($email, FILTER_SANITIZE_EMAIL);
   $message_san = filter_var($message, FILTER_SANITIZE_STRING);
   $email_valid = filter_var($email_san, FILTER_VALIDATE_EMAIL);
 };




/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "jujubidoubidou@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "jujubidoubidoubi";
//Set who the message is to be sent from
$mail->setFrom('', 'Ju Bi');
//Set an alternative reply-to address
$mail->addReplyTo('jujubidoubidou@gmail.com', 'Les petits riens');
//Set who the message is to be sent to
$mail->addAddress('jujubidoubidou@gmail.com', 'Lespetitesrien');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'This is the html message';
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file





$mail->addAttachment('img/logo.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}


//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}


 ?>
