<?php
include('connexion.php');
$sql = "SELECT * FROM nav_bar ORDER BY order"; //récup info du Menu
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesMenu = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauMenu= array(); //tableau de menu
        if($donneesMenu != NULL){
            for($i=0;$i<count($donneesMenu);$i++){ //boucle for recup menu et remplissage tableau      
            $tableauMenu[]= [$donneesMenu[$i]['navBar_id'],$donneesMenu[$i]['links'],
            $donneesMenu[$i]['label'],$donneesMenu[$i]['filter'],$donneesMenu[$i]['adminOnly']];
            } 
        }    