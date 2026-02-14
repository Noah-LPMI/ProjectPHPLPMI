<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
} 

include('ficheProduit_m.php');
include('ficheProduit_v.php');