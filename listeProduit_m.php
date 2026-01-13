<?php
include('db_connection.php'); //connexion bdd
$sql = "SELECT * FROM products where 1"; //récup info du produit
        if(isset($_GET['categ'])){
            $sql=$sql+" and categorie = '".$_GET['categ']."'";
        }
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesProduit = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauProduit= array(); //tableau de produit
        if($donneesProduit != NULL){
            for($i=0;$i<count($donneesProduit);$i++){ //tableau de tout les produits remplissage     
            $tableauProduit[]= [$donneesProduit[$i]['product_id'],$donneesProduit[$i]['product_name'],
            $donneesProduit[$i]['price'],$donneesProduit[$i]['description'],$donneesProduit[$i]['in_stock'],$donneesProduit[$i]['fk_categoryId']];
            } 
        }
