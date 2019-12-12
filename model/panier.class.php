<?php
require_once('produit.class.php');


class Panier {

    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }

    }

    public function add($product_id){
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++;
        } else {
            $_SESSION['panier'][$product_id] = 1;
        }
    }

    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }

    public function total(){
        $total = 0;
        $ids = array_keys($_SESSION['panier']);

        if(empty($ids)){
          $products = array();
        } else {
            $products = Produit::getPanier(implode(',', $ids ));
        }

        foreach ($products as $product){
            $total += $product->prix * $_SESSION['panier'][$product->id];  
        }

        return $total;
    }



}