<?php
require_once 'fonctions.php'; 
$connexion = getConnexion();

$mat=$_GET['ma'];
$pi=$connexion->prepare("DELETE FROM employers WHERE Matricule=?");
$_req=$pi->execute(array($mat));
header("Location:lister.php")

?>