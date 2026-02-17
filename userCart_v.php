<!--iris-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Mon panier</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/components/header.php'); ?>

        <main>
            <h1>Mon panier</h1>

            <?php
                if(isset($produits)) {
                    foreach ($produits as $produit) {
                        $quantite = $_SESSION['panier'][$produit['product_id']];
                        echo "<p>{$produit['product_name']} x $quantite</p>";
                    }
                }
            ?>

            <?php if(!empty($_SESSION['panier'])) { ?>
                <form action="connected/user/saveCart_c.php" method="POST">
                    <button type="submit">Valider mon panier et payer</button>
                </form>

            <?php } else { ?>
                <p>Votre panier est vide !</p>
            <?php } ?>

        </main>

    </div>

    <?php require_once(__DIR__.'/components/footer.php'); ?>
    
</body>
</html>