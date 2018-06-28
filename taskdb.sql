-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 28 juin 2018 à 14:27
-- Version du serveur :  10.2.14-MariaDB
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taskdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(1024) DEFAULT current_timestamp(),
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `price`) VALUES
(1, 'POMME', 'George Genereux, nÃ© le 1er mars 1935 Ã  Saskatoon et mort le 10 avril 1989 dans la mÃªme ville, est un tireur sportif canadien.', 1),
(2, 'POIRE', 'Dans un processeur d\'ordinateur, l\'indicateur de dÃ©bordement (parfois notÃ© V) est gÃ©nÃ©ralement un bit du registre d\'Ã©tat indiquant qu\'un dÃ©bordement arithmÃ©tique a eu lieu lors d\'une opÃ©ration, ce qui implique que le rÃ©sultat signÃ© d\'un complÃ©ment Ã  deux ne rentrera pas dans le nombre de bits (la largeur) de l\'UAL. Certaines architectures peuvent Ãªtre configurÃ©es pour gÃ©nÃ©rer automatiquement une exception quand une opÃ©ration entraÃ®ne un dÃ©bordement.\n\nGrossiÃ¨rement, l\'indicateur de dÃ©bordement pourrait Ãªtre considÃ©rÃ© comme une sorte de complÃ©ment Ã  deux de l\'indicateur de retenue, mais l\'utilisation typique est trÃ¨s diffÃ©rente.', 2),
(3, 'BANANE', 'LÃ©o Missir, nÃ© le 30 avril 1925 et mort le 10 octobre 2009, est un compositeur qui fut directeur artistique chez Barclay. Il a notamment composÃ© pour Leny Escudero, puis a Ã©tÃ© producteur de Daniel Balavoine. Il a par ailleurs Ã©tÃ© le dÃ©couvreur de Nicoletta. Il cesse sa carriÃ¨re en 1986, Ã  la suite du dÃ©cÃ¨s de Daniel Balavoine. En 1994 il reprend son rÃ´le de producteur, sous le label de Warner Chapelle Music il produit Dominic Lescure.', 3.4),
(4, 'TOMATE', 'Collegiate est un film amÃ©ricain rÃ©alisÃ© par Ralph Murphy, sorti en 1936.', 1.2),
(5, 'PATATE', 'Les championnats d\'Europe de beach tennis 2014, septiÃ¨me Ã©dition des championnats d\'Europe de beach tennis, ont eu lieu du 8 au 10 aoÃ»t 2014 Ã  Brighton, au Royaume-Uni. Le double masculin est remportÃ© par les Italiens Alessandro Calbucci et Marco Garavini, le double fÃ©minin par les Italiennes Eva D\'Elia et Veronica Visani et le double mixte par les Italiens Luca Cramarossa et Eva D\'Elia.', 0.6),
(6, 'NAVET', 'Ricengo est une commune italienne de la province de CrÃ©mone dans la rÃ©gion Lombardie en Italie.', 0.8),
(7, 'POIREAU', 'Hercule Poirot est un dÃ©tective belge de fiction crÃ©Ã© par la romanciÃ¨re anglaise Agatha Christie. Avec Miss Marple, c\'est l\'un des personnages les plus cÃ©lÃ¨bres de la romanciÃ¨re, apparaissant dans 33 romans et 51 nouvelles, publiÃ©s entre 1920 et 1975.\n\nPoirot a Ã©tÃ© incarnÃ© sur le grand et le petit Ã©cran par diffÃ©rents acteurs, dont Albert Finney, Peter Ustinov, Ian Holm, Tony Randall, Alfred Molina, David Suchet et, en 2017, par Kenneth Branagh. Ã€ la radio, dans les Â« dramatiques Â» de BBC Radio 4, son rÃ´le a Ã©tÃ© principalement jouÃ© par John Moffatt.', 1.2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
