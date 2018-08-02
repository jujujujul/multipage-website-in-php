<?php


// ini_set('display_errors', 1);
// error_reporting(E_ALL ^ E_NOTICE);


// importer phpmailer
use PHPMailer\PHPMailer\PHPMailer;
require './vendor/autoload.php';

$doc = DOMDocument::loadHTMLFile('formulaire.html');
$form = $doc->getElementById('form');
$mail = new PHPMailer;




if (isset($_POST['envoi'])) {
  $handle = new upload($_FILES['file']);
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $log = [];
  $today = getDate();
  if(!file_exists('LoginAdmin.php')) {
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
  // Vérifier condition d'envoi : email et message non vide
  if( isset($_POST['email']) && $_POST['message'] !== '' ){
    //log time
    $log['date'] = $today['weekday'].' '.$today['mday'].'/'.$today['mon'].'/'.$today['year'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
    //Sanitization et validation mail
    $sanemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $valemail = filter_var($sanemail, FILTER_VALIDATE_EMAIL);
    // sanitization message
    $sanmessage = filter_var($_POST['message'], FILTER_SANITIZE_EMAIL);
    //check de la validité de l'email qui a été rentré
    if($valemail == false){
      $id = 'errorEmail';
      $message = 'Veuillez entrez une adresse email valide';
      errorMsg($id, $message, 'newnode4');
    }
    //Si l'email est valide
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
      // mise en place de l'adresse de l'expéditeur + nom et login de l'email
      $mail->setFrom($valemail, $nameToUse);
      $log['email'] = $valemail;
      //mise en place de l'objet (du message)
      $mail->Subject = $_POST['objet'];

      // les 2 lignes en dessous ne nous concernent pas : c'est en lien avec le choix du service auquel on envoit le mail
      //set the recipient adress and the specific service
      // $mail->addAddress('berior14@gmail.com', $_POST['contact_choice']);

      //Mise en place du message (type HTML)
      $mail->Body = $sanmessage;
      //check du type de format de la réponse
      if(isset($_POST['formatRep'])) {
        $log['format'] = $_POST['formatRep'];
      }

      // à partir d'ici il faut vérier, j'ai du mal à comprendre, mais c'est le filtre de l'image uploader je pense
      if ($handle->uploaded) {
        if ($handle->file_src_name_ext === 'png' || $handle->file_src_name_ext === 'jpg' || $handle->file_src_name_ext === 'jpeg' || $handle->file_src_name_ext === 'gif') {
          // présence d'un fichier ./uploads, mais je le trouve pas dans le repos de guigui donc c'est bizarre
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
          echo "Message envoyé !";
      }
      echo '<pre>';
      // var_dump($log);
      $toput = json_encode($log, true) . ',';
      // ./logs/logs.txt se trouve dans un document nom" logs.
      // je sais pas si c'est nécessaire de mettre ça dans un Document
      // Je pense que ça crée un fichier json et que ça inscrit dedans les données de l'utilisateur (sans être sûr)
      // Dans le doute j'ai créer un fichier loginUtilisateur.txt
      file_put_contents('loginUtilisateur.txt', $toput, FILE_APPEND);
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
