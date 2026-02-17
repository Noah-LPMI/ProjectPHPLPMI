<?php

    /***** Iris ****/

    include(__DIR__ . '/../../data/db_connection.php'); //connexion bdd

    $sql = "UPDATE orders SET order_status = 'payed' WHERE order_id = :id";

    $stmt = $bd->prepare($sql);

    $stmt->bindParam(':id', $_GET['id']);

    $stmt->execute();