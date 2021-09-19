<?php 

spl_autoload_register(function($classe){
    require 'classe/' .$classe. '.class.php';
});
include_once ("inc/header.php");
include_once("inc/connexion.php");

$annonceManager = new AnnonceManager ($bdd);
$annonces_Tab_Objet = $annonceManager->getListObjectsAnnonces();
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
	</tr>
</tr>

</thead>

	<?php foreach ($annonces_Tab_Objet as $key => $value):?>
			<tr style=" border: 3px solid black;">
				<!-- <td><?= $key; ?></td> -->
				<td class="bg-default">-<b><?= $value->getTitle(); ?></b></td>
				<td><?= $value->getCategory_id(); ?></td>
				<td><?= $value->getDescription(); ?></td>
				<td><?= $value->getPostcode(); ?></td>
				<td><?= $value->getCity(); ?></td>
				<td><?= $value->getPrice(); ?>&euro;</td>
				<td><i>-<?= $value->getReservation_message(); ?></i></td>
			</tr>
	<?php endforeach; ?>

</table>