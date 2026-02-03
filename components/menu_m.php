<?php

    include(__DIR__ . '/../data/db_connection.php');

    $bd->beginTransaction();

    $sqlAdmin = "SELECT * FROM nav_bar WHERE adminOnly = 1 ORDER BY `order`"; //les backquote sont utiles car le mot order est un mot réservé
    $menuAdmin=$bd->query($sqlAdmin);
    $menuAdmin->setFetchMode(PDO::FETCH_OBJ);

    $sql = "SELECT * FROM nav_bar WHERE adminOnly = 0 ORDER BY `order`"; //les backquote sont utiles car le mot order est un mot réservé
    $menu=$bd->query($sql);
    $menu->setFetchMode(PDO::FETCH_OBJ);

    $bd->commit();

?>