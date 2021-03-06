Création CMS Symfony 2
=======================

* Auteurs : @soheilsk @brianne @olivier
* Version : Indev@0.2
* Description : CMS réalisé avec Symfony 2 dans le cadre d'un projet d'école


Qu'est ce que c'est que Balou ?
=======================

Balou est un CMS crée lors d'un projet d'école par trois étudiant en un mois.

Ce CMS est basé sur symfony 2.


Installation
=======================

Cloner le git

$ git clone git:https://github.com/IESA-Soheil-Olivier-Brianne/balou.git


Installer composer en global

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

Configuration
=======================

Créez un utilisateur 

$ php app/console fos:user:create testuser test@example.com p@ssword


Promouvoir un utilisateur

$ php app/console fos:user:promote testuser ROLE_ADMIN
Ou
$ php app/console fos:user:promote testuser --super


Activez un utilisateur

$ php app/console fos:user:activate testuser


Désactivez un utilisateur

$ php app/console fos:user:deactivate testuser

Tutoriel
=======================

Une fois installé et configurer vous pouvez vous rendre sur la page suivante : http://localhost/balou/web/app_dev.php/agence

CONNEXION :
- Cliquez sur "connexion" ou "vous n'avez pas de compte?"
- Connectez vous

DASHBOARD :
- Après la connexion vous atterissez sur le tableau de bord : http://localhost/balou/web/app_dev.php/

WEBMASTERING :
- Vous pouvez donc utilisez le menu sur votre gauche pour créer ou modifier votre contenu
- Commencez par créer Deux Blocs de menu et pour l'exemple veuillez les nommez "Header" et "Footer"
- Créez maintenant les menus qui vont être reliés à vos blocs et mettez bien un url simple car il faudra mettre le même pour la page qui sera reliée à votre menu
- Allez dans "Pages" pour la création de vos pages, attention il faut bien relier les pages aux menus donc coché le bon menu en mettant le bon url

FRONT AFFICHAGE :
- Vous pouvez à présent commencer à afficher vos pages sur le lien suivant : 
http://localhost/balou/web/app_dev.php/page/[url de votre page qui est identique à votre menu]

CREATION DE BLOC HTML ET CSS

- Vous pouvez créez deux blocs html appelés "Left" et "Right" pour avoir un bloc à gauche et un à droite de votre site
- Créez une feuille de style dans l'onglet CSS et appelez le "CSS" ce css sera pris en compte sur toutes vos pages


AJOUT DE MEDIA

- Dans l'onglet Medias vous pouvez ajoutez des photos ou vidéos
- une fois l'image créée vous pouvez cliquez dessus et copiez dans la barre d'adresse l'url de celle-ci pour ensuite utilisez le coller lorsque vous insérer une image dans CkEditor dans une de vos pages ou articles


AJOUT D'UN ARTICLE

- Pareil que les pages vous avez juste deux champs supplémentaire à remplir : "Auteur" et "Date"



SQL data et structure
=======================

--
La database est un disposition à la racine du fichier ".bdd"
--


-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2015 at 07:24 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `balou`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
`id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageArticle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id`, `titre`, `contenu`, `created_at`, `auteur`, `pageArticle_id`) VALUES
(3, 'Les avis consommateurs : un élément central dans l’acte d’achat', '<div class="titre_presse"><em><span style="font-size:16px">Les Avis des internautes sont tr&egrave;s influents, la cause : la possibilit&eacute; de plus en plus grande de laisser des avis (blogs, r&eacute;seaux sociaux&hellip;). Donn&eacute;es chiffr&eacute;es : 90% des internautes lisent les avis de consommateurs ; 61% d&rsquo;entre eux y passent entre 5 et 30 minutes.</span></em></div>', '2012-04-08 14:16:00', 'Olivier', 8),
(4, 'La France, championne d''Europe des avis sur Internet', '<div class="titre_presse"><em><span style="font-size:16px">En 2011, les 45 millions d&#39;internautes que compte la France ont publi&eacute; sur la Toile quelque 1,1 million de recommandations sur les commerces locaux, selon Nomao.</span></em></div>', '2014-11-16 13:15:00', 'Soheil', 8),
(5, 'Les avis de consommateurs en ligne, vus par les Français', '<div class="titre_presse"><em><span style="font-size:16px">Testntrust publie le 17 avril une &eacute;tude d&#39;Easypanel, 75% des Fran&ccedil;ais d&eacute;clarent qu&#39;ils feront davantage confiance aux sites ayant adopt&eacute;s la norme. Les cat&eacute;gories de produits ou les avis sont le plus pl&eacute;biscit&eacute;s : l&#39;&eacute;lectrom&eacute;nager (56%), la restauration (42%), l&#39;informatique (41%) et le tourisme (37%).</span></em></div>', '2015-07-12 12:16:00', 'Brianne', 8);

-- --------------------------------------------------------

--
-- Table structure for table `BlocHtml`
--

CREATE TABLE `BlocHtml` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BlocHtml`
--

INSERT INTO `BlocHtml` (`id`, `nom`) VALUES
(1, 'Left'),
(2, 'Right');

-- --------------------------------------------------------

--
-- Table structure for table `blocmenu`
--

CREATE TABLE `blocmenu` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blocmenu`
--

INSERT INTO `blocmenu` (`id`, `nom`, `description`) VALUES
(12, 'Header', 'Voici le menu qui se trouve en haut de votre page'),
(13, 'Footer', 'Voici le menu qui se trouve au pied de votre page');

-- --------------------------------------------------------

--
-- Table structure for table `Html`
--

CREATE TABLE `Html` (
`id` int(11) NOT NULL,
  `blochtml_id` int(11) DEFAULT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Html`
--

INSERT INTO `Html` (`id`, `blochtml_id`, `contenu`) VALUES
(2, 2, '<h2>Suivez nous !</h2>\r\n\r\n<a class="btn btn-social-icon btn-lg btn-twitter">\r\n    <i class="fa fa-twitter"></i> Follow\r\n</a>\r\n<a class="btn btn-social-icon btn-lg btn-facebook">\r\n    <i class="fa fa-facebook"></i> Like\r\n</a>\r\n\r\n<h2>Donnez votre avis</h2>\r\n\r\n<div class="rating">\r\n<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>\r\n</div>'),
(5, 1, '<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\r\n <tbody>\r\n   <tr>\r\n      <td><img alt="" src="http://localhost/balou/web/uploads/documents/76e516f44e5a999e2a303b13fdf1b4370b2ddc07.jpeg" style="height:57px; width:104px" /></td>\r\n     <td><img alt="" src="http://localhost/balou/web/uploads/documents/3e376cb18e12bd8caed84f1b360b9c1a76db5e93.jpeg" style="height:57px; width:104px" /></td>\r\n     <td><img alt="" src="http://localhost/balou/web/uploads/documents/532dfc8c789b6ec017cc772c3e2f74b42b9bc115.jpeg" style="height:57px; width:104px" /></td>\r\n   </tr>\r\n   <tr>\r\n      <td><img alt="" src="http://localhost/balou/web/uploads/documents/4599b41fe59ff39d379a2868cedb8171287fe65c.jpeg" style="height:57px; width:104px" /></td>\r\n     <td><img alt="" src="http://localhost/balou/web/uploads/documents/f10d03b153dbf41c0f730e8e52c63ba306593110.jpeg" style="height:57px; width:104px" /></td>\r\n     <td><img alt="" src="http://localhost/balou/web/uploads/documents/a1bc38f31e33a39c05ef54f78ab356ed7f11f83b.jpeg" style="height:57px; width:104px" /></td>\r\n   </tr>\r\n </tbody>\r\n</table>'),
(6, 2, '<p>Je suis un deuxième bloc droit</p>'),
(7, 1, '<p>Je suis un deuxième bloc gauche</p>'),
(8, 1, '<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>\r\n\r\n\r\n<div id="fb-root"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, ''script'', ''facebook-jssdk''));</script>'),
(9, 1, '<a class="twitter-timeline" href="https://twitter.com/shinework" data-widget-id="578737954794901504">Tweets de @shinework</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>'),
(10, 2, '<a href="http://www.accuweather.com/fr/fr/paris/623/weather-forecast/623" class="aw-widget-legal">\r\n</a><div id="awcc1426817207687" class="aw-widget-current"  data-locationkey="623" data-unit="c" data-language="fr" data-useip="false" data-uid="awcc1426817207687"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>');

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE `Media` (
`id` int(11) NOT NULL,
  `titre_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taille_media` int(11) NOT NULL,
  `description_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fichier_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Media`
--

INSERT INTO `Media` (`id`, `titre_media`, `taille_media`, `description_media`, `fichier_media`, `url_media`, `alt_media`, `lien_media`, `path`, `updated_at`) VALUES
(7, 'banner', 1, 'banière du site', 'banner', 'banner', 'banner', 'banner', '04179d1c355720699c9cea1e4ba587d67f9a5cd6.jpeg', '2015-03-20 01:38:58'),
(8, 'batman', 1, 'batman', 'batman', 'batman', 'batman', 'batman', '76e516f44e5a999e2a303b13fdf1b4370b2ddc07.jpeg', '2015-03-20 01:39:28'),
(9, 'bigbang', 1, 'bigbang', 'bigbang', 'bigbang', 'bigbang', 'bigbang', '3e376cb18e12bd8caed84f1b360b9c1a76db5e93.jpeg', '2015-03-20 01:39:53'),
(10, 'breaking', 1, 'breaking', 'breaking', 'breaking', 'breaking', 'breaking', '532dfc8c789b6ec017cc772c3e2f74b42b9bc115.jpeg', '2015-03-20 01:40:11'),
(11, 'doctorwho', 1, 'doctorwho', 'doctorwho', 'doctorwho', 'doctorwho', 'doctorwho', '4599b41fe59ff39d379a2868cedb8171287fe65c.jpeg', '2015-03-20 01:40:37'),
(12, 'got', 1, 'got', 'got', 'got', 'got', 'got', 'f10d03b153dbf41c0f730e8e52c63ba306593110.jpeg', '2015-03-20 01:40:59'),
(13, 'starwars', 1, 'starwars', 'starwars', 'starwars', 'starwars', 'starwars', 'a1bc38f31e33a39c05ef54f78ab356ed7f11f83b.jpeg', '2015-03-20 01:41:23'),
(14, 'Zelda', 1, 'Zelda', 'Zelda', 'Zelda', 'Zelda', 'Zelda', '263702370011109f7aa3afb88f449b4906391389.jpeg', '2015-03-20 01:41:42'),
(15, 'Walkingdead', 1, 'Walkingdead', 'Walkingdead', 'Walkingdead', 'Walkingdead', 'Walkingdead', 'adcaf84d048d097570774d384dad8793df57a0b3.jpeg', '2015-03-20 01:42:01'),
(16, 'chaussons-licorne', 1, 'chaussons-licorne', 'chaussons-licorne', 'chaussons-licorne', 'chaussons-licorne', 'chaussons-licorne', 'ec65d4684c593ed9247b456a834ca70eb292dab9.jpeg', '2015-03-20 01:45:20'),
(17, 'couteaux-x-wing-star-wars', 1, 'couteaux-x-wing-star-wars', 'couteaux-x-wing-star-wars', 'couteaux-x-wing-star-wars', 'couteaux-x-wing-star-wars', 'couteaux-x-wing-star-wars', 'e376db080a50f11aed36e5325dd2420b6956b295.jpeg', '2015-03-20 01:45:49'),
(18, 'moule-a-gateau-dark-vador', 1, 'moule-a-gateau-dark-vador', 'moule-a-gateau-dark-vador', 'moule-a-gateau-dark-vador', 'moule-a-gateau-dark-vador', 'moule-a-gateau-dark-vador', '4ebf00d01357bd01fe0930d78855cd3472242290.jpeg', '2015-03-20 01:46:31'),
(19, 'sac-tardis-doctor-who', 1, 'sac-tardis-doctor-who', 'sac-tardis-doctor-who', 'sac-tardis-doctor-who', 'sac-tardis-doctor-who', 'sac-tardis-doctor-who', '3fa5c111ec3e0218b0e1f7c49da358958dd7d32a.jpeg', '2015-03-20 01:46:55'),
(20, 'puzzle', 1, 'puzzle', 'puzzle', 'puzzle', 'puzzle', 'puzzle', 'c01cfa49f6d5375433c327d962e035e468702991.jpeg', '2015-03-20 02:06:32'),
(21, 'rideau', 1, 'rideau', 'rideau', 'rideau', 'rideau', 'rideau', '984c6b3dc209cea2c33be18deaae7dc102c3df3f.jpeg', '2015-03-20 02:06:58'),
(22, 'lampe-tetris', 1, 'lampe-tetris', 'lampe-tetris', 'lampe-tetris', 'lampe-tetris', 'lampe-tetris', 'a3958d13494f09a43b8d422dc4c6f35dcc157e51.jpeg', '2015-03-20 02:07:33'),
(23, 'saint-seiya', 1, 'saint-seiya', 'saint-seiya', 'saint-seiya', 'saint-seiya', 'saint-seiya', 'e62313cc5f2c9d5adce0e5d7fa826f3858182244.jpeg', '2015-03-20 02:07:58'),
(24, 'La geekerie', 1, 'La geekerie', 'La geekerie', 'la-geekerie', 'La geekerie', 'La geekerie', 'c5ff54e7c0478bcb6ecce4ecbc7ee4a6bb6eb29e.png', '2015-03-20 02:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_clicked` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `url`, `is_clicked`) VALUES
(15, 'Accueil', 'accueil', 1),
(16, 'Qui sommes nous ?', 'qui-sommes-nous', 1),
(17, 'Produits', 'produits', 1),
(18, 'Nos boutiques', 'boutiques', 1),
(19, 'Contact', 'contact', 1),
(20, 'Mentions Légales', 'mentions', 1),
(21, 'Plan du site', 'sitemap', 1),
(22, 'Administration', 'administration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_blocmenu`
--

CREATE TABLE `menu_blocmenu` (
  `menu_id` int(11) NOT NULL,
  `blocmenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_blocmenu`
--

INSERT INTO `menu_blocmenu` (`menu_id`, `blocmenu_id`) VALUES
(15, 12),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 13),
(21, 13),
(22, 13);

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
`id` int(11) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Notes`
--

INSERT INTO `Notes` (`id`, `note`, `created_at`) VALUES
(1, 'Je suis une note qui ne sert strictement à rien et tu vas t''en rendre compte une fois que t''auras lu cette note complétement inutile.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `url`, `is_published`, `menu_id`) VALUES
(5, 'La boutique geek de référence souvent copiée, jamais égalée !', '<p><span style="font-size:14px">La Geekerie est la boutique geek o&ugrave; vous trouverez tout l&#39;univers de la pop culture en 1 clic. La boutique incontournable pour trouver un <a href="http://lageekerie.com/110-cadeau-geek">cadeau geek</a> &agrave; offrir ou &agrave; vous offrir : objets de l&#39;univers Star Wars ou Star Trek, d&eacute;co, mode, &eacute;colo, high-tech, gadget. <em>Nostalgeeks, gamers/gameuses, fans de science-fiction, amateurs d&rsquo;objets insolites et tendance ? Rejoignez La Geekerie car : In Geek We Trust ! </em></span></p>\r\n\r\n<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><strong>Nos produits phares</strong></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="1" style="width:100%">\r\n <tbody>\r\n   <tr>\r\n      <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/ec65d4684c593ed9247b456a834ca70eb292dab9.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>chaussons-licorne</u></span></p>\r\n     </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/e376db080a50f11aed36e5325dd2420b6956b295.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>couteaux-x-wing-star-wars</u></span></p>\r\n     </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/4ebf00d01357bd01fe0930d78855cd3472242290.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>moule-a-gateau-dark-vador</u></span></p>\r\n     </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/3fa5c111ec3e0218b0e1f7c49da358958dd7d32a.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>sac-tardis-doctor-who</u></span></p>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n      <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/c01cfa49f6d5375433c327d962e035e468702991.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>puzzle</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/984c6b3dc209cea2c33be18deaae7dc102c3df3f.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><u><span style="font-size:14px">rideau</span></u></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/a3958d13494f09a43b8d422dc4c6f35dcc157e51.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>lampe-tetris</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/e62313cc5f2c9d5adce0e5d7fa826f3858182244.jpeg" style="height:150px; width:150px" /></p>\r\n\r\n      <p><u><span style="font-size:14px">saint-seiya</span></u></p>\r\n     </td>\r\n   </tr>\r\n </tbody>\r\n</table>\r\n\r\n<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><strong>Nos produits phares</strong></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="1" style="width:100%">\r\n  <tbody>\r\n   <tr>\r\n      <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/ec65d4684c593ed9247b456a834ca70eb292dab9.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>chaussons-licorne</u></span></p>\r\n     </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/e376db080a50f11aed36e5325dd2420b6956b295.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>couteaux-star-wars</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/4ebf00d01357bd01fe0930d78855cd3472242290.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>moule-a-gateau</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/3fa5c111ec3e0218b0e1f7c49da358958dd7d32a.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>sac-tardis-doc-who</u></span></p>\r\n      </td>\r\n   </tr>\r\n   <tr>\r\n      <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/c01cfa49f6d5375433c327d962e035e468702991.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>puzzle</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/984c6b3dc209cea2c33be18deaae7dc102c3df3f.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><u><span style="font-size:14px">rideau</span></u></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/a3958d13494f09a43b8d422dc4c6f35dcc157e51.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><span style="font-size:14px"><u>lampe-tetris</u></span></p>\r\n      </td>\r\n     <td>\r\n      <p><img alt="" src="http://localhost/balou/web/uploads/documents/e62313cc5f2c9d5adce0e5d7fa826f3858182244.jpeg" style="height:200px; width:200px" /></p>\r\n\r\n      <p><u><span style="font-size:14px">saint-seiya</span></u></p>\r\n     </td>\r\n   </tr>\r\n </tbody>\r\n</table>\r\n\r\n<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>', 'accueil', 1, 15),
(6, 'Qui sommes-nous ?', '<p><span style="font-size:18px">La Geekerie est la boutique geek o&ugrave; vous trouverez tout l&#39;univers de la pop culture en 1 clic. La boutique incontournable pour trouver un <a href="http://lageekerie.com/110-cadeau-geek">cadeau geek</a> &agrave; offrir ou &agrave; vous offrir : objets de l&#39;univers Star Wars ou Star Trek, d&eacute;co, mode, &eacute;colo, high-tech, gadget. <em>Nostalgeeks, gamers/gameuses, fans de science-fiction, amateurs d&rsquo;objets insolites et tendance ? Rejoignez La Geekerie car : In Geek We Trust ! </em> </span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><span style="font-size:18px"><em><img alt="" src="http://localhost/balou/web/uploads/documents/c5ff54e7c0478bcb6ecce4ecbc7ee4a6bb6eb29e.png" style="height:161px; width:220px" /></em></span></p>', 'qui-sommes-nous', 1, 16),
(7, 'Produits', '<p><span style="font-size:14px">Parcourez nos centaines de gadgets geek, du porte cl&eacute;s 3 en 1 space invaders &agrave; la montre calculatrice, la geekerie vous a s&eacute;lectionn&eacute; dans sa boutique le meilleur du gadget geek et original !</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="1" style="width:100%">\r\n <tbody>\r\n   <tr>\r\n      <td><span style="font-size:14px"><img alt="" src="http://localhost/balou/web/uploads/documents/e376db080a50f11aed36e5325dd2420b6956b295.jpeg" style="height:200px; width:200px" /></span></td>\r\n      <td>\r\n      <p style="text-align:justify"><span style="font-size:14px">Vous avez besoin dans votre cuisine &agrave; la fois de couteaux et d&#39;une d&eacute;co geek qui tranche avec le reste !</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">Voici un magnifique porte-couteaux X-Wing Star Wars avec 5 couteaux de haute qualit&eacute;.</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">Imaginez ce X-Wing pos&eacute; sur une table ou un plan de travail dans votre cuisine, assur&eacute;ment vous allez adorer ! C&#39;est certain, vous allez faire des jaloux parmi vos amis.</span></p>\r\n\r\n     <p style="text-align:justify"><span style="font-size:14px">Pr&eacute;parez-vous &agrave; la rebellion ! </span></p>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n      <td>&nbsp;</td>\r\n     <td>\r\n      <p>&nbsp;</p>\r\n\r\n     <p>&nbsp;</p>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n      <td><span style="font-size:14px"><img alt="" src="http://localhost/balou/web/uploads/documents/ec65d4684c593ed9247b456a834ca70eb292dab9.jpeg" style="height:200px; width:200px" /></span></td>\r\n      <td>\r\n      <p style="text-align:justify"><span style="font-size:14px">Tous les adultes ont besoin d&#39;un peu de magie dans leur vie. Et quoi de plus magique que de se r&eacute;veiller et de mettre ses pieds dans ces <strong>chaussons licorne</strong> !</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">M&ecirc;me s&#39;ils ne vous transportent pas dans un endroit paradisiaque, ils vous donneront certainement le sourire d&egrave;s le matin et propulseront votre humeur dans la stratosph&egrave;re pour toute la journ&eacute;e.</span></p>\r\n\r\n     <p style="text-align:justify"><span style="font-size:14px">Tr&egrave;s confortables et chauds, ils seront en plus une excellente id&eacute;e cadeau pour toutes les occasions.</span></p>\r\n     <span style="font-size:14px">Ces chaussons licorne donnerons le sourire extra-large d&egrave;s le matin, et hop c&#39;est parti pour une superbe journ&eacute;e.</span></td>\r\n    </tr>\r\n   <tr>\r\n      <td>&nbsp;</td>\r\n     <td>\r\n      <p>&nbsp;</p>\r\n\r\n     <p>&nbsp;</p>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n      <td><span style="font-size:14px"><img alt="" src="http://localhost/balou/web/uploads/documents/3fa5c111ec3e0218b0e1f7c49da358958dd7d32a.jpeg" style="height:200px; width:200px" /></span></td>\r\n      <td>\r\n      <p style="text-align:justify"><span style="font-size:14px">Gr&acirc;ce &agrave; ce <strong>sac Tardis Doctor Who</strong>, vous pourrez facilement transporter vos affaires dans vos voyages spatio-temporels !</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">Il dispose d&#39;un emplacement sur le devant et d&#39;un grand compartiment central dans lequel vous pourrez glisser votre ordinateur portable, des magazines ou des dossiers A4.</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">Vous pourrez assortir ce sac avec le <a href="http://lageekerie.com/tshirt-geek/1061-portefeuille-tardis-doctor-who.html" target="_blank">portefeuille Tardis Doctor Who</a></span></p>\r\n      </td>\r\n   </tr>\r\n   <tr>\r\n      <td>&nbsp;</td>\r\n     <td>\r\n      <p>&nbsp;</p>\r\n\r\n     <p>&nbsp;</p>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n      <td><span style="font-size:14px"><img alt="" src="http://localhost/balou/web/uploads/documents/4ebf00d01357bd01fe0930d78855cd3472242290.jpeg" style="height:200px; width:200px" /></span></td>\r\n      <td>\r\n      <p style="text-align:justify"><span style="font-size:14px">M&ecirc;me si cela n&#39;a jamais &eacute;t&eacute; montr&eacute; &agrave; l&#39;&eacute;cran, il est bien connu que Dark Vador adore les g&acirc;teaux, en particulier au chocolat. Si, comme lui, vous &ecirc;tes pr&ecirc;ts&nbsp;&agrave; basculer du c&ocirc;t&eacute; obscur de la gourmandise, ce <strong>moule &agrave; g&acirc;teau Dark Vador</strong> sera parfait !</span></p>\r\n\r\n     <p style="text-align:justify"><span style="font-size:14px">Reprenant la forme du casque du Seigneur Sith, ce moule sera g&eacute;nial pour un anniversaire ou une soir&eacute;e geek.</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">M&ecirc;me les rebelles les plus hostiles ne pourront pas r&eacute;sister &agrave; une tranche de g&acirc;teau ressemblant &agrave; leur pire ennemi (surtout si vous suivez la recette secr&egrave;te fournie avec ce moule)...</span></p>\r\n\r\n      <p style="text-align:justify"><span style="font-size:14px">Objet indispensable &agrave; tout cuisinier(e) geek qui se respecte.</span></p>\r\n      </td>\r\n   </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 'produits', 1, 17),
(8, 'Nos boutiques', '<p><span style="font-size:18px">Nos boutiques sont ferm&eacute;es, merci de bien vouloir contacter le service client au : </span></p>\r\n\r\n<p><span style="font-size:18px">08 89 23 48 09</span></p>\r\n\r\n<p><span style="font-size:18px">Merci de votre compr&eacute;hension</span></p>\r\n\r\n<p><span style="font-size:18px">Bisous bisous</span></p>', 'boutiques', 1, 18),
(9, 'Contact', '<p>Ici un formulaire de contact</p>\r\n\r\n<p><iframe frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m20!1m8!1m3!1d2625.0586441455357!2d2.3730126000000005!3d48.857092099999996!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e6!4m0!4m5!1s0x47e66df8c97c9bdd%3A0x5e79acc90095d38b!2s8+Rue+Froment%2C+75011+Paris!3m2!1d48.857092099999996!2d2.3730126!5e0!3m2!1sfr!2sfr!4v1426832600305" style="border:0" width="600"></iframe></p>', 'contact', 1, 19),
(10, 'Mentions légales', '<p>Ici les mentions l&eacute;gales de votre site et h&eacute;bergeur</p>', 'mentions', 1, 20),
(11, 'Plan du site', '<p>Le plan de votre site sera ici</p>', 'sitemap', 1, 21),
(12, 'Administration', '<p>ici un formulaire de login pour vous connecter &agrave; votre backoffice</p>', 'administration', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `sousmenu`
--

CREATE TABLE `sousmenu` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `nom`, `contenu`) VALUES
(2, 'CSS', '/****** SYSTEME DE NOTATION ******/\r\n.rating {\r\n  unicode-bidi: bidi-override;\r\n  direction: rtl;\r\n  text-align: center;\r\n}\r\n.rating > span {\r\n  display: inline-block;\r\n  position: relative;\r\n  width: 1.1em;\r\n}\r\n.rating > span:hover,\r\n.rating > span:hover');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `lastActivity` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `lastActivity`) VALUES
(2, 'Soheil', 'soheil', 'soheil@gmail.com', 'soheil@gmail.com', 1, 'kfgk323ahu8co4kggcg48g0gwgcgwsk', 'oL2NbnkNWfHnvGJYzX7cLXOlVYR2pca8yLaPioTNtZ61TzKS9by/G/xc6njfWnxbCZvHroq6w/TYIPaElUK+ug==', '2015-03-19 21:18:37', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, '2015-03-20 07:23:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_46AB533E4BBB9B9E` (`pageArticle_id`);

--
-- Indexes for table `BlocHtml`
--
ALTER TABLE `BlocHtml`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocmenu`
--
ALTER TABLE `blocmenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Html`
--
ALTER TABLE `Html`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_B84B57DBD4E239F6` (`blochtml_id`);

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_blocmenu`
--
ALTER TABLE `menu_blocmenu`
 ADD PRIMARY KEY (`menu_id`,`blocmenu_id`), ADD KEY `IDX_ECDA4E35CCD7E912` (`menu_id`), ADD KEY `IDX_ECDA4E3524E1A5AA` (`blocmenu_id`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_140AB620CCD7E912` (`menu_id`);

--
-- Indexes for table `sousmenu`
--
ALTER TABLE `sousmenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `BlocHtml`
--
ALTER TABLE `BlocHtml`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blocmenu`
--
ALTER TABLE `blocmenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Html`
--
ALTER TABLE `Html`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sousmenu`
--
ALTER TABLE `sousmenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
ADD CONSTRAINT `FK_46AB533E4BBB9B9E` FOREIGN KEY (`pageArticle_id`) REFERENCES `page` (`id`);

--
-- Constraints for table `Html`
--
ALTER TABLE `Html`
ADD CONSTRAINT `FK_B84B57DBD4E239F6` FOREIGN KEY (`blochtml_id`) REFERENCES `BlocHtml` (`id`);

--
-- Constraints for table `menu_blocmenu`
--
ALTER TABLE `menu_blocmenu`
ADD CONSTRAINT `FK_ECDA4E3524E1A5AA` FOREIGN KEY (`blocmenu_id`) REFERENCES `blocmenu` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_ECDA4E35CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
ADD CONSTRAINT `FK_140AB620CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
