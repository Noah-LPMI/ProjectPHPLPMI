<nav>
    <ul>
        <li><a href="/ProjectPHPLPMI/index.php">Tous les produits</a></li>
        <!--<li><a href="search_c.php">Recherche</a></li>
        <li><a href="addProduit_c.php">Ajout produit</a></li>-->
        <li><a href="/ProjectPHPLPMI/connected/admin/addLien_c.php">Ajout Menu</a></li>
        <li><a href="/ProjectPHPLPMI/connectUser_c.php">Se connecter</a></li>
        <li><a href="/ProjectPHPLPMI/addUser_c.php">Créer un compte</a></li>
        <!--<li><a href="addCateg_c.php">Ajout Categorie</a></li>-->
        
        <?php
            if(isset($_SESSION['user_id'])){ //test si connecté
                echo"<li><a href='/ProjectPHPLPMI/index.php?deco=1'>deconnexion</a></li>";
                for($i=0;$i<count($tableauMenu);$i++){//0=id, 1=lien, 2=nom//
                    if($_SESSION['user_status']!='admin' && $tableauMenu[$i][4]==1){ //si pas user=pas admin et liens (adminOnly) = 1

                    }else{
                        echo"<li><a href='".$tableauMenu[$i][1]."?".$tableauMenu[$i][3]."'>".$tableauMenu[$i][2]."</a></li>"; //sinon afficher le liens
                    }
                }
            }else{ //si pas connecté affiche tout
                        //echo"<li><a href='".$tableauMenu[$i][1]."?".$tableauMenu[$i][3]."'>".$tableauMenu[$i][2]."</a></li>";   
            }
        ?>
    </ul>
</nav>

<!--listeProduit_c.php?filtre=-->

