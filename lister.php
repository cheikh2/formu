 <?php
   ///ouverture d'une connexion à la base de données formulaire
$connexion = new PDO('mysql:host = localhost;dbname=formulaire', 'cheikh1', 'abcdef');

/*la preparation de la requête(dans le cas present, utiliser une requete preparée n'a aucun
 interet, mais je vais utiliser la même methode que l'insertion pour rester simple)*/
 $requete = $connexion->prepare('SELECT * FROM employers');

 //execute la requete (cette methode renvoie true ou false si elle a reussi ou pas)
 $executeIsOk = $requete->execute();

 //recuperation des resultats en une seule fois
 $employer = $requete->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet"  type="style/css" href="js.css">
    <title>Document</title>
</head>
<body>
<div class="nav navbar-dark bg-primary" >
    <div class="container-fluid">
     <ul class="nav navbar-nav">
     <li><a href="base.php" class="btn btn-success">AJOUTER DES EMPLOYERS</a></li>
     <li><a href="lister.php" class="btn btn-success">LISTE DES EMPLOYERS</a></li>
     </ul>
    </div>
</div>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">LISTE DES EMPLOYERS <?= $message ?></div>
            <div class="panel-body">
            <table class="table table-bordered">
  <tr>
  <th>Matricule</th>
  <th>NOM</th>
  <th>PRENOM</th>
  <th>DATE DE NAISSANCE</th>
  <th>SALAIRE</th>
  <th>TELEPHONE</th>
  <th>EMAIL</th>
  <th>ACTION 1</th>
  <th>ACTION 2</th>
  </tr>
  <?php foreach ($employer as $employers):?>
  <tr>
  <td><?= $employers['Matricule']?></td>
   <td><?= $employers['Nom']?></td>
   <td><?= $employers['Prenom']?></td>
   <td><?= $employers['Date_de_naissance']?></td>
  <td><?= $employers['Salaire']?></td>
  <td><?= $employers['Telephone']?></td>
  <td><?= $employers['Email']?></td>
  
  
  <td><a href="modifier.php?ma=<?= $employers['Matricule']?>" class="btn btn-info btn-block">modifier</a></td>
  <td><a href="supprimer.php?ma=<?= $employers['Matricule']?>"class="btn btn-danger btn-block">Supprimer</a></td>
<?php endforeach; ?>
</tr>
</table>
  </div>
     </div>
       </div>
</body>
</html>