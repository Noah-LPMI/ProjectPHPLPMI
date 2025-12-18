<?php
if(isset($_GET['mod'])){
include('connexion.php'); //connexion bdd
//requête sql 
$sqlid = "SELECT * FROM user WHERE pseudo = '".$_POST['pseudo']."' AND mdp = '".$_POST['mdp']."'";
    $requeteid = $bd -> prepare ($sqlid);
    $requeteid->execute();
    $donneesid= $requeteid->fetch(PDO::FETCH_ASSOC); 
    $tableauSearchByID= array();
    if($donneesid){      
    $tableauSearchByID[]= [$donneesid['id'],$donneesid['pseudo'],$donneesid['mdp'],$donneesid['profil']]; 
    echo "Connexion ok";
    }else{
        echo "Utilisateur introuvable";
    }
}