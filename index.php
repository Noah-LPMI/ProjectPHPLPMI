<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
include('listeProduit_m.php');
include('listeProduit_v.php');
///Controller listeProduit/////
if(isset($_SESSION['profil'])){
    //echo "session profil : " . $_SESSION['profil'];
}
if(isset($_GET['deco'])){
    include(__DIR__.'/connected/components/deconnect_c.php');
}