<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

include('connectUser_m.php');
include('connectUser_v.php');
if(isset($_GET['mod'])){ //si connecté -> variable en session
    if($tableauSearchByID != NULL){
    //$_SESSION['pseudo']= $tableauSearchByID[0][1];
    //$_SESSION['profil']= $tableauSearchByID[0][9];
    $_SESSION["user_id"]= $tableauSearchByID[0][0];
    $_SESSION["username"] = $tableauSearchByID[0][1];
    $_SESSION["user_status"] = $tableauSearchByID[0][9];
    header('Location: index.php');//renvoie à page principale
    }
}