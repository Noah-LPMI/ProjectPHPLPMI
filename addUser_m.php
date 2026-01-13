<!--iris-->

<?php
    
    include ('db_connection.php');

    /* =========================
        GESTION DU MODE
     ======================== */

    //on initialise une variable mode à r (pour lecture)
    $mode="r";

    //on cherche si une variable mode a été passée en paramètre
    if(isset ($_GET["mode"]))
    {
        //si oui, on récupère la valeur qu'on enregistre dans la variable mode (on écrase l'ancienne valeur)
        $mode=$_GET["mode"];
    }


    /* =========================
        AJOUT D'UN UTILISATEUR
    ======================== */

    //si le mode est en écriture (c pour create) -> requête via la méthode post du formulaire
    if($mode==="c"){

        try {
                //on récupère les éléments entrés dans le formulaire (front)
                if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    $username = trim($_POST['username']);
                    $email = trim($_POST['email']);
                    $password = trim($_POST['password']);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            throw new Exception("Adresse email invalide.");
                        }

                        if (strlen($password) < 8) {
                            throw new Exception("Le mot de passe doit contenir au moins 8 caractères.");
                        }

                        //on hashe le mot de passe
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        //on vérifie si un compte est déjà enregistré pour l'email
                        $sqlEmail = "SELECT user_id FROM users WHERE email = ?";
                        $stmtCheck = $bd->prepare($sqlEmail);
                        $stmtCheck->execute([$email]);

                        if ($stmtCheck->rowCount() > 0) {
                            throw new Exception("Vous avez déjà un compte !");
                        }

                        $sql_addUser="INSERT INTO users (username, email, password, user_status) VALUES (:username, :email, :userPassword, 'user');";

                        $stmt=$bd->prepare($sql_addUser);

                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':userPassword', $passwordHash);

                        $stmt->execute();

                        $confirmMessage="Utilisateur enregistré avec succès !";

                } else {
                    $errorMessage = "Compléter tous les champs du formulaire";
                }
            } catch (PDOException $e) {
                if ($bd->inTransaction()) {
                    $bd->rollBack();
                }
                $errorMessage = "Erreur base de données.";

            } catch (Exception $e) {
                if ($bd->inTransaction()) {
                    $bd->rollBack();
                }
                $errorMessage = $e->getMessage();
            }
        }
?>