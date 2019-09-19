<?php
///ouverture d'une connexion à la base de données formulaire
    require_once 'fonctions.php'; 
    $connexion = getConnexion();

//preparation de la requete
$requete = $connexion->prepare('INSERT INTO employers VALUES(:Matricule, :Nom, 
:Prenom, :Date_de_naissance, :Salaire, :Telephone, :Email)');

//lier chaque marqueur à une ligne
$requete -> bindValue(':Matricule', $_POST['matricule'], PDO::PARAM_STR);
$requete -> bindValue(':Nom', $_POST['nom'], PDO::PARAM_STR);
$requete -> bindValue(':Prenom', $_POST['prenom'], PDO::PARAM_STR);
$requete -> bindValue(':Date_de_naissance', $_POST['date'], PDO::PARAM_STR);
$requete -> bindValue(':Salaire', $_POST['salaire'], PDO::PARAM_INT);
$requete -> bindValue(':Telephone', $_POST['tel'], PDO::PARAM_INT);
$requete -> bindValue(':Email', $_POST['email'], PDO::PARAM_STR);


//executer la requete preparee
$insertIsOk = $requete ->execute();
if($insertIsOk){
    $message = 'EMPLOYER AJOUTÉ AVEC SUCCÈS';
    header("Location:lister.php");
}
else{
    $message = 'Echec de l\'insertion';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><?php echo $message; ?></p>
</body>
</html>
