<?php

require_once('model/produit.class.php');
require_once('model/panier.class.php');
$panier = new panier();

if(isset($_GET['del'])){
  $panier->del($_GET['del']);
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MediaStore</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

  
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container">
  
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="home.php">
          <strong class="blue-text">MediaStore</strong>
        </a>
  
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#" target="_blank">CD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#"
                target="_blank">DVD</a>
            </li>
          </ul>
  
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect">
                <span class="badge red z-depth-1 mr-1"> 1 </span>
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Panier </span>
              </a>
            </li>
          </ul>
  
          <div class="dropdown d-inline-block">
            <a href="#" class="icontext mr-4 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  
              <div class="text">
                Utilisateur
              </div>
            </a> <!-- iconbox // -->
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 32px, 0px);">
                <a class="dropdown-item" href="#">Mon profil</a>
                <a class="dropdown-item" href="#">Log out</a>
            </div>
        </div>
  
      </div>
    </nav>
    <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Panier</h2>
      <br><br><br><br>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-2">

          <div class="card">

            <form class="card-body" method="POST" action="" >
 
            <ul class="list-group mb-3 z-depth-1">

            <?php 
            $ids = array_keys($_SESSION['panier']);
            if(empty($ids)){
              $products = array();
          } else {

            $products = Produit::getPanier(implode(',', $ids ));
          }

            foreach ($products as $product):
            ?>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <img src="<?= $product->image ?>" alt="" class="img-fuild" width="50px" height="50px">
              <div>
                <h6 class="my-0"><?= $product->name ?></h6>
                <small class="text-muted">Quantité : <?= $_SESSION['panier'][$product->id] ?> <a href="panier.php?del=<?= $product->id ?>" class="d-flex">Supprimer article</a> </small>
              </div>
              <div class="text-muted"> <?= number_format($product->prix,2,',','') ?> €  </div> 
            </li>
            
            <?php endforeach; ?>
 
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong> <?= number_format($panier->total(),2,',','') ?> €</strong>
            </li>
          </ul>
          

          <button class="btn btn-primary btn-lg btn-block" type="submit">Valider</button>

          </form>

          </div>
          <!--/.Card-->
        </div>
        <!--Grid column-->

        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
