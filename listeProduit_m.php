<?php
include('connexion.php');
$sql = "SELECT * FROM produit"; //récup info du produit
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesProduit = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauProduit= array();
        if($donneesProduit != NULL){
            for($i=0;$i<count($donneesProduit);$i++){      
            $tableauProduit[]= [$donneesProduit[$i]['id'],$donneesProduit[$i]['nom'],
            $donneesProduit[$i]['prix'],$donneesProduit[$i]['description'],$donneesProduit[$i]['categorie_id']];
            } 
        }