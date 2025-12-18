<?php
include('connexion.php'); //connexion bdd
$sql = "SELECT * FROM produit where 1"; //récup info du produit
        if(isset($_GET['categ'])){
            $sql=$sql+" and categorie = '".$_GET['categ']."'";
        }
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesProduit = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauProduit= array(); //tableau de produit
        if($donneesProduit != NULL){
            for($i=0;$i<count($donneesProduit);$i++){ //tableau de tout les produits remplissage     
            $tableauProduit[]= [$donneesProduit[$i]['id'],$donneesProduit[$i]['nom'],
            $donneesProduit[$i]['prix'],$donneesProduit[$i]['description'],$donneesProduit[$i]['categorie_id']];
            } 
        }