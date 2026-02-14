<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Détails du produit</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/components/header.php'); ?>

        <main>
            
            <h1><?php echo $tableauProduit[0][1] ?></h1>
            <p><a class="isBtn" href='index.php'>Retour</a></p>
            <div class="flex detailsProduit">
                <figure>
                    <img src="https://dummyimage.com/300x200/4f224f/fff" alt="image du produit"></img>
                </figure>
                <div>
                    <p><?php echo $tableauProduit[0][2] ?>€</p>
                    <p><?php echo $tableauProduit[0][3] ?></p>
                </div>
            </div>
            
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_status']=='admin'){
                echo "<p><a class='isBtn' href='connected/admin/deleteProduct_c.php?id=".$tableauProduit[0][0]."'>Supprimer</a></p>";
                echo "<p><a class='isBtn' href='connected/admin/updateProduct_c.php?idprod=".$tableauProduit[0][0]."'>Modifier</a></p>";
            } ?>
            
        </main>
    </div>
    <?php require_once(__DIR__.'/components/footer.php'); ?>
</body>
</html>