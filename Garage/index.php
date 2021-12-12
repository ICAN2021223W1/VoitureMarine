<?php

include_once 'inc.header.php';

require_once 'src/class/BDD.php';

require_once 'src/orms/Marque.php';
require_once 'src/orms/Modele.php';

require_once 'src/models/marqueManager.php';
require_once 'src/models/modeleManager.php';

require_once 'src/controllers/MarquesController.php';
require_once 'src/controllers/ModelesController.php';

if(isset($_GET['g'])){

    switch ($_GET['g']){
        case 'marques':
            $mc = new MarqueController();
            $mc->list();
            break;

        case 'marque_insert':
            $mc = new MarqueController();
            $mc->save();
            break;

        case 'marque_show':
            $mc = new MarqueController();
            $mc->show();
            break;

        case 'marque_update':
            $mc = new MarqueController();
            $mc->update();
            break;
    
        case 'marque_delete':
            $mc = new MarqueController();
            $mc->delete();
            break;


        case 'modele_show':
            $mdc = new ModeleController();
            $mdc->show();
            break;

        case 'modele_insert':
            $mdc = new ModeleController();
            $mdc->save();
            break;
        
        case 'modele_update':
            $mdc = new ModeleController();
            $mdc->update();
            break;

        case 'modele_delete':
            $mdc = new ModeleController();
            $mdc->delete();
            break;


        default:
            echo "<p class='alert alert-danger'>Erreur 404</p>";
            break;
    }
}
else{
    echo "<p class='alert alert-danger'>Erreur 404</p>";
}


include_once 'inc.footer.php';