<?php

    include(__DIR__ . '/../data/db_connection.php');

    $sql = "SELECT * FROM nav_bar ORDER BY `order`"; //récup info du Menu

    $resultats=$bd->query($sql);
    $resultats->setFetchMode(PDO::FETCH_OBJ);   

?>