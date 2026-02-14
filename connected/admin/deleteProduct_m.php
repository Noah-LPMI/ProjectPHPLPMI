<?php

    /***** Iris ****/

    include(__DIR__ . '/../../data/db_connection.php');

    $id_prod=$_GET["id_prod"];

    $sql="DELETE FROM products WHERE product_id=".$id_prod.";";
    
    $resultats=$bd->exec($sql);