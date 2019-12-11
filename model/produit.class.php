<?php
require_once('connexion_bdd.class.php');

class Produit {

    public static function getAllProducts(){
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM produits");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public static function getProduct(int $id){
        Model::Init();
        $req = Model::$pdo->query("SELECT * FROM produits WHERE id=$id");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public static function getEtat(int $id){
        Model::Init();
        $req = Model::$pdo->query("SELECT e.name FROM produits p INNER JOIN etat e ON e.id = p.etat_id WHERE p.id = $id");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getCategorie(int $id){
        Model::Init();
        $req = Model::$pdo->query("SELECT c.name FROM produits p INNER JOIN categories c ON c.id = p.etat_id WHERE p.id = $id");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getType(int $id){
        Model::Init();
        $req = Model::$pdo->query("SELECT t.name FROM produits p INNER JOIN type t ON t.id = p.etat_id WHERE p.id = $id");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public static function addProduct() {
        Model::Init();
        $req = Model::$pdo->prepare("INSERT INTO produits(name, description, etat_id, Categories_id, prix, type_id) VALUES (?,?,?,?,?,?)");
        $req->execute(array($_POST['nom'], $_POST['descrip'], $_POST['etat'], $_POST['categorie'], $_POST['prix'], $_POST['type']));
    }

    public static function updateProduct($id) {
        Model::Init();
        $req = Model::$pdo->prepare("UPDATE produits SET name = ?, description = ?, etat_id = ?, Categories_id = ?, prix = ?, type_id = ?, image = ? WHERE id = $id");
        $req->execute(array($_POST['nom'], $_POST['description'], $_POST['etat'], $_POST['categorie'], $_POST['prix'], $_POST['type'], $_POST['image']));
    }
}