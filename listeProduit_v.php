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
            <h1>Notre catalogue de produits</h1>
            <ul>
                <?php
                    for($i=0;$i<count($tableauProduit);$i++){ ?><!--affichage tableau produit avec boucle for-->
                        <li class='carteProduit'><a class='isBold' href='ficheProduit_c.php?id=<?= $tableauProduit[$i][0] ?>'> <?= $tableauProduit[$i][1]?></a> <!-- nom et lien vers fiche grâce à id -->
                            <p><?= $tableauProduit[$i][2] ?>€</p> <!--prix-->
                            <div class="panier-zone" data-id="<?= $tableauProduit[$i][0] ?>">
                                <button class="btn-ajout">Ajouter au panier</button>
                                <span class="quantite">
                                    <?= $_SESSION['panier'][$tableauProduit[$i][0]] ?? 0 ?>
                                </span>
                            </div>
                        </li>
                <?php } ?>
            </ul>
        </main>
    </div>
    <?php require_once(__DIR__.'/components/footer.php'); ?>
    <script>
        document.querySelectorAll('.btn-ajout').forEach(button => {
            button.addEventListener('click', function() {

                let parent = this.closest('.panier-zone');
                let produitId = parent.dataset.id;

                fetch('addToCart_c.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'id=' + produitId
                })
                .then(response => response.json())
                .then(data => {

                    parent.querySelector('.quantite').textContent = data.quantite;

                    this.textContent = "+";
                });
            });
        });
    </script>

</body>

</html>