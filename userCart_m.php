<?php

    /***** Iris ****/
    
    include(__DIR__ . '/data/db_connection.php'); //connexion bdd

    $ids = array_keys($_SESSION['panier']);

    if (!empty($ids)) {

        $in = implode(',', array_fill(0, count($ids), '?'));

        $sql = "SELECT * FROM products WHERE product_id IN ($in)";

        $stmt = $bd->prepare( $sql);

        $stmt->execute($ids);

        $produits = $stmt->fetchAll();
    }