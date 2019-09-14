<?php
$mat=$_GET['ma'];
$connexion = new PDO('mysql:host = localhost;dbname=formulaire', 'cheikh1', 'abcdef');
$pi=$connexion->prepare("DELETE FROM employers WHERE Matricule=?");
$_req=$pi->execute(array($mat));
header("Location:lister.php")

?>