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
            </br>
            <h1><?php echo $tableauProduit[0][1] ?> - <?php echo $tableauProduit[0][2] ?>€</h1>
            <p><?php echo $tableauProduit[0][3] ?></p>
            </br>
            <a href='index.php'>Retour Liste</a>
        </main>
    </div>
    <?php require_once(__DIR__.'/components/footer.php'); ?>
</body>
</html>

