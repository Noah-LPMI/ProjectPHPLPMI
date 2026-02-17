<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <div class="flex">
        <?php require_once(__DIR__.'/../../components/header.php'); ?>
        <main>
            <h1>Ajouter une catégorie</h1>
            <form method="post" action="addCategorie_c.php?mod=w">
                <div>
                    <label>Nom de la catégorie</label>
                    <input type="text" name="name" required />
                </div>
                <div>
                    <button type="submit">Ajouter</button>
                </div>
            </form>
        </main>
    </div>
    <?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>
</html>

