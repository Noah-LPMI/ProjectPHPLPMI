<!--iris-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Créer un compte</title>
</head>
<body>

    <div class="flex">
        <?php require_once(__DIR__.'/components/header.php'); ?>

        <main>
            <h1>Créer mon compte</h1>

            <!-- Formulaire de création de compte -->
            <form action="addUser_c.php?mode=c" method="post">
                <fieldset>
                
                    <div>
                        <label for="username">Pseudo : </label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div>
                        <label for="email">Email : </label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Mot de passe : </label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input type="submit" value="Je créé mon compte">
                </fieldset>
            </form>

            <!-- Message d'erreur en cas d'échec -->
            <?php if (isset($errorMessage)) : ?>
                <div class="errorMessage">
                    <p>
                        <?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>
            <?php endif; ?>
            
            <!-- Message de confirmation en cas de succès -->
            <?php if (isset($confirmMessage)) : ?>
                <div class="confirmMessage">
                    <p>
                        <?= htmlspecialchars($confirmMessage, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>
            <?php endif; ?>
        </main>
    </div
    <?php require_once(__DIR__.'/components/footer.php'); ?>
    
</body>
</html>

