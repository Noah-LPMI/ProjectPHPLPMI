<!--iris-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Validation du paiment</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/../../components/header.php'); ?>

        <main>
            <h1>Paiement validé</h1>

            <p>Votre paiement a été validé, votre commande n°<?=$_GET['id']?> a bien été enregistrée !</p>
        </main>

    </div>

    <?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>
</html>