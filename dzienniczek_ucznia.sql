-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2023, 16:47
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dzienniczek_ucznia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `Id_oceny` int(11) NOT NULL,
  `Ocena` int(2) NOT NULL,
  `Id_przedmiotu` int(11) NOT NULL,
  `Id_ucznia` int(11) NOT NULL,
  `Opis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`Id_oceny`, `Ocena`, `Id_przedmiotu`, `Id_ucznia`, `Opis`) VALUES
(1, 6, 2, 1, 'Zajebista praca warj'),
(74, 5, 3, 1, 'git'),
(75, 1, 1, 1, ''),
(76, 3, 4, 1, 'Sprawdzian'),
(77, 5, 3, 1, 'Aktywność'),
(78, 1, 1, 1, ''),
(79, 1, 1, 1, 'co'),
(80, 1, 1, 1, ''),
(81, 5, 3, 1, 'essa'),
(82, 1, 1, 0, ''),
(83, 1, 1, 0, 'ASD'),
(84, 1, 1, 0, 'SDFASDA'),
(85, 1, 1, 0, ''),
(86, 1, 1, 2, ''),
(87, 6, 2, 2, 'Dobra praca Andrzejku'),
(88, 1, 1, 2, 'Lipa'),
(89, 5, 2, 1, 'sdf'),
(90, 5, 2, 1, 'Ocenka warjacie'),
(91, 4, 1, 2, 'Kartkowka'),
(92, 5, 2, 1, 'Qwert'),
(93, 5, 4, 1, 'kartkówka'),
(94, 6, 4, 1, 'Odpowiedź ustna'),
(95, 5, 3, 2, 'Aktywność');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `Id_przedmiotu` int(11) NOT NULL,
  `Nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`Id_przedmiotu`, `Nazwa`) VALUES
(1, 'Matematyka'),
(2, 'Język Polski'),
(3, 'WF'),
(4, 'Język Angielski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `Id_ucznia` int(20) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `Klasa` text NOT NULL,
  `Rok szkolny` text NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Haslo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`Id_ucznia`, `Imie`, `Nazwisko`, `Klasa`, `Rok szkolny`, `Login`, `Haslo`) VALUES
(1, 'Gustaw', 'Sołdecki', '4pi', '2022/2023', 'Gustaw', '1234'),
(2, 'Andrzejek', 'Kmicic', '4i', '2022/203', 'Andrzejek', '1234');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`Id_oceny`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`Id_przedmiotu`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`Id_ucznia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `Id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `Id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `Id_ucznia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
