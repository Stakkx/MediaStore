<?php

require_once('connexion_bdd.class.php');

class Identification
{


    public static function connexion()
    {

        if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
            Model::Init();
            $req = Model::$pdo->prepare("SELECT * FROM users WHERE email=?");
            $req->execute(array($_POST['email']));

            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                if (($row['password'] != $_POST['password']) || ($row['role'] != "admin")) {
                    echo 'Mauvais login / password. Merci de recommencer';
                } else {
                    session_start();
                    $_SESSION['loggedin']=true;
                    header('Location: adminPanel.php');
                }
            }
        }
    }
}
