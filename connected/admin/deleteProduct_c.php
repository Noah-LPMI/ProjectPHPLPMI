<?php

    /***** Iris ****/

    session_start();
    /****************
     * TEST BOUCHON : accès avec utilisateur connecté profil admin (iris)
     ****************/
    // $_SESSION["user_id"] = 1;
    // $_SESSION["username"] = "testAdmin";
    // $_SESSION["user_status"] = "admin";
    /****************
     * FIN TEST
     ****************/

    //ajout de la condition d'accès (iris)
    if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {
        include('deleteProduct_m.php');
    } else {
        header("Location: index.php"); 
        exit;
    }