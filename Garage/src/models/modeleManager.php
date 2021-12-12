<?php

class ModeleManager extends Modele{

    // Je récupère les modèles de la marque sélectionnée
    public function findByMarque(int $id){
        $bdd = new BDD();
        $connexion = $bdd->getCo();

        $sql = "SELECT * FROM modele WHERE marque = :id";
        $req = $connexion->prepare($sql);
        $req->execute(['id' => $id]);

        return $req;
    }


    public function save(){
        $bdd = new BDD();
        $connexion = $bdd->getCo();

        $sql = "INSERT INTO modele(nom, prix, marque) VALUES (:n, :p, :m);";
        $req = $connexion->prepare($sql);
        $req->execute([
            'n' => $this->getNom(),
            'p' => $this->getPrix(),
            'm' => $this->getMarque(),
        ]);

        return $req;
    }


    // Pour retrouver un modèle de voiture avec son id
    public function findOneById($id){
        $bdd = new BDD();
        $connexion = $bdd->getCo();

        $sql = "SELECT * FROM modele WHERE id = :id";
        $req = $connexion->prepare($sql);
        $req->execute(['id' => $id]);

        return $req;
    }


    public function update(){
        $bdd = new BDD();
        $connexion = $bdd->getCo();

        $sql = "UPDATE modele SET nom = :n, prix = :p WHERE id = :id;";
        $req = $connexion->prepare($sql);
        $req->execute([
            'n' => $this->getNom(),
            'p' => $this->getPrix(),
            'id' => $this->getId(),
        ]);

        return $req;
    }


    public function delete(){
        $bdd = new BDD();
        $connexion = $bdd->getCo();

        $sql = "DELETE FROM modele WHERE id = :id;";
        $req = $connexion->prepare($sql);
        $req->execute([
            'id' => $this->getId()
        ]);

        return $req;
    }

}