<?php
include(__DIR__ . '/../../data/db_connection.php');

$id = (int)$_GET['id'];

if($id > 0){
    $sql = "DELETE FROM categories WHERE category_id = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id]);

    header("Location: ../../index.php?supp=1");
    exit;
}
