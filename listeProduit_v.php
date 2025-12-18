<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Produit</title>
</head>

<body>
    <div class='flex'>
        <?php include('menu_c.php') ?>
        <main>
            <h1>Liste Produit</h1>
            <ul>
                <?php
                for($i=0;$i<count($tableauProduit);$i++){ //affichage tableau produit avec boucle for
                echo"<li><p>Nom : " . $tableauProduit[$i][1] ."<p>";
                echo"<p>Prix : " . $tableauProduit[$i][2] ."€<p></li>";
                }
            ?>
            </ul>
        </main>
    </div>
</body>

</html>