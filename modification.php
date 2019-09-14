<?php

///ouverture d'une connexion à la base de données formulaire
$connexion = new PDO('mysql:host = localhost;dbname=formulaire', 'cheikh1', 'abcdef');

//preparation de la requete
$requete = $connexion->prepare('UPDATE employers set Nom=:Nom, Prenom=:Prenom, Date_de_naissance=:Date_de_naissance, 
Salaire=:Salaire, Telephone=:Telephone, Email=:Email WHERE Matricule=:matricule LIMIT 1');

//liaison du parametre nommé(num)
$requete->bindValue(':matricule', $_POST['ma'], PDO::PARAM_STR);
$requete->bindValue(':Nom', $_POST['nom'], PDO::PARAM_STR);
$requete->bindValue(':Prenom', $_POST['prenom'], PDO::PARAM_STR);
$requete->bindValue(':Date_de_naissance', $_POST['date'], PDO::PARAM_STR);
$requete->bindValue(':Salaire', $_POST['salaire'], PDO::PARAM_INT);
$requete->bindValue(':Telephone', $_POST['tel'], PDO::PARAM_STR);
$requete->bindValue(':Email', $_POST['email'], PDO::PARAM_STR);

 //execute la requete (cette methode renvoie true ou false si elle a reussi ou pas)
 $executeIsOk = $requete->execute();

 if($executeIsOk){
    $message = 'L\'employer a été mise à jour';
    header("Location:lister.php");
}
else{
    $message = 'Echec de la mise à jour de l\'employer';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification: resultat</title>
</head>
<body>
<h1>Resultat de la modification</h1>
    <p><?= $message ?></p>
</body>
</html>