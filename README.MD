Pour  JUJUUUUU :

j'ai eu le temps de check tout le code de function.php, c'est le backed du formulaire, je sais pas si tout est ok j'ai pas eu le temps de tester :(

Rest à faire :
- phpmailer
- Les fichiers Json, je sais pas où il fait appel à eux
- le début mystérieux du code de Guigui (lignes 12 à 58) (limite si tu sais check ça en prio, genre savoir ce que ça fou xD )
- le .gitignore


!!!!!!! Dans le formulaire de Guigui, il y a un début qu'on a pas :

<form enctype="multipart/form-data" action="index.php" method="post" id="form">
  <label for="contact_choice" id="firstformelement">Qui contactez vous ? </label>
  <select class="" name="contact_choice" id="contact_choice">
    <option value="convention">Service d'acceuil conventionnées</option>
    <option value="aquarelle">Halte-accueil l'Aquarelle</option>
  </select>
  <br id='errorContact'>

  --> C'est le choix du service que la personne choisit de contacter
