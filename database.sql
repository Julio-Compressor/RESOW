-- Active: 1711385285915@@127.0.0.1@3306@straszik
-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--
CREATE TABLE `album` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, `title` VARCHAR(250) NOT NULL, `type` VARCHAR(250) NOT NULL, `nb_track` INT NOT NULL, `price` FLOAT NOT NULL, `date` DATE NOT NULL, `description` TEXT NULL
);

TRUNCATE TABLE album;

INSERT INTO
    `album` (
        `title`, `type`, `nb_track`, `price`, `date`, `description`
    )
VALUES (
        'Two Years Overdue', 'Vinyle Black', '5', '29.99', '2023-04-03', 'Standart Edition'
    ),
    (
        'Two Years Overdue', 'Vinyle Silver', '5', '35', '2023-04-03', 'Bonus 3 B-side tracks'
    ),
    (
        'Two Years Overdue', 'Vinyle Gold', '5', '49.99', '2023-04-03', 'LIMITED + 3 B-side tracks'
    ),
    (
        'Two Years Overdue', 'CD', '5', '14.99', '2023-04-03', 'Standart Edition '
    ),
    (
        'Two Years Overdue', 'Demat\'', '5', '19.99', '2023-04-03', 'Format WAV & FLAC'
    );

CREATE TABLE `item` (
    `id` int(11) UNSIGNED NOT NULL, `title` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Contenu de la table `item`
--

INSERT INTO
    `item` (`id`, `title`)
VALUES (1, 'Stuff'),
    (2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;

--
-- Structure de la table `onTour`
--
CREATE TABLE `events` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `city` VARCHAR(100) NOT NULL, `place` VARCHAR(100) NOT NULL, `date` DATE NOT NULL, `isSoldout` BOOL NOT NULL
);

TRUNCATE TABLE `events`;

INSERT INTO
    `events` (
        `city`, `place`, `date`, `isSoldout`
    )
VALUES (
        'EVREUX', 'Le Kubb', '2024-04-29', false
    ),
    (
        'PARIS', 'La Maroquinerie', '2024-05-18', false
    ),
    (
        'LYON', 'La Machine', '2024-06-09', false
    ),
    (
        'LILLE', 'Le Bidule', '2024-07-25', true
    ),
    (
        'STRASBOURG', 'La Laiterie', '2024-08-14', false
    ),
    (
        'MARSEILLE', 'La Magalone', '2024-09-10', false
    ),
    (
        'BORDEAUX', 'Arkea Arena', '2024-10-11', false
    );

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;