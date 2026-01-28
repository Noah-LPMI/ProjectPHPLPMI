<?php
if(isset($_GET['deco'])){
    session_destroy();
    header("Location: ../../index.php");
    exit;
}