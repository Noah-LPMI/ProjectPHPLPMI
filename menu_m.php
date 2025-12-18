<?php
include('connexion.php');
$sql = "SELECT * FROM menu ORDER BY ordre"; //récup info du Menu
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesMenu = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauMenu= array(); //tableau de menu
        if($donneesMenu != NULL){
            for($i=0;$i<count($donneesMenu);$i++){ //boucle for recup menu et remplissage tableau      
            $tableauMenu[]= [$donneesMenu[$i]['id'],$donneesMenu[$i]['lien'],
            $donneesMenu[$i]['nom'],$donneesMenu[$i]['filtre'],$donneesMenu[$i]['adminOnly']];
            } 
        }    