<?php





// Filtrage des données
function verif_formulaire(){
  $titre = $_POST['gender'] ;
  $nom =  $_POST['name'] ;
  $prenom =  $_POST['firstname'] ;
  $mail =  $_POST['mailAdress'] ;
  $objet =  $_POST['object'] ;
  $message = $_POST['msg'] ;
  $document = $_POST['file'] ;
  $formatRep =  $_POST['format'] ;

  $nom_san = filter_var($nom, FILTER_SANITIZE_STRING);
  $prenom_san = filter_var($prenom, FILTER_SANITIZE_STRING);
  $mail_san = filter_var($mail, FILTER_SANITIZE_EMAIL);
  $message_san = filter_var($message, FILTER_SANITIZE_STRING);



      if (filter_var($nom_san, FILTER_VALIDATE_STRING) ) {
        echo "Nom : $nom_valid <br>";
      }
      else {
      echo "X Vériiez votre nom <br>";
      }
      if ($prenom_valid == true) {
      echo "Prénom : $prenom_valid <br>";
      }
      else {
      echo "X Vérifiez votre prénom br>";
      }
      if ($mail_valid == true) {
      echo "Mail : $mail_valid <br>";
      }
      else {
      echo "X Adresse mail non valide <br>";
      }
      if ($message_valid == true) {
         echo "Message : $message_valid <br>";
       }
       else {
       echo "X Vérifiez votre message";
       }


};

verif_formulaire();

 ?>
