<?php

spl_autoload_register(function($classe){
    require 'classe/' .$classe. '.class.php';
});

include_once ("inc/header.php");

include_once("inc/connexion.php");


$id_advert = $bdd->query('SELECT id_advert FROM advert;')->fetchAll(PDO::FETCH_ASSOC);

echo('rien de selectionné');

echo'<pre>';
print_r($id_advert);

