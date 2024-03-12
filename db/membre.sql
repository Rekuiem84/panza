-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 12 mars 2024 à 10:59
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `panza`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `prenom`, `nom`, `email`, `mot_de_passe`, `photo`, `is_admin`) VALUES
(1, 'Jean Michel', 'Patron', 'jean-michel-patron@panza.fr', '60c45001909a1cad45cfd44c57201073c36f6cb1', 'path/vers/l_image', 1),
(2, 'Randi', 'Pescott', 'rpescott0@jiathis.com', '60c45001909a1cad45cfd44c57201073c36f6cb1', 'de46e49f19d88dda52aa8675e42efe12afbfced5', 0),
(3, 'Gae', 'Dornan', 'gdornan1@cloudflare.com', '99bbe929c1684010fa0df894120201a9496f9d68', 'c48d836f10a578c11810c6a1c3c9c4e1aa88b028', 0),
(4, 'Mead', 'Collingworth', 'mcollingworth2@redcross.org', 'ed35da75fe821d5830f546909566f5d9bd8a0720', '096a26d229f58d821939f983e32162b0b53678bf', 0),
(5, 'Charleen', 'Cubbit', 'ccubbit3@nasa.gov', 'f89a40225bf26cb32458730b2aba24f60e7f1eb7', 'ecc628fd3df230fa45b0b1e97f43d9b1e3546cdf', 0),
(6, 'Blinni', 'Harse', 'bharse4@ehow.com', 'c7e338288ab6266144fa7bf5dced3a5f5e42eda6', 'd19e309f64c37cf1783ce22f6fb03ee5bf912b1b', 0),
(7, 'Bobina', 'Niemetz', 'bniemetz5@ucoz.ru', 'b804dcc2c0831882978ad6cf06c321a977c5b3bb', 'bdc9f325e351f0af696c6662e575ed2f8e648dfc', 0),
(8, 'Lyda', 'Cartin', 'lcartin6@facebook.com', 'fcb366f7235f34144dad5d423f817b6572557243', 'd301038ad70789267adcf0b07cc1ce696c3ad0e8', 1),
(9, 'Golda', 'Chettle', 'gchettle7@twitpic.com', '890cbc90659d75774d948c2803bf48115b3af923', '457fbedd7a0646cd49f18da7afcf850f5b7382a9', 0),
(10, 'Ardella', 'Eddisforth', 'aeddisforth8@wp.com', '5cff5609f471a3a373a02b5332d28b87e9a61f72', '6acf9e3394259788e4a0fce6efd03dc5a5892d32', 1),
(11, 'Travis', 'Von Hindenburg', 'tvonhindenburg9@stumbleupon.com', '650241ab4140bfb7bce6271511c28fee5837b304', 'a1d52f6387f6952a154308b0f23b8b7124846e86', 1),
(12, 'Maurie', 'Paybody', 'mpaybodya@pcworld.com', '9833d24d31a20df528d4b101f0b39d818393beea', '9cfb5c665821e11e77641b74ca2c6a608c7daf0f', 1),
(13, 'Calvin', 'Peddersen', 'cpeddersenb@myspace.com', '73a4c9d287d7a014bfbfb083c0ca3b461da0182e', '27bc9183f35ea8d56bd1751f30303d0c610e2348', 1),
(14, 'Maryrose', 'Duchart', 'mduchartc@facebook.com', '47c53bdd00563fe85f00a8386697f3ba992cb123', '0d40fd7a9f4fc8e2bb0910b89b45ad7750a508f0', 0),
(15, 'Ashley', 'Earingey', 'aearingeyd@mlb.com', '371207e4a2f6ca6b791e60c0975e0b24bf738439', '0a96d60f0907376829e60f84159820ae0caa0efb', 0),
(16, 'Gillie', 'Entwisle', 'gentwislee@businessinsider.com', '4b60bebe2dbc5086c6db146663d8c9fd53bc7cb9', 'c027be685b7c88dab97976da05ba87a16c80973c', 0),
(17, 'Chandler', 'Teligin', 'cteliginf@tmall.com', 'c067304d588e1a5ad408251825400de11038a3c8', 'd8c0c9baff9d42ed0cb09a41bc809f4d5d4ec33a', 1),
(18, 'Meta', 'Chelnam', 'mchelnamg@youtu.be', 'af829a0a6bee27a6fe6161d2e51a463d5a168d64', 'b58b3699a264210953a0e40130dd1d8006aa4f90', 1),
(19, 'Jarid', 'Horlick', 'jhorlickh@histats.com', '6b5ab2f3c2204a715549162aeb73dbc8d2948b3f', '076325d739df73b1f03bdf17ea1b35beba1feee4', 1),
(20, 'Aloysia', 'Meeny', 'ameenyi@hhs.gov', '982b80a4cf25a4dd74da39a664b42719afc23c45', '04e5dec017c548deb696d1167f1b71ef5d785aa7', 0),
(21, 'Gabriel', 'Deluze', 'gdeluzej@bloglines.com', '874e96125fd9795211c76036b353d8f55748090c', '5a2ab6fc06d6fc8fc0a63f0a55b252796ecb77b7', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
