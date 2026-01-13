-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 13 jan. 2026 à 13:58
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

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
  `category_id` int NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `navBar_id` int NOT NULL,
  `links` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `label` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `filter` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `order` int NOT NULL,
  `adminOnly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `nav_bar`
--

INSERT INTO `nav_bar` (`navBar_id`, `links`, `label`, `filter`, `order`, `adminOnly`) VALUES
(2, 'listeProduit_c.php', 'DVD', 'filtre=dvd', 3, 1),
(3, 'listeProduit_c.php', 'Bluray', 'filtre=bluray', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `fk_userId` int NOT NULL,
  `total_amount` int NOT NULL,
  `creation_date` datetime NOT NULL,
  `order_status` enum('not_payed','payed','shipped','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `fk_orderId` int NOT NULL,
  `fk_productId` int NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `in_stock` int NOT NULL,
  `fk_categoryId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address_street` varchar(80) DEFAULT NULL,
  `address_zip_code` varchar(10) DEFAULT NULL,
  `address_country` varchar(30) DEFAULT NULL,
  `user_status` enum('user','admin','superuser','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstname`, `lastname`, `email`, `password`, `address_street`, `address_zip_code`, `address_country`, `user_status`) VALUES
(1, 'admin', '', '', '', 'admin', '0', '0', '0', 'admin'),
(2, 'user', '', '', '', 'user', '0', '0', '0', 'user');

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
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nav_bar`
--
ALTER TABLE `nav_bar`
  MODIFY `navBar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`fk_orderId`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`fk_productId`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_categoryId`) REFERENCES `categories` (`category_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
