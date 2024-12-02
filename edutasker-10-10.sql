-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutasker`
--

-- --------------------------------------------------------

--
-- Table structure for table `devoirs`
--

CREATE TABLE `devoirs` (
  `iddevoir` int(11) NOT NULL,
  `idprof` int(11) DEFAULT NULL,
  `idgroup` int(11) DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `devoirs`
--

INSERT INTO `devoirs` (`iddevoir`, `idprof`, `idgroup`, `matiere`, `description`, `deadline`, `pdf_path`) VALUES
(1, 1, 1, 'Mathematics', 'Complete exercises 1 to 5 in the textbook.', '2024-06-15', 'uploads/ajs-tp7.pdf'),
(2, 2, 2, 'Science', 'Write a report on the experiment conducted in class.', '2024-06-20', 'uploads/ajs-tp7.pdf'),
(4, 3, 5, 'English', 'hada eng', '1212-05-12', 'uploads/ajs-tp4.pdf'),
(6, 4, 3, 'History', 'wef', '2024-06-18', 'uploads/ajs-tp1.pdf'),
(7, 5, 1, 'Physics', 'Solve problems 6 to 10 from the textbook.', '2024-06-20', 'uploads/ajs-tp1.pdf'),
(8, 2, 2, 'Biology', 'Prepare a presentation on the topic \"Cell Structure\".', '2024-06-25', 'uploads/ajs-tp1.pdf'),
(10, 1, 3, 'French', 'Write a short story based on the given theme.', '2024-05-20', 'uploads/ajs-tp5.pdf'),
(12, 3, 3, 'Geography', 'Write a research paper on a continent of your choice.', '2024-06-25', 'uploads/ajs-tp7.pdf'),
(13, 4, 1, 'Chemistry', 'Perform the experiment and submit a lab report.', '2024-06-30', 'uploads/ajs-tp7.pdf'),
(14, 5, 2, 'Physics', 'Write an essay on Newton\'s Laws of Motion.', '2024-07-05', 'uploads/ajs-tp7.pdf'),
(16, 3, 4, 'Biology', 'Prepare a poster presentation on a plant species.', '2024-06-20', 'uploads/ajs-tp8.pdf'),
(18, 4, 4, 'French', 'Conduct a debate on a current social issue.', '2024-06-28', 'uploads/ajs-tp10.pdf'),
(20, 5, 1, 'English', 'est une devoir de anglais ', '2024-06-27', 'uploads/pres - Copy (2).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ecole`
--

CREATE TABLE `ecole` (
  `idecole` int(11) NOT NULL,
  `nomecole` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `anneedefondation` int(11) DEFAULT NULL,
  `annededemarrage` int(11) DEFAULT NULL,
  `siteweb` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ecole`
--

INSERT INTO `ecole` (`idecole`, `nomecole`, `logo`, `adresse`, `tel`, `email`, `anneedefondation`, `annededemarrage`, `siteweb`, `type`, `description`) VALUES
(1, 'Charif ElIdrissi', 'bluemountain_logo.jpg', '1234 Oak Street, Springfield', '555-1234', 'info@greenwoodhigh.edu', 1985, 1994, 'http://www.greenwoodhigh.edu', 'Public', 'A well-reputed public high school known for its academic excellence.');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `idetudiant` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `nom`, `prenom`, `adresse`, `tel`, `email`, `datenaissance`, `photo`) VALUES
(1, 'Smith', 'John', '123 Maple Street, Springfield', '555-1010', 'john.smith@example.com', '2005-04-12', 's1.png'),
(2, 'Doe', 'Jane', '456 Oak Avenue, Rivertown', '555-2020', 'jane.doe@example.com', '2004-09-23', 's2.png'),
(3, 'Brown', 'James', '789 Pine Road, Hilltown', '555-3030', 'james.brown@example.com', '2006-01-15', 's3.jpg'),
(4, 'Taylor', 'Emily', '101 Birch Boulevard, Sunnytown', '555-4040', 'emily.taylor@example.com', '2005-06-30', 's4.jpg'),
(5, 'Wilson', 'Michael', '202 Cedar Lane, Laketown', '555-5050', 'michael.wilson@example.com', '2004-12-05', 's5.png'),
(6, 'Johnson', 'Emily', '123 Elm St.', '0556677889', 'emily.johnson@example.com', '2000-05-21', 's7.jpg'),
(7, 'Dubois', 'Marc', '456 Maple Ave.', '0778899001', 'marc.dubois@example.com', '1999-09-15', 's8.jpg'),
(8, 'Rossi', 'Giulia', '789 Pine Blvd.', '0889900112', 'giulia.rossi@example.com', '2001-11-10', 's9.webp'),
(9, 'O\'Connor', 'Liam', '101 Oak St.', '0334455667', 'liam.oconnor@example.com', '1998-07-30', 's10.jpg'),
(10, 'Chen', 'Wei', '202 Birch Ln.', '0445566778', 'wei.chen@example.com', '2002-03-12', 's6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `etudiantgrp`
--

CREATE TABLE `etudiantgrp` (
  `idetudiant` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `etudiantgrp`
--

INSERT INTO `etudiantgrp` (`idetudiant`, `idgroup`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 3),
(7, 5),
(8, 3),
(9, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `idgroupe` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `filiere` varchar(20) NOT NULL,
  `numgroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`idgroupe`, `nom`, `filiere`, `numgroupe`) VALUES
(1, 'Group A', 'Science', 1),
(2, 'Group B', 'Math', 2),
(3, 'Group C', 'Arts', 3),
(4, 'Group D', 'Commerce', 4),
(5, 'Group E', 'Social Studies', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `idpaiement` int(11) NOT NULL,
  `idplan` int(11) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `paye` tinyint(1) DEFAULT NULL,
  `modedepaiement` varchar(50) DEFAULT NULL,
  `datepaiement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `paiement`
--

INSERT INTO `paiement` (`idpaiement`, `idplan`, `datedebut`, `datefin`, `description`, `paye`, `modedepaiement`, `datepaiement`) VALUES
(1, 1, '2024-01-01', '2024-03-31', '3-month plan', 1, 'Credit Card', '2024-01-15'),
(2, 2, '2024-01-01', '2024-12-31', '12-month plan', 0, 'Bank Transfer', NULL),
(3, 1, '2024-04-01', '2024-06-30', '3-month plan', 0, 'Cash', NULL),
(4, 2, '2024-01-01', '2024-12-31', '12-month plan', 1, 'Credit Card', '2024-01-20'),
(5, 2, '2024-07-01', '2025-06-30', '12-month plan', 1, 'Bank Transfer', '2024-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `idplan` int(11) NOT NULL,
  `paiement` varchar(25) DEFAULT NULL,
  `nbrecole` varchar(15) DEFAULT NULL,
  `nbrprof` varchar(15) DEFAULT NULL,
  `nbrdevoir` varchar(15) DEFAULT NULL,
  `nbretud` varchar(15) DEFAULT NULL,
  `duree` int(24) DEFAULT NULL,
  `devoir` varchar(25) NOT NULL,
  `exam` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`idplan`, `paiement`, `nbrecole`, `nbrprof`, `nbrdevoir`, `nbretud`, `duree`, `devoir`, `exam`) VALUES
(1, 'Free', '1', '3', '3', '50', 3, 'oui', 'oui'),
(2, '2000', '1', '10', '100', 'illimite', 12, 'oui', 'oui'),
(3, '3000', '1', '20', '200', 'illimite', 12, 'oui', 'oui'),
(4, '5000', 'illimite', 'illimite', 'illimite', 'illimite', 12, 'oui', 'oui');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `idprof` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`idprof`, `nom`, `prenom`, `tel`, `email`, `photo`) VALUES
(1, 'Martin', 'Alice', '555-6060', 'alice.martin@example', 'p1.jpg'),
(2, 'Johnson', 'Robert', '555-7070', 'robert.johnson@examp', 'p2.jpg'),
(3, 'Dupont', 'Claire', '0987654321', 'claire.dupont@exampl', 'p3.jpg'),
(4, 'Tanaka', 'Hiroshi', '0112233445', 'hiroshi.tanaka@examp', 'p4.jpg'),
(5, 'Ibrahim', 'Khaled', '0223344556', 'khasled.ibrahim@exam', 'p5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profgrp`
--

CREATE TABLE `profgrp` (
  `idprof` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `matiere` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profgrp`
--

INSERT INTO `profgrp` (`idprof`, `idgroup`, `matiere`, `description`) VALUES
(1, 1, 'Mathematics', 'Basic mathematics course for primary level'),
(2, 2, 'Science', 'Introduction to science for primary students');

-- --------------------------------------------------------

--
-- Table structure for table `rattrapage`
--

CREATE TABLE `rattrapage` (
  `idrattrapage` int(11) NOT NULL,
  `idecole` int(11) DEFAULT NULL,
  `idprof` int(11) DEFAULT NULL,
  `idgroup` int(11) DEFAULT NULL,
  `matiere` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rattrapage`
--

INSERT INTO `rattrapage` (`idrattrapage`, `idecole`, `idprof`, `idgroup`, `matiere`, `description`, `deadline`, `pdf_path`) VALUES
(9, 1, 1, 1, 'Mathematics', 'Make-up math exam for Group 1', '2024-07-15', '/path/to/pdf1.pdf'),
(10, 1, 2, 1, 'Science', 'Make-up science project for Group 1', '2024-07-20', '/path/to/pdf2.pdf'),
(11, 1, 3, 1, 'History', 'Make-up history essay for Group 1', '2024-07-25', '/path/to/pdf3.pdf'),
(12, 1, 4, 2, 'Physics', 'Make-up physics test for Group 2', '2024-07-30', '/path/to/pdf4.pdf'),
(13, 1, 5, 2, 'Chemistry', 'Make-up chemistry experiment for Group 2', '2024-08-05', '/path/to/pdf5.pdf'),
(14, 1, 6, 2, 'Biology', 'Make-up biology quiz for Group 2', '2024-08-10', '/path/to/pdf6.pdf'),
(15, 1, 7, 3, 'Geography', 'Make-up geography presentation for Group 3', '2024-08-15', '/path/to/pdf7.pdf'),
(16, 1, 8, 3, 'Literature', 'Make-up literature analysis for Group 3', '2024-08-20', '/path/to/pdf8.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD PRIMARY KEY (`iddevoir`),
  ADD KEY `idprof` (`idprof`),
  ADD KEY `devoirs_ibfk_3` (`idgroup`);

--
-- Indexes for table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`idecole`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetudiant`);

--
-- Indexes for table `etudiantgrp`
--
ALTER TABLE `etudiantgrp`
  ADD KEY `idetudiant` (`idetudiant`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idgroupe`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idpaiement`),
  ADD KEY `idplan` (`idplan`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idplan`),
  ADD KEY `idecole` (`nbrecole`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`idprof`);

--
-- Indexes for table `profgrp`
--
ALTER TABLE `profgrp`
  ADD KEY `idprof` (`idprof`,`idgroup`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `rattrapage`
--
ALTER TABLE `rattrapage`
  ADD PRIMARY KEY (`idrattrapage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devoirs`
--
ALTER TABLE `devoirs`
  MODIFY `iddevoir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `idecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idetudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `idgroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idpaiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prof`
--
ALTER TABLE `prof`
  MODIFY `idprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rattrapage`
--
ALTER TABLE `rattrapage`
  MODIFY `idrattrapage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD CONSTRAINT `devoirs_ibfk_3` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroupe`),
  ADD CONSTRAINT `devoirs_ibfk_5` FOREIGN KEY (`idprof`) REFERENCES `prof` (`idprof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devoirs_ibfk_6` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroupe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etudiantgrp`
--
ALTER TABLE `etudiantgrp`
  ADD CONSTRAINT `etudiantgrp_ibfk_1` FOREIGN KEY (`idetudiant`) REFERENCES `etudiant` (`idetudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiantgrp_ibfk_2` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroupe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_3` FOREIGN KEY (`idplan`) REFERENCES `plan` (`idplan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profgrp`
--
ALTER TABLE `profgrp`
  ADD CONSTRAINT `profgrp_ibfk_1` FOREIGN KEY (`idprof`) REFERENCES `prof` (`idprof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profgrp_ibfk_2` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroupe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
