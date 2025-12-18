<?php
session_start();
include('listeProduit_m.php');
include('listeProduit_v.php');
///Controller listeProduit/////
if(isset($_SESSION['profil'])){
    print "session profil : " . $_SESSION['profil'];
}
?>