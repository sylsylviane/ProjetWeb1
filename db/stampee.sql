CREATE SCHEMA IF NOT EXISTS `stampee` DEFAULT CHARACTER SET utf8;
USE `stampee`;

CREATE TABLE IF NOT EXISTS `timbre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `date` DATE NULL,
  `tirage` INT NULL,
  `dimension` VARCHAR(50) NULL,
  `certification` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `couleur_id` VARCHAR(45) NULL,
  `pays_id` INT NOT NULL,
  `condition_id` INT NOT NULL,
  `membre_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pays_id`) REFERENCES `pays`(`id`),
  FOREIGN KEY (`condition_id`) REFERENCES `condition`(`id`),
  FOREIGN KEY (`membre_id`) REFERENCES `membre`(`id`),
  FOREIGN KEY (`couleur_id`) REFERENCES `couleur`(`id`)

);


CREATE TABLE IF NOT EXISTS `enchere` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `date_debut` DATE NOT NULL,
  `date_fin` DATE NOT NULL,
  `prix_plancher` REAL NOT NULL,
  `coup_de_coeur` VARCHAR(45) NULL,
  `timbre_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`timbre_id`) REFERENCES timbre(`id`)
);

CREATE TABLE IF NOT EXISTS `membre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(45) NOT NULL,
  `nom_famille` VARCHAR(45) NOT NULL,
  `nom_utilisateur` VARCHAR(100) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `courriel` VARCHAR(100) NOT NULL,
  `telephone` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  `code_postal` VARCHAR(45) NOT NULL,
  `ville` INT NOT NULL,
  `province` INT NOT NULL,
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
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `montant` REAL NOT NULL,
  `membre_id` INT NOT NULL,
  `enchere_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`membre_id`) REFERENCES membre(`id`),
  FOREIGN KEY (`enchere_id`) REFERENCES enchere(`id`)
);

CREATE TABLE IF NOT EXISTS `image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `image_princ` VARCHAR(100),
  `image_url` VARCHAR(100),
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

CREATE TABLE IF NOT EXISTS `couleur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO pays (id, nom) VALUES
(1, 'Afghanistan'),
(2, 'Albanie'),
(3, 'Algérie'),
(4, 'Andorre'),
(5, 'Angola'),
(6, 'Antigua-et-Barbuda'),
(7, 'Argentine'),
(8, 'Arménie'),
(9, 'Australie'),
(10, 'Autriche'),
(11, 'Azerbaïdjan'),
(12, 'Bahamas'),
(13, 'Bahreïn'),
(14, 'Bangladesh'),
(15, 'Barbade'),
(16, 'Biélorussie'),
(17, 'Belgique'),
(18, 'Belize'),
(19, 'Bénin'),
(20, 'Bhoutan'),
(21, 'Bolivie'),
(22, 'Bosnie-Herzégovine'),
(23, 'Botswana'),
(24, 'Brésil'),
(25, 'Brunei'),
(26, 'Bulgarie'),
(27, 'Burkina Faso'),
(28, 'Burundi'),
(29, 'Cambodge'),
(30, 'Cameroun'),
(31, 'Canada'),
(32, 'Cap-Vert'),
(33, 'République centrafricaine'),
(34, 'Tchad'),
(35, 'Chili'),
(36, 'Chine'),
(37, 'Colombie'),
(38, 'Comores'),
(39, 'Congo-Brazzaville'),
(40, 'République du Congo'),
(41, 'Costa Rica'),
(42, 'Croatie'),
(43, 'Cuba'),
(44, 'Chypre'),
(45, 'République tchèque'),
(46, 'Danemark'),
(47, 'Djibouti'),
(48, 'Dominique'),
(49, 'République dominicaine'),
(50, 'Équateur'),
(51, 'Égypte'),
(52, 'Salvador'),
(53, 'Guinée équatoriale'),
(54, 'Érythrée'),
(55, 'Estonie'),
(56, 'Eswatini'),
(57, 'Éthiopie'),
(58, 'Fidji'),
(59, 'Finlande'),
(60, 'France'),
(61, 'Gabon'),
(62, 'Gambie'),
(63, 'Géorgie'),
(64, 'Allemagne'),
(65, 'Ghana'),
(66, 'Grèce'),
(67, 'Grenade'),
(68, 'Guatemala'),
(69, 'Guinée'),
(70, 'Guinée-Bissau'),
(71, 'Guyana'),
(72, 'Haïti'),
(73, 'Honduras'),
(74, 'Hongrie'),
(75, 'Islande'),
(76, 'Inde'),
(77, 'Indonésie'),
(78, 'Iran'),
(79, 'Irak'),
(80, 'Irlande'),
(81, 'Israël'),
(82, 'Italie'),
(83, 'Jamaïque'),
(84, 'Japon'),
(85, 'Jordanie'),
(86, 'Kazakhstan'),
(87, 'Kenya'),
(88, 'Kiribati'),
(89, 'Corée du Nord'),
(90, 'Corée du Sud'),
(91, 'Koweït'),
(92, 'Kirghizistan'),
(93, 'Laos'),
(94, 'Lettonie'),
(95, 'Liban'),
(96, 'Lesotho'),
(97, 'Libéria'),
(98, 'Libye'),
(99, 'Liechtenstein'),
(100, 'Lituanie'),
(101, 'Luxembourg'),
(102, 'Madagascar'),
(103, 'Malawi'),
(104, 'Malaisie'),
(105, 'Maldives'),
(106, 'Mali'),
(107, 'Malte'),
(108, 'Îles Marshall'),
(109, 'Mauritanie'),
(110, 'Maurice'),
(111, 'Mexique'),
(112, 'Micronésie'),
(113, 'Moldavie'),
(114, 'Monaco'),
(115, 'Mongolie'),
(116, 'Monténégro'),
(117, 'Maroc'),
(118, 'Mozambique'),
(119, 'Myanmar (Birmanie)'),
(120, 'Namibie'),
(121, 'Nauru'),
(122, 'Népal'),
(123, 'Pays-Bas'),
(124, 'Nouvelle-Zélande'),
(125, 'Nicaragua'),
(126, 'Niger'),
(127, 'Nigeria'),
(128, 'Macédoine du Nord'),
(129, 'Norvège'),
(130, 'Oman'),
(131, 'Pakistan'),
(132, 'Palau'),
(133, 'Palestine'),
(134, 'Panama'),
(135, 'Papouasie-Nouvelle-Guinée'),
(136, 'Paraguay'),
(137, 'Pérou'),
(138, 'Philippines'),
(139, 'Pologne'),
(140, 'Portugal'),
(141, 'Qatar'),
(142, 'Roumanie'),
(143, 'Russie'),
(144, 'Rwanda'),
(145, 'Saint-Kitts-et-Nevis'),
(146, 'Sainte-Lucie'),
(147, 'Saint-Vincent-et-les-Grenadines'),
(148, 'Samoa'),
(149, 'Saint-Marin'),
(150, 'Sao Tomé-et-Principe'),
(151, 'Arabie Saoudite'),
(152, 'Sénégal'),
(153, 'Serbie'),
(154, 'Seychelles'),
(155, 'Sierra Leone'),
(156, 'Singapour'),
(157, 'Slovaquie'),
(158, 'Slovénie'),
(159, 'Îles Salomon'),
(160, 'Somalie'),
(161, 'Afrique du Sud'),
(162, 'Espagne'),
(163, 'Sri Lanka'),
(164, 'Soudan'),
(165, 'Soudan du Sud'),
(166, 'Suriname'),
(167, 'Suède'),
(168, 'Suisse'),
(169, 'Syrie'),
(170, 'Taïwan'),
(171, 'Tadjikistan'),
(172, 'Tanzanie'),
(173, 'Thaïlande'),
(174, 'Timor oriental'),
(175, 'Togo'),
(176, 'Tonga'),
(177, 'Trinité-et-Tobago'),
(178, 'Tunisie'),
(179, 'Turquie'),
(180, 'Turkménistan'),
(181, 'Tuvalu'),
(182, 'Ouganda'),
(183, 'Ukraine'),
(184, 'Émirats Arabes Unis'),
(185, 'Royaume-Uni'),
(186, 'États-Unis'),
(187, 'Uruguay'),
(188, 'Ouzbékistan'),
(189, 'Vanuatu'),
(190, 'Vatican'),
(191, 'Venezuela'),
(192, 'Vietnam'),
(193, 'Yémen'),
(194, 'Zambie'),
(195, 'Zimbabwe');


