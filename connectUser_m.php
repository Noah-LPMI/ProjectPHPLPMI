<?php
if(isset($_GET['mod'])){
include(__DIR__ . '/data/db_connection.php'); //connexion bdd
//requête sql
$passhash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


$sqlid = "SELECT * FROM users WHERE username = '".$_POST['pseudo']."' AND password = '".$passhash."'";
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

    /*****
     * Iris à Noah
     * Quand la connexion est réussie, ajouter les variables de session suivantes :
     * $_SESSION["user_id"]
     * $_SESSION["username"]
     * $_SESSION["user_status"]
     *****/

}

