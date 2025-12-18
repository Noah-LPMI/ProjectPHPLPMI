-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 déc. 2025 à 13:42
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shoping`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'DVD'),
(2, 'Bluray'),
(3, '4K'),
(4, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  `nom` text NOT NULL,
  `filtre` text NOT NULL,
  `ordre` int NOT NULL,
  `adminOnly` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `lien`, `nom`, `filtre`, `ordre`, `adminOnly`) VALUES
(2, 'listeProduit_c.php', 'DVD', 'filtre=dvd', 3, 1),
(3, 'listeProduit_c.php', 'Bluray', 'filtre=bluray', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `categorie_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `description`, `categorie_id`) VALUES
(1, 'The Dark Knight : Le Chevalier noir', 10, 'Batman est plus que jamais determine a eradiquer le crime organise qui seme la terreur en ville. Epaule par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d\'action s\'elargir.', 1),
(2, 'Retour vers le futur', 40, 'Le jeune Marty McFly mene une existence anonyme, aupres de sa petite amie Jennifer, seulement troublee par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycee. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne tester sa nouvelle experience : le voyage dans le temps\n', 2),
(3, 'Voyage au centre de la Terre', 25, 'Au cours d\'une expedition en Islande, un sismologue et son neveu, fils d\'un scientifique decede 10 ans plus tot, se retrouvent enfermes dans une grotte en compagnie de leur guide.\n', 1),
(4, 'Indiana Jones et le Temple maudit', 24, 'A Shanghai, Indiana Jones se trouve mele a un reglement de compte entre gangsters qui se disputent un bijou. Avec le jeune chinois Demi-Lune et de la chanteuse Willie Scott, Indiana fuit a bord d\'un avion de fortune. Ils atterrissent en plein coeur de l\'Inde ou ils decouvrent une population miserable depuis le vol d\'une pierre sacree dotee de pouvoirs.\n', 3),
(5, 'Le Dernier Maître de l\'air', 15, 'Les quatre nations de l\'air, de l\'eau de la terre et du feu vivaient en harmonie jusqu\'a ce que la nation du feu declare la guerre. Un siecle plus tard, aucune perspective de paix n\'est en vue. Alors Aang, un avatar decouvre qu\'il a le pouvoir de controler les quatre elements.\n', 3),
(6, 'Shaolin Soccer', 21, 'Un entraineur de foot offre un million de dollars a un maitre du kung-fu (Stephen Chow) et ses ex-compagnons de classe afin de les persuader de former une equipe.\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `mdp` text NOT NULL,
  `profil` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mdp`, `profil`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
