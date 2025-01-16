CREATE SCHEMA IF NOT EXISTS `stampee` DEFAULT CHARACTER SET utf8;
USE `stampee`;

CREATE TABLE IF NOT EXISTS `timbre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `date` DATE NULL,
  `tirage` VARCHAR(45) NULL,
  `dimension` VARCHAR(45) NULL,
  `certification` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `couleur` VARCHAR(45) NULL,
  `pays_id` INT NOT NULL,
  `condition_id` INT NOT NULL,
  `membre_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pays_id`) REFERENCES `pays`(`id`),
  FOREIGN KEY (`condition_id`) REFERENCES `condition`(`id`),
  FOREIGN KEY (`membre_id`) REFERENCES `membre`(`id`)
);


CREATE TABLE IF NOT EXISTS `enchere` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `periode` DATE NOT NULL,
  `prix_plancher` REAL NOT NULL,
  `coup_de_coeur` VARCHAR(45) NULL,
  `timbre_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`timbre_id`) REFERENCES timbre(`id`)
);

CREATE TABLE IF NOT EXISTS `membre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `nom_utilisateur` VARCHAR(45) NOT NULL,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `courriel` VARCHAR(100) NOT NULL,
  `telephone` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  `code_postal` VARCHAR(45) NOT NULL,
  `ville_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ville_id`) REFERENCES ville(`id`)
);

CREATE TABLE IF NOT EXISTS `ville` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `pays_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pays_id`) REFERENCES pays(`id`)
);

CREATE TABLE IF NOT EXISTS `pays` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `mise` (
  `date` DATE NOT NULL,
  `montant` REAL NOT NULL,
  `membre_id` INT NOT NULL,
  `enchere_id` INT NOT NULL,
  PRIMARY KEY (`membre_id`, `enchere_id`),
  FOREIGN KEY (`membre_id`) REFERENCES membre(`id`),
  FOREIGN KEY (`enchere_id`) REFERENCES enchere(`id`)
);

CREATE TABLE IF NOT EXISTS `image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `image_url` VARCHAR(100) NOT NULL,
  `timbre_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`timbre_id`) REFERENCES timbre(`id`)
);

CREATE TABLE IF NOT EXISTS `favori` (
  `enchere_id` INT,
  `membre_id` INT,
  `date_ajout` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enchere_id`, `membre_id`),
  FOREIGN KEY (`enchere_id`) REFERENCES enchere(`id`),
  FOREIGN KEY (`membre_id`) REFERENCES membre(`id`)
);

CREATE TABLE IF NOT EXISTS `condition` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
);
