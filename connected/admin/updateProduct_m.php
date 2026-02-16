<?php
if(isset($_GET['mod'])){
include(__DIR__ . '/../../data/db_connection.php');
try{
            $sql = $bd->prepare("UPDATE products SET product_name=:nom,price=:prix,
            description=:desc,in_stock=:instock,fk_categoryId=:categid WHERE product_id=:idprod");
            $sql->bindParam(':nom', $_POST['name']);
            $sql->bindParam(':prix', $_POST['price']);
            $sql->bindParam(':desc', $_POST['desc']);
            $sql->bindParam(':instock', $_POST['instock']);
            $sql->bindParam(':categid', $_POST['categ']);
            $sql->bindParam(':idprod', $_GET['idprod']);
            $sql->execute();
            echo "<script>alert('produit update avec succès')</script>";
}
catch(Exception $e){
    echo "<script>alert('produit update problème')</script>";
}
}

function getCategAll(){
include(__DIR__ . '/../../data/db_connection.php'); //connexion bdd
$sql = "SELECT * FROM categories where 1"; //récup info du Category
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesCategory = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauCategory= array(); //tableau de Category
        if($donneesCategory != NULL){
            for($i=0;$i<count($donneesCategory);$i++){ //tableau de tout les Categorys remplissage     
            $tableauCategory[]= [$donneesCategory[$i]['category_id'],$donneesCategory[$i]['category_name']];
            } 
        }
        return $tableauCategory;
}

function getProductInfo(){
    include(__DIR__ . '/../../data/db_connection.php'); //connexion bdd
    $sql = "SELECT * FROM products where 1 AND product_id=".$_GET['idprod'].""; //récup info du produit
        if(isset($_GET['categ'])){
            $sql=$sql." and categorie = '".$_GET['categ']."'";
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
            return $tableauProduit; 
            }    
}