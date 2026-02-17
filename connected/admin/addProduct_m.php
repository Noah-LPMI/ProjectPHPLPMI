<?php
if(isset($_GET['mod'])){
    include(__DIR__ . '/../../data/db_connection.php');
    try{
    $sql="Insert Into products (product_name,price,description,in_stock,fk_categoryId) values (:nom,:prix,:desc,:instock,:categid)";
    $sql = $bd->prepare($sql);
    $sql->bindParam(':nom', $_POST['name']);
    $sql->bindParam(':prix', $_POST['price']);
    $sql->bindParam(':desc', $_POST['desc']);
    $sql->bindParam(':instock', $_POST['instock']);
    $sql->bindParam(':categid', $_POST['categ']);
    $sql->execute();
    echo "<script>alert('produit ajouter succès')</script>";
    }
    catch(Exception $e){
    echo "<script>alert('produit ajout problème')</script>";
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

