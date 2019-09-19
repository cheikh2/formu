<?php

function debug($variable){
    echo '<pre>' .print_r($variable, true). '</pre>';
}

/*
*retourne une connexion à la base de donnée
*
*@return PDO
*/
function getConnexion():PDO{
    $connexion = new PDO('mysql:host = localhost;dbname=formulaire', 'cheikh1', 'abcdef');

    return $connexion;
}