<nav>
<ul>
    <li><a href="listeProduit_c.php">Tous les produits</a></li>
    <li><a href="search_c.php">Recherche</a></li>
    <li><a href="addProduit_c.php">Ajout produit</a></li>
    <li><a href="addLien_c.php">Ajout Liens Menu</a></li>
    <li><a href="addCateg_c.php">Ajout Categorie</a></li>
    
    <?php
    for($i=0;$i<count($tableauMenu);$i++){
    echo"<li><a href='listeProduit_c.php?filtre=".$tableauMenu[$i][1]."'>".$tableauMenu[$i][2]."</a></li>";
    }?>
</ul>
</nav>


