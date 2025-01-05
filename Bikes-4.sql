-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: mysql_db
-- Timp de generare: mai 06, 2024 la 09:53 AM
-- Versiune server: 8.3.0
-- Versiune PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `Bikes`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bikes`
--

CREATE TABLE `bikes` (
  `id` int NOT NULL,
  `brand` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(100) NOT NULL,
  `pret` int NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `bikes`
--

INSERT INTO `bikes` (`id`, `brand`, `model`, `type`, `size`, `color`, `pret`, `description`, `image`) VALUES
(1, 'Trek', 'X-Caliber 9', 'Mountain bike', 'M', 'Negru și verde', 3500, '', '/images/img-2.png'),
(2, 'Specialized', 'Roll Elite', 'Bicicletă de oraș', 'L', 'Gri', 2600, 'Bicicletă urbană confortabilă, perfectă pentru deplasările zilnice în oraș.', 'images/img-4.png'),
(3, 'Giant', 'TCR Advanced Pro 1', 'Bicicletă de curse', 'S', 'Roșu și negru', 8000, 'Bicicletă de curse din carbon, ușoară și rigidă, ideală pentru competiții și antrenamente intensive.', 'images/img-3.png');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'ana', 'ana@gmail.com', '09876543234', 'mknjskbhdvgu', '2024-05-06 09:37:10'),
(2, 'ana', 'ana@gmail.com', '09876543234', 'mknjskbhdvgu', '2024-05-06 09:41:00'),
(3, 'Vasile', 'vasile@yahoo.com', '0987654', 'ndhjfg', '2024-05-06 09:41:37'),
(4, 'alex', 'alex@qnjkh.com', '098764347', 'njdhsutc', '2024-05-06 09:50:33');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registration_date`, `remember_token`, `role`) VALUES
(1, 'ana', 'ana@in.ro', '$2y$10$z/aqFRTTLlq6eCHrxt/79./C67w2yaWaEFp3wT1MRSl4PRHXDry9S', '2024-04-30 12:56:48', '1da01667182a930d7eb7bfef86865a9d3e24aaa9573bd829d6ad1e133caa4aa5', ''),
(2, 'Alex', 'alex@gmail.com', '$2y$10$Cev.RE0prnfrjiovFtslSusSNW0WIJpIbVGXmY/mUZcj4vBXAu3RS', '2024-04-30 13:28:41', '845e1c5570f999fa9a303efea53026edce9ce4aeaf447c086d69acdf418282eb', ''),
(3, 'vasile', 'vasile@gmail.com', '$2y$10$MIfcL6xyU7n6Jci7N/qwZ.58FaybCXqOqAU59Jv0yI5AG4aqlcB/a', '2024-05-03 14:14:18', '62fbe927191795916cba477fc5e17c4276169f3f95d6d96c9ff4eab020f122e5', 'user'),
(6, 'admin', 'admin@gmail.com', '$2y$10$KqQmm.98cGtScjoYFa9mB.7HVwr/ApPyGvJ82C3zuv6svOdmLvQBm', '2024-05-03 14:15:35', 'f2b8fe04f1c20b70af789a208a8bd0563dafd5a04be37d17e2e497365dffd838', 'admin'),
(7, '', 'ajkd@bdhfj.com', '$2y$10$RG82I61qlPdUW93s9cTUGOAdlAp412JFbjVWyNtqJLiXhxoFS0Fz2', '2024-05-03 14:20:53', 'cfc4925bb5054f2590846992114bf2c7bd46cea97a7d480ed09e3ecfdebce059', 'user'),
(8, '', 'ajkd@bdhfj.com', '$2y$10$CdVVhovMZhn1R995oApyuOpvlKuymZZ7qqQvoqWyO6vQ/l45hYzVO', '2024-05-03 14:22:57', 'ccfd3f63cb87e3b66f32e69b78e86da9502a2c4be2cccca7d0f7650c6c38d99c', 'user'),
(9, '1bsd', 'ajkd@bdhfj.com', '$2y$10$C/vAL8or7cI7TAVuWsHe0uypz4bA7oQqCwXmDhzYcOWO7Ezywjf6.', '2024-05-03 14:23:30', '17426d5e6299dd32a5fe3dc6eb346f67b8a60ef0fef810d4c8d48b0afba5bff8', 'user');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
