<?php
    if(isset($_GET['mod'])){
    include('connexion.php');
    $sql="Insert Into menu (lien,nom) values (:lien,:nom)";
    $sql = $bd->prepare($sql);

    $sql->bindParam(':nom', $_POST['name']);
    $sql->bindParam(':lien', $_POST['lien']);

    $sql->execute();
    echo"lien ajouté avec succès";
    }
