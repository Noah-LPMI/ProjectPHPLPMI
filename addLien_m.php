<?php
    if(isset($_GET['mod'])){
    include('connexion.php');
    $sql="Insert Into menu (lien,nom,filtre, ordre) values (:lien,:nom, :filtre, :ordre)";
    $sql = $bd->prepare($sql);

    $sql->bindParam(':nom', $_POST['name']);
    $sql->bindParam(':lien', $_POST['lien']);
    $sql->bindParam(':filtre', $_POST['filtre']);
    $sql->bindParam(':ordre', $_POST['ordre']);
    
    $sql->execute();
    echo"lien ajouté avec succès";
    }
