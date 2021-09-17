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



        // liste de annonces en BDD sous forme d'objet                       
$annonces_Tab_Objet = $annonceManager->getListObjectsAnnonces();

// echo'<pre>';
// print_r($annonces_Tab_Objet);
?>





<table>
	<hr>
<thead>
	<h2 class="text-center"  style="color:orange"><b> ~ANNOUNCES~ </b></h2><hr>
	<tr style="color:tomato">
		<th>-Title-</th>
		<th>-Description-</th>					
		<th>-Postcode-</th>
		<th>-City-</th>
		<th>-Price-</th>
		<th>-Reservation-</th>
	</tr>
</tr>
<input type="button" class="btn btn-outline-warning text-center"
							id="modifier" value="modifier" />
</thead>
	<?php foreach ($annonces_Tab_Objet as $key => $value):?>
			<tr>
				<!-- <td><?= $key; ?></td> -->
				<td><?= $value->getTitle(); ?></td>
				<td><?= $value->getDescription(); ?></td>
				<td><?= $value->getPostcode(); ?></td>
				<td><?= $value->getCity(); ?></td>
				<td><?= $value->getPrice(); ?>&euro;</td>
				<td><?= $value->getReservation_message(); ?></td>
			</tr>
	<?php endforeach; ?>

</table>






