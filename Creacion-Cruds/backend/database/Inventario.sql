CREATE DATABASE IF NOT EXISTS `inventary`;
USE `inventary`;

CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(50) NOT NULL UNIQUE,
  `name` VARCHAR(100) NOT NULL,
  `category` int NOT NULL,
  `price` FLOAT NOT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_category_product` (`category`),
  CONSTRAINT `FK_category_product` FOREIGN KEY (`category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `name`, `createdAt`, `updatedAt`) VALUES
	(1, 'Frutas y Verduras', '2024-03-14 23:51:19.000000', NULL),
	(2, 'Carnes', '2024-03-14 23:51:19.000000', NULL),
	(3, 'Aseo', '2024-03-14 23:51:19.000000', NULL);

INSERT INTO `product` (`id`, `code`, `name`, `category`, `price`, `createdAt`, `updatedAt`) VALUES
	(1, "10000", "Manzana", 1, 10000, '2024-03-14 23:51:19.000000', NULL),
	(2, "10001", "Pera", 1, 14000, '2024-03-14 23:51:19.000000', NULL),
	(3, "10002", "Zanahoria", 1, 15000, '2024-03-14 23:51:19.000000', NULL),
	(4, "10003", "Aguacate", 1, 25000, '2024-03-14 23:51:19.000000', NULL),
	(5, "10004", "Tomate", 1, 14500, '2024-03-14 23:51:19.000000', NULL),
	(6, "10005", "Lomo de cerdo 1Lb", 2, 17800, '2024-03-14 23:51:19.000000', NULL),
	(7, "10006", "Rabailla 1Lb", 2, 13200, '2024-03-14 23:51:19.000000', NULL),
	(8, "10007", "Carne Molida 1Lb", 2, 18600, '2024-03-14 23:51:19.000000', NULL),
	(9, "10008", "Pechuga 1Lb", 2, 15000, '2024-03-14 23:51:19.000000', NULL),
	(10, "10009", "Sobrebarriga 1Lb", 2, 14000, '2024-03-14 23:51:19.000000', NULL),
	(11, "10010", "Limpiapisos", 3, 13200, '2024-03-14 23:51:19.000000', NULL),
	(12, "10011", "Desengrasante", 3, 16000, '2024-03-14 23:51:19.000000', NULL),
	(13, "10012", "Jabón Corporal en Barra", 3, 18500, '2024-03-14 23:51:19.000000', NULL),
	(14, "10013", "Jabón de Loza Líquido", 3, 15400, '2024-03-14 23:51:19.000000', NULL),
	(15, "10014", "Esponjas", 3, 24600, '2024-03-14 23:51:19.000000', NULL);