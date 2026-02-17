<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier catégorie</title>
    <link rel="stylesheet" href="../../styles/style.css">
</head>
<body>

<div class="flex">

<?php require_once(__DIR__.'/../../components/header.php'); ?>

<main>
    <h1>Modifier catégorie</h1>

    <?php if(isset($categorie)): ?>

    <form method="post"
          action="updateCategorie_c.php?mod=w&id=<?= $categorie['category_id'] ?>">

        <div>
            <label>Nom catégorie</label>
            <input type="text"
                   name="name"
                   value="<?= htmlspecialchars($categorie['category_name']) ?>"
                   required>
        </div>

        <div>
            <button type="submit">Modifier</button>
        </div>

    </form>

    <?php else: ?>
        <p>Catégorie introuvable.</p>
    <?php endif; ?>

</main>

</div>

<?php require_once(__DIR__.'/../../components/footer.php'); ?>

</body>
</html>

