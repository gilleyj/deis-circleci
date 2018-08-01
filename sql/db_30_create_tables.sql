
DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `recieved` datetime NOT NULL,
  `payload` tinytext NOT NULL
) ENGINE='InnoDB' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
