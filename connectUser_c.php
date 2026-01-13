<?php
session_start();
include('connectUser_m.php');
include('connectUser_v.php');
if(isset($_GET['mod'])){ //si connecté -> variable en session
    if($tableauSearchByID != NULL){
    $_SESSION['pseudo']= $tableauSearchByID[0][1];
    $_SESSION['profil']= $tableauSearchByID[0][3];
    }
    echo"<a href='listeProduit_c.php'>Tous les produits</a>"; //renvoie à page principale
}