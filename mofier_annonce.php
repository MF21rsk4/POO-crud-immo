<?php
// if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

include_once("inc/connexion.php");




//champs obligatoires
if(	isset($_POST['title']) && !empty($_POST['title']) &&
	isset($_POST['description']) && !empty($_POST['description']) &&
	isset($_POST['postcode']) && !empty($_POST['postcode']) &&
	isset($_POST['city']) && !empty($_POST['city']) &&
	// isset($_POST['category']) && !empty($_POST['category']) &&
	isset($_POST['price']) && !empty($_POST['price'])
    ) {

	// securité filtre
	if (
		filter_var($_POST['price'], FILTER_VALIDATE_INT, array("options"=>array("min_range"=>1))) &&
		filter_var($_POST['postcode'], FILTER_VALIDATE_INT, array("options"=>array("min_range"=>01000, "max_range"=>98000), str_pad( 5, '0', STR_PAD_LEFT)))
	) {
		// securité filtre
		$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
		$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
		$postcode = filter_var($_POST['postcode'], FILTER_SANITIZE_NUMBER_INT);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
		$idcategorie = $_POST['category'];

        $update_annonce = $bdd->prepare('UPDATE advert 
            SET (title = :title, description = :description, postcode = :postcode, city = :city, price = :price, category = :category) WHERE id_advert = :id_advert');
		
		//bind
		$update_annonce->bindValue(':title',$title, PDO::PARAM_STR);
        $update_annonce->bindValue(':description',$description, PDO::PARAM_STR);
		$update_annonce->bindValue(':postcode',$postcode, PDO::PARAM_INT);
		$update_annonce->bindValue(':city',$city, PDO::PARAM_STR);
		$update_annonce->bindValue(':price',$price, PDO::PARAM_INT);
		// $update_annonce->bindValue(':reservation_message',$reservation_message, PDO::PARAM_STR);
		$update_annonce->bindValue(':category', $idcategorie, PDO::PARAM_INT);

        $update_annonce->execute();
        echo ('<p>--[ PYRAMID MODIFIED ]--<p><br><hr>');
        echo ('<a class="nav-link active" href="index.php">retour</a>');

        $retour = ($update_annonce->rowCount());
        
        $update_annonce->closeCursor();
         // METTRE LES CATEGORIES AVEC LEURS ID (SQL) !!!


    }} else {
        echo ('impossible <br><hr>');
        echo ('<a class="nav-link active" href="index.php">retour</a>');
    }


