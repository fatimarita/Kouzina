-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 10:04
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogcuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `type_categories`) VALUES
(1, 'Recettes salées'),
(2, 'Recettes sucrées');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recette_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `stars` smallint(6) DEFAULT NULL,
  `nom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C89312FE9` (`recette_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `recette_id`, `content`, `created_at`, `stars`, `nom`, `prenom`) VALUES
(13, 3, 'bonne recette', NULL, NULL, 'fatima', 'F'),
(14, 10, 'bien', NULL, NULL, 'fatima', 'F');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recette_id` int(11) DEFAULT NULL,
  `comment_user_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `is_enabled` tinyint(1) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  KEY `IDX_957A647989312FE9` (`recette_id`),
  KEY `IDX_957A6479541DB185` (`comment_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `recette_id`, `comment_user_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `is_enabled`, `role`) VALUES
(2, NULL, NULL, 'fatima', 'fatima', 'fatima.elmajdoub@gmail.com', 'fatima.elmajdoub@gmail.com', 1, NULL, '$2y$13$sXy0WEhfFLEHVBbEhchyOOmfMXR2jy0MetUshb/VgEuSRmj3N0JVy', '2019-06-25 08:07:27', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', NULL, NULL),
(3, NULL, NULL, 'anwal', 'anwal', 'anwal.blog@gmail.com', 'anwal.blog@gmail.com', 1, NULL, '$2y$13$OXcTULjFTSYGoazaXLtaG.RKKCwP5.Hgg2N07ZC5Z.3YDXGiUguJi', '2019-06-20 17:50:06', NULL, NULL, 'a:0:{}', NULL, NULL),
(4, NULL, NULL, 'kamal', 'kamal', 'fatima.kamal@gmail.com', 'fatima.kamal@gmail.com', 1, NULL, '$2y$13$eQbR70HhC7zCfHNBwUp5q.qILQzTr0Oqxg18BS6EZnbT3z0lMKPvy', '2019-06-21 10:14:54', NULL, NULL, 'a:0:{}', NULL, NULL),
(5, NULL, NULL, 'yassine', 'yassine', 'yassine@gmail.com', 'yassine@gmail.com', 1, NULL, '$2y$13$6Wyt4iGDtkynA3Jpba1b1uBgZRI/Bterxprc0f.hLiHvzDMB12E96', '2019-06-22 13:25:15', NULL, NULL, 'a:0:{}', NULL, NULL),
(6, NULL, NULL, 'dshg', 'dshg', 'TES@fhd.cik', 'tes@fhd.cik', 1, NULL, '$2y$13$30mb7n30aP4WmHuN1EwXkehSLyQ4KfYp6.xunz8ZMBB2j/nVI71wu', '2019-06-22 13:42:41', NULL, NULL, 'a:0:{}', NULL, NULL),
(7, NULL, NULL, 'aqw', 'aqw', 'azert@gmail.com', 'azert@gmail.com', 1, NULL, '$2y$13$da05Jlm.fvxm1bngtPnhVu.Mu70GqnheMLLjnUFRQ3M9KO9cEwjV6', '2019-06-22 13:47:27', NULL, NULL, 'a:0:{}', NULL, NULL),
(8, NULL, NULL, 'asc', 'asc', 'aqwx@gmail.com', 'aqwx@gmail.com', 1, NULL, '$2y$13$NEoit./DMqmiLwW4/rXE7eqX0EvQ6jw/4yBdzakgGQNg58EiEefsu', '2019-06-22 14:00:53', NULL, NULL, 'a:0:{}', NULL, NULL),
(9, NULL, NULL, 'aaaaaa', 'aaaaaa', 'aaa@gmail.com', 'aaa@gmail.com', 1, NULL, '$2y$13$Eb2hRCwkr0bpAQB6ZbsYl.6bD3mvlRKIL8a5G03FVjuuISJmJk9IW', '2019-06-22 14:03:47', NULL, NULL, 'a:0:{}', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190607110230', '2019-06-07 15:47:47'),
('20190607154650', '2019-06-07 15:47:49'),
('20190613142952', '2019-06-13 14:30:10'),
('20190620134706', '2019-06-20 13:47:22'),
('20190620135029', '2019-06-20 13:50:37'),
('20190620141301', '2019-06-20 14:14:07');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `nb_views` int(11) NOT NULL,
  `image_src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `ingredients` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `preparation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuisson` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_49BB639012469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `title`, `content`, `created_at`, `nb_views`, `image_src`, `image_alt`, `updated_at`, `likes`, `category_id`, `ingredients`, `preparation`, `cuisson`) VALUES
(3, 'Brochettes de bœuf aux poivrons', 'Brochettes des bœuf qui feront mouche à tous les coups', '2019-06-03 10:00:00', 22, 'brochette viande.jpg', 'Brochettes de bœuf aux poivrons', '2019-06-25 10:02:29', 49, 1, '1 morceau de bœuf dans l\'onglet\r\n1 poivron rouge\r\n1 poivron vert\r\n1 pot de Mayonnaise\r\n1 pot de Moutarde Fine et Forte Amora\r\n1 gousse d\'ail\r\n1 oignon\r\n1 branche de thym\r\n1 c à s d\'huile d\'olive\r\nSel\r\nPoivre', 'Tailler la viande en gros cubes et les mettre dans un saladier.\r\nPeler, dégermer et écraser l\'ail. Dans un bol, mélanger l\'ail et la Moutarde Fine et Forte et un peu d\'huile d\'olive, sel et poivre.\r\nFaire mariner la viande dans cette préparation.\r\nCouvrir à l\'aide d\'un film alimentaire et placer au réfrigérateur pendant une matinée.\r\nMélanger dans un saladier les légumes coupés en petits morceaux avec le sel, poivre, huile d\'olive et thym.\r\nCouvrir à l\'aide d\'un film alimentaire et placer au réfrigérateur\r\nMonter les brochettes, en alternant viande et légumes (oignons et poivrons).', 'Les cuire sur la plancha ou au barbecue.\r\nDéguster avec une Mayonnaise.'),
(4, 'Burger maison', 'Dites stop aux burgers du fast-food et optez pour la version \"faite maison\"', '2019-06-03 10:00:00', 15, 'burger.png', 'Burger maison', '2019-06-25 08:23:41', 23, 1, 'Petits pains ronds au sésame  : 4  \r\nSteaks hachés de bœuf  : 4  \r\nOignon rouge  : 1  \r\nCheddar(ou fromage à burger)  : 4  tranches\r\nBelle tomate  : 1  \r\nquelques feuilles de roquette\r\nMayonnaise(ou sauce tartare)  : 4  cuil. à café\r\nFilet d’huile  : 1  \r\nSel\r\nPoivre', 'Pelez l’oignon rouge puis émincez-le. Rincez et essorez la roquette. Rincez la tomate puis coupez-la en rondelles.\r\nFaites chauffer l’huile dans une poêle et faites cuire les steaks 3 à 4 min de chaque côté, selon votre goût. En fin de cuisson, salez, poivrez, disposez 1 tranche de cheddar sur chaque steak et laissez-la légèrement fondre.', 'Fendez les petits pains en 2 et toastez-les légèrement. Montez les burgers : tartinez chaque moitié de pain de sauce puis garnissez avec la viande, les rondelles de tomate, l’oignon ciselé et les feuilles de roquette. Refermez les burgers et servez aussitôt.'),
(5, 'Gratin Dauphinois', 'Gratin délicieux et facile à faire', '2019-06-03 10:00:00', 16, 'gratin.jpg', 'gratin', '2019-06-25 09:51:37', 18, 1, '800 g pommes de terre\r\n1 gousse d’ail\r\n1/2 litre lait entier\r\n1/4 litre crème liquide entière\r\n1 noix de muscade\r\nsel, poivre\r\n1 noix de beurre', 'Pelez, lavez les pommes de terre, puis coupez-les en lamelles d\'environ 3 mm. Versez-les dans une casserole avec la tête d\'ail et les herbes. Salez, poivrez, ajoutez la muscade et mouillez avec le lait. Cuisez pendant 10 minutes sur feu moyen.\r\nFrottez le fond du plat avec une gousse d\'ail puis beurrez généreusement le plat à gratin.\r\nVérifiez la cuisson des pommes de terre à l\'aide d\'une pointe de couteau.\r\nDès qu\'elles sont cuites, égouttez-les, puis disposez-les dans le plat en couches uniformes.\r\nArrosez de crème liquide chaude.', 'Préchauffez le four à thermostat 6 (180°C).\r\n Laissez cuire une vingtaine de minutes au four pour obtenir un beau gratin. Vérifiez la cuisson des pommes de terre avec un couteau. Elles ne doivent pas opposer de résistance à la lame. Si nécessaire, prolongez la cuisson de 5 à 10 minutes.'),
(6, 'Pizza Végétarienne', 'Recette incontournable de pizza facile et rapide', '2019-01-01 00:00:00', 22, 'pizza.jpg', 'Pizza Végétarienne', '2019-06-25 09:37:33', 26, 1, 'Tomates cerise jaune\r\n1 tomates\r\n2 rondelles d\'ananas et du romarin et basilic\r\n1 oignon\r\n1/2 courgette\r\nSauce tomate nature\r\nMozzarella\r\n1 pâte à pizza', 'Étaler la pâte, y mettre un peu de sauce tomate. Mettre les herbes.\r\nDéposer les rondelles d\'oignon et de courgettes. Couper les tomates cerises en deux ainsi que la rouge. Rajouter des morceaux d\'ananas.', 'Temps de cuisson 20-25 min à thermostat 6. Cela dépend si vous l\'aimer bien colorée.'),
(7, 'Spaghettis boulettes de viande', 'Direction l’Italie pour ce plat de Spaghetti aux boulettes de viande et sauce tomate', '2019-06-01 10:00:00', 23, 'pate.jpg', 'Les spaghettis aux boulettes de viande', '2019-06-25 09:49:35', 28, 1, '400 g de spaghetti.\r\n450 g de viande de bœuf hachée.\r\n50 ml de lait.\r\n25 g de parmesan.\r\n25 g de chapelure.\r\n2 gousses d\'ail.\r\n1 c. à soupe de persil haché.', 'Pelez et hachez l’ail et l’oignon.\r\nMélangez tous les ingrédients dans un saladier : l’œuf, la chapelure, la viande, l’ail et l’oignon, le parmesan et le lait. Salez et poivrez.\r\nDans une grande sauteuse à bords hauts, faites chauffer l’huile d’olive. Déposez-y les boulettes de viande et laissez dorer quelques minutes sur toutes les faces. Retirez et réservez.\r\nFormez des boulettes de vos mains mouillées.', 'En fin de cuisson, faites cuire les spaghettis dans un grand volume d’eau bouillante salée. Servez par assiette avec une louche de sauce et de boulettes, puis saupoudrez de parmesan.'),
(8, 'Guacamole', 'Direction le Mexique avec cette délicieuse recette de Guacamole maison', '2019-06-03 10:00:00', 17, 'guacamole.jpg', 'Guacamole', '2019-06-25 09:38:37', 0, 1, '2 avocats\r\n2 tomates coupées en morceaux\r\n1/2 oignon coupée en cubes\r\nSel\r\n1/2 citron\r\nCoriandre\r\nSauce piquante', 'Enlevez la peau des avocats.\r\nEn vous aidant d\'une fourchette, écrasez les avocats.\r\nDans un plat, mélangez l\'avocat avec l\'oignon et en dernier les tomates.\r\nAjoutez le sel ainsi que du citron (et la sauce piquante).\r\nLe guacamole accompagne parfaitement chips, nachos ou biscuits salés.', 'pas de cuisson pour cette recette'),
(9, 'Baklava', 'Baklava, la douceur irrésistible par excellence, fruits secs, cannelle, fleur d\'oranger, miel, le tout dans un feuilletage croustillant à souhait...', '2019-06-01 00:00:00', 0, 'baklava.png', 'Baklava', '2019-06-25 09:58:31', 1, 2, 'Pour un plat à gratin rectangulaire de 25 x 30 cm:\r\n250 g de noix décortiquées\r\n125 g de pistaches émondées, non grillées\r\n150 g d\'amandes émondées\r\n100 g de sucre\r\n100 g de beurre + 50 g\r\n4 cuillères à soupe d\'eau de fleur d\'oranger\r\n200 g de miel liquide (type miel d\'acacia)\r\n15 feuilles de pâte filo\r\n1 cuillère à soupe de cannelle en poudre', 'Broyer les fruits secs au robot, sans les réduire en poudre, mais seulement en petits morceaux. Ajouter le sucre en poudre, 2 cuillères à soupe d\'eau de fleur d\'oranger et 100 g de beurre fondu.\r\nDécouper 5 feuilles de pâte filo aux dimensions du plat (conserver les autres dans un torchon humide pour ne pas qu\'elles se dessèchent pendant que vous travaillez). Beurrer les feuilles une par une, au pinceau, et les empiler au fond du moule. Verser la moitié du mélange de fruits secs. Mettre par dessus 5 autres feuilles, également beurrées, puis le reste de farce.', 'Préchauffer le four à 200°C\r\nFaire chauffer le miel et 2 cuillères à soupe de fleur d\'oranger dans une petite casserole. Verser le miel chaud en filet sur le baklava. Laisser refroidir et sécher au moins une journée entière avant de déguster.'),
(10, 'Brownies', 'Ma meilleure recette de brownies… Un goût chocolaté intense, qui rendent vos brownies super gourmands…', '2019-06-16 00:00:00', 0, 'brownie.jpg', 'Brownies', '2019-06-25 09:57:33', 0, 2, 'Chocolat noir 250 g.\r\nSucre 150 g.\r\nBeurre 150 g.\r\nSucre vanillé 1 sachet.\r\nFarine tamisée 60 g.\r\nOeuf 3.\r\nSel 1 pincée.', 'Faites fondre le beurre dans une petite casserole sur un feu très doux et cassez ensuite le chocolat noir dans un saladier. Laissez le fondre doucement au bain-marie.\r\nPlongez un pinceau dans le beurre fondu et badigeonnez votre moule à manqué. Préchauffez le four thermostat 6 (180°).\r\nMélangez le chocolat fondu avec le beurre. Hors du feu, ajoutez le sucre en poudre, le sucre vanillé puis les oeufs battus en omelette avec une petite pincée de sel. Ajoutez enfin la farine.', 'Versez dans le moule et enfournez pour 15 mn. Laissez reposer 5 mn dans le four éteint.\r\nLaissez refroidir environ 1/2 heure, puis mettez au réfrigérateur au moins 2 heures. Démoulez le gâteau et découpez le en parts individuelles.'),
(11, 'Croquants chocolat noisette', 'Je vous propose de faire un petit tour en Italie, en réalisant des biscuits croquants : des cantuccini au chocolat et à la noisette,', '2014-01-01 00:00:00', 0, 'biscuit-crochoco.jpg', 'Biscuits croquants au chocolat et à la noisette', '2019-06-25 09:50:50', 0, 2, '3 oeufs\r\n150 gr de sucre brun\r\n50 gr d\'huile d\'olive\r\n20 gr de beurre mou\r\n1 pincée de fleur de sel\r\n1 cuillère à café de bicarbonate de soude\r\n270 gr de farine\r\n75 gr de cacao en poudre\r\n1/2 cuillère à café d\'extrait de vanille\r\n230 gr de pépites de chocolat\r\n100 gr de noisettes', 'La préparation de la pâte à biscuits :\r\n- dans une poêle à sec, torréfier les noisettes, réserver ;\r\n- dans le bol d\'un robot (ou d\'un mixeur), mettre les oeufs avec le sucre brun ;\r\n- mélanger au fouet jusqu\'à blanchiment ;\r\n- ajouter l\'huile d\'olive, le beurre, l\'extrait de vanille, ainsi que la fleur de sel ;\r\n- fouetter ;\r\n- retirer le fouet et mettre la feuille pour mélanger la farine, le cacao en poudre, le bicarbonate de soude ;\r\n- incorporer les noisettes et les pépites de chocolat et bien mélanger.', 'La cuisson des biscuits :\r\n- préchauffer le four à 180°C ;\r\n- réaliser 2 boudins (bon courage !) sur une plaque de cuisson munie d\'un papier sulfurisé ;\r\n- enfourner 25 min à 180°C ;\r\n- sortir du four et laisser tiédir ;\r\n- couper des tranches de 7 mm d\'épaisseur ;\r\n- les disposer sur une plaque de cuisson munie d\'un papier sulfurisé ;\r\n- enfourner à nouveau 10 min à 180°C ;\r\n- laisser refroidir avant de déguster.'),
(12, 'Tarte aux pommes', 'Un classique qui a toujours beaucoup de succès… une tarte pommes amandes avec de gros morceaux de pommes', '2019-01-17 00:00:00', 0, 'tarte-pommes.jpg', 'Tarte aux pommes', '2019-06-25 09:06:11', 0, 2, '3 pommes (selon la grosseur)\r\n1 pâte brisée\r\n2 œufs\r\n25 cl de crème fraîche\r\n100 g de sucre en poudre\r\n1 sachet de sucre vanillé', 'Pelez et coupez les pommes en fines tranches\r\nDans un saladier, mélangez le sucre, les œufs, le sucre vanillé et la crème fraîche\r\nÉtalez la pâte dans un moule à tarte et piquez le fond à l\'aide d\'une fourchette. Disposez les pommes sur la pâte et versez le tout sur les pommes (ou versez uniquement la crème)\r\nPuis disposer les lamelles de pommes roulées sur elles-même en roses.', 'Enfournez environ 30 minutes, jusqu\'à ce que la tarte prenne une belle couleur dorée.\r\nDéguster'),
(13, 'Cakes pops', 'Le concept est très simple, il s\'agit d\'un gâteau au yaourt, joliment colorée', '2014-01-01 00:00:00', 0, 'cakes-pops.jpg', 'Cakes pops', '2019-06-25 09:35:20', 0, 2, '1 tablette de chocolat noir\r\n1 ½ de Philadelphia nature\r\nPour le reste de la recette\r\n1 tablette de chocolat blanc\r\n1 poignée de pistaches émondées\r\nPetites Billes de sucre colorées (Vahiné par exemple)\r\n3 c à s de noix de coco râpée\r\nColorant alimentaire rose ou rouge\r\n1 sachet de sucre vanillé\r\n2 pots de farine\r\n1 yaourt nature, le pot de yaourt nous sert de référence\r\n2 pots de sucre\r\n½ pot d\"huile\r\n½ sachet de levure chimique\r\n3 œufs', 'Commencer par la gâteau au yaourt, en mélangeant tous les ingrédients : farine, sucre, levure, sucre vanillé, mélanger. Faire un puits et casser les oeufs, mélanger, ajouter le yaourt, l\'huile, mélanger bien. Lorsque la pâte est lisse, ajouter le colorant alimentaire pour que le gâteau soit bien bien rouge. \r\nBeurrer et fariner le moule, verser la pâte et enfourner pour 30 min en surveillant. \r\nLorsqu\'il est cuit, sortir du four, et laisser refroidir complètement.\r\nPendant que le gâteau cuit, préparer le présentoir qui vous permettra de faire sécher vos Cake Pops une fois nappées de chocolat. Pour cela, prenez votre boite à chaussure, enrouler le couvercle dans le film étirable et faire plein de petits trous plus petits que le diamètre de vos pics à sucette pour que vos sucettes tiennent bien. Faites un trou tous les 5cm, pour qu\'elles ne se touchent pas. Faite de même avec l\'autre partie de la boite à chaussure.\r\nLorsque le gâteau est refroidi, retirer la croûte tout autour du gâteau pour ne garder que l\'intérieur, bien coloré et moelleux. Émietter dans un saladier et ajouter le philadelphia, mélanger jusqu\'à obtenir une texture homogène. \r\nFormer des petites boules avec la pâte de 3 cm de diamètre. Dans chaque boule, planter un pic à sucette.', 'Laisser reposer 2h minimum, idéalement une nuit.'),
(14, 'Cheesecake Fraise & Spéculoos', 'cheesecake « sans cuisson »\r\nLa base croquante au spéculoos se marie à merveille avec l’onctuosité de la garniture à la fraise.', '2014-01-01 00:00:00', 0, 'sheese-cake.jpg', 'Cheesecake Fraise & Spéculoos', '2019-06-25 09:21:41', 0, 2, '150g de spéculoos.\r\n70g de beurre doux fondu.\r\n5 feuilles de gélatine (Vahiné)\r\n200g de fraises.\r\n300g de fromage frais type Philadelphia® nature.\r\n300g de yaourt Grec.\r\n6cs de sucre en poudre.\r\n1/2cc de vanille liquide.', 'Disposer un cercle pâtissier de 18 cm sur le plat à gâteau qui sera utilisé pour le service. Le cercler à l’intérieur d’un ruban de rhodoïd (facultatif), cela permettra un démoulage facile et net.\r\nPréparer la base biscuitée en mixant le spéculoos et le beurre. Bien mélanger et tapisser le fond du cercle, en tassant bien avec le fond d’un verre. Réserver au frais en attendant la suite.\r\nFaire ramollir les feuilles de gélatine dans un peu d’eau froide.\r\nMixer les fraises, puis les verser dans un récipient. Incorporer le fromage frais type Philadelphia® nature, le yaourt Grec,le sucre en poudre, la vanille liquide et quelques gouttes d’arôme de fraise.\r\nDans une casserole, faire chauffer le lait, puis retirer du feu et y verser la gélatine égouttée. Bien mélanger. Verser le lait sur le mélange crémeux aux fraises et mélanger une dernière fois pour homogénéiser.\r\nDéposer ce mélange dans le cercle, sur la base biscuitée. Faire prendre au frais au moins 3 heures.\r\nRéaliser le coulis en mixant les fraises avec le sucre glace. Faire réduire à feu vif le mélange dans une casserole pour qu’il s’épaississe. Laisser refroidir\r\nAu moment de servir le cheesecake (ou un peu avant), déposer le coulis et décorer de quelques fraises coupées en deux ou quatre.', 'A conserver au frais.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C89312FE9` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A6479541DB185` FOREIGN KEY (`comment_user_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `FK_957A647989312FE9` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `FK_49BB639012469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
