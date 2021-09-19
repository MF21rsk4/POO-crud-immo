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

// echo'<pre>';
// print_r($annonces_Tab_Objet);
?>


<?PHP
if (isset( $_POST['envoie'])) {

if (isset( $_POST['case'])) echo $_POST['case'].'<br />';
if (isset( $_POST['value_2'])) echo $_POST['value_2'].'<br />';
if (isset( $_POST['value_3'])) echo $_POST['value_3'].'<br />';
// Contenu de la global P_POST
print_r($_POST);
 } ?>


<form action="" method="post">
    <input type="checkbox" name="value_1" value="1" <?php if ( isset( $_POST[
'value_1'])) echo  'checked="checked"'; ?>>1<br />
    <input type="checkbox" name="value_2" value="2" <?php if ( isset( $_POST[
'value_2'])) echo  'checked="checked"'; ?>>2<br />
    <input type="checkbox" name="value_3" value="3" <?php if ( isset( $_POST[
'value_3'])) echo  'checked="checked"'; ?>>3<br />
    <input type="submit" name="envoie" value="Envoyer">
    </form>



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
	</tr>
</tr>
<a method="$_POST" href="modifier.php" class="btn btn-outline-warning text-center"
							id="modifier" value="modifier" >modifier</a>
</thead>

	<?php foreach ($annonces_Tab_Objet as $key => $value):?>
			<tr style=" border: 3px solid black;">
				<!-- <td><?= $key; ?></td> -->
				<td class="bg-warning"><hr><input type="checkbox" name="case" value="id-advert" />-<label for="case"><b><?= $value->getTitle(); ?></b></td>
				<td><?= $value->getCategory_id(); ?></td>
				<td><hr><?= $value->getDescription(); ?></td>
				<td><hr><?= $value->getPostcode(); ?></td>
				<td><hr><?= $value->getCity(); ?></td>
				<td><hr><?= $value->getPrice(); ?>&euro;</td>
				<td><hr><i>-<?= $value->getReservation_message(); ?></i></td>
			</tr>
	<?php endforeach; ?>

</table>






