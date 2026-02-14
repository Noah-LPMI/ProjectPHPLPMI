<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Se connecter</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/components/header.php'); ?>

        <main>
            <form method='post' action='connectUser_c.php?mod=w'>
                <fieldset>
                    <div>
                        <label>Nom</label>
                        <input type='text' id='pseudo' name='pseudo' required />
                    </div>

                    <div>
                        <label>Mot de passe</label>
                        <input type='password' id='mdp' name='mdp' required />
                    </div>
                    <div>
                        <button type='submit'>Connexion</button>
                    </div>
            </fieldset>
            </form>
        </main>
    </div>
    <?php require_once(__DIR__.'/components/footer.php'); ?>
</body>
</html>