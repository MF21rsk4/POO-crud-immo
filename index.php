<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }


spl_autoload_register(function($classe){
    require 'classe/' .$classe. '.class.php';
});


include_once ("inc/header.php");
include_once("inc/connexion.php");



$annonceManager = new AnnonceManager ($bdd);
// $annonce = new Annonce ($bdd);


//methode AJOUT
// if ($annonceManager->add($annonce)) {echo'bien ajouté';} else {echo'PROBLEME';}

//methode MODIFIE
// if ($annonceManager->update($annonce)) {echo'bien modifié';} else {echo'PROBLEME';}

// Efface une guitare de la BDD
// if ($annonceManager->delete($annonces_Tab_Objet[1])) {echo 'Annonce supprimée';} else {echo "PROBLEME : veuillez recommencer"; }



// liste de annonces en BDD sous forme d'objet                       
$annonces_Tab_Objet = $annonceManager->getListObjectsAnnonces();
$nombreLimite = $bdd->query('SELECT * FROM advert  LIMIT 0, 3');
$categories = $bdd->query('SELECT id_category, value FROM category;')->fetchAll(PDO::FETCH_ASSOC);
// echo'<pre>';
// print_r($annonces_Tab_Objet);


// bouton modifier
if (isset( $_POST['modifier'])) {

	if (isset( $_POST['<?= $annonce["id_advert"]; ?>'])) echo $_POST['<?= $annonce["id_advert"]; ?>'].'<br />';
	
	// Contenu de la global P_POST
	print_r($_POST);
	 }
?>



<table>
	<hr>
<thead>
	<h2 class="text-center"  style="color:orange"><b> ~ANNOUNCES~ </b></h2><hr>
	<tr class="text-center" style="color:tomato;">
		<th>-Title-</th>
		<th>-Type-</th>
		<th>-Description-</th>					
		<th>-Postcode-</th>
		<th>-City-</th>
		<th>-Price-</th>
		<th>-Reservation-</th>
		<!-- <th>-Price-</th> -->
	</tr>
</tr>
<a method="$_POST" href="modifier.php" class="btn btn-outline-warning text-center"
							id="modifier" value="modifier" >modifier</a>
</thead>

	<?php foreach ($annonces_Tab_Objet as $key => $value):?>
			<tr style=" border: 3px solid black;">
				<!-- <td><?= $key; ?></td> -->
				<td class="bg-warning"><hr><input type="checkbox" name="<?= $annonce['id_advert']; ?>" value="<?= $annonce['id_advert']; ?>" />-<label for="case"><b><?= $value->getTitle(); ?></b></td>
				<td><?= $value->getCategory_id(); ?></td>
				<td><hr><?= $value->getDescription(); ?></td>
				<td><hr><?= $value->getPostcode(); ?></td>
				<td><hr><?= $value->getCity(); ?></td>
				<td><hr><?= $value->getPrice(); ?>&euro;</td>
				<td><hr><i>-<?= $value->getReservation_message(); ?></i></td>
			</tr>
	<?php endforeach; ?>

</table>






