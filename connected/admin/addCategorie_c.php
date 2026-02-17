<?php
session_start();

if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {
    include('addCategorie_m.php');
    include('addCategorie_v.php');
} else {
    header("Location: ../../index.php");
    exit;
}

