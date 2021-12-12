<?php

class MarqueController{
    public function list(){

        ob_start();

        $mm = new MarqueManager();
        $marques = $mm->findAll();
        $liste_marques = $marques->fetchAll(PDO::FETCH_CLASS, 'Marque');

        require_once 'src/views/marque_list.php';

        $contenu = ob_get_clean();
        echo $contenu;
    }

    public function save(){
        if(isset($_POST['nom']) && !empty($_POST['nom'])){
            $mm = new MarqueManager();
            $mm->setNom($_POST['nom']);

            if($mm->save()->rowCount() == 1){
                echo "<p class='text-success'>Marque de voiture sauvegardée.</p>";
            }
            else{
                echo "<p class='text-danger'>Une erreur est survenue pendant la sauvegarde.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuillez renseigner la totalité des champs du formulaire.</p>";
        }
    }



    public function show (){

        ob_start();

        if(isset($_GET['marque']) && !empty($_GET['marque'])){
            $mm = new MarqueManager();
            $marque = $mm->findOneById($_GET['marque']);

            if($marque->rowCount() == 1){
                $marque = $marque->fetchObject('Marque');
                $mdm = new ModeleManager();
                $modeles = $mdm->findByMarque($marque->getId());

                require_once 'src/views/marque_show.php';
            }
            else{
                echo "<p class='text-danger'>La marque est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>La marque est introuvable.</p>";
        }

        $contenu = ob_get_clean();
        echo $contenu;
    }



    public function update(){
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_GET['marque']) && !empty($_GET['marque'])){
            $mm = new MarqueManager();
            $marque = $mm->findOneById($_GET['marque']);

            if($marque->rowCount() == 1){
                $mm->setId($_GET['marque'])
                    ->setNom($_POST['nom']);
                
                if($mm->update()->rowCount() >=1){
                    echo "<p classe='text-success'>La marque a été mise à jours.</p>";
                }
                else{
                    echo "<p class='text-warning'>Les informations sont identiques.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>La marque est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuillez renseigner la totalité des champs du formulaire.</p>";
        }
    }



    public function delete(){
	    if(isset($_GET['marque']) && !empty($_GET['marque'])){
            $mm = new MarqueManager();
            $marque = $mm->findOneById($_GET['marque']);
           
            if($marque->rowCount() == 1){
                $mm->setId($_GET['marque']);

                if($mm->delete()->rowCount() >= 1){
                    echo "<p class='text-warning'>la marque est supprimée.</p>";
                }
                else{
                    echo "<p class='text-danger'>Une erreur est survenue pendant la suppression.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>La marque est introuvable.</p>";
            }
        }
        else{
            echo "<p class='text-danger'>La marque est introuvable.</p>";
        }
    }
}