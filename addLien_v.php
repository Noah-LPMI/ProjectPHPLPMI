<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddLien</title>
</head>

<body>
    <h1>Ajouter Lien</h1>
    <?php include('menu_c.php') ?>
    <form method='post' action='addLien_c.php?mod=w'>

        <div>
            <label>Nom</label>
            <input type='text' id='name' name='name' required />
        </div>

        <div>
            <label>Lien</label>
            <input type='text' id='lien' name='lien' required />
            <button type='submit'>Ajouter Produit</button>
        </div>

    </form>
</body>

</html>