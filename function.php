<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL ^ E_NOTICE);
// importer phpmailer
//use PHPMailer\PHPMailer\PHPMailer;
//require './vendor/autoload.php';
//$doc = DOMDocument::loadHTMLFile('formulaire.php');
//$form = $doc->getElementById('form');
//$mail = new PHPMailer;
//if (isset($_POST['envoi'])) {
//  $handle = new upload($_FILES['file']);
//  $mail->isSMTP();
//  $mail->SMTPDebug = 0;
//  $mail->Host = 'smtp.gmail.com';
//  $mail->Port = 587;
//  $mail->SMTPSecure = 'tls';
//  $mail->SMTPAuth = true;
//  $log = [];
//  $today = getDate();
//  if(!file_exists('LoginAdmin.php')) {
//    $sanuser = filter_var($_POST['jujubidoubidou@gmail.com'], FILTER_SANITIZE_EMAIL);
//    $sanpassword = filter_var($_POST['jujubidoubidoubi'], FILTER_SANITIZE_STRING);
//    $valuser = filter_var($sanuser, FILTER_VALIDATE_EMAIL);
//    if( $valuser !== false ){
//      $mail->Username = $valuser;
//    }
//    else {
//      $id = 'jujubidoubidou@gmail.com';
//      $message = 'email non valide';
//      errorMsg($id, $message, 'newnode2');
//    }
//    if($sanpassword !== "") {
//      $mail->Password = $sanpassword;
//    }
//    else {
//      $id = 'gmailpassword';
//      $message = 'password non valide';
//      errorMsg($id, $message, 'newnode3');
//    }
//  }
//  // Vérifier condition d'envoi : email et message non vide
//  if( isset($_POST['email']) && $_POST['message'] !== '' ){
//    //log time
//    $log['date'] = $today['weekday'].' '.$today['mday'].'/'.$today['mon'].'/'.$today['year'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
//    //Sanitization et validation mail
//    $sanemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//    $valemail = filter_var($sanemail, FILTER_VALIDATE_EMAIL);
//    // sanitization message
//    $sanmessage = filter_var($_POST['message'], FILTER_SANITIZE_EMAIL);
//    //check de la validité de l'email qui a été rentré
//    if($valemail == false){
//      $id = 'errorEmail';
//      $message = 'Veuillez entrez une adresse email valide';
//      errorMsg($id, $message, 'newnode4');
//    }
//    //Si l'email est valide
//    else {
//      $nameToUse = '';
//   
//      //check Nom
//      if ($_POST['name'] !== 'Nom') {
//        $nameToUse .= filter_var($_POST['name'], FILTER_SANITIZE_STRING) . " ";
//        $log['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
//      }
//      // check Prénom
//      if ($_POST['firstname'] !== 'Prénom') {
//        $nameToUse .= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING) . " ";
//        $log['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
//      }
//      // mise en place de l'adresse de l'expéditeur + nom et login de l'email
//      $mail->setFrom($valemail, $nameToUse);
//      $log['email'] = $valemail;
//      //mise en place de l'objet (du message)
//      $mail->Subject = $_POST['objet'];
//      // les 2 lignes en dessous ne nous concernent pas : c'est en lien avec le choix du service auquel on envoit le mail
//      //set the recipient adress and the specific service
//      // $mail->addAddress('berior14@gmail.com', $_POST['contact_choice']);
//      //Mise en place du message (type HTML)
//      $mail->Body = $sanmessage;
//      //check du type de format de la réponse
//      if(isset($_POST['formatRep'])) {
//        $log['format'] = $_POST['formatRep'];
//      }
//      // à partir d'ici il faut vérier, j'ai du mal à comprendre, mais c'est le filtre de l'image uploader je pense
//      if ($handle->uploaded) {
//        if ($handle->file_src_name_ext === 'png' || $handle->file_src_name_ext === 'jpg' || $handle->file_src_name_ext === 'jpeg' || $handle->file_src_name_ext === 'gif') {
//          // présence d'un fichier ./uploads, mais je le trouve pas dans le repos de guigui donc c'est bizarre
//          $handle->process('./uploads');
//          if ($handle->processed) {
//            $id = 'errorUpload';
//            $message = 'Image attached';
//            errorMsg($id, $message, 'newnode5');
//            $imagePath = $handle->file_dst_pathname;
//            $mail->addAttachment($imagePath);
//            $handle->clean();
//          }
//          else {
//            $id = 'errorUpload';
//            $message = 'error : ' . $handle->error;
//            errorMsg($id, $message, 'newnode6');
//          }
//        }
//        else {
//          $id = 'errorUpload';
//          $message = 'type de fichier invalide';
//          errorMsg($id, $message, 'newnode7');
//        }
//      }
//      if (!$mail->send()) {
//          echo "Mailer Error: " . $mail->ErrorInfo;
//      } else {
//          echo "Message envoyé !";
//      }
//      echo '<pre>';
//      // var_dump($log);
//      $toput = json_encode($log, true) . ',';
//      // ./logs/logs.txt se trouve dans un document nom" logs.
//      // je sais pas si c'est nécessaire de mettre ça dans un Document
//      // Je pense que ça crée un fichier json et que ça inscrit dedans les données de l'utilisateur (sans être sûr)
//      // Dans le doute j'ai créer un fichier loginUtilisateur.txt
//      file_put_contents('loginUtilisateur.txt', $toput, FILE_APPEND);
//      unset($_POST, $mail, $log, $toput);
//      echo '</pre>';
//    }
//  }
//  else {
//    if( isset($_POST['email']) == false ){
//      $id = 'errorEmail';
//      $message = 'Veuillez entrez une adresse email';
//      errorMsg($id, $message, 'newnode8');
//    }
//    if ($_POST['message'] == '') {
//      $id = 'errorMessage';
//      $message = 'Veuillez entrez un message';
//      errorMsg($id, $message, 'newnode9');
//    }
//  }
//}

if($_POST){
 $nom =  $_POST['nom'];
 $mail =  $_POST['email'] ;
 $objet =  $_POST['object'] ;
 $message = $_POST['message'] ;
 $document = $_POST['file'] ;
 $formatRep =  $_POST['formatRep'] ;
    
    echo $nom . '<br>';
    echo $mail . '<br>';
    echo $objet . '<br>';
    echo $message . '<br>';
    echo document . '<br>';
    echo $formatRep . '<br>';
}

 // Filtrage des données
 function verif_formulaire(){
   $nom_san = filter_var($nom, FILTER_SANITIZE_STRING);
   $email_san = filter_var($email, FILTER_SANITIZE_EMAIL);
   $message_san = filter_var($message, FILTER_SANITIZE_STRING);

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





$mail->addAttachment('logo.png');
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


//
// //Condition d'Envoi
// function condition_envoi{
//   if (filter_var($mail_san, FILTER_VALIDATE_EMAIL)) {
//   echo "Mail : $mail_san <br>";
//   } else {
//   echo "X Adresse mail non valide <br>";
// }
// if ($mail == empty || $message == empty) {
//   echo "mail et message inexistant"
//   }
// }
//
// //envoi
// function envoi_form{
//
// }
 ?>