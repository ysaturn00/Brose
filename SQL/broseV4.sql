-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.3.0 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para brose
CREATE DATABASE IF NOT EXISTS `brose` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `brose`;

-- Copiando estrutura para tabela brose.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `idDepartment` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDepartment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.departments: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela brose.employers
CREATE TABLE IF NOT EXISTS `employers` (
  `idEmployer` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idPosition` int NOT NULL,
  `idDepartment` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lastReview` date DEFAULT NULL,
  PRIMARY KEY (`idEmployer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.employers: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela brose.employer_skill
CREATE TABLE IF NOT EXISTS `employer_skill` (
  `idEmployerSkill` int NOT NULL AUTO_INCREMENT,
  `idEmployer` int NOT NULL,
  `idSkill` int NOT NULL,
  `desired` int NOT NULL,
  `achieved` int NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`idEmployerSkill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.employer_skill: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela brose.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `idPosition` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPosition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.positions: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela brose.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `idSkill` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idSkill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.skills: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela brose.users
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela brose.users: ~1 rows (aproximadamente)
INSERT IGNORE INTO `users` (`idUser`, `email`, `password`, `type`, `token`) VALUES
	(1, 'matheusmilczwski@gmail.com', 'matheus2015', 'admin', '5bdd6ad2f1efc3eda22e03c821bd0912');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
