<?php

spl_autoload_register(function($classe){
    require 'classe/' .$classe. '.class.php';
});

include_once ("inc/header.php");

include_once("inc/connexion.php");

// $annonceManager = new AnnonceManager ($bdd);
// $annonces_Tab_Objet = $annonceManager->getListObjectsAnnonces();


// $id_advert = $bdd->query('SELECT id_advert FROM advert;')->fetchAll(PDO::FETCH_ASSOC);
// $update_annonce= $_post["modifier"];


$annonce = new Annonce($pdo);

echo'<pre>';
print_r($annonce);

