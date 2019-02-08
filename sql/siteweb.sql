-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 fév. 2019 à 11:51
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `uID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`uID`, `nom`) VALUES
(1, 'index.php'),
(2, 'news.php'),
(3, 'photos.php'),
(4, 'contact.php');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `uID` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`uID`, `page_id`, `date_creation`, `date_modification`, `contenu`) VALUES
(1, 1, '2019-02-08 11:47:03', '2019-02-08 11:47:03', '<p>Pouet et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia despectare terrena.</p>\r\n<p>Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.</p>\r\n<p>Iis igitur est difficilius satis facere, qui se Latina scripta dicunt contemnere. in quibus hoc primum est in quo admirer, cur in gravissimis rebus non delectet eos sermo patrius, cum idem fabellas Latinas ad verbum e Graecis expressas non inviti legant. quis enim tam inimicus paene nomini Romano est, qui Ennii Medeam aut Antiopam Pacuvii spernat aut reiciat, quod se isdem Euripidis fabulis delectari dicat, Latinas litteras oderit?\r\n<p>Horum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxere procursu et agiliter praeterito Calycadni fluminis ponte, cuius undarum magnitudo murorum adluit turres, in speciem locavere pugnandi. neque tamen exiluit quisquam nec permissus est congredi. formidabatur enim flagrans vesania manus et superior numero et ruitura sine respectu salutis in ferrum.</p>\r\n<p>Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `mdp` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uID`, `login`, `email`, `mdp`, `nom`, `prenom`) VALUES
(1, 'm.defrances', 'maxime.defrances@hotmail.fr', '123456', 'Defrances', 'Maxime'),
(2, 'o.ramond', 'olivier.ramond.pro@gmail.com', 'nimda', 'Ramond', 'Olivier'),
(3, 'admin', 'test@test.fr', 'admin', 'Coucou', 'petit filou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`uID`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `section_page` (`page_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `section_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`uID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
