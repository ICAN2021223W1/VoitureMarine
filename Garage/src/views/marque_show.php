
<h1><?= $marque->getNom(); ?></h1>
<br>
		
	<h2>Liste des modèles de voiture</h2>
	<?php
			
		if($modeles->rowCount() >= 1){
			?>
			<table class="table">
				<thead>
					<tr>
						<th>Nom du modèle</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						// Je créer un tableau d'object qui me permet de faire ensuite le foreach
						$liste_modeles = $modeles->fetchAll(PDO::FETCH_CLASS, 'Modele');

						foreach ($liste_modeles as $modele) {
							?>
							<tr>
								<td><?= $modele->getNom(); ?></td>
								<td>
									<a href="index.php?g=modele_show&modele=<?= $modele->getId(); ?>" class="btn btn-outline-info">Afficher</a>
									<a href="index.php?g=modele_delete&modele=<?= $modele->getId(); ?>" class="btn btn-outline-danger">Supprimer</a>
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
			echo "<p class='text-danger'>Il n'y a aucun modèle de voiture pour cette marque</p><hr>";
		}
		?>


		<h2>Modifier la marque</h2>
		<form action="index.php?g=marque_update&marque=<?= $_GET['marque']; ?>" method="POST">
			<input type="hidden" name="id" value="<?= $marque->getId(); ?>">
			<label for="nom">Nom :</label>
			<br>
			<input type="text" name="nom" id="nom" value="<?= $marque->getNom(); ?>">
			<br><br>
			<input type="submit" name="update_marque" value="Mettre à jour" class="btn btn-outline-warning">
		</form>
		<hr>
			
		<h2>Ajouter un modèle de voiture</h2>
		<form action="index.php?g=modele_insert" method="POST">
			<input type="hidden" name="marque" value="<?= $marque->getId(); ?>">
			<label for="nom">Nom :</label>
			<br>
			<input type="text" name="nom" id="nom">
            <br>
            <label for="prix">Prix :</label>
			<br>
			<input type="number" name="prix" id="prix">
			<br><br>
			<input type="submit" name="insert_model" value="Ajouter" class="btn btn-outline-success">
		</form>
	
