<?php
require_once('../model/produit.class.php');
require_once('../model/etat.class.php');
require_once('../model/categorie.class.php');
require_once('../model/type.class.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../adminStyle.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Modification catalogue</title>
</head>
<body>
    

<div class="text-center">
<h1>Modification catalogue</h1>
</div>
<br>

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
                <th scope="col">Images</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              
                <?php               
                $id=$_GET['id'];  
                $product= Produit::getProduct($id);


                foreach ($product as $val) {
                    $idd= $val->id;
                    $name= $val->name;
                    $description= $val->description;
                    $prix= $val->prix;
                    $image= $val->image;
                }


                ?>

                <form action="modification.php" method="POST" name="modifierProduit" >                 
                
                <td><input type="text" name="idddd" readonly class="form-control-plaintext" size="1" value="<?php echo $idd; ?>"></td>
                <td><input type="text" name="nom" size="8" value="<?php echo $name; ?>"></td>
                <td><input type="text" name="description" size="8" value="<?php echo $description; ?>"></td>
                <td>
                <select class="form-control" name="etat">>
                        <?php 
                        $tabEtat = Produit::getEtat($id);



                        ?>
                        
                    </select>
                </td>
                <td>
                <select class="form-control" name="categorie">
                        <?php 
                        $tabCategorie = Produit::getCategorie($id);



                        ?>
                        
                    </select>
                </td>
                <td><input type="text" name="prix" size="8" value="<?php echo $prix; ?>"></td>
                <td>
                <select class="form-control" name="type">
                        <?php 
                        $tabType = Produit::getType($id);

 

                        ?>
                        
                    </select>
                </td>
                <td><input type="text" name="image" size="8" value="<?php echo $image; ?>"></td>

                <td><button type="submit" class="btn btn-primary" name="modifProduit" >Modifier</button></td>
                </form>
            </tr>
        </tbody>
    </table>
    
    <a href="gestionCatalogue.php"> <button type="button" class="btn btn-light">Retour</button> </a>















</body>
</html>