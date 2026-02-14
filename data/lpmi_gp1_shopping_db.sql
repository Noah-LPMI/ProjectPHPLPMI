-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 fév. 2026 à 12:33
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
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `order_status` enum('not_payed','payed','shipped','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `fk_userId`, `total_amount`, `creation_date`, `order_status`) VALUES
(2, 7, 70, '2026-02-13 23:21:52', 'not_payed'),
(6, 7, 140, '2026-02-14 00:07:38', 'not_payed'),
(7, 7, 70, '2026-02-14 00:08:31', 'not_payed'),
(8, 7, 25, '2026-02-14 00:23:27', 'not_payed'),
(9, 7, 21, '2026-02-14 00:24:27', 'not_payed'),
(10, 7, 15, '2026-02-14 00:25:48', 'not_payed'),
(11, 8, 10, '2026-02-14 11:16:15', 'not_payed'),
(12, 8, 50, '2026-02-14 11:19:43', 'not_payed'),
(13, 8, 65, '2026-02-14 11:22:16', 'not_payed'),
(14, 8, 49, '2026-02-14 11:23:50', 'not_payed'),
(15, 8, 50, '2026-02-14 11:24:49', 'not_payed'),
(16, 8, 283, '2026-02-14 12:32:49', 'not_payed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_userId` (`fk_userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
