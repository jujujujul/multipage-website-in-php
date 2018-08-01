<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style media="screen">
  .container {
    margin: auto;

  }

  form {
    margin: auto;
  }

  #sexe {
    padding-left: 15px;
    margin-left: 15px;
  }
</style>

<body>

  <?php

include 'function.php';

?>

    <div class="container">
      <h1>Formulaire de contact</h1>
      <form class="form-horizontal" action="" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="sexe">Titre :</label>
          <div class="col-sm-6">
            <input type="radio" id="sexe" name="gender" label="girl"> ♀
            <input type="radio" id="sexe" name="gender" label="men"> ♂
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="nom">Nom :</label>
          <div class="col-sm-6">
            <input type="text" id="nom" name="name" value="" placeholder="Nom">

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="prenom">Prénom :</label>
          <div class="col-sm-6">
            <input type="text" id="prenom" name="firstname" value="" placeholder="Prénom">

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="mail">Email :</label>
          <div class="col-sm-6">
            <input type="email" id="mail" placeholder="exemple@gmail.com" name="mailAdress" value="">

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="objet">Object :</label>
          <div class="col-sm-6">
            <select class="" id="objet" name="object">
                     <option value="">Demande d'information</option>
                     <option value="">Recommandation</option>
                     <option value="">Plainte sur nos services</option>
                     <option value="">Autres</option>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="message">Votre message :</label>
          <div class="col-sm-6">
            <input type="text" id="message" name="msg" value="">

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="document">Document :</label>
          <div class="col-sm-6">
            <input type="file" id="document" name="file" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="formatRep">Format de la réponse souhaitée :</label>
          <div class="col-sm-6">
            <input type="radio" id="formatRep" name="format" label="HTML"> HTML
            <input type="radio" id="formatRep" name="format" label="Text"> Text
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Envoi</button>
          </div>
        </div>
      </form>
    </div>




</body>

</html>
