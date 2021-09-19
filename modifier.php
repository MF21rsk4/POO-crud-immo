<?php

spl_autoload_register(function($classe){
    require 'classe/' .$classe. '.class.php';
});

include_once ("inc/header.php");

include_once("inc/connexion.php");

$categories = $bdd->query('SELECT id_category, value FROM category;')->fetchAll(PDO::FETCH_ASSOC);

// $annonceManager = new AnnonceManager ($bdd);
// $annonces_Tab_Objet = $annonceManager->getListObjectsAnnonces();


// $id_advert = $bdd->query('SELECT id_advert FROM advert;')->fetchAll(PDO::FETCH_ASSOC);
// $update_annonce= $_post["modifier"];


// $annonce = new Annonce($PDO);


// echo'<pre>';
// print_r();
?>

<div class="row">
<div class="col-md-6 mx-auto">
    <h2 class="text-danger text-center"><strong>Modifications de l'annonce :</strong></h2><br>
    <form class="border border-danger rounded p-4" action="traitement_annonce.php" method="POST" enctype="multipart/form-data">
        <p>
            <label for="title">Titre :</label>
            <input placeholder="annonce cochée" type="text" name="title" id="title" class="form-control" required>
        </p>
        <p>
            <label for="description">Description :</label>
            <input placeholder="annonce cochée" type="text" name="description" id="description" class="form-control" required>
        </p>
        <p>
            <label for="postcode">Code Postal :</label>
            <input placeholder="annonce cochée" type="number" name="postcode" id="postcode" min="01000" max="98000" required>
        </p>
        <p>
            <label for="city">Ville :</label>
            <input placeholder="annonce cochée" type="text" name="city" id="city" required>
        </p>

        <p>
            <label class="dark-text" for="category">Catégorie :</label>
            <select class="browser-warning" name="category" required>
                <option value="" selected disabled>Sélectionnez une catégorie</option>
                <!-- <option value="vente" selected disabled>Vente</option>
                <option value="location" selected disabled>Location</option> -->
                <?php foreach ($categories as $category): ?>
                    <option value='<?= $category['id_category']; ?>' ><?= $category['value']; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="price">PRIX :</label>
            <input placeholder="annonce cochée" type="number" name="price" id="price" min="1" required>
        </p>
        
        <p class="d-flex justify-content-around">
            <input type="submit" class="btn btn-primary text-center" name="envoyer" value="valider" id="envoyer">
            <input type="button" class="btn btn-outline-warning text-center"
                    onclick="window.location.replace('index.php')" value="RETOUR" />
        </p>
    </form>
</div>
</div>
</div>

