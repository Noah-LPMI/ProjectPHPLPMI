-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 fév. 2026 à 14:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lpmi_gp1_shopping_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'DVD'),
(2, 'Bluray'),
(3, '4K'),
(4, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `nav_bar`
--

CREATE TABLE `nav_bar` (
  `navBar_id` int(11) NOT NULL,
  `links` varchar(100) NOT NULL,
  `label` varchar(30) NOT NULL,
  `filter` varchar(40) NOT NULL,
  `order` int(11) NOT NULL,
  `adminOnly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nav_bar`
--

INSERT INTO `nav_bar` (`navBar_id`, `links`, `label`, `filter`, `order`, `adminOnly`) VALUES
(2, 'index.php', 'DVD', 'filtre=dvd', 3, 1),
(3, 'index.php', 'Bluray', 'filtre=bluray', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `order_status` enum('not_payed','payed','shipped','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `fk_orderId` int(11) NOT NULL,
  `fk_productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `in_stock` int(11) NOT NULL,
  `fk_categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `in_stock`, `fk_categoryId`) VALUES
(1, 'The Dark Knight : Le Chevalier noir', 10, 'Batman est plus que jamais determine a eradiquer le crime organise qui seme la terreur en ville. Epaule par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d\'action s\'elargir.', 0, 1),
(2, 'Retour vers le futur', 40, 'Le jeune Marty McFly mene une existence anonyme, aupres de sa petite amie Jennifer, seulement troublee par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycee. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne tester sa nouvelle experience : le voyage dans le temps\n', 0, 2),
(3, 'Voyage au centre de la Terre', 25, 'Au cours d\'une expedition en Islande, un sismologue et son neveu, fils d\'un scientifique decede 10 ans plus tot, se retrouvent enfermes dans une grotte en compagnie de leur guide.\n', 0, 1),
(4, 'Indiana Jones et le Temple maudit', 24, 'A Shanghai, Indiana Jones se trouve mele a un reglement de compte entre gangsters qui se disputent un bijou. Avec le jeune chinois Demi-Lune et de la chanteuse Willie Scott, Indiana fuit a bord d\'un avion de fortune. Ils atterrissent en plein coeur de l\'Inde ou ils decouvrent une population miserable depuis le vol d\'une pierre sacree dotee de pouvoirs.\n', 0, 3),
(5, 'Le Dernier Maître de l\'air', 15, 'Les quatre nations de l\'air, de l\'eau de la terre et du feu vivaient en harmonie jusqu\'a ce que la nation du feu declare la guerre. Un siecle plus tard, aucune perspective de paix n\'est en vue. Alors Aang, un avatar decouvre qu\'il a le pouvoir de controler les quatre elements.\n', 0, 3),
(6, 'Shaolin Soccer', 21, 'Un entraineur de foot offre un million de dollars a un maitre du kung-fu (Stephen Chow) et ses ex-compagnons de classe afin de les persuader de former une equipe.\n', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `search_entries`
--

CREATE TABLE `search_entries` (
  `search_entry_id` int(11) NOT NULL,
  `fk_search_form` int(11) NOT NULL,
  `entry_tag_id` varchar(30) NOT NULL,
  `entry_tag_name` varchar(30) NOT NULL,
  `entry_required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_entries`
--

INSERT INTO `search_entries` (`search_entry_id`, `fk_search_form`, `entry_tag_id`, `entry_tag_name`, `entry_required`) VALUES
(1, 1, 'keyword', 'keyword', 1),
(2, 1, 'category', 'category', 0),
(3, 1, 'submit', 'submit', 0);

-- --------------------------------------------------------

--
-- Structure de la table `search_forms`
--

CREATE TABLE `search_forms` (
  `search_form_id` int(11) NOT NULL,
  `form_tag_action` varchar(120) NOT NULL,
  `form_tag_method` varchar(10) NOT NULL,
  `form_tag_id` varchar(30) NOT NULL,
  `form_tag_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_forms`
--

INSERT INTO `search_forms` (`search_form_id`, `form_tag_action`, `form_tag_method`, `form_tag_id`, `form_tag_name`) VALUES
(1, 'a definir avec nom du fichier', 'POST', 'searchBar', 'searchBar');

-- --------------------------------------------------------

--
-- Structure de la table `search_input`
--

CREATE TABLE `search_input` (
  `fk_search_entry` int(11) NOT NULL,
  `fk_search_type_input` int(11) NOT NULL,
  `input_tag_placeholder` varchar(50) DEFAULT NULL,
  `input_tag_value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_input`
--

INSERT INTO `search_input` (`fk_search_entry`, `fk_search_type_input`, `input_tag_placeholder`, `input_tag_value`) VALUES
(1, 1, 'Saisir le mot-clé', NULL),
(3, 2, NULL, 'Rechercher');

-- --------------------------------------------------------

--
-- Structure de la table `search_input_type`
--

CREATE TABLE `search_input_type` (
  `search_input_type_id` int(11) NOT NULL,
  `input_type_libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_input_type`
--

INSERT INTO `search_input_type` (`search_input_type_id`, `input_type_libelle`) VALUES
(1, 'text'),
(2, 'submit');

-- --------------------------------------------------------

--
-- Structure de la table `search_labels`
--

CREATE TABLE `search_labels` (
  `fk_search_entry` int(11) NOT NULL,
  `label_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_labels`
--

INSERT INTO `search_labels` (`fk_search_entry`, `label_text`) VALUES
(1, 'Mot-clé'),
(2, 'Catégorie');

-- --------------------------------------------------------

--
-- Structure de la table `search_options`
--

CREATE TABLE `search_options` (
  `search_option_id` int(11) NOT NULL,
  `fk_search_select` int(11) NOT NULL,
  `option_tag_value` varchar(30) NOT NULL,
  `option_tag_selected` tinyint(1) NOT NULL,
  `option_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_options`
--

INSERT INTO `search_options` (`search_option_id`, `fk_search_select`, `option_tag_value`, `option_tag_selected`, `option_text`) VALUES
(1, 2, '0', 1, 'Sélectionner'),
(2, 2, 'DVD', 0, 'DVD'),
(3, 2, 'Bluray', 0, 'Bluray'),
(4, 2, '4K', 0, '4K'),
(5, 2, 'CD', 0, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `search_select`
--

CREATE TABLE `search_select` (
  `fk_search_entry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `search_select`
--

INSERT INTO `search_select` (`fk_search_entry`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address_street` varchar(80) DEFAULT NULL,
  `address_zip_code` varchar(10) DEFAULT NULL,
  `address_country` varchar(30) DEFAULT NULL,
  `user_status` enum('user','admin','superuser','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstname`, `lastname`, `email`, `password`, `address_street`, `address_zip_code`, `address_country`, `user_status`) VALUES
(3, 'user1', NULL, NULL, 'user1@email.com', '$2y$10$PXyqnixWuag1taEQnKYDsOettcxzPMKWQ/VlQk3msdh7zKg466ZZ2', NULL, NULL, NULL, 'user'),
(4, 'Test28janv2026', NULL, NULL, 'test28jan@email.fr', '$2y$10$kN4W90wyFvfqU2P6P3K9BOBl.TvyFyJsArG98fwyX9CnKhbYIKBZa', NULL, NULL, NULL, 'user'),
(5, 'admin', NULL, NULL, 'admin@gp1.fr', '$2y$10$nv52j8XUMZ/GJmtxsZC9wue9nuY8ZShScSMAFFmM3HLVS2kK4rMru', NULL, NULL, NULL, 'admin'),
(6, 'user2', NULL, NULL, 'user2@gp1.fr', '$2y$10$Fh.xMaxtuohgio87rnm3h.lRI9YtdJTNI53kTcS.vj58wn3YknITe', NULL, NULL, NULL, 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `nav_bar`
--
ALTER TABLE `nav_bar`
  ADD PRIMARY KEY (`navBar_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_userId` (`fk_userId`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`fk_orderId`,`fk_productId`),
  ADD KEY `fk_orderId` (`fk_orderId`,`fk_productId`),
  ADD KEY `fk_productId` (`fk_productId`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_categoryId` (`fk_categoryId`);

--
-- Index pour la table `search_entries`
--
ALTER TABLE `search_entries`
  ADD PRIMARY KEY (`search_entry_id`),
  ADD KEY `fk_search_form` (`fk_search_form`);

--
-- Index pour la table `search_forms`
--
ALTER TABLE `search_forms`
  ADD PRIMARY KEY (`search_form_id`);

--
-- Index pour la table `search_input`
--
ALTER TABLE `search_input`
  ADD PRIMARY KEY (`fk_search_entry`),
  ADD UNIQUE KEY `fk_search_type_input` (`fk_search_type_input`);

--
-- Index pour la table `search_input_type`
--
ALTER TABLE `search_input_type`
  ADD PRIMARY KEY (`search_input_type_id`);

--
-- Index pour la table `search_labels`
--
ALTER TABLE `search_labels`
  ADD PRIMARY KEY (`fk_search_entry`);

--
-- Index pour la table `search_options`
--
ALTER TABLE `search_options`
  ADD PRIMARY KEY (`search_option_id`),
  ADD KEY `fk_search_select` (`fk_search_select`);

--
-- Index pour la table `search_select`
--
ALTER TABLE `search_select`
  ADD PRIMARY KEY (`fk_search_entry`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nav_bar`
--
ALTER TABLE `nav_bar`
  MODIFY `navBar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `search_entries`
--
ALTER TABLE `search_entries`
  MODIFY `search_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `search_forms`
--
ALTER TABLE `search_forms`
  MODIFY `search_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `search_input_type`
--
ALTER TABLE `search_input_type`
  MODIFY `search_input_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `search_options`
--
ALTER TABLE `search_options`
  MODIFY `search_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`fk_orderId`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`fk_productId`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_categoryId`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `search_entries`
--
ALTER TABLE `search_entries`
  ADD CONSTRAINT `search_entries_ibfk_1` FOREIGN KEY (`fk_search_form`) REFERENCES `search_forms` (`search_form_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `search_input`
--
ALTER TABLE `search_input`
  ADD CONSTRAINT `search_input_ibfk_1` FOREIGN KEY (`fk_search_entry`) REFERENCES `search_entries` (`search_entry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `search_input_ibfk_2` FOREIGN KEY (`fk_search_type_input`) REFERENCES `search_input_type` (`search_input_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `search_labels`
--
ALTER TABLE `search_labels`
  ADD CONSTRAINT `search_labels_ibfk_1` FOREIGN KEY (`fk_search_entry`) REFERENCES `search_entries` (`search_entry_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `search_options`
--
ALTER TABLE `search_options`
  ADD CONSTRAINT `search_options_ibfk_1` FOREIGN KEY (`fk_search_select`) REFERENCES `search_select` (`fk_search_entry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `search_select`
--
ALTER TABLE `search_select`
  ADD CONSTRAINT `search_select_ibfk_1` FOREIGN KEY (`fk_search_entry`) REFERENCES `search_entries` (`search_entry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
