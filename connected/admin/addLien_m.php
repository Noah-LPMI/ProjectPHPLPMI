<?php

    if(isset($_GET['mod'])){ //si envoie formulaire
    include(__DIR__ . '/../../data/db_connection.php'); //connexion base donnée
    $sql="Insert Into nav_bar (links,label,filter, `order`, adminOnly) values (:lien,:nom, :filtre, :ordre, :admin)";
    $sql = $bd->prepare($sql);

    $sql->bindParam(':nom', $_POST['name']);
    $sql->bindParam(':lien', $_POST['lien']);
    $sql->bindParam(':filtre', $_POST['filtre']);
    $sql->bindParam(':ordre', $_POST['ordre']);
    $sql->bindParam(':admin', $_POST['admin']);
    
    $sql->execute();
    echo"lien ajouté avec succès";
    }