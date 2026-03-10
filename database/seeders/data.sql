-- ------------------------ Genre film ------------------------------------------------------------------------
INSERT INTO genre_film (LibGenreFilm) VALUES
('Horreur'),
('Action'),
('Animation'),
('Surnaturel');

-- ------------------------film-----------------------------------------------------------------------------------
-- Until Dawn (Genre: Horreur - IdGenreFilm = 1)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Until Dawn', 105, '2025-04-23', 'Huit amis retournent dans le chalet isolé où deux membres de leur groupe ont disparu un an plus tôt. La peur les gagne alors que la montagne semble se refermer sur eux.', 'Français', 0, 'affiches/UntilDawn-LaMortSansFin.jpg', 1);

-- Chainsaw Man (Genre: Action - IdGenreFilm = 2)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Chainsaw Man', 120, '2025-10-22', 'Denji, un jeune homme pauvre, fusionne avec son chien-démon Pochita pour devenir Chainsaw Man. Il rejoint alors les Devil Hunters pour traquer les démons les plus dangereux.', 'Français', 0, 'affiches/ChainsawMan–LeFilm-L-arc-de-Reze.jpg', 2);

-- John Wick (Genre: Action - IdGenreFilm = 2)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('John Wick', 101, '2025-06-12', 'Un ancien tueur à gages légendaire sort de sa retraite pour traquer les gangsters qui lui ont tout pris, déclenchant une guerre sans merci au cœur de la pègre', 'Français', 0, 'affiches/JohnWick2.jpg', 2);

-- Scream VI (Genre: Horreur - IdGenreFilm = 1)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Scream VI', 122, '2023-03-28', 'Les survivants des derniers meurtres de Ghostface quittent Woodsboro pour tenter de prendre un nouveau départ à New York, mais le tueur masqué les y attend.', 'Français', 0, 'affiches/Scream7.jpg', 1);

-- Shrek 5 (Genre: Animation - IdGenreFilm = 3)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Shrek 5', 105, '2026-06-10', 'Le célèbre ogre vert, l\'Âne et le Chat Potté sont de retour pour une toute nouvelle aventure hilarante dans le royaume de Fort Fort Lointain.', 'Français', 0, 'affiches/Shrek5.jpg', 3);

-- Avengers: Doomsday (Genre: Action - IdGenreFilm = 2)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Avengers: Doomsday', 150, '2026-05-01', 'Face à une nouvelle menace cosmique incarnée par le redoutable Docteur Doom, les héros les plus puissants de la Terre doivent se rassembler une nouvelle fois.', 'Français', 0, 'affiches/AvengersDoomsday.webp', 2);

-- Spider-Man: New Generation (Genre: Animation - IdGenreFilm = 3)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Spider-Man: New Generation', 117, '2018-11-06', 'Miles Morales, un adolescent de Brooklyn, découvre les possibilités illimitées du Spider-Verse, un univers où plus d\'un héros peut porter le masque.', 'Français', 0, 'affiches/spider-man-into-the-spider-verse.jpg', 3);

-- The Conjuring: Last Rites (Genre: Surnaturel - IdGenreFilm = 4)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('The Conjuring: Last Rites', 112, '2025-09-15', 'Les enquêteurs paranormaux Ed et Lorraine Warren font face à leur dernière enquête terrifiante impliquant une malédiction ancienne.', 'Français', 0, 'affiches/TheConjuring4.jpg', 4);

-- Gladiator II (Genre: Action - IdGenreFilm = 2)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Gladiator II', 148, '2025-11-17', 'Des années après la mort de Maximus, Lucius est forcé d\'entrer dans le Colisée pour combattre les empereurs tyranniques et rendre sa gloire à Rome.', 'Français', 0, 'affiches/Gladiator2.jpg', 2);

-- Beetlejuice Beetlejuice (Genre: Surnaturel - IdGenreFilm = 4)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Beetlejuice Beetlejuice', 104, '2024-09-13', 'Après une tragédie familiale, les Deetz reviennent à Winter River. La vie de Lydia bascule quand le portail de l\'au-delà est accidentellement rouvert.', 'Français', 0, 'affiches/Beetlejuice-Beetlejuice.jpg', 4);

-- Vice-Versa 2 (Genre: Animation - IdGenreFilm = 3)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Vice-Versa 2', 96, '2024-07-24', 'Riley est désormais une adolescente. Son quartier général émotionnel subit un grand chamboulement avec l\'arrivée d\'une nouvelle émotion : l\'Anxiété.', 'Français', 0, 'affiches/Vice-versa2.jpg', 3);

-- Mission: Impossible - The Final Reckoning (Genre: Action - IdGenreFilm = 2)
INSERT INTO films (TitreFilm, LongueurFilm, DateSortieFilm, ResumeFilm, LangueFilm, TroisDOuNon, AfficheFilm, IdGenreFilm)
VALUES ('Mission: Impossible - The Final Reckoning', 160, '2025-05-26', 'Ethan Hunt et son équipe de l\'IMF se lancent dans leur mission la plus périlleuse pour traquer une arme terrifiante qui menace l\'humanité entière.', 'Français', 0, 'affiches/Mission-Impossible.jpg', 2);

-- ------------------------------------- personnes -----------------------------------------------------------

-- Acteurs pour Until Dawn
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Rami', 'Malek', '1981-05-12', 'Américaine', 'Acteur oscarisé connu pour Bohemian Rhapsody et Mr. Robot.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Hayden', 'Panettiere', '1989-08-21', 'Américaine', 'Actrice connue pour Heroes et Scream.');

-- Acteurs pour Chainsaw Man
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Satoh', 'Takeru', '1989-03-21', 'Japonaise', 'Acteur japonais populaire au cinéma et à la télévision.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Komatsu', 'Nana', '1996-02-16', 'Japonaise', 'Actrice et mannequin japonaise talentueuse.');

-- Acteurs pour John Wick
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Reeves', 'Keanu', '1964-09-02', 'Canadienne', 'Acteur emblématique connu pour Matrix et John Wick.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('McShane', 'Ian', '1942-09-29', 'Britannique', 'Acteur britannique vétéran du cinéma et de la télévision.');

-- Acteurs pour Scream VI
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Ortega', 'Jenna', '2002-09-27', 'Américaine', 'Jeune actrice montante connue pour Wednesday et Scream.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Barrera', 'Melissa', '1990-07-04', 'Mexicaine', 'Actrice et chanteuse mexicaine.');

-- Acteurs pour Shrek 5
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Myers', 'Mike', '1963-05-25', 'Canadienne', 'Acteur et comédien, voix de Shrek en version originale.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Murphy', 'Eddie', '1961-04-03', 'Américaine', 'Acteur et comédien légendaire, voix de l\'Âne dans Shrek.');

-- Acteurs pour Avengers: Doomsday
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Downey Jr.', 'Robert', '1965-04-04', 'Américaine', 'Acteur iconique incarnant Iron Man dans le MCU.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Johansson', 'Scarlett', '1984-11-22', 'Américaine', 'Actrice talentueuse connue pour son rôle de Black Widow.');

-- Acteurs pour Spider-Man: New Generation
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Moore', 'Shameik', '1995-05-04', 'Américaine', 'Acteur et rappeur, voix de Miles Morales.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Steinfeld', 'Hailee', '1996-12-11', 'Américaine', 'Actrice et chanteuse, voix de Gwen Stacy.');

-- Acteurs pour The Conjuring: Last Rites
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Wilson', 'Patrick', '1973-07-03', 'Américaine', 'Acteur incarnant Ed Warren dans la franchise Conjuring.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Farmiga', 'Vera', '1973-08-06', 'Américaine', 'Actrice incarnant Lorraine Warren dans la franchise Conjuring.');

-- Acteurs pour Gladiator II
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Mescal', 'Paul', '1996-02-02', 'Irlandaise', 'Acteur irlandais montant, connu pour Normal People.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Washington', 'Denzel', '1954-12-28', 'Américaine', 'Acteur oscarisé, légende du cinéma américain.');

-- Acteurs pour Beetlejuice Beetlejuice
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Keaton', 'Michael', '1951-09-05', 'Américaine', 'Acteur emblématique incarnant Beetlejuice et Batman.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Ryder', 'Winona', '1971-10-29', 'Américaine', 'Actrice culte connue pour Stranger Things et Beetlejuice.');

-- Acteurs pour Vice-Versa 2
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Poehler', 'Amy', '1971-09-16', 'Américaine', 'Actrice et comédienne, voix de Joie dans Vice-Versa.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Hawk', 'Tony', '1968-05-12', 'Américaine', 'Skateur professionnel et acteur occasionnel.');

-- Acteurs pour Mission: Impossible - The Final Reckoning
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Cruise', 'Tom', '1962-07-03', 'Américaine', 'Superstar hollywoodienne incarnant Ethan Hunt depuis 1996.');

INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Ferguson', 'Rebecca', '1983-10-19', 'Suédoise', 'Actrice suédoise talentueuse de la franchise Mission Impossible.');
--					/-----------------------------------------\
-- Réalisateur pour Until Dawn
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Benson', 'David F.', '1968-09-04', 'Américaine', 'Réalisateur et scénariste spécialisé dans les film d\'horreur.');

-- Réalisateur pour Chainsaw Man
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Nakayama', 'Ryu', '1974-07-15', 'Japonaise', 'Réalisateur japonais connu pour ses adaptations de mangas.');

-- Réalisateur pour John Wick
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Stahelski', 'Chad', '1968-09-20', 'Américaine', 'Réalisateur et ancien cascadeur, créateur de la franchise John Wick.');

-- Réalisateur pour Scream VI
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Bettinelli-Olpin', 'Matt', '1978-02-19', 'Américaine', 'Réalisateur du duo Radio Silence, spécialisé dans l\'horreur moderne.');

-- Réalisateur pour Shrek 5
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Greno', 'Walt', '1968-02-23', 'Américaine', 'Réalisateur d\'animation chez DreamWorks et Disney.');

-- Réalisateur pour Avengers: Doomsday
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Russo', 'Anthony', '1970-02-03', 'Américaine', 'Réalisateur du duo Russo Brothers, maître des film Marvel.');

-- Réalisateur pour Spider-Man: New Generation
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Powers', 'Joaquim Dos Santos', '1977-06-22', 'Américaine', 'Réalisateur d\'animation primé aux Oscars pour Spider-Verse.');

-- Réalisateur pour The Conjuring: Last Rites
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Chaves', 'Michael', '1981-05-10', 'Américaine', 'Réalisateur spécialisé dans l\'horreur, partie de l\'univers Conjuring.');

-- Réalisateur pour Gladiator II
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Scott', 'Ridley', '1937-11-30', 'Britannique', 'Réalisateur légendaire d\'Alien, Blade Runner et Gladiator.');

-- Réalisateur pour Beetlejuice Beetlejuice
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Burton', 'Tim', '1958-08-25', 'Américaine', 'Réalisateur visionnaire connu pour son univers gothique unique.');

-- Réalisateur pour Vice-Versa 2
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Mann', 'Kelsey', '1977-03-22', 'Américaine', 'Réalisateur d\'animation chez Pixar, créatif et innovant.');

-- Réalisateur pour Mission: Impossible - The Final Reckoning
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('McQuarrie', 'Christopher', '1968-06-25', 'Américaine', 'Réalisateur et scénariste oscarisé, collaborateur fidèle de Tom Cruise.');
--					/-----------------------------------------\
-- Scénariste pour Until Dawn
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Fessenden', 'Larry', '1963-03-23', 'Américaine', 'Scénariste et réalisateur indépendant spécialisé dans l\'horreur.');

-- Scénariste pour Chainsaw Man
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Fujimoto', 'Tatsuki', '1992-10-10', 'Japonaise', 'Mangaka et scénariste créateur de Chainsaw Man.');

-- Scénariste pour John Wick
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Kolstad', 'Derek', '1974-04-04', 'Américaine', 'Scénariste créateur de l\'univers John Wick.');

-- Scénariste pour Scream VI
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Busick', 'James', '1982-11-15', 'Américaine', 'Scénariste moderne spécialisé dans les film d\'horreur slasher.');

-- Scénariste pour Shrek 5
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('McCullers', 'Michael', '1971-04-16', 'Américaine', 'Scénariste comique ayant travaillé sur plusieurs film d\'animation.');

-- Scénariste pour Avengers: Doomsday
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Markus', 'Christopher', '1970-01-02', 'Américaine', 'Scénariste du duo Markus & McFeely, architecte du MCU.');

-- Scénariste pour Spider-Man: New Generation
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Lord', 'Phil', '1975-07-12', 'Américaine', 'Scénariste et producteur oscarisé du duo Lord & Miller.');

-- Scénariste pour The Conjuring: Last Rites
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Dauberman', 'Gary', '1983-05-07', 'Américaine', 'Scénariste spécialisé dans l\'horreur de l\'univers Conjuring et Annabelle.');

-- Scénariste pour Gladiator II
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Scarpa', 'David', '1968-08-17', 'Américaine', 'Scénariste de film épiques et historiques.');

-- Scénariste pour Beetlejuice Beetlejuice
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Gough', 'Alfred', '1967-08-22', 'Américaine', 'Scénariste prolifique du duo Gough & Millar.');

-- Scénariste pour Vice-Versa 2
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Docter', 'Pete', '1968-10-09', 'Américaine', 'Scénariste et réalisateur légendaire chez Pixar, créateur de Vice-Versa.');

-- Scénariste pour Mission: Impossible - The Final Reckoning
INSERT INTO personnes (NomPer, PrePer, DateNaissancePer, NationalitePer, BiographiePer)
VALUES ('Pearce', 'Erik', '1982-09-14', 'Américaine', 'Scénariste d\'action spécialisé dans les séquences à haute intensité.');

-- ------------------------ Role personne ------------------------------------------------------------------------
INSERT INTO role_personne (LibRolePer) VALUES
('Acteur'),
('Scénariste'),
('Réalisateur');

-- ------------------------ Travailler --------------------------------------------------------------
-- Until Dawn (Film ID = 1)-
INSERT INTO Travailler (IdFilm, IdRolePer, Idper) VALUES
(1, 1, 1),   -- Rami Malek - Acteur
(1, 1, 2),   -- Hayden Panettiere - Acteur
(1, 3, 25),  -- David F. Benson - Réalisateur
(1, 2, 37);  -- Larry Fessenden - Scénariste

-- Chainsaw Man (Film ID = 2)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(2, 1, 3),   -- Satoh Takeru - Acteur
(2, 1, 4),   -- Komatsu Nana - Acteur
(2, 3, 26),  -- Ryu Nakayama - Réalisateur
(2, 2, 38);  -- Tatsuki Fujimoto - Scénariste

-- John Wick (Film ID = 3)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(3, 1, 5),   -- Keanu Reeves - Acteur
(3, 1, 6),   -- Ian McShane - Acteur
(3, 3, 27),  -- Chad Stahelski - Réalisateur
(3, 2, 39);  -- Derek Kolstad - Scénariste

-- Scream VI (Film ID = 4)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(4, 1, 7),   -- Jenna Ortega - Acteur
(4, 1, 8),   -- Melissa Barrera - Acteur
(4, 3, 28),  -- Matt Bettinelli-Olpin - Réalisateur
(4, 2, 40);  -- James Busick - Scénariste

-- Shrek 5 (Film ID = 5)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(5, 1, 9),   -- Mike Myers - Acteur
(5, 1, 10),  -- Eddie Murphy - Acteur
(5, 3, 29),  -- Walt Greno - Réalisateur
(5, 2, 41);  -- Michael McCullers - Scénariste

-- Avengers: Doomsday (Film ID = 6)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(6, 1, 11),  -- Robert Downey Jr. - Acteur
(6, 1, 12),  -- Scarlett Johansson - Acteur
(6, 3, 30),  -- Anthony Russo - Réalisateur
(6, 2, 42);  -- Christopher Markus - Scénariste

-- Spider-Man: New Generation (Film ID = 7)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(7, 1, 13),  -- Shameik Moore - Acteur
(7, 1, 14),  -- Hailee Steinfeld - Acteur
(7, 3, 31),  -- Joaquim Dos Santos Powers - Réalisateur
(7, 2, 43);  -- Phil Lord - Scénariste

-- The Conjuring: Last Rites (Film ID = 8)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(8, 1, 15),  -- Patrick Wilson - Acteur
(8, 1, 16),  -- Vera Farmiga - Acteur
(8, 3, 32),  -- Michael Chaves - Réalisateur
(8, 2, 44);  -- Gary Dauberman - Scénariste

-- Gladiator II (Film ID = 9)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(9, 1, 17),  -- Paul Mescal - Acteur
(9, 1, 18),  -- Denzel Washington - Acteur
(9, 3, 33),  -- Ridley Scott - Réalisateur
(9, 2, 45);  -- David Scarpa - Scénariste

-- Beetlejuice Beetlejuice (Film ID = 10)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(10, 1, 19), -- Michael Keaton - Acteur
(10, 1, 20), -- Winona Ryder - Acteur
(10, 3, 34), -- Tim Burton - Réalisateur
(10, 2, 46); -- Alfred Gough - Scénariste

-- Vice-Versa 2 (Film ID = 11)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(11, 1, 21), -- Amy Poehler - Acteur
(11, 1, 22), -- Tony Hawk - Acteur
(11, 3, 35), -- Kelsey Mann - Réalisateur
(11, 2, 47); -- Pete Docter - Scénariste

-- Mission: Impossible - The Final Reckoning (Film ID = 12)
INSERT INTO Travailler (IdFilm, IdRolePer, IdPer) VALUES
(12, 1, 23), -- Tom Cruise - Acteur
(12, 1, 24), -- Rebecca Ferguson - Acteur
(12, 3, 36), -- Christopher McQuarrie - Réalisateur
(12, 2, 48); -- Erik Pearce - Scénariste

-- ------------------------ Type role utilisateur --------------------------------------------------------------
INSERT INTO type_role_uti (LibRoleUti) VALUES
('Admin'),
('Utilisateur');

-- ------------------------ Utilisateur --------------------------------------------------------------
INSERT INTO Utilisateur (LoginUti, MdpUti, IdTypeRoleUti)
VALUES ('admin@gmail.com', '$2y$10$pPhlrHVk2VppK1oEWGdn0OrrntIMDVOP/RnQYZtjEU2vjUnB.VzVq', 1);

INSERT INTO Utilisateur (LoginUti, MdpUti, IdTypeRoleUti)
VALUES ('bob@gmail.com', '$2y$10$PoImmK/2qmiPiQX0qdX3v.tsrqesVxGQU2IySvM5v28PNUBwurGj2', 2);


-- ------------------------ cinema ------------------------------------------------------------------------
INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('17 Rue Dr Bouchut', '69003', 'Lyon');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('7 place de la rotonde', '75001', 'Paris');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('12 Rue Yvonne Jean-Haffen', '35000', 'Rennes');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('13-15 Rue Georges Bonnac', '33000', 'Bordeaux');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('36 Av. du Prado', '13006', 'Marseille');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('3 Rue des Francs-Bourgeois', '67000', 'Strasbourg');

INSERT INTO Cinema (AdresseCine, CodPostCine, VilleCine)
VALUES ('40 Rue de Béthune', '59800', 'Lille');

-- ------------------------ Programmation ------------------------------------------------------------------------
-- Programmations pour Until Dawn (IdFilm = 1)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-04-25', '14:00:00', 1, 1);

-- Programmations pour Chainsaw Man (IdFilm = 2)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-10-24', '15:30:00', 2, 2);

-- Programmations pour John Wick (IdFilm = 3)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-06-14', '16:00:00', 3,3);

-- Programmations pour Scream VI (IdFilm = 4)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2023-03-30', '14:30:00', 4, 5);

-- Programmations pour Shrek 5 (IdFilm = 5)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2026-06-12', '13:00:00', 5, 4);

-- Programmations pour Avengers: Doomsday (IdFilm = 6)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2026-05-03', '18:00:00', 6, 6);

-- Programmations pour Spider-Man: New Generation (IdFilm = 7)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2018-11-08', '14:30:00', 7, 7);

-- Programmations pour The Conjuring: Last Rites (IdFilm = 8)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-09-17', '19:00:00', 8, 8);

-- Programmations pour Gladiator II (IdFilm = 9)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-11-19', '19:30:00', 9, 5);

-- Programmations pour Beetlejuice Beetlejuice (IdFilm = 10)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2024-09-15', '16:00:00', 10, 4);

-- Programmations pour Vice-Versa 2 (IdFilm = 11)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2024-07-26', '13:30:00', 11, 6);

-- Programmations pour Mission: Impossible - The Final Reckoning (IdFilm = 12)
INSERT INTO programmation (DateProg, HeureProg, IdFilm, NumSalle) VALUES ('2025-05-28', '21:30:00', 12, 2);

-- ------------------------ salle ------------------------------------------------------------------------
INSERT INTO salle (NumSalle, Capacite, IdProg, IdCinema) VALUES
(1, 200, 1, 1),
(2, 150, 2, 1),
(3, 180, 3, 2),
(4, 120, 4, 3),
(5, 250, 5, 4),
(6, 100, 6, 5),
(7, 160, 7, 6),
(8, 140, 8, 7);

-- ------------------------ reservation ------------------------------------------------------------------------
-- Réservations pour la programmation 1 (Until Dawn - 2025-04-25 14:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-20 10:30:00', 1);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-21 15:45:00', 1);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-23 09:20:00', 1);

-- Réservations pour la programmation 2 (Until Dawn - 2025-04-25 20:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-22 18:00:00', 2);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-24 14:30:00', 2);

-- Réservations pour la programmation 3 (Until Dawn - 2025-04-26 18:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-04-25 11:00:00', 3);

-- Réservations pour la programmation 4 (Chainsaw Man - 2025-10-24 15:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-10-20 16:45:00', 4);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-10-22 13:20:00', 4);

-- Réservations pour la programmation 5 (Chainsaw Man - 2025-10-24 21:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-10-23 19:30:00', 5);

-- Réservations pour la programmation 6 (Chainsaw Man - 2025-10-25 19:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-10-24 10:15:00', 6);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-10-24 20:45:00', 6);

-- Réservations pour la programmation 7 (John Wick - 2025-06-14 16:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-06-10 12:00:00', 7);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-06-12 17:30:00', 7);

-- Réservations pour la programmation 8 (John Wick - 2025-06-14 20:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-06-13 15:20:00', 8);

-- Réservations pour la programmation 9 (John Wick - 2025-06-15 18:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-06-14 09:45:00', 9);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2025-06-14 19:00:00', 9);

-- Réservations pour la programmation 10 (Scream VI - 2023-03-30 14:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2023-03-28 11:30:00', 10);

-- Réservations pour la programmation 11 (Scream VI - 2023-03-30 19:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2023-03-29 16:15:00', 11);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2023-03-30 10:00:00', 11);

-- Réservations pour la programmation 12 (Scream VI - 2023-03-31 21:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2023-03-30 20:30:00', 12);

-- Réservations pour la programmation 13 (Shrek 5 - 2026-06-12 13:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2026-06-08 14:45:00', 13);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2026-06-10 09:30:00', 13);

-- Réservations pour la programmation 14 (Shrek 5 - 2026-06-12 15:30)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2026-06-11 18:20:00', 14);

-- Réservations pour la programmation 15 (Shrek 5 - 2026-06-13 11:00)
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2026-06-12 16:00:00', 15);
INSERT INTO Reservation (DateDeRes, IdProg) VALUES ('2026-06-12 21:15:00', 15);

-- ------------------------ effectuer ------------------------------------------------------------------------
-- Utilisateur Bob (IdUtilisateur = 1) effectue plusieurs réservations
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 1);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 2);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 5);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 8);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 12);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 15);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 18);
INSERT INTO Effectuer (IdUtilisateur, IdRes) VALUES (1, 20);

-- ------------------------ effectuer ------------------------------------------------------------------------
-- Bob (IdUtilisateur = 1) note plusieurs films
-- Until Dawn (IdFilm = 1) - Note: 4/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (1, 1, 4);

-- Chainsaw Man (IdFilm = 2) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (2, 1, 5);

-- John Wick (IdFilm = 3) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (3, 1, 5);

-- Scream VI (IdFilm = 4) - Note: 3/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (4, 1, 3);

-- Shrek 5 (IdFilm = 5) - Note: 4/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (5, 1, 4);

-- Avengers: Doomsday (IdFilm = 6) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (6, 1, 5);

-- Spider-Man: New Generation (IdFilm = 7) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (7, 1, 5);

-- The Conjuring: Last Rites (IdFilm = 8) - Note: 4/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (8, 1, 4);

-- Gladiator II (IdFilm = 9) - Note: 4/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (9, 1, 4);

-- Beetlejuice Beetlejuice (IdFilm = 10) - Note: 3/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (10, 1, 3);

-- Vice-Versa 2 (IdFilm = 11) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (11, 1, 5);

-- Mission: Impossible (IdFilm = 12) - Note: 5/5
INSERT INTO Noter (IdFilm, IdUtilisateur, Note) VALUES (12, 1, 5);
