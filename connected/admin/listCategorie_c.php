<?php
session_start();


if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin") {
    include('listCategorie_m.php');
    include('listCategorie_v.php');
} else {
    header("Location: ../../index.php");
    exit;
}
