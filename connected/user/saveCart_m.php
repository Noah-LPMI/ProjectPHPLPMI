<?php

    /***** Iris ****/
    
    include(__DIR__ . '/../../data/db_connection.php'); //connexion bdd

    if (empty($_SESSION['panier'])) {
        die("Panier vide");
    }

    $bd->beginTransaction();

    try {

        $ids = array_keys($_SESSION['panier']);

        // Construire le IN dynamique
        $in = implode(',', array_fill(0, count($ids), '?'));

        $sql = "SELECT product_id, price FROM products WHERE product_id IN ($in)";

        $stmt = $bd->prepare($sql);

        $stmt->execute($ids);

        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($produits) !== count($ids)) {
            throw new Exception("Produit invalide détecté");
        }

        // Calcul du total du panier
        $total = 0;

        foreach ($produits as $produit) {
            $id = $produit['product_id'];
            $prix = $produit['price'];
            $quantite = $_SESSION['panier'][$id];

            $total += $prix * $quantite;
        }

        // Insertion commande avec total
        $sql_insertion = "INSERT INTO orders (fk_userId, total_amount, creation_date, order_status) VALUES (:userId, :total, NOW(), 'not_payed')";
        
        $stmt = $bd->prepare( $sql_insertion);

        $stmt->bindParam(':userId', $_SESSION['user_id']);

        $stmt->bindParam(':total', $total);

        $stmt->execute();

        $commande_id = $bd->lastInsertId();

        // Insertion des lignes produits
        $stmtLigne = $bd->prepare("
            INSERT INTO order_details (fk_orderId, fk_productId, quantity, subtotal)
            VALUES (?, ?, ?, ?)
        ");

        foreach ($produits as $produit) {
            $id = $produit['product_id'];
            $prix = $produit['price'];
            $quantite = $_SESSION['panier'][$id];
            $total_ligne = $prix * $quantite;

            $stmtLigne->execute([
                $commande_id,
                $id,
                $quantite,
                $total_ligne
            ]);
        }

        $bd->commit();

        $_SESSION['panier'] = [];

        header('Location: orderPayment_c.php?id=' . $commande_id);
        exit;

    } catch (Exception $e) {

        $bd->rollBack();
        echo "Erreur : " . $e->getMessage();
    }