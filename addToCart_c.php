<?php

    /***** Iris ****/
    
    session_start();

    // Affiche toutes les erreurs pour le dev (optionnel, utile pour débug)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Indique que la réponse sera du JSON
    header('Content-Type: application/json');

    // Initialisation du panier
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Récupération sécurisée de l'ID produit
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($id > 0) {
        if (isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]++;
        } else {
            $_SESSION['panier'][$id] = 1;
        }

        echo json_encode([
            'quantite' => $_SESSION['panier'][$id]
        ]);
    } else {
        // ID invalide
        echo json_encode([
            'quantite' => 0
        ]);
    }

    exit;