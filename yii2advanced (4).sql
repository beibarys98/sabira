-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 16, 2025 at 12:07 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `img_path`) VALUES
(5, 'NLP COMMUNICATION', 'uploads/c0QzaE-Yh4GGJdYIN7BPq0NbOoUVfdXE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `module_id`, `title`) VALUES
(1, 1, 'Сабақ 1'),
(2, 2, 'Нейро Логикалық Дәреже бойынша өзіңді терең тану'),
(3, 2, 'Мен үшін не маңызды? Менің құндылықтарым қандай? Терең анализ жасау'),
(4, 2, 'Ер адамға қатысты установкалармен жұмыс'),
(5, 2, 'Мен кіммін? Мен қандаймын? Идентификация бойынша жұмыс'),
(6, 3, 'Кіріспе сабақ. Проработка нәтиже беру үшін сабақты тыңдаңыз.'),
(7, 3, 'Проработка №1'),
(8, 3, 'Проработка №2'),
(9, 3, 'Проработка №3'),
(10, 3, 'Проработка №4'),
(11, 3, 'Проработка №5'),
(12, 3, 'Бонус. Проработка на маму'),
(13, 3, 'Бонус. Проработка на папу'),
(14, 3, 'Бонус. Ақшаға проработка'),
(15, 4, 'Кіріспе'),
(16, 4, 'Раппорт техникасы. (Адамның сеніміне кіру)'),
(17, 4, 'Эмоционалдық раппорт'),
(18, 4, 'Рөлдік раппорт'),
(19, 4, 'Ер мен әйелдің арасындағы баланс'),
(20, 5, 'Ақша және ми'),
(21, 5, 'Ақша және ми 2'),
(22, 5, 'Ақша және ми 3'),
(23, 5, 'Ақша және отбасы 1'),
(24, 5, 'Ақша және отбасы 2'),
(25, 5, 'АҚША ЖӘНЕ КҮЙЕУ, ЕНЕ'),
(26, 5, 'АҚША ЖӘНЕ КҮЙЕУ, ЕНЕ 2'),
(27, 5, 'АҚША ЖӘНЕ КҮЙЕУ, ЕНЕ 3'),
(28, 6, 'Назарды (вниманиені) басқару'),
(29, 6, 'Сыйластықты басқару'),
(30, 6, 'Қабылдауды басқару');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `course_id`, `title`, `img_path`) VALUES
(1, 5, 'Кіріспе. Курстан нәтиже алу үшін осы сабақты көру керек.', 'uploads/R57-_l6_bQw1kHMnjP7Bx8q7HfAhcb9F.jpg'),
(2, 5, 'Модуль 1. Нейро Логикалық пирамида.', 'uploads/HccPwgS-aRIbwp4q--RbAAGLgYYoLjzn.jpg'),
(3, 5, 'Модуль 2. Самогипноз.', 'uploads/YatKVxM3tM2x-G0R8M-AHhM9rFej7vl2.jpg'),
(4, 5, 'Модуль 3. Ер адамның психологиясы.', 'uploads/XnkXezry3QEIZ_C64GMWsJKWJiXqweD_.jpg'),
(5, 5, 'Модуль 4. Ақша және Әйел.', 'uploads/OG6WBvpVnTq1iSLATBUnIFbu539aTcud.jpg'),
(6, 5, 'Модуль 5. Сөз Құдіреті.', 'uploads/tAiblihPv1QfGNr02DBASfiJAlvjxiJa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `user_id`, `course_id`, `name`) VALUES
(4, 4, NULL, 'Жарас Бекжанов'),
(5, 5, NULL, 'Лала Лоло'),
(6, 6, NULL, 'Лол Лал');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `lesson_id`, `type`, `link`, `file_path`, `task`) VALUES
(1, 1, 'youtube', 'https://www.youtube.com/watch?v=TM3H_PyyOVk&t=3s', NULL, NULL),
(3, 1, 'task', NULL, NULL, '1 тапсырма: Қалың дәптерді шүкіршілік практикасына арнау.\r\n\r\nШүкіршілік практикасын күнделікті кемінде 1-2 ұнамайтын дүниеге жазу керек. \r\n\r\nДәптердің бетін екіге бөліңіз. Бірінші бөлігіне сізге өз өміріңізде не ұнамайды, не үшін ұнамайды, не жоқ өміріңізде, не нәрсе үшін өкінесіз соны жазыңыз.\r\n\r\nАл екінші бөлігіне, қасына “за то” деп, сол нәрсені ақтап алатын өміріңіздегі плюстарды жазып шығыңыз.\r\n\r\nСол ұнамайтын нәрсе сізге нені үйретті соны жазыңыз.\r\n\r\n2 тапсырма: Осы сабақтағы 2 медитацияны күнделікті ертерек оянып тыңдау керек.\r\n\r\nЕскерту:\r\n\r\nКүнделікті курс аяқталғанша тапсырманы орындап жүрген жандармен өзім кездесемін❤️'),
(4, 2, 'youtube', 'https://www.youtube.com/watch?v=pPuuorQmXCg&t=4s', NULL, ''),
(5, 2, 'youtube', 'https://www.youtube.com/watch?v=z9MgpMbnYfM', NULL, ''),
(6, 3, 'youtube', 'https://www.youtube.com/watch?v=BvkT2A_OyhY', NULL, ''),
(8, 4, 'youtube', 'https://www.youtube.com/watch?v=vnwg7AJsDIQ&t=1s', NULL, ''),
(9, 4, 'youtube', 'https://www.youtube.com/watch?v=IYkYozCgqn8', NULL, ''),
(10, 4, 'youtube', 'https://www.youtube.com/watch?v=WSjm4JIN_rs', NULL, ''),
(11, 5, 'youtube', 'https://www.youtube.com/watch?v=95L_JOTSjQA', NULL, ''),
(12, 5, 'youtube', 'https://www.youtube.com/watch?v=H_QEHgxC5yE', NULL, ''),
(13, 6, 'youtube', 'https://www.youtube.com/watch?v=zIrEVupU1z8', NULL, ''),
(14, 7, 'youtube', 'https://www.youtube.com/watch?v=T6HgyNI8Kb8', NULL, ''),
(15, 3, 'file', '', 'uploads/iOKawYaZjA9qhGl56F2OZLA6y5et7GWw.docx', ''),
(16, 3, 'task', '', NULL, 'Сіздің құндылықтарыңызды анықтап, және оған жетуге көмектесетін сұрақтар. Сұрақтарға жауап беріңіз: \r\n\r\nӨміріңізде бар болғанын қалайтын, сіз үшін маңызды құндылықтар тізімін жазып шығыңыз.  \r\n\r\nТөменгі докуметтен тізімін алып, ішінен қарауға болады. \r\n\r\nӘр бір құндылығыңызға төменгі сұрақтар бойынша разбор жасап шығыңыз:\r\n\r\n- Менің қандай қабілеттерім осы құндылығыма жетуге көмектеседі?\r\n\r\n- Осы құндылығыма жеткенде қандай эмоцияларды өткеремін?\r\n\r\n- Менің күнделікті қандай іс әрекетім осы құндылығымды ұстануға көмектеседі? \r\n\r\n- Қоршаған ортамда кімдер, қай адамдар осы құндылығымды қолдайды? Және оған жету үшін кімдер маған әсер етеді?\r\n\r\n- Қоршаған ортамда қандай жерлер, қандай заттар сол құндылығымды ұстануға көмектеседі?\r\n\r\n- Бұл құндылығымды өмірімде күшейту үшін мен не істей аламын?\r\n\r\n Антиқұндылықтарыңызды анықтаңыз. \r\n\r\nОл үшін алдыңғы тапсырмаға жазған құндылықтарыңыздың керісінше мағынасын жазып, дәл солай сұрақтарға жауап беріп шығыңыз.'),
(17, 8, 'youtube', 'https://www.youtube.com/watch?v=Vk8HRZ8ElCE', NULL, ''),
(18, 8, 'youtube', 'https://www.youtube.com/watch?v=zt9Yzag0uhE', NULL, ''),
(19, 9, 'youtube', 'https://www.youtube.com/watch?v=pPk_3V16Y4w', NULL, ''),
(20, 10, 'youtube', 'https://www.youtube.com/watch?v=U5K9TIV6M7Y', NULL, ''),
(21, 10, 'youtube', 'https://www.youtube.com/watch?v=JyJ4KqIhXHs', NULL, ''),
(22, 10, 'youtube', 'https://www.youtube.com/watch?v=ZllQKFIJppo', NULL, ''),
(23, 11, 'youtube', 'https://www.youtube.com/watch?v=QK1yGews26M', NULL, ''),
(24, 11, 'youtube', 'https://www.youtube.com/watch?v=JJjNmWolNYY', NULL, ''),
(25, 11, 'youtube', 'https://www.youtube.com/watch?v=HAS6jusKfRo', NULL, ''),
(26, 12, 'youtube', 'https://www.youtube.com/watch?v=BsOxvBWvzoo', NULL, ''),
(27, 12, 'youtube', 'https://www.youtube.com/watch?v=xQqi3Rg6TxA', NULL, ''),
(28, 13, 'youtube', 'https://www.youtube.com/watch?v=P6IXXjrdrE8', NULL, ''),
(29, 13, 'youtube', 'https://www.youtube.com/watch?v=txYg59cVuJ0', NULL, ''),
(30, 13, 'youtube', 'https://www.youtube.com/watch?v=t3o3aySyhF4', NULL, ''),
(31, 14, 'youtube', 'https://www.youtube.com/watch?v=kB-rakLaFT0', NULL, ''),
(32, 14, 'youtube', 'https://www.youtube.com/watch?v=8Yrfpm7JKNg', NULL, ''),
(33, 14, 'youtube', 'https://www.youtube.com/watch?v=6T8M3Z-SUTk', NULL, ''),
(34, 15, 'youtube', 'https://www.youtube.com/watch?v=jzpbrO6maFg', NULL, ''),
(35, 16, 'youtube', 'https://www.youtube.com/watch?v=NFhol8PDoe4', NULL, ''),
(36, 16, 'youtube', 'https://www.youtube.com/watch?v=Cb1cRg2WkhY', NULL, ''),
(37, 16, 'youtube', 'https://www.youtube.com/watch?v=BNCAfKQi3a4', NULL, ''),
(38, 17, 'youtube', 'https://www.youtube.com/watch?v=G4NU61yIVbQ', NULL, ''),
(39, 17, 'youtube', 'https://www.youtube.com/watch?v=tKyhYHEJbKk', NULL, ''),
(40, 17, 'youtube', 'https://www.youtube.com/watch?v=-DLa61LrkK8', NULL, ''),
(41, 18, 'youtube', 'https://www.youtube.com/watch?v=0fbnvXtrHHY', NULL, ''),
(42, 19, 'youtube', 'https://www.youtube.com/watch?v=MaFHH7GS1To', NULL, ''),
(43, 20, 'youtube', 'https://www.youtube.com/watch?v=MXXt5MeHpE8', NULL, ''),
(44, 20, 'file', '', 'uploads/ScDsdaPyjJo-SmvRQCs8m_MhEt-ySN33.docx', ''),
(45, 21, 'youtube', 'https://www.youtube.com/watch?v=p_w-edABuYo', NULL, ''),
(46, 21, 'file', '', 'uploads/j79gs0EZGbH5CY3nV6TTeTyoDJ0x8tQ_.docx', ''),
(47, 22, 'youtube', 'https://www.youtube.com/watch?v=We22AdlQxW8&t=1s', NULL, ''),
(48, 22, 'file', '', 'uploads/HxEMJ8FxpwMOaRAcEzkdHdqW3P2Nti-w.docx', ''),
(49, 23, 'youtube', 'https://www.youtube.com/watch?v=1UUh1kUL4Sc', NULL, ''),
(50, 24, 'youtube', 'https://www.youtube.com/watch?v=FPJLAzWp8Wk', NULL, ''),
(51, 25, 'youtube', 'https://www.youtube.com/watch?v=rgJlPVt3w2o', NULL, ''),
(52, 26, 'youtube', 'https://www.youtube.com/watch?v=OSlc2RCURz8', NULL, ''),
(53, 27, 'youtube', 'https://www.youtube.com/watch?v=27dRr9F6etk', NULL, ''),
(54, 28, 'youtube', 'https://www.youtube.com/watch?v=xGZlVrn3cGg', NULL, ''),
(55, 28, 'youtube', 'https://www.youtube.com/watch?v=OJyMilgHddM', NULL, ''),
(56, 29, 'youtube', 'https://www.youtube.com/watch?v=3zoGKygg7Ec', NULL, ''),
(57, 30, 'youtube', 'https://www.youtube.com/watch?v=ByesKZVjRks', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `device_id`) VALUES
(1, 'admin', 'xlxKdxtY_QbO21Ivrdba6xpKjTGTZWLG', '$2y$13$21Uklq4DPwHdm72mjgiszeyRGUB4DOG2WojqtHrisdIBDOYaQ2E4i', NULL),
(2, 'bbrs', 'Ei_EupLo407Jo0GsdB-6ALV-fcyWhuRw', '$2y$13$JIp3zUD6BwrUr9aKPrcjBuRujhbsvRDrrs46Fe8zC71mt6p8PUUqe', NULL),
(3, '+77478725287', 'd4rshxGfHWlbmZ8H_ykMMvJ3mXtIsBo0', '$2y$13$7ijI8Seo8WDMO6BCzseHpe0s9r/KN1c/QIzY8pSeQv8.Gq4vBR8CO', NULL),
(4, '+77078951894', '9kzZ2eZ9T1761qEMf1iwByi1uX9NabV-', '$2y$13$VHib25uaQsXewRrZ8dpGDe0ik.JVOup/Y.iTVMdCYYcbfpqjmTk9W', NULL),
(5, '+77071231212', '1dia_6f2M1JZ803x8v1q1b9Ged2VilwR', '$2y$13$JxvM/ldYhOyTVh7MlFGGVu02Yzt5pJlsajbDEnnOKXt4Y2lKTzmxO', '03b6d0d9b5d419e5ad1783cd2c38c970'),
(6, '+77771112233', 'BVnY8QdpZcidxAtfn5vaBp3X-_zHxcah', '$2y$13$XI7.xum35fukDa9h6GgNc.kuAWrvR6RaAht4qHR2P.zVEoSZag5LS', '03b6d0d9b5d419e5ad1783cd2c38c970');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_id` (`homework_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`homework_id`) REFERENCES `homework` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homework_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
