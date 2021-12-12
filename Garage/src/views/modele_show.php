<h1>Informations sur le modèle de voiture <?= $modele->getNom(); ?></h1>
<br>
    <p><?= $modele->getNom(); ?></p>
    <p><?= $modele->getPrix(); ?>€</p>
    <br>

    
    <hr>


    <h2>Modifier le modèle</h2>
    <form action="index.php?g=modele_update&modele=<?= $_GET['modele']; ?>" method="POST">
			<input type="hidden" name="id" value="<?= $modele->getId(); ?>">
			<label for="nom">Nom :</label>
			<br>
			<input type="text" name="nom" id="nom" value="<?= $modele->getNom(); ?>">
            <br>
            <label for="prix">Prix :</label>
			<br>
			<input type="text" name="prix" id="prix" value="<?= $modele->getPrix(); ?>">
			<br><br>
			<input type="submit" name="update_modele" value="Mettre à jour" class="btn btn-outline-warning">
		</form>