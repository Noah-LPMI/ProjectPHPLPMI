<?php

    /***** Iris ****/

    session_start();

    if(isset($_SESSION["user_status"]) ) {
        include('paymentValidation_m.php');
        include('paymentValidation_v.php');
    } else {
        header('Location: index.php');
        exit;
    }