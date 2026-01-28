<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Ajouter un lien au menu</title>
</head>

<body>
    <div class="flex">
        <?php require_once(__DIR__.'/../../components/header.php'); ?>
        <main>
            <h1>Ajouter un lien au menu</h1>
            <form method='post' action='addLien_c.php?mod=w'>
            <fieldset>
                <div>
                    <label>Nom</label>
                    <input type='text' id='name' name='name' required />
                </div>

                <div>
                    <label>Lien</label>
                    <input type='text' id='lien' name='lien' required />
                </div>


                <div>
                    <label>Filtre</label>
                    <input type='text' id='filtre' name='filtre' required />
                </div>

                <div>
                    <label>Ordre</label>
                    <input type='number' id='ordre' name='ordre' required />
                </div>
                <div>
                    <label>Admin 1 or 0</label>
                    <input type='number' id='admin' name='admin' required />
                </div>
                <div>
                    <button type='submit'>Ajouter Lien</button>
                </div>
            </fieldset>    
            </form>
        </main>
    </div>
    <?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>

</html>