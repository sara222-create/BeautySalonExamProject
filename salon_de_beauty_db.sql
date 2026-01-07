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
(1, 'sara', '0612345687', 'Brushing', '2026-01-10', '10:00:00'),
(2, 'malak', '0711223344', 'Maquillage soirée', '2026-01-11', '18:00:00'),
(3, 'amina', '0556677889', 'Soin visage', '2026-01-12', '14:30:00'),
(4, 'farah', '0718445258', 'Maquillage simple', '2026-01-11', '09:30:00'),
(5, 'douaa', '0788551246', 'Masque hydratant', '2026-01-14', '11:00:00'),
(8, 'sara', '0612345687', 'Brushing', '2026-01-07', '18:28:00'),
(9, 'nihel', '0612345687', 'Maquillage soirée', '2026-01-08', '10:00:00'),
(10, 'sirine', '0633223232', 'Maquillage soirée', '2026-01-12', '14:00:00');



CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `services` (`id`, `name`, `image`) VALUES
(1, 'Coiffure', 'https://images.unsplash.com/photo-1560066984-138dadb4c035'),
(2, 'Maquillage', 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796'),
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
(1, 1, 'Brushing', 1500.00, 45),
(2, 1, 'Lissage', 3000.00, 120),
(3, 1, 'Coiffure mariage', 8000.00, 180),
(4, 2, 'Maquillage simple', 3500.00, 40),
(5, 2, 'Maquillage soirée', 5000.00, 60),
(6, 2, 'Maquillage mariée', 9000.00, 120),
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
