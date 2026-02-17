<?php
include(__DIR__ . '/../../data/db_connection.php');


if(isset($_GET['mod']) && isset($_GET['id'])) {

    $id = (int)$_GET['id'];
    $nom = trim($_POST['name']);

    if($id > 0 && $nom !== "") {

        $sql = "UPDATE categories
                SET category_name = :nom
                WHERE category_id = :id";

        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
       header("Location: listCategorie_c.php");
        exit;
    }
}

if(isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    $sql = "SELECT * FROM categories WHERE category_id = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id]);

    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
}

