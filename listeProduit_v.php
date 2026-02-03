<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Liste Produit</title>
</head>

<body>
    
    <div class="flex">
    <?php require_once(__DIR__.'/components/header.php'); ?>
        <main>
            <h1>Liste Produit</h1>
            <ul>
                <?php
                    for($i=0;$i<count($tableauProduit);$i++){ //affichage tableau produit avec boucle for
                        echo"<li><div class='carteProduit'><strong><a href='ficheProduit_c.php?id=".$tableauProduit[$i][0]."'> " . $tableauProduit[$i][1] ."</a></strong>";
                        echo"<p> " . $tableauProduit[$i][2] ."€</p></div></li>";

                        //à déplacer dans la vue fiche détails produit (iris)
                        if(isset($_SESSION['profil']) && $_SESSION['profil']=='admin'){
                            echo "<li><a href='connected/admin/deleteProduct_c.php?id=".$tableauProduit[$i][0]."'>Supprimer</a>";
                        }
                    }
                ?>
            </ul>
        </main>
    </div>
    <?php require_once(__DIR__.'/components/footer.php'); ?>
</body>

</html>