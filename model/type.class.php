<?php
require_once('connexion_bdd.class.php');


class Type {

    public static function getAllType()
    {
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM type");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
