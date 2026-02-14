<?php

    /***** Iris ****/

    include(__DIR__ . '/../../data/db_connection.php'); //connexion bdd

    $orderId = (int) $_GET['id'];


    $sql = "SELECT total_amount
            FROM orders
            WHERE order_id = :orderId";
           
            $stmt = $bd->prepare($sql);

            $stmt->bindParam(':orderId', $orderId);

            $stmt->execute();
            
            $orderAmount = $stmt->fetch(PDO::FETCH_OBJ);

    /* =========================
        Envoi du formulaire
     ======================== */

    //on initialise une variable mode à r (pour lecture)
    $mode="r";

    //on cherche si une variable mode a été passée en paramètre
    if(isset ($_GET["mode"]))
    {
        //si oui, on récupère la valeur qu'on enregistre dans la variable mode (on écrase l'ancienne valeur)
        $mode=$_GET["mode"];
    }

    if($mode =="v") {
        header('Location: paymentValidation_c.php?id=' . $orderId);
        exit;
    }