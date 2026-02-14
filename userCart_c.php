<?php

    /***** Iris ****/

    session_start();

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    include('userCart_m.php');
    include('userCart_v.php');