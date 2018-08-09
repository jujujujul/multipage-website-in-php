<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="style.css" />



<!-- <form class="" enctype="multipart/form-data" action="function.php" method="post">
  <input type="radio" name="gender" value="M."> Monsieur
  <input type="radio" name="gender" value="Mme.">Madame
  <br>
  <input type="text" name="nom" value="name">
  <input type="text" name="prenom" value="firstname">
  <br>
  <input type="email" name="email" value="mail">
  <br>
  <select id="object" name="object" class="form-control" required="required">
              <option value="na" selected="">Choississez:</option>
              <option value="service">Plainte Service</option>
              <option value="suggestions">Suggestions</option>
              <option value="technique">Question technique</option>
              <option value="autre">autre</option>
          </select>
  <br>
  <input type="file" size="32" name="file" value="fichier" id="upload">
  <br>
  <input type="radio" name="formatRep" value="HTML"> html<br>
  <input type="radio" name="formatRep" value="text"> texte
  <br>
  <input type="text" name="message" value="message">
  <input type="submit" name="submit" value="send">
</form> -->




<div class="jumbotron jumbotron-sm">
  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-lg-12">
        <h1 class="h1">
                    Contactez nous<small><br>Feel free to contact us</small></h1>

      </div>
    </div>
  </div>
</div>

<hr color="yellow">

<a class="bouton" href="index.php">
  <bold> Retour vers le site </bold>
</a>

<hr color="yellow">



    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="well well-sm">
           <form class="" enctype="multipart/form-data" action="function.php" method="post">
              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label name="nom">
                                Nom</label>
                                <input type="text" name="nom" value="name">
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="control-label " for="genre">Genre :</label> <br>
                      <input type="radio" name="gender" value="M."> Monsieur
                      <input type="radio" name="gender" value="Mme.">Madame
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">
                                Adresse email</label>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                      </span>
                      <input type="email" name="email" value="mail">
                  </div>
                  <div class="form-group">
                    <label for="subject">
                                Raison</label>
                                <select id="object" name="object" class="form-control" required="required">
                                            <option value="na" selected="">Choississez:</option>
                                            <option value="service">Plainte Service</option>
                                            <option value="suggestions">Suggestions</option>
                                            <option value="technique">Question technique</option>
                                            <option value="autre">autre</option>
                                        </select>
                  </div>

                  <div class="form-group">
                    <label class="control-label " for="formatRep">Format de la réponse souhaitée :</label>
                    <div class="col-sm-6">
                      <input type="radio" name="formatRep" value="HTML"> html<br>
                      <input type="radio" name="formatRep" value="text"> texte
                    </div>
                  </div>

                  &nbsp
                  <div class="form-group">
                    <label class="control-label " for="document"></label>
                    <div>
                      <input type="file" size="32" name="file" value="fichier" id="upload">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label name="prenom">
                                Prénom</label>
                                <input type="text" name="prenom" value="firstname">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="name">
                                Message</label>
                                <input type="text" name="message" value="message">
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" name="submit" value="send">
                            ENVOYER</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 align-self-center text-center justify-center">
            <legend><span class="glyphicon glyphicon-globe align-middle"></span> Notre maison mère</legend>
            <address class="align-middle">
                <strong>Les petits riens</strong><br>
                Rue américaine 101 - IXELLES 1050<br>
                02 537 30 26<br>
                Ouvert du lundi au samedi
            </address>

        </div>
      </div>
    </div>

    <hr color="yellow">

    <a class="bouton" href="index.php">
      <bold> Retour vers le site </bold>
    </a>

    <div class="text-center align-items-center">
      <img class="rounded mx-auto d-block" src="logo.png" alt="">
    </div>
