<?php

class ModeleController{

    public function save(){

        //On vérifie que tous les champs demandé soit renseignés et valide
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['marque']) && !empty($_POST['marque'])){
            $mm = new MarqueManager();
            $marque = $mm->findOneById($_POST['marque']);
           
            if($marque->rowCount() == 1){
                $mdm = new ModeleManager();
                $mdm->setNom($_POST['nom'])
                    ->setPrix($_POST['prix'])
                    ->setMarque($_POST['marque']);
    
                // pour la sauvegarder 
                if($mdm->save()->rowCount() == 1){
                    echo "<p class='text-success'>Le modèle de voiture a été sauvegardée.</p>";
                }
                else{
                    echo "<p class='text-warning'>Une erreur est survenue lors de la sauvegarde.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Le modèle de voiture est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuillez renseigner la totalité des champs du formulaire.</p>";
        }
    }


    public function show (){

        ob_start();

        if(isset($_GET['modele']) && !empty($_GET['modele'])){
            $mdm = new ModeleManager();
            $modele = $mdm->findOneById($_GET['modele']);

            if($modele->rowCount() == 1){
                $modele = $modele->fetchObject('Modele');
                $mdm = new ModeleManager();

                require_once 'src/views/modele_show.php';
            }
            else{
                echo "<p class='text-danger'>Le modèle de voiture est introuvable.</p>";
            }  
        }
        else{
            echo "<p class='text-danger'>Le modèle de voiture est introuvable.</p>";
        }

        $contenu = ob_get_clean();
        echo $contenu;
    }


    public function update(){
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_GET['modele']) && !empty($_GET['modele'])){

            $mdm = new ModeleManager();
            $modele = $mdm->findOneById($_GET['modele']);

            if($modele->rowCount() == 1){
                $mdm->setId($_GET['modele'])
                    ->setNom($_POST['nom'])
                    ->setPrix($_POST['prix']);

                if($mdm->update()->rowCount() >= 1){
                    echo "<p class='text-success'>Le modèle de voiture a été mise à jour.</p>";
                }
                else{
                    echo "<p class='text-warning'>Les informations sont identiques.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Le modèle de voiture est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuillez renseigner la totalité des champs du formulaire.</p>";
        }
    }

    public function delete(){

        // On vérifie l'id, il ne doit pas être vide
        if(isset($_GET['modele']) && !empty($_GET['modele'])){
            $mdm = new ModeleManager();
            $modele = $mdm->findOneById($_GET['modele']);
            
            if($modele->rowCount() == 1){
                $mdm->setId($_GET['modele']);
    
                if($mdm->delete()->rowCount() >= 1){
                    echo "<p class='text-warning'>Le modèle a été supprimée.</p>";
                }
                else{
                    echo "<p class='text-danger'>Une erreur est survenue pendant la suppression.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Le modèle de voiture est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Le modèle est introuvable.</p>";
        }
    }
}