<nav>
<ul>
    <li><a href="listeProduit_c.php">Tous les produits</a></li>
    <!--<li><a href="search_c.php">Recherche</a></li>
    <li><a href="addProduit_c.php">Ajout produit</a></li>-->
    <li><a href="addLien_c.php">Ajout Menu</a></li>
    <li><a href="connectUser_c.php">connect</a></li>
    <!--<li><a href="addCateg_c.php">Ajout Categorie</a></li>-->
    
    <?php
    for($i=0;$i<count($tableauMenu);$i++){//0=id, 1=lien, 2=nom//
    if(isset($_SESSION['profil'])){ //test si connecté
    if($_SESSION['profil']!='admin' && $tableauMenu[$i][4]==1){ //si pas user=pas admin et liens (adminOnly) = 1
        echo"pbm vous êtes pas admin";
    }else{
    echo"<li><a href='".$tableauMenu[$i][1]."?".$tableauMenu[$i][3]."'>".$tableauMenu[$i][2]."</a></li>"; //sinon afficher le liens
    }
    }else{ //si pas connecté affiche tout
    //echo"<li><a href='".$tableauMenu[$i][1]."?".$tableauMenu[$i][3]."'>".$tableauMenu[$i][2]."</a></li>";   
    }}
    ?>
</ul>
</nav>

<!--listeProduit_c.php?filtre=-->

