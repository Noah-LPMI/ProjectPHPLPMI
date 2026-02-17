<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Liste des catégories</title>
</head>
<body>
    <div class="flex">
        <?php require_once(__DIR__.'/../../components/header.php'); ?>
        <main>
            <h1>Liste des catégories</h1>
            <a href="addCategorie_c.php" class="btn">Ajouter une catégorie</a>
            <table >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de la catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $categorie): ?>
                    <tr>
                        <td><?= $categorie['category_id'] ?></td>
                        <td><?= htmlspecialchars($categorie['category_name']) ?></td>
                        
                        <td>
                              <a href="updateCategorie_c.php?id=<?= $categorie['category_id'] ?>">
                              <button type="button">Modifier</button>
                               </a>
                                  <a href="deleteCategorie_c.php?id=<?= $categorie['category_id'] ?>"
                                   onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                  <button type="button">Supprimer</button>
                                 </a>
                        </td>


                    </tr>
                    <?php endforeach; ?>
                    <?php if(count($categories) === 0): ?>
                        <tr><td colspan="3">Aucune catégorie trouvée</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </div>
    <?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>
</html>




