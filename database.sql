-- Active: 1713169372026@@127.0.0.1@3306@straszik

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

-- TRUNCATE TABLE album;

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

CREATE TABLE `form` (
    `id` INT PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `firstname` VARCHAR(100) NOT NULL, `email` VARCHAR(100), `particulier` BOOLEAN NULL, `professionnel` BOOLEAN NULL, `message` TEXT NOT NULL
);

CREATE TABLE `article` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, `name` VARCHAR(250) NOT NULL, `price` FLOAT NOT NULL, `description` TEXT NULL, category_id INT NOT NULL REFERENCES `category_article` (id), `img_name` VARCHAR(250) NOT NULL
);

-- DROP TABLE article;

-- TRUNCATE TABLE article;

INSERT INTO
    `article` (
        `name`, `price`, `description`, `category_id`, `img_name`
    )
VALUES (
        'T-Shirt Homme', '19.99', '', 1, 'tshirt_homme-noir'
    ),
    (
        'Sweat Shirt', '39.99', '', 4, 'sweat-noir'
    ),
    (
        'Casquette', '24.99', '', 5, 'casquette-noir'
    ),
    (
        'Grinder Multi', '15', '', 7, 'grinder'
    ),
    (
        'Briquet RESOW', '5.20', '', 6, 'briquet'
    );

CREATE TABLE `category_article` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, `name` VARCHAR(250) NOT NULL
);

-- DROP TABLE `category_article`;

INSERT INTO
    `category_article` (`name`)
VALUES ('tshirt_homme'),
    ('tshirt_femme'),
    ('shirt_femme'),
    ('sweat'),
    ('casquette'),
    ('briquet'),
    ('other');

-- table user --
-- DROP TABLE `user`;

CREATE TABLE `user` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, `firstname` VARCHAR(50) NOT NULL, `lastname` VARCHAR(50) NOT NULL, `password` VARCHAR(255) NOT NULL, `email` VARCHAR(100) NOT NULL, `address` VARCHAR(255) NULL, `address2` VARCHAR(255) NULL, `zip_code` INT NULL, `pays` VARCHAR(60) NULL, `phone` INT NULL, `
is_newsletter` BOOL NULL, `is_admin` BOOL NULL
);

-- contenu de la table user --
INSERT INTO 
    `user` (
        `firstname`, `lastname`, `password`, `email`, `is_admin`
    )
VALUES (
        'Admin', 'Niko', '$2y$10$vE9qkXOsLHJQpYbTpkylvuJYaaX1xEOF0LHcr26gvFj0CzOceEe0m', 'admin@niko.fr', 1
    ),
    (
        'Admin', 'Julien', '$2y$10$vE9qkXOsLHJQpYbTpkylvuJYaaX1xEOF0LHcr26gvFj0CzOceEe0m', 'admin@julien.fr', 1
    ),
    (
        'Admin', 'Matthieu', '$2y$10$vE9qkXOsLHJQpYbTpkylvuJYaaX1xEOF0LHcr26gvFj0CzOceEe0m', 'admin@matthieu.fr', 1
    ),
    (
        'Admin', 'Anae', '$2y$10$vE9qkXOsLHJQpYbTpkylvuJYaaX1xEOF0LHcr26gvFj0CzOceEe0m', 'admin@anae.fr', 1
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
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL, `city` VARCHAR(100) NOT NULL, `place` VARCHAR(100) NOT NULL, `date` VARCHAR(100) NOT NULL, `isSoldout` BOOL NOT NULL
);

-- TRUNCATE TABLE `events`;

INSERT INTO
    `events` (
        `city`, `place`, `date`, `isSoldout`
    )
VALUES (
        'EVREUX', 'Le Kubb', '2024-04-27', false
    ),
    (
        'LILLE', 'Le Bidule', '2024-07-25', true
    ),
    (
        'PARIS', 'La Maroquinerie', '2024-05-18', false
    ),
    (
        'STRASBOURG', 'La Laiterie', '2024-06-08', false
    ),
    (
        'LYON', 'Le Farmer', '2024-08-17', false
    ),
    (
        'MARSEILLE', 'La Magalone', '2024-08-31', false
    ),
    (
        'NICE', 'Palais Nkaïa', '2024-09-07', false
    ),
    (
        'BORDEAUX', 'Arkea Arena', '2024-09-21', true
    ),
    (
        'NANTES', 'Warehouse', '2024-10-05', false
    );

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;