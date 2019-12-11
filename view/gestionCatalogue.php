<?php
require_once('../model/produit.class.php');
require_once('../model/etat.class.php');
require_once('../model/categorie.class.php');
require_once('../model/type.class.php');

if (isset($_POST['addProduct'])){
    Produit::addProduct();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../adminStyle.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //FONCTION EN JS POUR CONFIRMER LA SUPRESSION
        function confirmation(){
            if ( confirm( "Êtes-vous sûre de vouloir supprimer cette entrée ?" ) ) {
                return true;
        } else {
            return false;
        }
    }
    </script>
</head>

<body>


    <div class="text-center">
        <h1> Gestion catalogue</h1>
    </div>
    <br>
    <p> <a href="adminPanel.php">Retour</a> </p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Descriptif</th>
                <th scope="col">Etat</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Prix</th>
                <th scope="col">Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php //BOUCLE POUR AFFICHER TOUS LES PRODUITS DANS LE TABLEAU
            $tabProduits = Produit::getAllProducts();
           
            foreach ($tabProduits as $val) {
                echo "<tr><th scope='row'>" . $val->id . "</th>
                <td>" . $val->name . "</td>
                <td>" . $val->description . "</td>
                <td>" . (Produit::getEtat($val->id))[0]['name'] . "</td>
                <td>" . (Produit::getCategorie($val->id))[0]['name'] . "</td>
                <td>" . $val->prix ."</td>
                <td>" . (Produit::getType($val->id))[0]['name'] . "</td>
                <td><a href='modificationCatalogue.php?id=".$val->id."'>Modifier</a>/<a onclick='return confirmation();' href='gestionCatalogue.php?suppr=".$val->id."'>Supprimer</a></td>
                </tr>";
            }
            
            ?>

            <tr>
                <td>
                    <form action="#" method="POST" >                 
                </td>
                <td><input type="text" name="nom" size="8" required></td>
                <td><input type="text" name="descrip" size="8" required></td>
                <td><select class="form-control" name="etat">>
                        <?php 
                        $tabEtat = Etat::getAllEtat();

                        foreach ($tabEtat as $val){
                            echo "<option value='".$val->id."'>".$val->name."</option>";
                        }

                        ?>
                        
                    </select>
                </td>
                <td><select class="form-control" name="categorie">
                        <?php 
                        $tabCategorie = Categorie::getAllCategorie();

                        foreach ($tabCategorie as $val){
                            echo "<option value='".$val->id."'>".$val->name."</option>";
                        }

                        ?>
                        
                    </select>
                </td>
                <td><input type="text" name="prix" size="8" required></td>
                <td><select class="form-control" name="type">
                        <?php 
                        $tabType = Type::getAllType();

                        foreach ($tabType as $val){
                            echo "<option value='".$val->id."'>".$val->name."</option>";
                        }

                        ?>
                        
                    </select>
                </td>
                <td><button type="submit" class="btn btn-primary" name="addProduct" >Ajouter</button></td>
                </form>
            </tr>


        </tbody>
    </table>