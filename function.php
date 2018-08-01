<?php


// ini_set('display_errors', 1);
// error_reporting(E_ALL ^ E_NOTICE);


// importer phpmailer
use PHPMailer\PHPMailer\PHPMailer;
require './vendor/autoload.php';

$doc = DOMDocument::loadHTMLFile('formulaire.html');
$form = $doc->getElementById('form');
$mail = new PHPMailer;




if (isset($_POST['submit'])) {
  $handle = new upload($_FILES['image_field']);
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $log = [];
  $today = getDate();
  if(!file_exists('pass.php')) {
    $sanuser = filter_var($_POST['useremail'], FILTER_SANITIZE_EMAIL);
    $sanpassword = filter_var($_POST['gmailpassword'], FILTER_SANITIZE_STRING);
    $valuser = filter_var($sanuser, FILTER_VALIDATE_EMAIL);
    if( $valuser !== false ){
      $mail->Username = $valuser;
    }
    else {
      $id = 'useremail';
      $message = 'email non valide';
      errorMsg($id, $message, 'newnode2');
    }
    if($sanpassword !== "") {
      $mail->Password = $sanpassword;
    }
    else {
      $id = 'gmailpassword';
      $message = 'password non valide';
      errorMsg($id, $message, 'newnode3');
    }
  }
  //check if valid email and non empty message
  if( isset($_POST['email']) && $_POST['message'] !== '' ){
    //log time
    $log['date'] = $today['weekday'].' '.$today['mday'].'/'.$today['mon'].'/'.$today['year'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
    //Sanitization et validation mail
    $sanemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $valemail = filter_var($sanemail, FILTER_VALIDATE_EMAIL);
    // sanitization message
    $sanmessage = filter_var($_POST['message'], FILTER_SANITIZE_EMAIL);
    //check validity of entered email adress
    if($valemail == false){
      $id = 'errorEmail';
      $message = 'Veuillez entrez une adresse email valide';
      errorMsg($id, $message, 'newnode4');
    }
    //if valid email
    else {
      $nameToUse = '';
      // check genre
      if (isset($_POST['sexe'])) {
        $nameToUse .= $_POST['sexe'] . ' ';
      }
      //check Nom
      if ($_POST['name'] !== 'Nom') {
        $nameToUse .= filter_var($_POST['name'], FILTER_SANITIZE_STRING) . " ";
        $log['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      }
      // check Prénom
      if ($_POST['firstname'] !== 'Prénom') {
        $nameToUse .= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING) . " ";
        $log['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
      }
      //set the expeditor adress and name and log the email
      $mail->setFrom($valemail, $nameToUse);
      $log['email'] = $valemail;
      //set the subject
      $mail->Subject = $_POST['subject'];
      //set the recipient adress and the specific service
      $mail->addAddress('berior14@gmail.com', $_POST['contact_choice']);
      //set the message
      $mail->Body = $sanmessage;
      //check if reply type is chosen
      if(isset($_POST['reply_type'])) {
        $log['format'] = $_POST['reply_type'];
      }
      if ($handle->uploaded) {
        if ($handle->file_src_name_ext === 'png' || $handle->file_src_name_ext === 'jpg' || $handle->file_src_name_ext === 'jpeg' || $handle->file_src_name_ext === 'gif') {
          $handle->process('./uploads');
          if ($handle->processed) {
            $id = 'errorUpload';
            $message = 'Image attached';
            errorMsg($id, $message, 'newnode5');
            $imagePath = $handle->file_dst_pathname;
            $mail->addAttachment($imagePath);
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
      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
          echo "Message sent!";
      }
      echo '<pre>';
      // var_dump($log);
      $toput = json_encode($log, true) . ',';
      file_put_contents('./logs/logs.txt', $toput, FILE_APPEND);
      unset($_POST, $mail, $log, $toput);
      echo '</pre>';
    }
  }
  else {
    if( isset($_POST['email']) == false ){
      $id = 'errorEmail';
      $message = 'Veuillez entrez une adresse email';
      errorMsg($id, $message, 'newnode8');
    }
    if ($_POST['message'] == '') {
      $id = 'errorMessage';
      $message = 'Veuillez entrez un message';
      errorMsg($id, $message, 'newnode9');
    }
  }
}





// $titre = $_POST['gender'] ;
// $nom =  $_POST['name'] ;
// $prenom =  $_POST['firstname'] ;
// $mail =  $_POST['mailAdress'] ;
// $objet =  $_POST['object'] ;
// $message = $_POST['msg'] ;
// $document = $_POST['file'] ;
// $formatRep =  $_POST['format'] ;
//
//
// // Filtrage des données
// function verif_formulaire(){
//   $nom_san = filter_var($nom, FILTER_SANITIZE_STRING);
//   $prenom_san = filter_var($prenom, FILTER_SANITIZE_STRING);
//   $mail_san = filter_var($mail, FILTER_SANITIZE_EMAIL);
//   $message_san = filter_var($message, FILTER_SANITIZE_STRING);
//
// };
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
