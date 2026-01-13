<?php
if(isset($_GET['mod'])){
include('db_connection.php'); //connexion bdd
//requête sql 
$sqlid = "SELECT * FROM users WHERE username = '".$_POST['pseudo']."' AND password = '".$_POST['mdp']."'";
    $requeteid = $bd -> prepare ($sqlid);
    $requeteid->execute();
    $donneesid= $requeteid->fetch(PDO::FETCH_ASSOC); 
    $tableauSearchByID= array();
    if($donneesid){      
    $tableauSearchByID[]= [$donneesid['user_id'],$donneesid['username'],$donneesid['firstname'],$donneesid['lastname']
    ,$donneesid['email'],$donneesid['password'],$donneesid['address_street']
    ,$donneesid['address_zip_code'],$donneesid['address_country'],$donneesid['user_status']]; 
    echo "Connexion ok";
    }else{
        echo "Utilisateur introuvable";
    }
}
