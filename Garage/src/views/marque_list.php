
<h1>Les marques de voiture</h1>
<?php

	// S'il y a des marques alors on l'es affiche 
	if($marques->rowCount() > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
			
					foreach ($liste_marques as $marque) {
						?>
						<tr>
							<td><?= $marque->getNom(); ?></td>
							<td>
								<a href="index.php?g=marque_show&marque=<?= $marque->getId(); ?>" class="btn btn-outline-info">Afficher</a>
								<a href="index.php?g=marque_delete&marque=<?= $marque->getId(); ?>" class="btn btn-outline-danger">Supprimer</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<?php
	}
	else{
		echo "<p class='text-danger'>Il n'y a aucune marque de voiture</p><hr>";
	}
?>

<br>
<h2>Ajouter une marque</h2>
<form action="index.php?g=marque_insert" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br><br>
	<input type="submit" name="ajout_marque" value="Ajouter" class="btn btn-outline-success">
</form>
