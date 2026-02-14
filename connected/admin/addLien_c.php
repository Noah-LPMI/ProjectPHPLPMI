<?php
    session_start();

    //ajout de la condition d'accès (iris)
    if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {
        include('addLien_m.php');
        include('addLien_v.php');
    } else {
        header("Location: index.php"); 
        exit;
    }