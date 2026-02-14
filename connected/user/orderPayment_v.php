<!--iris-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Connexion requise</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/../../components/header.php'); ?>

        <main>
            <h1>Paiement de la commande</h1>

            <p>Montant total : <?= htmlspecialchars($orderAmount->total_amount) ?> €</p>

            <form action="orderPayment_c.php?mode=v&id=<?=$_GET['id']?>" method="post"> 
                <input type="submit" value="Je paye ma commande">
            </form>
        </main>

    </div>

    <?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>
</html>