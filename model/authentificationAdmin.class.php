<?php

require_once('connexion_bdd.class.php');

class Identification {


    public function connexion(){

        if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            Model::Init();
            $req = Model::$pdo->prepare("SELECT * FROM admin WHERE identifiant=" . $_POST['username']);
            $req->execute();
            
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                if ($row['identifiant'] != $_POST['password']) {
                    echo 'Mauvais login / password. Merci de recommencer';
                } else {
                    session_start();
                    header('Location: adminLogin.php');
                }
        }

        
    }
    

}