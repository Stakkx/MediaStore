<?php
require_once('connexion_bdd.class.php');


class Categorie {

    public static function getAllCategorie(){
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM Categories ORDER BY name");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        
    }


}