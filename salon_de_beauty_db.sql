-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 déc. 2025 à 15:25
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `salon_de_beauty_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `date_rdv` date DEFAULT NULL,
  `heure` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `nom`, `telephone`, `service`, `date_rdv`, `heure`) VALUES
(1, 'malaklatreche', '098765434567', 'Maquillage', '2025-12-14', '23:35:00'),
(2, 'amanii', '234567890', 'Soins', '2025-12-27', '00:29:00'),
(3, 'amanii', '234567890', 'Soins', '2025-12-27', '00:29:00'),
(4, 'sdftzuiokjh', '3456789876', 'Coiffure', '2025-12-22', '00:32:00'),
(5, 'mayar', '2345678987', 'Maquillage', '2025-12-24', '01:05:00'),
(6, 'sara', '2345678890', 'Maquillage', '2025-12-24', '01:25:00'),
(7, 'yasmmine', '34567898765', 'Maquillage', '2025-12-25', '12:51:00');



CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `services` (`id`, `name`, `image`) VALUES
(1, 'Coiffure', 'https://images.unsplash.com/photo-1560066984-138dadb4c035'),
(2, 'Maquillage', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e'),
(3, 'Soins', 'https://images.unsplash.com/photo-1515377905703-c4788e51af15');

-- --------------------------------------------------------

CREATE TABLE `service_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `service_details` (`id`, `service_id`, `title`, `price`, `duration`) VALUES
(1, 1, 'Brushing (Blowout)', 1500.00, 45),
(2, 1, 'Lissage', 4000.00, 120),
(3, 1, 'Coiffure mariage', 8000.00, 180),
(4, 2, 'Maquillage simple', 2000.00, 40),
(5, 2, 'Maquillage soirée', 3500.00, 60),
(6, 2, 'Maquillage mariée', 7000.00, 120),
(7, 3, 'Soin visage', 2500.00, 60),
(8, 3, 'Nettoyage de peau', 3000.00, 75),
(9, 3, 'Masque hydratant', 1800.00, 30);



--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `service_details`
  ADD CONSTRAINT `service_details_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
