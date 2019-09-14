<?php
   ///ouverture d'une connexion à la base de données formulaire
$connexion = new PDO('mysql:host = localhost;dbname=formulaire', 'cheikh1', 'abcdef');

/*la preparation de la requête(dans le cas present, utiliser une requete preparée n'a aucun
 interet, mais je vais utiliser la même methode que l'insertion pour rester simple)*/
 $requete = $connexion->prepare('SELECT * FROM employers WHERE Matricule = :matricule');

 //liaison du parametre nommé(num)
 $requete->bindValue(':matricule', $_GET['ma'], PDO::PARAM_STR);

  //execute la requete (cette methode renvoie true ou false si elle a reussi ou pas)
  $executeIsOk = $requete->execute();

  //on recupere l'employer
  $employers = $requete -> fetch();
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet"  type="style/css" href="js.css">
      <title>Modification</title>
  </head>
  <body>
  <div class="nav navbar-dark bg-primary">
    <div class="container-fluid">
     <ul class="nav navbar-nav">
     <li><a href="base.php" class="btn btn-success">AJOUTER DES EMPLOYERS</a></li>
     <li><a href="lister.php" class="btn btn-success">LISTE DES EMPLOYERS</a></li>
     </ul>
    </div>
</div>
  <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">Formulaire de modification</div>
               <div class="panel-body">

    <form action="modification.php" method="POST">

    <div class="form-group">
        <label for="" class="form control-label"></label>
       <input type="text" name="ma" readonly value="<?= $employers['Matricule']; ?>"> 
       </div>

       <div class="form-group">
        <label for="" class="form control-label"></label>
        Nom: <input type="text" class="form-control" name="nom" value="<?= $employers['Nom']; ?>"> 
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>
        Prenom: <input type="text" class="form-control" name="prenom" value="<?= $employers['Prenom']; ?>"> 
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>
        Date de naissance: <input type="text" class="form-control" name="date" value="<?= $employers['Date_de_naissance']; ?>">  
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>       
        Salaire: <input type="text" class="form-control" name="salaire" value="<?= $employers['Salaire']; ?>">  
        </div>
        
        <div class="form-group">
        <label for="" class="form control-label"></label>
        Téléphone: <input type="text" class="form-control" name="tel" value="<?= $employers['Telephone']; ?>"> 
        </div>
        
        <div class="form-group">
        <label for="" class="form control-label"></label>
        Email: <input type="text" class="form-control" name="email"  value ="<?= $employers['Email']; ?>">
        </div>
        
    
        <input  class="btn btn-success" type="submit" value="Modifier" name="Modifier">
        <a href="lister.php" class="btn btn-warning">Annuler</a>
      
    </form>
    
    </div>
  </body>
  </html>

 