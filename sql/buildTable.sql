CREATE TABLE `siteweb`.`users` ( `uID` INT NOT NULL AUTO_INCREMENT , `login` TEXT NOT NULL , `email` TEXT NOT NULL , `mdp` TEXT NOT NULL , `nom` TEXT NOT NULL , `prenom` TEXT NOT NULL , PRIMARY KEY (`uID`)) ENGINE = InnoDB;
INSERT INTO `users` (`uID`, `login`, `email`, `mdp`, `nom`, `prenom`) VALUES (NULL, 'm.defrances', 'maxime.defrances', '123456', 'defrances', 'maxime');
