<?php
include('connexion.php');
$sql = "SELECT * FROM menu ORDER BY ordre"; //récup info du Menu
        $sql = $bd->prepare($sql);
        $sql->execute();
        $donneesMenu = $sql->fetchall(PDO::FETCH_ASSOC);
        $tableauMenu= array();
        if($donneesMenu != NULL){
            for($i=0;$i<count($donneesMenu);$i++){      
            $tableauMenu[]= [$donneesMenu[$i]['id'],$donneesMenu[$i]['lien'],
            $donneesMenu[$i]['nom'],$donneesMenu[$i]['filtre']];
            } 
        }    