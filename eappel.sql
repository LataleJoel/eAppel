-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 08 Décembre 2013 à 23:17
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `eappel`
--
CREATE DATABASE IF NOT EXISTS `eappel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eappel`;

-- --------------------------------------------------------

--
-- Structure de la table `appels`
--

CREATE TABLE IF NOT EXISTS `appels` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `enseignant` int(16) NOT NULL,
  `groupe` int(16) NOT NULL,
  `creation` datetime NOT NULL,
  `modification` datetime NOT NULL,
  `appel` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) CHARACTER SET utf8 NOT NULL,
  `annee` int(16) NOT NULL,
  `eleves` text CHARACTER SET utf8 NOT NULL,
  `cursus` text NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom`, `annee`, `eleves`, `cursus`, `numero`) VALUES
(1, '3iL A2 Groupe 1', 2, '[{"nom":"ABDELKARIM","prenom":"Soufiane"},{"nom":"AOUASSAR","prenom":"Yassine"},{"nom":"BOULOUMEGUE","prenom":"Franck Irving"},{"nom":"BREVIGNON","prenom":"Robin"},{"nom":"CAMUS","prenom":"Simon"},{"nom":"CHAIRA","prenom":"Zakaria"},{"nom":"CHOUQI","prenom":"Kenza"},{"nom":"DAVID","prenom":"Jason"},{"nom":"DEBAN","prenom":"Adrien"},{"nom":"DELVALLEE","prenom":"Antoine"},{"nom":"DJUMBONG FOUGAIN","prenom":"B\\u00e9atrice"},{"nom":"DUPLESSY","prenom":"S\\u00e9bastien"},{"nom":"FARJI","prenom":"Driss"},{"nom":"GANOFSKY","prenom":"Ingrid"},{"nom":"GRONDIN","prenom":"Mathieu"},{"nom":"HAMOUCH","prenom":"Abdel-Ilah"},{"nom":"JADDOUR","prenom":"Omar"},{"nom":"KISTLER","prenom":"Jonas"},{"nom":"LARDY","prenom":"Simon"},{"nom":"LEON","prenom":"Erwan"},{"nom":"MARCAIS","prenom":"Maxime"},{"nom":"MARTEL","prenom":"Boris"},{"nom":"MEKONTSO SAMBAKIN","prenom":"Thierry"},{"nom":"MESSA","prenom":"Alvine Flore"},{"nom":"NAIMI","prenom":"Amine"},{"nom":"PENCHENAT","prenom":"Fabien"},{"nom":"PIQUE","prenom":"Val\\u00e8re"},{"nom":"RONDEAU","prenom":"J\\u00e9r\\u00e9my"},{"nom":"TALHAOUI","prenom":"Nada"},{"nom":"TEGUE KAMDEM","prenom":"Steve"},{"nom":"TESSIER","prenom":"Lo\\u00efc"},{"nom":"VILLESSOT","prenom":"Micka\\u00ebl"},{"nom":"WEISS","prenom":"Aur\\u00e9lien"},{"nom":"ZHENG","prenom":"Chengyi"}]', '3iL', 1),
(2, 'Cs2i Ms In A1 Groupe 1', 1, '[{"nom":"ABOUSSOIRIA","prenom":"Mohamed"},{"nom":"AHBEDDOU","prenom":"Sarah"},{"nom":"CAMBILLAU","prenom":"Adrien"},{"nom":"DJOKAM","prenom":"Tracy Camela"},{"nom":"HIKMAT","prenom":"Mohamed"},{"nom":"JININOU","prenom":"Omar"},{"nom":"MBIEDJI WANDJI","prenom":"Fabien"},{"nom":"MOUKOURI ESSENGUE","prenom":"Georges C\\u00e9dric"},{"nom":"NJONGANG ZADOUO","prenom":"Philippe"},{"nom":"NOMENJANAHARY","prenom":"Mandela"},{"nom":"NSOUANA-MOURY","prenom":"Tony Martin"},{"nom":"SADIER","prenom":"J\\u00e9r\\u00e9my"},{"nom":"WETIE LEUKEU","prenom":"Franck"},{"nom":"ZEDOUDI","prenom":"Adnane"}]', 'MS2i', 1),
(3, '3iL A2 Groupe 2', 2, '[{"nom":"AFAILAL","prenom":"Mariam"},{"nom":"BEUNAS","prenom":"Charlotte"},{"nom":"BONNEAU RODRIGUEZ","prenom":"Richard"},{"nom":"BOULESTEIX","prenom":"Maxime"},{"nom":"BRIOT","prenom":"Vincent"},{"nom":"DAPA OU-DOUE SALI","prenom":"Patrick"},{"nom":"DUPREUIL","prenom":"Nicolas"},{"nom":"ERRAHIOUI","prenom":"Haitam"},{"nom":"FOYET FONDJO","prenom":"Alex"},{"nom":"GACHET","prenom":"Jordan"},{"nom":"IBNZIATEN","prenom":"Zakaria"},{"nom":"KASSI","prenom":"Abdelhakim"},{"nom":"KEFRAOUI","prenom":"Meriem"},{"nom":"LAMACHE","prenom":"Nour"},{"nom":"LAMNINI","prenom":"Issam"},{"nom":"LEBOEUF","prenom":"Pierre-Adrien"},{"nom":"LIU","prenom":"Wang"},{"nom":"MONGIN","prenom":"Michel"},{"nom":"MORAU","prenom":"H\\u00e9l\\u00e8na"},{"nom":"MOUTARAJJI","prenom":"Anas"},{"nom":"NANEIX","prenom":"Quentin"},{"nom":"NGANDJOU MOMO","prenom":"Georges"},{"nom":"OUARRAQ","prenom":"Imran"},{"nom":"PERAZZI","prenom":"Ornella"},{"nom":"PETITHOMME","prenom":"Alexis"},{"nom":"QUINET","prenom":"Florian"},{"nom":"RHAFIRI","prenom":"Mawia"},{"nom":"SIME","prenom":"Pamela"},{"nom":"THIBERGE","prenom":"Damien"},{"nom":"TOUBIOU SIEWE","prenom":"Axel"},{"nom":"WEN","prenom":"Hao"},{"nom":"ZAYATI","prenom":"Wassim"}]', '3iL', 2),
(4, '3iL A3 Groupe 3', 3, '[{"nom":"AL MAROUNI","prenom":"Marouane"},{"nom":"ALLALI","prenom":"Meriem"},{"nom":"BARRAHMA TLEMCANI","prenom":"Oumaima"},{"nom":"BOUKHRASSE","prenom":"Taraa"},{"nom":"DELISLE","prenom":"Alexandre"},{"nom":"GAYVALLET","prenom":"Jonathan"},{"nom":"HINGUE MOUKO","prenom":"Yanick"},{"nom":"HUMBLOT","prenom":"Tanguy"},{"nom":"IBIKUNLE ANGUILLET","prenom":"Akande Daouda"},{"nom":"KOMY","prenom":"Pingda"},{"nom":"KOUONGA FOTSO","prenom":"William"},{"nom":"KROUT","prenom":"Wajdi"},{"nom":"LOWE KAMNANG","prenom":"Virgil"},{"nom":"MBA MAKOUGOUM","prenom":"Christ\\u00e9le"},{"nom":"MBAKOP DJANPOU","prenom":"Arlette"},{"nom":"NADIR","prenom":"Souka\\u00efna"},{"nom":"NEMBOT SAHA","prenom":"Achille"},{"nom":"PERINET-PELLEGRIN","prenom":"Martin"},{"nom":"RODRIGUES","prenom":"Vincent"},{"nom":"ROUSSEAU","prenom":"Bastien"},{"nom":"ROUSSELLE","prenom":"Nicolas"},{"nom":"SALESSE","prenom":"Nicolas"},{"nom":"SKALLI","prenom":"Hamza"},{"nom":"TAOUI","prenom":"Chaimae"},{"nom":"VANDEWEEGHE","prenom":"Gauthier"},{"nom":"VILLANOVA","prenom":"J\\u00e9r\\u00f4me"}]', '3iL', 3),
(5, '3iL A1 Groupe 3', 1, '[{"nom":"ALBARELLO","prenom":"Paul"},{"nom":"ALI BENALI","prenom":"Mehdi"},{"nom":"BOGLER","prenom":"Steve"},{"nom":"DUBOC","prenom":"S\\u00e9bastien"},{"nom":"DUCLOS","prenom":"Johan"},{"nom":"GOLDSTEIN","prenom":"La\\u00e9titia"},{"nom":"HILLINGSHAUSER","prenom":"Fabien"},{"nom":"THILLAISIVAN","prenom":"Thupakaran"},{"nom":"WOLFER","prenom":"Micka\\u00ebl"}]', '3iL', 3),
(7, '3iL A1 Groupe 1', 1, '[{"nom":"ATANA BANA","prenom":"Marie Genevi\\u00e8ve Ursul"},{"nom":"BA","prenom":"Ousseynou"},{"nom":"BATCHANOU YAMI","prenom":"Euphrasie"},{"nom":"BERRIMA","prenom":"Souad"},{"nom":"BILONG NGOUE","prenom":"Josu\\u00e9 Beauclair"},{"nom":"BOUGHATTAS","prenom":"Rania"},{"nom":"BREGMESTRE","prenom":"Lo\\u00efc"},{"nom":"CHRETIEN","prenom":"Anthony"},{"nom":"FORIN","prenom":"Pierre"},{"nom":"GABILLAUD","prenom":"Adrien"},{"nom":"GUIFO KWOUSSOU","prenom":"Martial B\\u00e9rol"},{"nom":"HACHON","prenom":"Fabienne"},{"nom":"KANNOUCH","prenom":"Mohamed"},{"nom":"KUE MENKOUEN","prenom":"Lo\\u00efc Maxwell"},{"nom":"MA","prenom":"Hang"},{"nom":"MAZAILLIER","prenom":"Alexandre"},{"nom":"MEDDOUR","prenom":"Florent"},{"nom":"MELONG DJONOU","prenom":"Patricia"},{"nom":"OUANJINE","prenom":"Ouail"},{"nom":"QSIYER","prenom":"Raghda"},{"nom":"REVAUTE","prenom":"Florian"},{"nom":"TALBIA","prenom":"Hicham"},{"nom":"TOUANI DEUNGOUE","prenom":"Serge Dimitri"},{"nom":"TURI","prenom":"Alexis"},{"nom":"WANG","prenom":"Yu Chen"}]', '3iL', 1),
(8, '3iL A2 Groupe 3', 2, '[{"nom":"ATTAD","prenom":"Laarabi"},{"nom":"BENBIGA","prenom":"Amina"},{"nom":"BORDAS","prenom":"Nicolas"},{"nom":"CAMARA","prenom":"Bintou"},{"nom":"DELPUCH","prenom":"Sylvain"},{"nom":"DESPLAT","prenom":"Lo\\u00efc"},{"nom":"DIBANDA NSENOU","prenom":"Alfred"},{"nom":"EL ATTAR","prenom":"A\\u00efssam"},{"nom":"EL HALOUI","prenom":"Katrannada"},{"nom":"EL KAHILI","prenom":"Mohammed"},{"nom":"FANDO NENWA","prenom":"Libert Jorand"},{"nom":"FINGOUE CHAKOUE","prenom":"Franck"},{"nom":"FOTSO FEUGAING","prenom":"Lionel"},{"nom":"GALVANI","prenom":"Laurent"},{"nom":"GODICHAUD","prenom":"F\\u00e9lix"},{"nom":"HASSANI","prenom":"Maha"},{"nom":"JAMJAMA","prenom":"Imane"},{"nom":"LARIQUE","prenom":"Jacques"},{"nom":"LAUNES","prenom":"Guillaume"},{"nom":"MELLAL","prenom":"Farah"},{"nom":"MOLLE","prenom":"Jacques"},{"nom":"MONTAGNE","prenom":"Valentin"},{"nom":"NDANGA WANDJI","prenom":"C\\u00e9dric Virgile"},{"nom":"NERVET","prenom":"Alexandre"},{"nom":"REBUS","prenom":"K\\u00e9vin"},{"nom":"RICHER de FORGES","prenom":"Cl\\u00e9ment"},{"nom":"SAWADOGO","prenom":"Aim\\u00e9"},{"nom":"TAIBI","prenom":"Safae"},{"nom":"TAMBE","prenom":"St\\u00e9phane"},{"nom":"TEWOUDA TCHABGOU","prenom":"Rolland"},{"nom":"TOK","prenom":"Cha\\u00efmaa"},{"nom":"TRINH","prenom":"Jonathan"},{"nom":"VAYSSE","prenom":"Maxime"},{"nom":"WURTZEL","prenom":"J\\u00e9r\\u00e9my"}]', '3iL', 3),
(9, '3iL A3 Groupe 1', 3, '[{"nom":"AWALEU NKANFFA","prenom":"Ghislain"},{"nom":"BESSE","prenom":"Ludivine"},{"nom":"BOUILLER","prenom":"Romain"},{"nom":"BRILLAUD","prenom":"Robin"},{"nom":"BRUNET","prenom":"Florian"},{"nom":"CASTEX","prenom":"Mathieu"},{"nom":"CHENDJOUO","prenom":"Jamel"},{"nom":"COTTREL","prenom":"Tony"},{"nom":"ES-SAHLI","prenom":"Marouane"},{"nom":"KETTABI","prenom":"Yassine"},{"nom":"OUAHIDI","prenom":"Ghassane"},{"nom":"PERA","prenom":"Cl\\u00e9mence"},{"nom":"TCHAKOUDJOU","prenom":"Hamelle"},{"nom":"TIEGOUM NINTCHEU","prenom":"C\\u00e9dric"},{"nom":"VINCENT","prenom":"Valentin"}]', '3iL', 1),
(10, 'Cs2i Ms In A2 Groupe 1', 2, '[{"nom":"BERTAL","prenom":"Maxence"},{"nom":"DJEUZONG DONGFACK","prenom":"Arnol"},{"nom":"DJIEPE FOTSO","prenom":"Christelle"},{"nom":"ISOLET","prenom":"Florian"},{"nom":"KAMGA","prenom":"Louis"},{"nom":"MBONGO MABONGUE","prenom":"Serge"},{"nom":"NDJOCKA MPOUDI","prenom":"Benjamin"},{"nom":"NKOMBOU SIME","prenom":"Sidoine"},{"nom":"TAFOU KOUEJOU","prenom":"Jacques"},{"nom":"TCHINDA BOUKEU","prenom":"Th\\u00e9r\\u00e8se"},{"nom":"TIENTCHEU NGUEUNKAM","prenom":"Vanessa"},{"nom":"ZOUNGRANA","prenom":"Abdoulaye"}]', 'MS2i', 1),
(11, '3iL A3 Groupe 2', 3, '[{"nom":"BOMBEAUX","prenom":"Claire"},{"nom":"COUCHY","prenom":"Malik"},{"nom":"DJOUMGOUE TCHOUALAK","prenom":"Marc-Eric"},{"nom":"KOUMBA DOUKAGA","prenom":"Yves-R\\u00e9gis"},{"nom":"LAJOINIE","prenom":"Aur\\u00e9lien"},{"nom":"MA\\u00c7ON","prenom":"Fabien"},{"nom":"MARMORET","prenom":"Xavier"},{"nom":"NAFACK TAPONDJOU","prenom":"Ronald"},{"nom":"NAIT MBAREK","prenom":"Hind"},{"nom":"RABATEL","prenom":"Yohann"},{"nom":"WANDJIE NGANYO","prenom":"Wilfried"}]', '3iL', 2),
(12, '3iL A1 Groupe 5 Apprentis', 1, '[{"nom":"CHAUVIN-RIVET","prenom":"Vivian"},{"nom":"CIBILLON","prenom":"Beno\\u00eet"},{"nom":"COMMEUREUC","prenom":"Mathieu"},{"nom":"DELMAS","prenom":"K\\u00e9vin"},{"nom":"DOUHERET","prenom":"Oumayma"},{"nom":"GOUINAUD","prenom":"Alex"},{"nom":"GUILLARD","prenom":"Paul"},{"nom":"GUILLOIS","prenom":"Valentin"},{"nom":"MARTAILLE","prenom":"Cl\\u00e9ment"},{"nom":"PELVET","prenom":"Nicolas"},{"nom":"REVERDY","prenom":"Damien"},{"nom":"ROBIN","prenom":"Arnaud"},{"nom":"SACHOT","prenom":"No\\u00e9mie"},{"nom":"SAUTOUR","prenom":"Jordane"}]', '3iL', 5),
(13, '3iL A1 Groupe 2', 1, '[{"nom":"CORNILLE","prenom":"Cyril"},{"nom":"DE LOUISE","prenom":"Gr\\u00e9gory"},{"nom":"GHOULIDI","prenom":"Zakia"},{"nom":"HU","prenom":"Bo"},{"nom":"LANQUETIN","prenom":"Haris"},{"nom":"LAZREK","prenom":"Abderrahim"},{"nom":"LEBON","prenom":"Lionel"},{"nom":"LONTSIE GOULA","prenom":"Aur\\u00e9lien"},{"nom":"MALONGA","prenom":"Alan Pierre Claver"},{"nom":"MANDENG","prenom":"Samuel Bonachi"},{"nom":"MANSCOURT","prenom":"Clotaire"},{"nom":"MARTIN","prenom":"K\\u00e9vin"},{"nom":"MESSY","prenom":"Lo\\u00efc Carrel"},{"nom":"MUSSET","prenom":"Thomas"},{"nom":"NTAPLI NGUEFACK","prenom":"Celse Beno\\u00eet"},{"nom":"RAVAT","prenom":"Vincent"},{"nom":"SEHRANI","prenom":"Mohamed-Amine"},{"nom":"SPIELMANN","prenom":"Antoine"},{"nom":"TAMOKOUE NZUMGUENG","prenom":"Jo\\u00ebl Hermann"},{"nom":"TATNETIO MOUTCHOU","prenom":"Galvani"},{"nom":"VIGIER","prenom":"Romain"}]', '3iL', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(256) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(256) CHARACTER SET utf8 NOT NULL,
  `motdepasse` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) NOT NULL,
  `type` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `motdepasse`, `email`, `type`) VALUES
(11, 'logintest', 'test', 'test', 'f841d9b9c72e60f03253dfc8d534ffbf', 'mail@test.fr', 0),
(13, 'trinhj', 'trinh', 'jonathan', '9f028add48ce525d16419ed2d91f9bfb', 'trinhj@3il.fr', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
