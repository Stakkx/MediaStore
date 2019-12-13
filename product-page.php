<?php

require_once('model/produit.class.php');
require_once('model/panier.class.php');
$panier = new panier();

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
              <a class="nav-link waves-effect" href="#">CD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">DVD</a>
            </li>
          </ul>
  
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="panier.php">
              <span class="badge red z-depth-1 mr-1"> <?= array_sum($_SESSION['panier']) ?> </span>
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
<br><br><br><br><br><br>
  <!--Main layout-->
  <main class="mt-5 pt-4">


  <?php 
  
  if (isset($_GET['product_id'])){
    $data = Produit::getProduct($_GET['product_id']);
    foreach ($data as $product):
  
  ?>

    <div class="container dark-grey-text mt-5">
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="<?= $product->image ?>" alt="" height="300rem">
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1"><?= (Produit::getCategorie($product->id))[0]['name'] ?></span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
            </div>

            <p class="lead">
              <span><?= number_format($product->prix,2,',','') ?></span>
            </p>
            <p class="lead font-weight-bold"><?= $product->name ?></p>
            <p><?= $product->description ?></p>

            <a href="model/addpanier.php?id=<?= $product->id ?>">
                <button class="btn btn-primary btn-md my-0 p" type="submit">Ajouter au panier
                    <i class="fas fa-shopping-cart ml-1"></i>
                </button>
            </a>
          </div>
          <!--Content-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <hr>
    </div>

    <?php endforeach; };?>





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
