<nav>
    <ul>
        <!-- *************
        Afficher pour tous les utilisateurs
        **************-->
        <li><a href="/ProjectPHPLPMI/index.php">Tous les produits</a></li>
        <!-- Ajouter menu dynamique sans adminonly (0) -->

        <!-- *************
        Afficher pour tous les utilisateurs non connectés
        **************-->
        <?php if(!isset($_SESSION['user_id'])) : ?>
            <li><a href="/ProjectPHPLPMI/connectUser_c.php">Se connecter</a></li>
            <li><a href="/ProjectPHPLPMI/addUser_c.php">Créer un compte</a></li>
        <?php endif; ?>
        
        <!-- *************
        Afficher pour tous les utilisateurs connectés
        **************-->
        <?php if(isset($_SESSION['user_id'])) : ?>
            <li><a href='/ProjectPHPLPMI/index.php?deco=1'>deconnexion</a></li>
        <?php endif; ?>

        <!-- *************
        Afficher pour tous les utilisateurs connectés statut admin
        **************-->
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_status'] === 'admin') : ?>
            <li><a href="/ProjectPHPLPMI/connected/admin/addProduit_c.php">Ajouter un  produit</a></li>
            <li><a href="/ProjectPHPLPMI/connected/admin/addCategorie_c.php">Ajouter une  catégorie</a></li>
            <li><a href="/ProjectPHPLPMI/connected/admin/addLien_c.php">Ajouter lien au menu</a></li>
            <!-- Ajouter menu dynamique AVEC adminonly (1) -->
        <?php endif; ?>
    
    </ul>
</nav>

<!--listeProduit_c.php?filtre=-->

