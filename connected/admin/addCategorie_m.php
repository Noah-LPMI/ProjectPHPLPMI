<?php
if(isset($_GET['mod'])){ 
    include(__DIR__ . '/../../data/db_connection.php');

    $nom = trim($_POST['name']);

    if($nom !== ""){
        $sql = "INSERT INTO categories (category_name) VALUES (:nom)";
        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        header("Location: listCategorie_c.php");
        exit;
        } else {
        echo "<script>alert('Nom de catégorie vide');</script>";
    }
}

