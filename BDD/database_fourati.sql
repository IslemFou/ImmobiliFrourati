-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 11 avr. 2025 à 14:45
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_evaluation_fourati`
--
CREATE DATABASE IF NOT EXISTS `php_evaluation_fourati` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_evaluation_fourati`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id_advert` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `postal_code` int NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('location','vente') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int NOT NULL,
  `reservation_message` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id_advert`, `photo`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'prise-vue-contre-plongee-facade-immeuble-moderne-blanc-sous-ciel-bleu-clair_181624-48219.jpg', 'Appartement de 3 chambres', 'okfvperkeprokt rpoijvrpreijerij', 75010, 'Paris', 'vente', 600, 'l;ml;mefùemù'),
(2, 'restructuration-loft-industriel.jpg', 'Loft à vendre', 'Loft à vendre 50m2', 75010, 'Paris', 'vente', 250000, NULL),
(3, 'rome-4973500_1280.jpg', 'Villa à ROME', 'Villa a ROME très intéressante à prix cassée', 54101, 'rome', 'vente', 800000, NULL),
(4, 'salle-manger-salon-moderne-au-rendu-3d-decor-luxe-canape-vert_105762-2140.jpg', 'Appartement S + 4', 'xt ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c', 75019, 'Paris', 'location', 250000, 'Je souhaite savoir plus'),
(5, 'sitting-room-2037945_1280.jpg', 'Appartement S+2', 'and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheet', 75019, 'DDDD', 'location', 600, NULL),
(6, 'winter-7689873_1280.jpg', 'Maison de vacances à louer', 'since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 75010, 'Paris', 'vente', 120, NULL),
(7, 'istockphoto-1304919673-612x612.jpg', 'Bien à louer', 'as roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, loo', 75010, 'Paris', 'location', 600, NULL),
(8, 'living-room-6676758_1280.jpg', 'Appartement Haute Standing', 'type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letra', 75010, 'Paris', 'location', 250000, NULL),
(9, 'Kocher-Cuisine-6.jpg', 'Appart&amp;#039;Hotel', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75002, 'Paris', 'location', 500, NULL),
(10, 'petite-entree-style-moderne_23-2150713069.jpg', 'Appartement intéressante', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75012, 'Paris', 'location', 500, NULL),
(11, 'architecture-appartement-moderne_1268-14696.jpg', 'Appat&amp;#039;home s+2', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75003, 'Paris', 'location', 700, NULL),
(12, 'design-industriel-loft-de-ville.jpg', 'Loft de ville Studio', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75008, 'Paris', 'location', 1200, NULL),
(13, 'paris-4154449_1280.jpg', 'Appartement Parisienne', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75004, 'Paris', 'location', 700, NULL),
(14, 'home-5835289_1280.jpg', 'Chambre à louer', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75001, 'Paris', 'location', 700, NULL),
(15, 'loft-3533980_1280.jpg', 'Appart&amp;#039;hotel studio', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75012, 'Paris', 'location', 600, NULL),
(16, 'home-5835289_1280.jpg', 'Maison de vacance', 'oots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the', 75002, 'Paris', 'location', 700, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id_advert`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id_advert` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
