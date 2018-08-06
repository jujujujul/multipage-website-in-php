<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="style.css" />

      
       
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

<a class="bouton" href="index.php"> <bold> Retour vers le site </bold> </a>
      
<hr color="yellow">   


<form  action="function.php" method="post" id="form">

      <div class="form-group">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label name="nom">
                                Nom et prénom</label>
                            <input name= type="text" class="form-control" id="nom" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Adresse email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Raison</label>
                            <select id="objet" name="object" class="form-control" required="required">
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
                              <input type="radio" id="formatRep" name="formatRep" label="HTML"> HTML
                              <input type="radio" id="formatRep" name="formatRep" label="Text"> Text
                            </div>
                         </div>
                         &nbsp
                         <div class="form-group">
                            <label class="control-label " for="document"></label>
                            <div >
                              <input type="file" id="document" name="file" value="">
                            </div>
                          </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            ENVOYER</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 align-self-center text-center justify-center">
            <form>
            <legend><span class="glyphicon glyphicon-globe align-middle"></span> Notre maison mère</legend>
            <address class="align-middle">
                <strong>Les petits riens</strong><br>
                Rue américaine 101 - IXELLES 1050<br>
                02 537 30 26<br>
                Ouvert du lundi au samedi
            </address>
           
            </form>
        </div>
    </div>
</div>

<hr color="yellow">

<a class="bouton" href="index.php"> <bold> Retour vers le site </bold> </a>

<div class="text-center align-items-center" >
<img  class= "rounded mx-auto d-block" src="logo.png" alt="">
</div>