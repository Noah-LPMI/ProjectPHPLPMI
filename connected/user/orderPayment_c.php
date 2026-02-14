<?php

    /***** Iris ****/

  session_start();

  if(isset($_SESSION["user_status"]) ) {
        include('orderPayment_m.php');
        include('orderPayment_v.php');
    } else {
        header('Location: index.php');
        exit;
    }