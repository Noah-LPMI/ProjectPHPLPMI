<?php
session_start();

if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {

    include('updateCategorie_m.php');
    include('updateCategorie_v.php');

} else {
    header("Location: ../../index.php");
    exit;
}

