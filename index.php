<?php
session_start();
include('listeProduit_m.php');
include('listeProduit_v.php');
///Controller listeProduit/////
if(isset($_SESSION['profil'])){
    //echo "session profil : " . $_SESSION['profil'];
}
if(isset($_GET['deco'])){
    include('deconnect_c.php');
}
?>