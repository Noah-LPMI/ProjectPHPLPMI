<?php

    /***** Iris ****/

    include(__DIR__ . '/../../data/db_connection.php');

    $id_prod=$_GET["id"];

    $sql="DELETE FROM products WHERE product_id=".$id_prod.";";
    
    $bd->query($sql);

    header("Location: ../../index.php?supp=1");