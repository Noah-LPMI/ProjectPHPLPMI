<?php
session_start();

if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {
    include(__DIR__.'/deleteCategorie_m.php');
} else {
    header("Location: ../../index.php");
    exit;
}

