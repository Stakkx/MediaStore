<?php
require_once('connexion_bdd.class.php');


class Etat {


    public static function getAllEtat(){
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM etat");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public static function getEtat($id){
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM etat WHERE id=$id");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }


}