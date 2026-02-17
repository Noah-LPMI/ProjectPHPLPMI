<?php
include(__DIR__ . '/../../data/db_connection.php');


$sql = "SELECT * FROM categories ORDER BY category_id DESC";
$stmt = $bd->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

