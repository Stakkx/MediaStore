<?php
require_once('produit.class.php');
require_once('panier.class.php');
$panier = new panier();

if (isset($_GET['id'])){
    $product = Produit::getProduct($_GET['id']);
    var_dump($product);
    if(empty($product)){
        die("Ce produit n'existe pas");
    }

    $panier->add($product[0]->id);


} else {
    die("Aucun produit selectionné");
}


