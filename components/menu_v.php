<!--iris-->

<nav>
    <ul>
        <!-- *************
        Afficher pour tous les utilisateurs
        **************-->
        <li><a href="/ProjectPHPLPMI/index.php">Tous les produits</a></li>
        <li><a href="/ProjectPHPLPMI/userCart_c.php">Mon panier</a></li>
        <!-- Menu dynamique sans adminonly (0) -->
        <?php if(isset($menu)) {
            while($ligne = $menu->fetch()) {
                $label = htmlspecialchars($ligne->label, ENT_QUOTES, 'UTF-8');
                $link = htmlspecialchars($ligne->links, ENT_QUOTES, 'UTF-8');
                $filter = htmlspecialchars($ligne->filter, ENT_QUOTES, 'UTF-8');

                $url = "/ProjectPHPLPMI/$link";
                if (!empty($filter)) {
                    $url .= '?' . $filter;
                }

                echo "<li><a href='$url'>$label</a></li>";
            }
        } ?>

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
            <li><a href="/ProjectPHPLPMI/connected/admin/addProduct_c.php">Ajouter un  produit</a></li>
            <li><a href="/ProjectPHPLPMI/connected/admin/addCategorie_c.php">Ajouter une  catégorie</a></li>
            <li><a href="/ProjectPHPLPMI/connected/admin/listCategorie_c.php">Liste des catégories</a></li>
            <li><a href="/ProjectPHPLPMI/connected/admin/addLien_c.php">Ajouter lien au menu</a></li>
            <!-- Ajouter menu dynamique AVEC adminonly (1) -->
            <?php if(isset($menuAdmin)) {
            while($ligne = $menuAdmin->fetch()) {
                $labelAdmin = htmlspecialchars($ligne->label, ENT_QUOTES, 'UTF-8');
                $linkAdmin = htmlspecialchars($ligne->links, ENT_QUOTES, 'UTF-8');
                $filterAdmin = htmlspecialchars($ligne->filter, ENT_QUOTES, 'UTF-8');

                 $url = "/ProjectPHPLPMI/$linkAdmin";
                if (!empty($filterAdmin)) {
                    $url .= '?' . $filterAdmin;
                }

                echo "<li><a href='/ProjectPHPLPMI/$url'>$labelAdmin</a></li>";
            }
        } ?>
        <?php endif; ?>
    
    </ul>
</nav>