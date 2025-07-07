-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-01-2025 a las 19:21:08
-- Versión del servidor: 5.7.26-0ubuntu0.18.10.1
-- Versión de PHP: 7.3.33-22+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin-machupicchu-company`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`id`, `titulo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'How can I make a tour booking / reservation?\r\n', '<p>Just let us know which trip you would like to reserve, along with the dates and number of people, and we will be pleased to do so, subject to availability.</p>\r\n<p>For each traveler, kindly email us the following information as well:</p>\r\n<ul class=\"list-disc list-inside\">\r\n<li>Copies of passports (photo page alone)</li>\r\n<li>Nutritional needs (vegan, vegetarian, allergy-prone, etc.)</li>\r\n<li>Are you commemorating a noteworthy occasion? Inform us!</li>\r\n<li>Medical conditions to be mindful of</li>\r\n<li>We need to know your shoe size for the boots on Amazon.</li>\r\n<li>We require both your shoe size and your size for Galapagos in order to fit you in the wetsuit and fins. Please request a size table from your travel advisor.</li>\r\n<li>Contact information for emergencies.</li>\r\n<li>To let people know where to get in case of emergency, book the hotel where you will spend the night before the tour (optional) preferred method of payment.</li>\r\n</ul>', NULL, NULL),
(2, 'What are the terms and conditions of my booking?\r\n', '<p>You can view our complete terms and conditions on our website. It is highly recommended that you carefully study each clause. You acknowledge and agree to these conditions by paying Gotoecuador. If you have any questions, please contact us before making your deposit.</p>', NULL, NULL),
(3, 'What if I need to cancel my booking before travelling?', '<p>Once you provide a payment for your reservation, Gotoecuador will fully confirm your booking. As a third-party agent, we sign a contract on your behalf with the service provider (such as a Galapagos cruise operator), entailing payment for the rendered services.</p>\r\n<p>Service providers impose penalties for service cancellations; Gotoecuador and our clients are subject to these fees. Because of this, cancellations of tours will incur the cancellation fees specified in our terms and conditions. Although it\'s not always possible, we represent our customers in cancelation situations and work to recover money paid to service providers. We are constrained by the fact that the service provider always has the last say. Because of this, we highly advise getting travel insurance that will fully cover you in the case that your trip is canceled.</p>', NULL, NULL),
(4, 'Where, how and when can I collect my tour vouchers?', '<p>All coupons, tickets, and instructions will be distributed electronically through email. You have the option to store the documents on a smartphone or tablet or print off a hard copy to bring with you when you travel. It couldn\'t get much simpler!</p>\r\n<p>Though this mainly depends on when we receive the vouchers from the yacht operating organizations (Amazon lodges & tour operators or suppliers in general), we typically try to send out tickets one to two weeks before your tour departure. Please let us know if you require your tickets more than a month in advance so that we can attempt to make the required arrangements for you.</p>\r\n<p>These times may also vary for last-minute reservations according on when we get your travel documents from the local operator.</p>', NULL, NULL),
(5, 'What vaccines do I need for travel in Ecuador, Colombia, Peru or Bolivia?', '<p>It is highly advised that you see your doctor in your own country BEFORE departing for vaccinations.\r\nSince vaccination and malaria medicine decisions are personal, it is preferable to speak with a doctor personally to find out which options are appropriate for your trip. It will also depend on the locations in Ecuador, Peru, or Colombia that you want to visit. These choices are particularly crucial when visiting coastal regions or the Amazon rainforest.</p>', NULL, NULL),
(6, 'Do I need a visa to enter Ecuador?', '<p>At the moment, a passport must be valid for at least six months for all nationalities, and the procedures for obtaining a visa differ depending on where you live. Since these laws are always susceptible to sudden changes, GOTOECUADOR is unable to offer our clients direct advise on these issues and cannot be held accountable if your personal documentation is disorganized. Verifying this information is crucial because if your passport or visa are not in order, your airline may refuse to let you board the aircraft. It\'s crucial to always get in touch with your embassy if you have any questions about the necessary travel documents.</p>', NULL, NULL),
(7, 'What is the difference between health insurance and trip insurance?', '<p>Medical costs associated with disease or damage are usually covered by health insurance, whether they occur domestically or overseas. Prescription drug coverage, hospital stays, doctor visits, and emergency medical transportation are a few possible inclusions.</p>\r\n<p>On the other side, trip insurance is intended to shield travelers against monetary loss resulting from unforeseen circumstances that arise before to or during a trip. This can include having to postpone or cancel a vacation because to unanticipated events, illness, accident, bereavement, or natural disasters. In addition, trip insurance might cover additional travel-related costs like emergency medical evacuation, delayed flights, misplaced luggage, and so on.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagens`
--

CREATE TABLE `imagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miniatura` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_03_18_160742_create_roles_table', 1),
(4, '2019_03_18_160828_create_role_user_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2019_08_19_000000_create_failed_jobs_table', 2),
(8, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(10, '2021_07_22_162539_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idpais` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idpais`, `iso`, `nombre`) VALUES
(1, 'AF', 'Afganist'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Ant?rtida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saud'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiy'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahr?in'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'B?lgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhut'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brun'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caim'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camer?n'),
(42, 'CA', 'Canad'),
(43, 'CF', 'Rep?blica Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'Rep?blica Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'Rep?blica Democr?tica del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'Rep?blica Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos ?rabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'Espa?a'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiop'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gab?n'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Hait'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungr'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Ir'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Jap?n'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajst'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguist'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'L?bano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Mal'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'M?xico'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'M?naco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'N?ger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Om'),
(166, 'NL', 'Pa?ses Bajos'),
(167, 'PK', 'Pakist'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panam'),
(171, 'PG', 'Pap?a Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Per?'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reuni?n'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salom?n'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Crist?bal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquel?n'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Luc'),
(195, 'ST', 'Santo Tom? y Pr?ncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sud?frica'),
(206, 'SD', 'Sud'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiw'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikist'),
(215, 'IO', 'Territorio Brit?nico del Oc?ano ?ndico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'T?nez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenist'),
(225, 'TR', 'Turqu'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekist'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas V?rgenes Brit?nicas'),
(235, 'VI', 'Islas V?rgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_miniatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-03-19 02:11:37', '2019-03-19 02:11:37'),
(2, 'user', 'User', '2019-03-19 02:11:37', '2019-03-19 02:11:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-19 02:11:37', '2019-03-19 02:11:37'),
(2, 1, 2, '2019-03-19 02:11:37', '2019-03-19 02:11:37'),
(3, 2, 1, '2020-03-20 16:50:46', '2020-03-20 16:50:46'),
(4, 2, 2, '2021-08-06 16:01:35', '2021-08-06 16:01:35'),
(5, 1, 4, '2024-07-21 17:22:02', '2024-07-21 17:22:02'),
(6, 1, 5, '2024-09-03 19:32:13', '2024-09-03 19:32:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0g9bMLfNCO8nt1Nys57IncAyHlbHSIg8VCapvTuf', NULL, '181.174.90.92', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkRJYXJHakpxZDRqY0h0ZUd2bU44WG9wNTNDYTFuVzc1bkZHbHhNVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl94bGFOcENFdzZSWG50N21LcTUzZnJpMWZ6VjVvV1FzdUxUVXNvSFZfOE13c09EaGtHenVvQm9DbFFNUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575012),
('0Mle9ayvy1QnJu5jVqIUSQHDar4qs4RGGEB5sWjU', NULL, '181.67.249.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXlENG9JOHo3WVpSVHJEVVJPQTF1Q2xzNFJpZWlTckpSZWVMWG12TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8zVWRBU3NFWG9yd3NVMHRWNW9LVmRVQWhDekJlSHNwbnBaV0lhaDEyRzM4OXo1YzhmdXNNUm9DVEhRUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573556),
('2oBpCjDbXlG7eFusxFiAV63vKKrR5b1Nlfo9MacR', NULL, '201.225.1.243', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/323.0.647062479 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHNvd2tBWlhmZElHbHdORzZ0YUZCQXhwT1R3Wm1QaFo4TTM4ajJJRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl83SVBSbEM1WkNCUEhqZzBWUVFDX2dLeEZfajJGZnpDWUoxdWJJTld1NEFqeTh4WW5vcU82Um9DQVh3UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575659),
('2wzdzDXaYs9gOTdnqlprFu4yKUYs1mdFcqsZAkS3', NULL, '103.48.207.82', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWtWSVBPaUFHeGZYTG93QnlOTjB1dGxYaU45QVZlNmlPbjNQMEp5dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95dmNpV1dJZ09CaWVfMGtfZjlzVWVVVkI1U1llUzFlSG1NLUlwYmZ6SWFCNnozMy1PYTZCaG9DT3FBUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577662),
('4C7B1vfmx9X3joqOE9WFs2fQVUU1reZM6FsZlUMU', NULL, '51.37.21.206', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkhRQlc5UnpuNVNXUUFyVG9FQWtYcjNhZWJTbUJnMENqWVBGOElPSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95cF93cEo5YmF2QUwyaUVLaEc5bldhMFh0TDNXQ21oMXZGQmM4WnZaSXkwUXUyX0NiVVNLeG9DUnU0UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578319),
('4h2xUXAhqPXjK3Tqd9Zk8qekPMIvUFSI03wOrj1o', NULL, '66.249.70.65', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.6478.126 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0pOQ2k4MTJXZWNiR2hyY29KbWlkV3RCeFpJdVFnTElXTlJPSVlVMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1BlcnUtQWR2ZW50dXJlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579633),
('4K3XT9rX6gUCBrsnYJewp7pK6ebugaRmYIV3b5Tc', NULL, '173.228.198.159', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1RPUmQ1Y1daMk10TVBLeHNyRWtyb1ZTbjNkdG1CZTY4YVNkdTJrNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl96b0hhMDdFU0VoVF83T3N4Y3RKUVYycHdUUjdsQ2lHSi1nZlB0Qmg3ZGtlTDhxZ2R0TU1fQm9DdE9vUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577982),
('4oH1rvVqbhugmTQ7l5FGuW5yKqmu0xdjqc39tf7K', NULL, '114.119.148.64', 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHo4djRLWkdCUzBWWmhRVUV0VlNVc2dzZ09yV0I5YUpzTTI1V3c5SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vZ290b3BlcnUuY29tL2luZGV4LnBocC9wZXJ1LXRyYXZlbC1wYWNrYWdlcy9rYXlhay1hbmQtQVRWLWluLWN1c2NvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577797),
('5FWh1cER7KpKehM5n7tNRzQY7md5rWlD1PPUgce9', NULL, '66.249.70.65', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.6478.126 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGh2ZmZoMlpCRUtwTGtubm9ZOVp0ZktGZ3ZpYVZ5eUpMVGlXZEg2eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZ290b3BlcnUuY29tL3doeS1ib29rLXdpdGgtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575430),
('5NBfYAdkmBEmzznyTohkdwTM2CJS3M5DFyWMCejM', NULL, '77.166.167.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGpQblF2NlBlZ1paOXV2Yk9oSTdtNGwyNEh0SUdjYVQzRUVLUFF6UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl93Tk1IX3ozbDY4M0xqbXBIN0hhcVhEVlEzRnlMR1NPOUtCOVhPZXRWVjhKdmdveGhtNXJSeG9DY0NJUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576636),
('65RMHZoWi1ktOeHzNVhkLIONrD7JNHqzry1T9izv', NULL, '178.145.215.85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUVIWVZMYU1qcDFyaVhXQkRnMGRRc29zZ0k1amlJYzhQbXBOaGF4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2NsaWQ9RUFJYUlRb2JDaE1Jc3M3am43MjRod01WbHBDREJ4MjhBaWVrRUFBWUFTQUFFZ0k0bVBEX0J3RSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721576777),
('7LFpZpii48XxgvvaP4xs7hO9KfVakTZT4PXTOdto', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEpBaXMxejdHaFJvR3JMOHN5UGFoclhUSGZPeVlBaHZYTVBYTTM3byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vZ290b3BlcnUuY29tL3RyYXZlbC13aXRoLWNvbmZpZGVuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576623),
('7Qn7p50G22KMUt94qbI6SzVRhC9LNLAVlK4s9LBi', NULL, '187.189.127.72', 'Mozilla/5.0 (Android 12; Mobile; rv:128.0) Gecko/128.0 Firefox/128.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGNmdDRaQllVUHR0SGNCa1BiRnhwaG1zR2FRZ1ZOUkphYVpJNTQyayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl85bnJFXzFiOHZ0QlVxUER1a3NKMjNGc2xDVG5rUnY4Sm0zY05vanlsWWhSQmpaY3FwSThBUm9DV1NRUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574802),
('87QcvUkw1Lu70yVrwxwoDvlPkDPl2Ta4w8dBZG8Z', NULL, '162.226.202.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmt5UmZibmlSZGtFWnhkZlhiQVQ4ejlkNU92bHVtZjdyYU5WRUtYcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573458),
('8CxNGSZi7j7OVKkAtzZHHQNrAQVFy7HHUSgkxhCW', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFlBa3JPYVdGYzd6M1F3Q0NYdjBZUlNPelhxZXRFMTllZFp4N0NNViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZ290b3BlcnUuY29tL3doeS1ib29rLXdpdGgtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576578),
('8PgZqkMSaiCsjnBQoV3DLYWf4a6UZ1MrvE9gpwzL', NULL, '136.226.166.81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2V2SWNhUXJRQm5tS0xaNTBtWGp6OW9TWWVnc0VFTVRVSXVjOUdpdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl84RkhKR2tyU1dZcmZQTGVhSzRnY3BmVUVVbVc0Rllpc2xKNVpMc19KRWpxbjYzZHZ6MElwaG9DVkgwUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573753),
('9tA6yn7JK25v6Oo64cTCOTVWnhtT42gfb5YB1IPI', NULL, '34.67.144.209', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTgyOW9vVDEzam1kMXJpckd1enBpTTl2eDg2ZUszY1Nxc29Xc2lYbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576853),
('B2TPTyCWuVNakSItkggEGLMgBV4gZg7H378P4EQV', NULL, '176.27.200.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmlxak1YOW5QQURjencxUDU1RkxTZXNwQnNSbjE1a2hlcnFRUERYdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2Jlc3Qtb2YtcGVydS1pbi0xMi1kYXlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579141),
('bnpljE0GbhTYsoJApBzKXPTqGLaWXBbfY4zqRuK8', NULL, '206.248.66.215', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOE0ybURCWGJiaFhWTU42QWloSXlWb2M4cUM1alQ4b2pGaHlvM1h6ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1RvcC1QZXJ1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721573254),
('BXrwi5hhrW6Dy4ACfopePDi3hF6MvtmrhPgDylLY', NULL, '206.248.66.215', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUFzVGpNRzJ5MTdmMUplYWZvTzJzY3p0bzJTYWlKdjQxZWR2TjlLVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1RvcC1QZXJ1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721573329),
('bZZyGTgg0UZDNJOrkijiT4gNS7Vld0756nY7gwpQ', NULL, '81.83.186.218', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHBoTnJtc29nblAwSmZ2RzRhN1ZTZms2UnUwTWhmb0VrMDJ3V1JmMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhnT0E0TTBiYWZpcnpDVkpZeFBCbm9jJmdjbGlkPUVBSWFJUW9iQ2hNSTJ2dUZfTU80aHdNVjZMVm9DUjJVVHdGRkVBQVlBU0FBRWdMMjZmRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578674),
('CNQWmwRUIoKzutaR1Uskl6xruS6lPubaBqtNmFGa', NULL, '209.124.199.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGFRS25FNDZRNlVWaU9ObXpISlpQaTlZUjBrcWduNmhjRVcyR0c1NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2NsaWQ9RUFJYUlRb2JDaE1JMEpIVWtMeTRod01WTFN2VUFSMTJqd0c3RUFNWUFpQUFFZ0xRaF9EX0J3RSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721576576),
('CrTtsbcSqLdqcJqLZFMAngGrQtOxzjE1dFNzrEHM', NULL, '166.108.234.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUFRV1YyVlVJTWdHOGtzbE5kNG5xbm9XVlRoNEd6a05zMzFKTG1scSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3bDR5eUJoQWdFaXdBRFNFamVDYUU2T2lLOE5jaHBIcWdjbEpFQ0xfUmltaDFFYmFvNlNRTjFGcGQzWWZER0JtNnBtVGl1eG9DTWlJUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576694),
('cvysqwD9ZEn52pPlAuWSwl9CcOrqTJ0DJKzucuOZ', NULL, '89.114.65.198', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUZ3S21pTjNHU21rWkRtNHJuWnBUNTlRZ2RuTWhPMWdtbVVkZ1ZoQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhnT0E0TTBiYWZpcnpDVkpZeFBCbm9jJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8wNl96NGc4NmVPdEVOTmNwVGUzWEZESEpWQWp6N0gwUFZ0YktHSGg1YjU2U2NBci1FdDhnUm9DZDNNUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578828),
('d1R5VaQe5fOEm0mCSvrSZPQZtbHVoXz7kxi3qOC2', NULL, '47.128.44.1', 'Mozilla/5.0 (compatible; Bytespider; spider-feedback@bytedance.com) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYncwVmpGRHFFOEZob0FBTUlrMHkxRTRVTWNFa094OHRscTNCVkJITyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2FkdmVudHVyZS1ob25leW1vb24tbWFjaHUtcGljY2h1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576676),
('DBg6FRFt70giZIKOnz7XVVKMq5XJlWPmfqduhsX9', NULL, '82.132.237.221', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmlRRnp2dVRRdzBRRERvYVNOZGlzTmE0eWU0NnN2d3p3d1N1VlFHNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUVBSWFJUW9iQ2hNSXNwVzU4TVc0aHdNVk01ZFFCaDFyMVFROEVBQVlBU0FBRWdKNlZmRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579108),
('DEDpOgBUrqQXsNeesOop2wKbdHypZZQRL5vsI9hv', NULL, '185.32.136.141', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_5_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.2 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVk5UYWtqM3JWZGFhZUVhM3o3NUxONDRpV2h3SGpYdUZkWkk0d1hlMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNVnRGaHlxYTY2Sk15cV82a3BrQy1aJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8tdEVxTVo1ZFFJazdCWndRZFpEb2p4cjVoVTh4d1diZnc5QjRyTEZ6WUlJT0NSa3dxZ1JUeG9DaWxrUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577573),
('Derw35qW4GPT3KVlXCG4fR42gdjsvF9GLtLdZ1rT', NULL, '35.206.64.40', 'scalaj-http/2.4.2', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRDl1dTZqUFFSOXlwSWNqSlJwS3lJTXVOV2Q3dm81TGxDbmV4Y3VxbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576401),
('dj1wiNub5yCyGiGvllIy09fCubfKOBaJgo5FHGLo', NULL, '93.184.29.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRW1IRUo4QmU0YjRYM1djSkNIQzJPZTd0ZDlFdk1RQ0RwbWtaMjNBdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl94cHZRbEg0U2pOWGpNYjVDR1BDd0RLT1BGWlgxNnpmZFVOa25TdTVBWWxCRVdpMEt2T3Q3eG9DMVZVUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578634),
('DkoHRcr2eSMfjxpRCy24uXbJRw7LMqTHTlyKsTnW', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlBlTnRJMnN2UG1CRmRoWlZCb2JCYm1zWVNNcklvZDM0bjBTSHBqdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576401),
('DxvijJJhBEJgneIv89z9DyrFOTuM4iuUUdnoL7bz', NULL, '193.186.4.57', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTnNSU0hVSnNJcFlKd0lFalE1dHprcG9vY014MU45Tkllam5IQlRKOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721578404),
('DxWaGbqS01WXm3kp0wO1kz48FjQAd2VB5Xf8Xmp2', NULL, '217.61.227.35', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/25.0 Chrome/121.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUp3Q2lhZ2UwU1QyRmFIYjRpVThiMlJzMmpSUkhmcWFlYlEzeng2dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3MTkyMEJoQTNFaXdBSlQzbFNWbW9sWU9vYloybTBLN1BNTzc0YnFkb08xQkgxWXV4MTZtQ1c5SDJ2WHdoYWUwXzlDRHAzQm9DSEFJUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578847),
('ea7ejlBqMYFh6z1OzQzEwb00BUEy61CRCXS6HmFc', NULL, '187.245.221.66', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFdFTzhMYUFWZFJLZk9iT081T1l1bFYyRjI3MGtVQklGTHR6QWpZaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2NsaWQ9RUFJYUlRb2JDaE1JNnFxMjRzSzRod01WRVNpdEJoMDlFQUNqRUFBWUFTQUFFZ0lQaV9EX0J3RSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721578262),
('eaOW1oIHuJn3XXylUTGZZcNK99ZXjiFhkGoz2UIB', NULL, '84.209.165.153', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEgzMHF5dGhnQUdsNjdzS3VZajgxRWVqcmF0MVpRWjN5ZUZHdEJLVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl84dEZFZlJHalZ5YjRzRVZ6aDRYMTFyRFZlSXAxWmxiVVFlTmRZZDRpVnZuQTdVcnQwMFN2eG9DY2hVUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573476),
('eOUocAawtntgmVTyKv986f371j22U3WWfWFyXTGy', NULL, '86.175.215.105', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGFucVF2MWh0OWp6Z3JyVmtVWjl4bUF3Z3J2QVJmY3AzOTljbjBIYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl93c0RqdTJVUEUxVUZwbjVQRWZwQm5xblNURl9ISHZJQWEwUnctU1BCdmdzWDJIM1ptRERfeG9DY21FUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577994),
('EStDHhzJM78P6NNbjB6lKSOYbvPWlkCj5oXMdL2X', NULL, '80.76.173.181', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzlFbTJyc1l3YmQ5U3NTR0x4WDk3Wm1NTHpJTFZiaWtWWDMzaHI2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8wVWhJa0dNeW41V0QwVzdDRy1pSHpuNE5oV3VKYVVvZVdqMUNfQlRRYzdyOHpGTXFVY182Qm9DMVA4UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575516),
('F323KxTyr5neyLoVNSgJHmTjtSByeLmNuzcppMCv', NULL, '172.59.19.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYm9zczNNMmRUdXpJcGQzNnM0U0hzUDFyOE9XR2I5NFByZlQzdE1qYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579907),
('fSRqlJeWK9qexAcKDiOKXEWfkPZKmFjHIRhFyXy6', NULL, '114.119.154.166', 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTV5Wk9pZmNHUm44MkxiNkpmR0k2OWpWSTR5Q05vSU9IRVY0ckIwaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2hvdGVscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721578047),
('fTYgUnfCUunanOQZxOEYUv8dxJQVlaVhML9XIsYZ', NULL, '84.115.238.99', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/26.0 Chrome/122.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamVuNmlyeXlvWHJ4SU5lNWZBN3VqeFYya0U1RDlmRDBsektwZkxkRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577815),
('FvxN4vuSadUO5m4fLF8Ba8ds1YPmU5i6RWBXElVw', NULL, '212.112.152.228', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE82ZmpEYUg4OEtKNkY2QTJDRGtVTUxQclEzTWZzcHRkT2M1ek5YeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8yaExNamtTclVXcUZIeEN4SV94OUdfcXlqOXJWQzhMcmJJWmFzazVkQ3VwY2dCb2JKV1NZaG9DWmVBUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576781),
('GrX2dkK1a9kMHkH9ze9kEq47iUTaSkA7ZfD5QvhJ', NULL, '31.217.174.237', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUZzaXVETXZQZDlHYUUxdHkxYmM0TDFZYm9ERWZkVnJRVWEyMUdOTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2hvdGVscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721574823),
('H47BwJv5sQ5fG1N9eHFt1pns7kp9wfru0grkKmqN', NULL, '185.214.10.184', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUhKMDVRTDBmd1VjUHlEcHpPWVJYV2FFZlMzWDRHbDFIelp1QjcwbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576465),
('HCsmLeFWwz2PoFIRMbBvaHl3XpiExxKw9iTAgLzK', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkM0eVh1TEExaHdtNkVOanVPRXpoQjhLR0pPUDZOQjIwbG1BTTJCdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZ290b3BlcnUuY29tL3Jldmlld3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576538),
('HrHF4sZUYLEoDp0rvUtJJXfnbnZA9MffCdPVvAW8', NULL, '90.167.243.13', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjVjVDVrQ2JIWUZUWWF0WXpCNFpiOWI1b0RENFo4Nlh0Q1BvNWllOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNVnRGaHlxYTY2Sk15cV82a3BrQy1aJmdjbGlkPUVBSWFJUW9iQ2hNSWhLYVA4ckc0aHdNVmduaEJBaDNMbkFDRkVBQVlBU0FBRWdMdEx2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573730),
('ICfSGI6QTiNBJlYaLUjl6RnzCa5UUrU5zi50HgSZ', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2thYUtPaFJHdXp2VkdkUGNNMjBLMG1GMmR0bW85eTVHQnJxWnNyeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vZ290b3BlcnUuY29tL2Jvb2tpbmctdGVybXMtYW5kLWNvbmRpdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576652),
('Idi9iXJReqgLn1jaK2K4mlgNLdJzeoGzkWUI3fCV', NULL, '159.138.103.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVG13Wmk4MDU1cXMwYndKak9MeEl1ZjJEdFJkd3FwZGlRcjRDbjlyQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2luZGV4LnBocC90cmF2ZWwtaW5mb3JtYXRpb24vYmFyLXRvdXItaW4tY3VzY28iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576762),
('IJFtfhso5Os0WTqCaQovpN5QUh2L4FYlimrSJHCd', NULL, '185.214.10.184', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFhjSUdIWDVGZ2dJTGhUM01FR1pZM05NbDB3dVF6OHBVTHlMajAwMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577159),
('iKQc0uLj35l7ngkRhQnKG3sjNAXqbFK7koViZFHf', NULL, '45.149.191.185', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHlGVk9oQUtuRzI1ak1HZGc2ZEpLSUFDTVpWNW9rdVZlMlBmTExVSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2hvbmV5bW9vbi1jdXNjby1hbmQtbWFjaHUtcGljY2h1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579387),
('IlevoAqZXFz842IwLNNeMHNnSiimZRw0tXlr8LS2', NULL, '185.245.82.65', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHBodk1PSGxoMXNHV1pWUkRydEF6M3pxMzU2elFDcG9ZSGdPMVlXNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc1OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhuNDJYMV9vVlVoV182bmk4dER0VG1QJmdjbGlkPUNqMEtDUWp3aGI2MEJoQ2xBUklzQUJHR3R3OVlkSWJiVy11aXNwbklJTkxQbjZZYnBhWEg2ejRNeHFmN0hWRHNsTk12aFBRWHRrV1RYY3NhQWp5aEVBTHdfd2NCIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721574431),
('Im18IJifzPLwFNjxFUslDmnvAWnvOcbTUcMDD2oG', NULL, '2.48.45.209', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHJhaGxNMzgyM2pGckdtWW5Jem4wMW5UQTJoaTI0MzZmSmdYNnprVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUVBSWFJUW9iQ2hNSXVNZXJ1Sy00aHdNVjBna0dBQjAzTVFEMEVBQVlBU0FBRWdJNnh2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573136),
('iuMj0AzbkXzE29yrmFubwe4TbKymTM0kRpeaCSdG', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1BmVW5PZkQ1M0hGcDNkWmRJR0hUSWUyaUdSQ0tBN0FLbFNEUEZhcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vZ290b3BlcnUuY29tL3RyYXZlbC1pbmZvcm1hdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721576709),
('jyBCy7m8utpVLOaTmElqIY8BJFtLOpLhGiqJKJxh', NULL, '172.59.18.186', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUZaTEZxTjJhekk5RDBLS0ZGQ1FGNXF0UDZ0TU9LWFhLMUM5UEF6dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmh1MEpXdmxPcVRxcmlfRGNEdW1ray1vJmdjbGlkPUVBSWFJUW9iQ2hNSTFKejc5Ym00aHdNVlFGdEhBUjJOdUEyN0VBQVlBaUFBRWdLM2p2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575890),
('K8wqZXtzH4gLOUBVBXP7SF38kaTF3rSkY2l3WyCn', NULL, '178.197.219.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHlzUGpQaXFaeDJJU0dnTHlJajBIWlpqS2N3TGRVZ0c0WHBDTmtVaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhnT0E0TTBiYWZpcnpDVkpZeFBCbm9jJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl85cTlrQmZPTHFMdnFxN3RpaHB2LW83SzNxZFhhZkxTNGdiM2pQN3hBTDREM2RDT2c4dnRVeG9DWUJvUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721580283),
('KEShGHYLNkijpYKG4ZeA5ZJZ6wFk85DU0NXynG7y', NULL, '85.245.198.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3dzdlRXRVNpZWgxVEZiU3oxcEJGWFZLckw5Tk83VUkwNDRzb1pjQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95elFJOC15RUFIbVBvelBRY3V1UzhFM2VYUHNJTVRTNVQ4WTFpbUR4Z2FoUkxvTHVucTNUQm9DV29FUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574119),
('L6vLPWSIZkGnKd8c1W2x7YxHAm0POURtAZi2fmbL', NULL, '178.58.188.203', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic21qdmdTMXpMV3piYkdrQ2c4MWpDeHViNHRtWVJLUHJ6SlpEYkRDYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUVBSWFJUW9iQ2hNSXJJX0ZsTVc0aHdNVkxheURCeDN1ZHlhbEVBQVlBU0FBRWdMU2JQRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579047),
('l7i7f2ZZgkKXPejW9PUvFgGrsZGzeagRszFzU8OF', NULL, '66.249.70.64', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ25YeEp1TEozV2dOM0wyRHEzcXJub1ZiZDlvOHFIRnplN1NEeHJraSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721573582),
('LgSA1kmUwfLFIv30qNYCVgBRJGKQD23bdsFY14rV', NULL, '74.125.151.64', 'AdsBot-Google (+http://www.google.com/adsbot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGN4T25PamxSSzR1ZjBXUmFmcWJMdnU3WmIxT0V0akpEb25QNUp5NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577261),
('LiYTDBmUzQcz92HLmGD9OMTrkGuxo5gy7LVFbvij', NULL, '179.6.152.74', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibW4yaWQzT3hobXVib09LdlUwSTY3NzdEVU1EVDRFRXNRWGZoNmx0UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577875),
('lmkGjDpGy9vTxSkTyoiSyiSdVTWq5YuEoBYFCIaD', NULL, '213.233.110.201', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRW1DU3FDMjM4UndnMU15YzF1d09kMEhRalJMekUyVFk2OTMyb2UyRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl80TFBNY0tJVTBNUEk0OXExYTdaTGExQzlhZWJhbVRSeWxuMDVuX3NTMTdxX3NVbTRTQmgtQm9DNHdjUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577502),
('mi8Jev6UCoPgZ2jRMZJsHGEBekpMhARoxDfbQ7Qy', NULL, '2.121.208.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjVjYWpZemM2eVpFajZIaTZuQ0dvUVpYODBGMGJKckI4dTA5RUQ0VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574882),
('mUGhnxU2znM7LNibsbGg1312IWuL3BDx0YrDQBok', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYThYSXd3d3M1OE9jdDdjYXZ2dk93Uk9VSHh6UG12NnQxZlpMc1pBVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2hvdGVscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721576515),
('N0ksrDACTVLJB9MQ8GNc37T6Sle1OebydeRmW1Nc', NULL, '94.63.87.149', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTB4d3NxYWozaFVuQlJwZ2pyRFYyTEl5cjdINzVmVk43d2JjYkxWSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2JyYWlkPTBBQUFBQUJiSXAyaGdPQTRNMGJhZmlyekNWSll4UEJub2MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575100),
('NbcuQ5UzwG1EojBu87j68O28Jh1Fe3GOb8DA4ykb', NULL, '104.28.87.88', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibndRd3lqRHpXMzBvc1F2ZDdiN3VRZk00SkdscUlEQ3R6anN4czNCWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721574970),
('NdehxgUKdEQjNmkUXySqBfbcHQ4i85ZEvm6H5GmC', NULL, '172.56.10.9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVFPUW9jcERlNDZuMVlRbmwzM3M1U25Sak9TRk1xeWNoZkJDemgzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8zeThLNUFzTnhnS2FZVXh5WUdicEUwV205Q09WVmRESjFjTXg3dUp0TE9fMTd0UmNCYUNMeG9DZUZNUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579167),
('NNa3Q2FWZXdGmn9EUmKwlqTQyiK0D31baRrRy9KK', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTZLY21CSzBIOWh5dmtVTmJ5Qk1zbHhYWVQyMk44TENiRzA0MHJjSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576441),
('nv2VC3pcqKvnLlr1RE8Y28QVDlpzB6wqOj0JdtoM', NULL, '86.158.121.224', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0xVUE5yMDQyMmNtYTN3MDdrZTZZVE55Tnl4YWZYR1ZlZkNHdXB0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl96TDNWS0RrT2REdk5IcUFBS05yVVFGUTQtMFFQY1I0cnhXaV82d2V2UnB5M3BJUTVwRTZ5eG9DRFFFUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575737),
('nzc5lUVfPURCKQhzbqetnfYqs4gxljig4AUdpHEJ', NULL, '109.250.42.123', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTZTSzVWRE1PNWlpN2R4Q3MxSGlQZWlwOFRzQ0xBVWt2bWNFSENsWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95ZEtuUHZ1MndENmRoZmJPNWxMSE5TOGFqVEZYUmMyc2pEX3kwNWxQRDZ3TV9ybWhVeEZnaG9DYW1nUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578381),
('oEbJjtyNkoL6FyxKsk796Furiw6GbJ8a8oKc1QDp', NULL, '5.161.250.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2ZFM1lrTkRDTWFBWjZqMEl5YjJWUnB0N3VUQXZLcjJvOTllNGlZMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579666),
('omnfZsfgoE6hyhN6rNAJmE7osngfqh7fTy13DcAy', NULL, '112.86.225.155', 'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXJscmZXTHcwVjZmRm5SUHYyTGI5QnB5VTY1U054VEVhZ2RkdjB3QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579538),
('op123eVm0TsxecGb5635qmLGuRq81r2wHg5mWyEn', NULL, '178.138.33.12', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEZBRXZmMnBNWFpEZEMyRktUSlkwWDB0UGtVeExsUDkzTGlXcUlEOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8xZ0FtbkF0Y3ZsS2xqQk5iblZWZVVpQW0xZkhkMnNWeGk1NmlNbC01OHVRZGVaZ3paMThfQm9DaWp3UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577325),
('OPSd9mDpHXb0bAFfGjw5nSAwZltkaBNG3JCBm7HE', NULL, '91.126.40.231', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0JtVEQza3RheFZFeFo2RGY3MmNSamY2SFRlT0NXU0h0TmhhMXc5ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95YmVVSlM2ZTdFT1pKdUpXOHpKcGtCUkh3VlRpbXBOMy1YWjV2WXRNNWhzQ0liUk1KRlAwaG9DdEFBUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721580006),
('OtDSWCOsNDDTcsCToVcsDOKocQYn1h1TaFXXIwAx', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkpwS3BJMUJ6T2hUZDBqeEliR3hLdEZES2F1TVJpWWtYdUNSQkhGVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vZ290b3BlcnUuY29tL2Fib3V0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576680),
('oxIxSFUUdYujji4nzs1vdAwdC9dYvEUuyplzayo0', NULL, '52.167.144.219', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmtScnBLRGZCZkFTSm9ObU1rVG82Zk5tQkxGMXExNlZYY0hjTUlGTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721573918),
('P7nJNg15tim1lAjM22KUbwCziL8gZjXz7j0NZ9Yp', NULL, '80.76.173.181', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0FHanRSeEtFSEdhSWtvT1FMYmQ5N25CQnVPdzFRYXI4TnR1d0luRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2JyYWlkPTBBQUFBQUJiSXAyak1SZ1FlUkhiVU5mQjN2cGlYaFVPVE0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573226),
('PFwM49EvN8MdiuASPOyTfBzg0fmWLiPngyYrandj', NULL, '47.128.28.16', 'Mozilla/5.0 (compatible; Bytespider; spider-feedback@bytedance.com) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3daTVk2amdUMEJVMDl5NXR4dlFsa3BVV3pEbkg0ZGNFVW12NXhBbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHBzOi8vZ290b3BlcnUuY29tL2luZGV4LnBocC9wZXJ1LXRyYXZlbC1wYWNrYWdlcy9leHBsb3JlLWN1c2NvLWFuZC1tYWNodS1waWNjaHUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578970),
('pGIISDfd9P48SuZp3d1TJkJIJMLZ56ndpu3ALu4Z', NULL, '186.176.21.183', 'Mozilla/5.0 (iPad; CPU OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/126.0.6478.153 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMElXZTBjTU9SVEtjellBZm0yaWJNWmlBbzZaUTlldTN6ZDdVdlhGSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577894),
('PkxocZlsyeGrOcofEOF4Vy748laaxubvjFFgv1gB', NULL, '24.48.231.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajkyZHNqMWJIOGc0U3VFRkZBb0tRQXkyR0ttRWFjdlppdlpleFlncCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2x1eHVyeS1wZXJ1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721578666),
('pn0gT1q4AIqovUTrPbPWsJAbUlO8156vmvDbP85t', NULL, '8.28.234.101', 'Mozilla/5.0 (iPad; CPU OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkVQZkJ6UHRoV0JFWmdWV1Y3WndMZjJMT0pKQVppNXlrdWVtb2ZreiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl96UmRtd1ZUNndvaGRRNm1BSTNOcURfaXdLZXN1clN5WnREcnJ0UWxEY2sxTDhwOU83OXRjaG9DRDBFUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577181),
('pRyDfe0TQLR0jUMGBAAZT0OBGyRrLktMte3qye1w', NULL, '223.109.252.155', 'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzlpVmw0VDl6TU53anBPVmJhMDZiNnhYYVhWZ0ljOXRvaVFzcTJzNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579300),
('ptwXfXaRyK2sV856g8JjuvreoTUx7mWlQ4ODlk1D', NULL, '176.6.4.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/126.0.6478.153 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlVSamI1NU5lZXlpbzVXem1ja2ZPTDR5dGQ4Y0FlV3ZRWkhtQlhSeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573702),
('qAMdzIEXKCAepAyT4sGuu55IMy6pn9RnVfMgwAVs', NULL, '24.138.225.200', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWwwZUdCdzdlRWNNemlIc2Jvczl5WHJWVmVBWTg2UVFyd1lRa1pUZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmh1MEpXdmxPcVRxcmlfRGNEdW1ray1vJmdjbGlkPUVBSWFJUW9iQ2hNSTVkYk9oN3k0aHdNVktKdGFCUjNNREEyb0VBQVlBU0FBRWdLMU1mRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576698),
('qholyVuNfd4T9C276A9bic1i0L1VnczGTffS6mct', NULL, '31.165.122.58', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHFQc3NadTV4NnZWUHVtQU9sc0FCM05tVTBWRzlkVnJlU2QyYmZ6aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl94a01jWFdXSUFUNjNSMjA0aTM0OEFVQ2pkVE5SQkw5ZzdPYXJVNk9HSDY0aGdGdDFWWmo2Um9DSFF3UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574911),
('QSUpTlmxf2PHZOKTPq5B7OS3ir8NiC4m4A7CTL6z', NULL, '190.150.114.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0pnU2RFbDNCY2FHNDg4T1pvZjVFV05xSUdkSElTZTFkRTEyaWhLdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNVnRGaHlxYTY2Sk15cV82a3BrQy1aJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl81ZXVYZ1h2enZUaTJodGJpMDl0RklfcXNYMzE0RG9TZmNsZm5CYl9WTjBBRUxHNlRYV08xaG9DLU9VUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574541),
('RFVAC3QWMcFClQJAXYzZraUegFUzlyF2GWceGSef', NULL, '38.250.154.84', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzYyS1l5RjZRTE41M3lXdkNWN3ZFbFFGMlY1dVBnekVwRUVndkl2MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhnT0E0TTBiYWZpcnpDVkpZeFBCbm9jJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8wQjhBRzhTdUstWlFJSVg3UGtDT3JVVlRjN2ZaSGFzR0dCT3VaUVV4S3VERFV2SG9veEs1Um9DeS1RUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573935),
('rlV6PR4AaxgJt3wbOSVQBNbsRf80aTkWqk77HKp6', NULL, '24.50.238.5', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHA2N2o3VVVvYXhEWGdnaE9mWUx1OHhBcThxa0kzNHRXUHlrczdIcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2JyYWlkPTBBQUFBQUJiSXAyaHUwSld2bE9xVHFyaV9EY0R1bWtrLW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575014),
('Rmkm0AnLEf0K76UxTbigoF9iOMssTE9HqHyf3vKN', NULL, '112.86.225.82', 'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFR1end3MkN4akZmR1J2OE5GSFVGSlZSSERQUWJOMVFpT3UzakdJdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577722),
('s1GPyzipoo28OYZ2KKW9eCyjU2fIEAMzZgJqnjql', NULL, '24.46.36.59', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3l5NGt5N0ZJWERYQlZwYUdCMEJ4cmJRZVhGcGxRd0haRm9kQXNlTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl81b1FZSXZTdGtTVlo3V1JpaVdXOXo0Y0pNRXVMclJmWF9GWHRaaTZyTDdSUG1ja2dLb3htUm9DSkN3UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577407),
('S837BPoooZroXXSxknjfTiAuutJW0md3lXUPeqdu', NULL, '66.249.70.65', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1RuV0NYbVpvdVk4c3B2N0tPUnZjS0FYWnhNTnFZT1VyWFRuaVY5biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721574305),
('sAJnvLRVLFCpCwzLNga8EaLxCw8YCV86jY4nFyt5', NULL, '190.57.92.91', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0x4UFRGdUpKYTBmMjVoNFRLM0VXWjN2TG5EVVBWV3JjaXhyY1dGNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8xZVA5SXYzdGdFcGIzMWRGQWh6cDFNRUxmejdicVFtbjk4WXhDemZCS0RmWmstQnlTSUVMUm9DZmc4UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575342),
('SDBRSRfMgzx4NpJvCXvNDlfsUCdF8sJKbqMdwhxo', NULL, '47.128.43.81', 'Mozilla/5.0 (compatible; Bytespider; spider-feedback@bytedance.com) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmRjS3p3d3p3TlhmbDNVS0o2UFFxbHVIeVVjNk9VTExPTlRwd2tGUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL2luZGV4LnBocC9wZXJ1LXRvdXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576885),
('sixot5zylk9gWEGt9opxbTxqlLPkmwHfunIuW5gt', NULL, '24.54.218.150', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDh2S2ZkUHEyeWVxdlFPb2Q4ODZkZFl0ckZJNEJBRWRRbVR4QzFjdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmhDd3ZZS2pJWFgteTgzSnhTWGY5VnlvJmdjbGlkPUVBSWFJUW9iQ2hNSW1MSEtyOXUyaHdNVlhXRkhBUjBYOEFyT0VBQVlBU0FBRWdMY01QRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575438),
('SlD4GodvoIgmd0j6yrFapBrZYQ4cnPOCoGZxujCs', NULL, '80.76.173.181', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEFWdHBWWTVQc29XTkJDNGJIUnZpaU91dWhySjNjemw3a2VkenNZcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1NhY3JlZC1WYWxsZXktTWFjaHUtUGljY2h1LVJhaW5ib3ctTW91bnRhaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721575715),
('Sunu200kT3NlDA9hJviHkRPQYDtwpgllReTcD4b2', NULL, '172.59.18.221', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnNqQTJFejJvMG5vaWcxVnJlYUNYdHRuWU5mQ2thN2N5b25CWUZpVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNVnRGaHlxYTY2Sk15cV82a3BrQy1aJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl81S0YzTTR4ZFIzTmtlYktiTXZTSWROUWhZUGw5NWFVbVFGdkpicmpROW1sVmF3QnJMblpGeG9DY1lJUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578501);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SzZZ6iuHbejKlP4gNiy4OSUhSrS28QASIdX8wSoT', NULL, '83.58.148.107', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2QxcHdMaEJDNzJBNWk4dmI1c2hyUlphUnNjWFdodWZONkQ3U1lyViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl85UTRBdjd4NjBhcEUzNHM0VWtLLW9XN01OU0hORmZyeWJra0R4emY1d3M4dWo3WkprbmpHQm9DZzRzUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574143),
('TlhS3OZkIiiatUF0GFrdU4K9hlqFmQoXWpQdGnaq', NULL, '54.39.52.211', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamo5UUtUU2dVVUlGU1pxQ1pqTldtWUZGS0xuSkcxUmNtVlJYeDdaTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579127),
('tNcbQVF0ASe2nDsPpc9EaDcmq1JYjOMhb3wGSuoh', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkNkM1N3SW8yclo5eHZLN0FsSXRmdnNtdDRnTjVFTzV2OHpkemc2UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2ZyZXF1ZW50bHktYXNrZWQtcXVlc3Rpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721576742),
('TnnMr405YouwZKhS54UyDk2r6J5oB3vuPxFJz1fC', NULL, '89.144.217.147', 'Mozilla/5.0 (Linux; Android 11; SAMSUNG SM-A202F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNE11OXJ5T09ReVFhcTQzU3paemI1bUxUSkRKT2FZYnF3d1lUT2tKRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8wMDZ3VnZIdE5aQWR3U1YzOW56TmQzYzFIaVRjcHNyYWhkdHhDOFRnQTNmd2Q2MU93dlpXaG9DVG04UUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576324),
('Tw92YLlNq1tQdlyWws13M9zz7LqJEN0nxFx3PoNW', NULL, '172.56.10.9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzU3a0xHYjY2UzFKVFFrNzRkYWFYQWlTWXRaVzFyVEdDN2Uzb2sxayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8zeThLNUFzTnhnS2FZVXh5WUdicEUwV205Q09WVmRESjFjTXg3dUp0TE9fMTd0UmNCYUNMeG9DZUZNUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579169),
('u40uauPwYXyqgo9hsd3GSTh6WVAeAKNYedVIhBpx', NULL, '75.173.85.212', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1NqMlRhRXcxMnVTQ0N2bmxaUXJYZm9ySENuaFVJNGp5WEl1THI5YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmdHd3R6ZnZoeXVLYWdsV0JCUGFkaHBzJmdjbGlkPUVBSWFJUW9iQ2hNSTdPcmV3Ykc0aHdNVkIwWl9BQjMxeXdOckVBQVlBU0FBRWdJSFpQRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573721),
('uj5x3lLemPdMkf5VdDNF64dcB55tnDwshwpRcKwM', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGJ3UjlLVGZmM3VOOWlYcGU3cnBVQlAwaHhRTFpjRUhIVjhyV3UyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vZ290b3BlcnUuY29tL2Rlc3RpbmF0aW9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721576473),
('UjybKzghGcCTqz16eQifkngv1kdsVd5dlFkKvD4Z', NULL, '172.56.28.179', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFJSSkJ3WHBNMmEyYk9vQ2FadE9takdZSG9xbTdhTkMwR2hVMGdidyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL1RvcC1QZXJ1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577360),
('UlFBQ0Ol4RNM93i6RpoNMQFbXUVGdQ597YjCUYoE', NULL, '188.252.198.230', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielJaSk9rSDU2NTZ5dFNwTEQyQXNSWW5JWGs4aEZiamd1cFE1eTduUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2JyYWlkPTBBQUFBQUJiSXAyak1SZ1FlUkhiVU5mQjN2cGlYaFVPVE0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574898),
('URqjaP5WeXW6G0aZ9E2IlLeadIJUMQzl59Pba0rp', NULL, '71.57.146.228', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmdnZVUzMm9IZm05U0RDVDVJYWd3b0VuZ2RUcDBjQ0ZrVVZjUXVDcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmppT1pXVkx0ZzhDTHJycmw5RF96VzFXJmdjbGlkPUVBSWFJUW9iQ2hNSWdPbmNsYks0aHdNVnZLVmFCUjFfY3dubEVBQVlBaUFBRWdJTW5QRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721573820),
('uSvf3ZACPQgaJrsFEDU05NWOOAIPS2eBC0BxzHwI', NULL, '35.206.64.40', 'Buck/2.4.2; (+https://app.hypefactors.com/media-monitoring/about.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXhaUENpQU1hQWRZQzc5QU94T1pyOEhkakZpRGRrRUdoTzZ0aVVJZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZ290b3BlcnUuY29tL2Rlc3RpbmF0aW9ucy9pY2EiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721576779),
('Uvr4yNtONRAByESOgzuyeLZk0GmxZe4AhguurRqK', NULL, '24.50.226.76', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/325.0.651794912 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemlaTzdVTEJGSmxrMjJXdDBSbUFrOXV6THFocDVnTW9wTkJDV1JjeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721575246),
('uxS4qWVKrUO5A23BjDJBNoaKoftxq5KXgZXysHTH', NULL, '217.110.152.58', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamVUWWdDaVpNdTl5RzBseWFSMmVnNVBTTVhnR0xqMTNWcm1iVWpadCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmctMGhFVlN4N2o5VjZiakVTbko5cmJZJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8zaklSOTVMOUlFaXVEelVSNGhGM0JHRDFHa2dmR2ZOMGo5cVVLNmJQSUVTT3VwWUNNUE9JQm9DcUdvUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574123),
('V9xdAb2UM8jyG5hhVpfB8URJCE9VjSMz5FCYThhK', NULL, '108.46.146.170', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibURwTXhpcWpZRWhZdWNvWkdSbVZRNFBpWkRMZ1l1V2M3MHBUMFo2dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmppT1pXVkx0ZzhDTHJycmw5RF96VzFXJmdjbGlkPUVBSWFJUW9iQ2hNSTRkbVZsTFM0aHdNVnBseEhBUjJtTkFjRkVBQVlBU0FBRWdMRFlmRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721574352),
('VEab4KG2ZTSJKmKFDEeBxUFAbmEUCQuLHz2ajCDB', NULL, '72.42.146.235', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWThjUkRjMjYzVnhwckppeTdEUG9IS3R2a0JYclNPZHREdU9EM3BYUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmppT1pXVkx0ZzhDTHJycmw5RF96VzFXJmdjbGlkPUVBSWFJUW9iQ2hNSTZiaVRvTVc0aHdNVnZCdXRCaDBsV3dxZUVBQVlBU0FBRWdLTHRmRF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578933),
('VIK095QQGPmVphllJTSNF1APsyzleADAiqJyZuNj', NULL, '182.253.124.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUJUWDNWdmdXRnBnQVdIMFBJN2pVcVgybnY1S2luN3JNUERlTmdlRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721579139),
('w237WRpBoT5Fzx3qzPIxtRtcD9oV52b5GMQ3ge8L', NULL, '176.87.118.38', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWNwSGp6QUdBTEFkeFpCazVNYTVnR2o5YmhkTk0zUzBjU1o5YXRjUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl8wZTVtRDRaQmZxTFpBZkJkQTlOdzZ5ZjlieEpFMTJZcng2MmdyVmhRTnR5Ulh4MTlFRlh1eG9DaVdnUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577275),
('W5fxYOD3OvHgx9MXp92ypOGAXao0wtWXPzLCQDJS', NULL, '158.62.33.25', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/25.0 Chrome/121.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzh2RjZPM3AxMnJrY3BSM095YkdGZXFIU1l2QzlLRmtxNE94QzRPeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMyOiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl81U00zT2NEYjU2dlhmVjY0eWM0UkdBY3JDellvMEZFM3E0aGpaRy1lTDJLbGlka3ljN05GUm9DZU1vUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578925),
('WbRPG0AsD6fQguqj3JigABJVTlWhgWT0HccVPBIE', NULL, '82.217.174.179', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEVUMGNSSHFQQ3ZiVk96UnFaZTVQOHU4a2RSREo4V0J4NloybGY3dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZ290b3BlcnUuY29tL3doeS1ib29rLXdpdGgtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721579391),
('wz1yyuAFALIO04ozlrzl7jyaautFQWzweQ5jO73a', NULL, '99.172.8.88', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjd1bjJEempUTkt5c2N3QksyYWJ1RHpYSGdEWTcycWdpaUU0MGp2bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl81LVhOUnloaGpHcjBBeG9YU1ZwY0VRMk5hTTBDMjlFbzZsR2phX2lsdGxWTXpSZ3ZSdXVFeG9DdmFFUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577457),
('XFHvfMUxa9xZc0EX2hhkXrybRghCfc0UJraNXzle', NULL, '84.125.102.186', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUhYM1IzNWtuTWxHSHdsTFpzNHZMWmF1NmprcE81SEZMaDV4a1JTUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vZ290b3BlcnUuY29tLz9nYWRfc291cmNlPTEmZ2JyYWlkPTBBQUFBQUJiSXAyak1WdEZoeXFhNjZKTXlxXzZrcGtDLVoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721577793),
('xJibtaqayhNwhvzsXaCozYCzbXjYq0nHCgjE7JIm', NULL, '172.59.16.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1huY25neU04VVg4Q1c3Q3JQTGVXcjU1U0dnU2JMR1Qzb0FOaTl3TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2Jlc3Qtb2YtcGVydS1pbi0xMi1kYXlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577068),
('xyTmS0wOrDJSvyVMmJSoqlL4qokQqk6GFAm3qA1z', NULL, '104.28.32.207', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDg2NUNWTVhLV0l5b0VnQ0JqZEhWSWp4bHMwMWZjOWVrY3E2N0t2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc0OiJodHRwczovL2dvdG9wZXJ1LmNvbS8/Z2FkX3NvdXJjZT0xJmdicmFpZD0wQUFBQUFCYklwMmpNUmdRZVJIYlVOZkIzdnBpWGhVT1RNJmdjbGlkPUNqd0tDQWp3NF9LMEJoQnNFaXdBZlZWWl95YmlNR3JwMFFfNXMwZ0FST1NKMmstU2lGYkdXRFdsSVRTSnFZQTBCS0lvYmxPRWFmMzFYUm9DbkRZUUF2RF9Cd0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1721578480),
('yL8OcNds8LQU5Ltyl0Qsh3NNTQdShfEshj5xD2RM', NULL, '172.59.19.115', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHhnN0JFMklyYnZEalRGUEtZR0wwWEU2MlROb3Y1eWpDUUpoc2hqOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vZ290b3BlcnUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721575819),
('Z3TBrMHVs78SWyEsmRG9Ga2QhAP4MsYIwGOC70o3', NULL, '172.59.16.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUJ6Yll3aHFFc2N3RTM1RlpzWnVrYVVnbUtxOVllekZoNkJZcFQ4ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzL2Jlc3Qtb2YtcGVydS1pbi0xMi1kYXlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721577117),
('zZzxhDTetKvKoFbSP17GrLnc0NYXpEUE7rw2wnNd', NULL, '108.85.38.165', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkM2S0FIR1JiTkpWYlozUkIxUWVxUnZPMzc5dERheEthNXdjeXlybCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZ290b3BlcnUuY29tL3BlcnUtdHJhdmVsLXBhY2thZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721574700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taeropuerto`
--

CREATE TABLE `taeropuerto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `aeropuerto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `taeropuerto`
--

INSERT INTO `taeropuerto` (`id`, `codigo`, `aeropuerto`) VALUES
(1, 'mia', 'miami'),
(2, 'jfk', 'new york'),
(3, 'lax', 'los angeles'),
(4, 'iad', 'washington dc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcategoria`
--

CREATE TABLE `tcategoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `descripcion` longtext,
  `imagen` varchar(250) DEFAULT NULL,
  `imagen_banner` varchar(250) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `orden_block` int(11) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `form` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcategoria`
--

INSERT INTO `tcategoria` (`id`, `nombre`, `url`, `descripcion`, `imagen`, `imagen_banner`, `estado`, `orden_block`, `grupo`, `form`, `created_at`, `updated_at`) VALUES
(27, 'TREKS TOURS', 'treks-tours', NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/category/1580146352562sacred-valley_1580146353_1651607371.jpg', 'https://s3.us-west-1.amazonaws.com/gotoperu-com/category/banner/inca-trail-slider-short_1651607389.jpg', 0, 1, 1, NULL, '2022-04-29 00:07:30', '2022-05-03 22:02:08'),
(29, 'FULL DAY TOURS', 'full-day-tours', NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/category/1580146292571cusco_1580146293_1651608386.jpg', 'https://s3.us-west-1.amazonaws.com/gotoperu-com/category/banner/15801461912621574272741697AV1204-2_1574272740_1580146194_1651608398.jpg', 0, 1, 1, NULL, '2022-05-01 19:45:57', '2022-05-03 22:02:28'),
(31, 'LUXURY TOURS', 'luxury', NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/category/banner/luxo_1656987309.jpg', 0, 0, 1, NULL, '2022-06-18 19:09:25', '2022-07-05 02:15:09'),
(32, 'HONEYMOON TOURS', 'honeymoon-tours', NULL, NULL, NULL, 0, 0, 1, NULL, '2023-10-23 16:32:48', '2023-10-23 16:33:27'),
(33, 'ADVENTURE TOURS', 'adventure-tours', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-23 16:33:18', '2023-10-23 16:33:18'),
(34, 'WELLNESS TOURS', 'wellness-tours', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-23 16:33:59', '2023-10-23 16:33:59'),
(35, 'FAMILY TOURS', 'family-tours', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-26 20:00:39', '2023-10-26 20:00:39'),
(36, 'CLASSIC TOURS', 'classic-tours', 'Classic and traditional tours in Peru', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 16:13:33', '2023-12-18 16:13:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomentario`
--

CREATE TABLE `tcomentario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `comentario` longtext,
  `valoracion` int(1) DEFAULT NULL,
  `idpaquetes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdestinos`
--

CREATE TABLE `tdestinos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(4) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `region` varchar(15) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `resumen` longtext,
  `descripcion` longtext,
  `historia` longtext,
  `geografia` longtext,
  `donde_ir` longtext,
  `atracciones` longtext,
  `entretenimiento` longtext,
  `gastronomia` longtext,
  `fiestas` longtext,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `form` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `intro` longtext,
  `best_time` longtext,
  `top_tours` longtext,
  `things` longtext,
  `weather` longtext,
  `airports` longtext,
  `hotels` longtext,
  `restaurants` longtext,
  `payment` longtext,
  `festivities` longtext,
  `information` longtext,
  `places` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdestinos`
--

INSERT INTO `tdestinos` (`id`, `codigo`, `nombre`, `url`, `region`, `pais`, `idpais`, `resumen`, `descripcion`, `historia`, `geografia`, `donde_ir`, `atracciones`, `entretenimiento`, `gastronomia`, `fiestas`, `imagen`, `estado`, `form`, `created_at`, `updated_at`, `intro`, `best_time`, `top_tours`, `things`, `weather`, `airports`, `hotels`, `restaurants`, `payment`, `festivities`, `information`, `places`) VALUES
(1, NULL, 'Cusco', 'cusco', NULL, 'Perú', 1, '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture.</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', '<p>Nestled in the rolling terrain of the Peruvian Andes, is a city overflowing with ancient Inca culture</p>', 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708963976885portada gotoperu cusco 2_1708963977.jpg', 1, 1, '2019-11-19 14:22:31', '2024-02-26 18:58:03', '<p style=\"text-align: justify;\">The iconic city of Cusco is located in the Andes Mountains at approximately 3400 meters above sea level. The city of Cusco has a unique combination of cultural aspects, the essence of Peruvian history, natural beauty, and world-recognized monuments such as the Sacsayhuaman Fortress, the Salt mines of Maras, the Archaeological site of Moray and the Wonder of the World, Machu Picchu.</p>\r\n<p style=\"text-align: justify;\">Being the living legacy of the Inca culture, the city of Cusco still maintains much of the ancient Inca ruins within the Historic Center as well as on the outskirts of the town. The city of Cusco has suffered many transformations over the centuries, from the territory\'s population by the pre-Inca cultures to the time of the Spanish Inquisition, where indigenous leaders stood out, Tupac Amaru II being the most important one.</p>\r\n<p style=\"text-align: justify;\">Today, Cusco maintains its cobblestone streets and traditional markets, among which the San Pedro Market and the San Blas Market stand out. The last one is located in one of the city\'s most emblematic neighborhoods of Cusco. The San Blas neighborhood, founded by Cusco\'s leading artisan families, is a worldwide cosmopolitan destination. Its narrow streets, traditional and international restaurants, themed bars, boutique hotels, and spectacular views make it a dream destination for many travelers who come to San Blas and stay for many seasons.</p>\r\n<p style=\"text-align: justify;\">Cusco has become the gateway or mandatory stop if your destination is the citadel of Machu Picchu because it is the fastest and most popular way to access the Wonder of the World, Machu Picchu.</p>\r\n<p style=\"text-align: justify;\">Another dream destination near the city of Cusco is the Sacred Valley, which has the vast majority of ruins and archaeological sites most representative and visited in Cusco, as is the case of the Salt Mines of Maras, the Archaeological Site of Moray, the Pisac Ruins and the Ollantaytambo Fortress.</p>', '<p style=\"text-align: justify;\">Cusco offers various activities for all ages and all types of travelers, so the best time to visit Cusco is up to you. In the case of Cusco, the four seasons of the year are not entirely defined, so the seasons are divided into only 2: The dry and rainy seasons. Depending on the type of trip you plan to take, our team of specialists could advise you on the proper dates for your visit to the city of Cusco.</p>\r\n<ol style=\"text-align: justify;\">\r\n<li><strong> Dry season (May to September): </strong>Popularly known as the best season to visit Cusco. The weather conditions are mainly sunny during the day and with very little heavy rain, especially in June and July, the peak of the tourist season. In these months, the prices of tour packages, accommodation, and transportation are the highest of the year, in addition to finding large numbers of tourists who mainly come to witness the celebration of Inti Raymi. We recommend you book well in advance because the availability of income to tourist attractions usually needs to be improved.</li>\r\n<li><strong> Rainy season (October to April): </strong>The rains arrive in Cusco but are rarely constant throughout the day. Fleeting showers are to be expected during the afternoon or evening. Despite this, you will have the possibility to enjoy a predominantly green landscape in all its glory. This season, you will find lower prices for everything related to the tourism sector and fewer visitors.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">In conclusion, both dry and rainy seasons have advantages and disadvantages in different aspects. Also, mention that Cusco is located at a high elevation in the Andes Mountains, so that temperatures can drop significantly at night, even in the dry season.</p>', NULL, NULL, '<p style=\"text-align: justify;\">The city of Cusco is characterized by its high elevation and strategic location in the middle of the Andes Mountains. This contributes to distinct Cusco\'s weather patterns of temperature and precipitation throughout the year. In some cases, these patterns are affected by climatological events such as frost, the El Ni&ntilde;o Current, or the Yaku Cyclone (2023).</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Machu Picchu', 'machu-picchu', NULL, 'Perú', 1, '<p>Stands 2,430 m above sea-level, in the middle of a tropical mountain forest, in an extraordinarily setting</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964114497portada gotoperu machupicchu_1708964115.jpg', 1, 1, '2019-11-19 14:22:50', '2024-02-26 19:26:18', '<p style=\"text-align: justify;\">The citadel of Machu Picchu is imposed as the dream destination for all travelers visiting Peru and the majestic city of Cusco. Located in the district of Machu Picchu in the province of Urubamba, the citadel of Machu Picchu receives, on average, about 5500 visitors daily.</p>\r\n<p style=\"text-align: justify;\">There are, currently, many ways to get to Machu Picchu, but first of all, you must get to the city of Cusco. Once you are in Cusco, you can get to Aguas Calientes, better known as Machu Picchu town, by train from the various train stations that are on the way from Cusco along the Sacred Valley, such as Poroy, Urubamba, and Ollantaytambo. Another way to get to Machu Picchu is by a 6-hour drive to the Hydroelectric Power Plant in the Santa Teresa district. You have two options from the Hydroelectric Power Plant: take a train (a small train station located here with few daily frequencies) or walk for approximately 2 hours to Aguas Calientes.</p>\r\n<p style=\"text-align: justify;\">As previously mentioned, Aguas Calientes is known as Machu Picchu Town and is a mandatory stop for all travelers visiting the citadel of Machu Picchu. Aguas Calientes is a tiny town of no more than 5000 inhabitants, mainly of hotels, restaurants, and craft markets. You can also find the train and bus stations here, the two most crowded places besides Machu Picchu citadel.</p>', '<p style=\"text-align: justify;\">The best time to visit Machu Picchu is during the dry season, typically from May to October. Within this period, the months of June to August are considered the peak season, attracting a higher number of visitors due to the favorable weather conditions.</p>\r\n<p style=\"text-align: justify;\">Critical considerations for the best time to visit Machu Picchu:</p>\r\n<p style=\"text-align: justify;\"><strong>Dry Season (May to October):</strong></p>\r\n<p style=\"text-align: justify;\">May to October is the dry season in the Andes, offering clear skies and minimal rainfall.</p>\r\n<p style=\"text-align: justify;\">June to August is the peak season with the most stable weather, but it can also be crowded.</p>\r\n<p style=\"text-align: justify;\">April and November are considered shoulder seasons, offering a balance between reasonable weather and fewer crowds. While there may be some rainfall, it\'s generally less than during the wet season.</p>\r\n<p style=\"text-align: justify;\"><strong>Wet Season (December to March):</strong></p>\r\n<p style=\"text-align: justify;\">December to March is the wet season, characterized by heavier rainfall. While Machu Picchu remains open, there\'s an increased chance of rain, and hiking trails may be affected.</p>\r\n<p style=\"text-align: justify;\">Considerations for Specific Activities:</p>\r\n<p style=\"text-align: justify;\">If you plan to trek the Inca Trail, it\'s advisable to avoid the peak rainy season (January to March) to ensure better trail conditions.</p>\r\n<p style=\"text-align: justify;\">If you prefer to avoid crowds, consider visiting in the shoulder seasons.</p>\r\n<p style=\"text-align: justify;\">Remember that Machu Picchu is a popular destination, and regardless of the season, it\'s advisable to book tickets and accommodations well in advance, especially if you plan to visit during the peak season. Additionally, the weather in the Andes can be unpredictable, so it\'s always a good idea to come prepared with layers, rain gear, and suitable footwear.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Sacred Valley', 'sacred-valley', NULL, 'Perú', 1, '<p>The Incas appreciated the Sacred Valley for its unique geographical and climatic qualities.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964235902portada gotoperu sacred_1708964236.jpg', 1, 1, '2019-11-19 14:24:34', '2024-11-10 16:18:32', '<p style=\"text-align: justify;\">The Sacred Valley of the Incas is located approximately 56 km from Cusco. Known worldwide for having one of the best climates and biodiversity, the Sacred Valley is one of the dream destinations for all travelers seeking to disconnect from the world and connect with the Inca culture.</p>\r\n<p style=\"text-align: justify;\">The Sacred Valley is at an average altitude of 2,800 meters above sea level, 600 meters lower than Cusco, and less likely to suffer from altitude sickness. This facilitates outdoor activities other than conventional tours, such as horseback riding, bicycle tours, zipline, ATV tours, trekking, and short hikes.</p>\r\n<p style=\"text-align: justify;\">From Pisac to Ollantaytambo, the Sacred Valley has an extension of more than 60 miles. It has among its main destinations Urubamba, the capital of the Sacred Valley, Calca, Pisac, Yucay, and Ollantaytambo. From Pisac to Ollantaytambo, the Sacred Valley has an extension of more than 60 miles. It has among its main destinations Urubamba, the capital of the Sacred Valley, Calca, Pisac, Yucay, and Ollantaytambo. Despite not being considered towns, other destinations to highlight are the Salt Mines of Maras and the archaeological center of Moray, two of the most popular destinations for conventional tours and ATV and bicycle tours.</p>\r\n<p style=\"text-align: justify;\">Whether touring or visiting alone, the Sacred Valley has everything a cosmopolitan traveler seeks. Take advantage of the opportunity to visit the Sacred Valley of the Incas and learn more about Inca buildings and culture.</p>', '<p style=\"text-align: justify;\">The best season to visit the Sacred Valley is the dry season (no rain), from the end of May to the end of September. The rain does not represent a significant obstacle, but it can condition many tours in the Sacred Valley.</p>\r\n<ol style=\"text-align: justify;\">\r\n<li><strong>May to October (Dry Season):</strong> This is generally considered the best time to visit. The weather is dry, and temperatures are mild during the day, making it ideal for exploring the archaeological sites, markets, and outdoor activities.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<ol style=\"text-align: justify;\" start=\"2\">\r\n<li><strong>June to August (Peak Season):</strong> This period falls within the dry season and is the most popular time for tourists. Expect clear skies, but be prepared for larger crowds, especially at popular sites like Machu Picchu.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<ol style=\"text-align: justify;\" start=\"3\">\r\n<li><strong>November to April (Rainy Season):</strong> The wet season is characterized by heavier rainfall. While the landscapes are lush and green, some hiking trails may be affected, and there\'s a higher chance of rain affecting outdoor activities.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<ol start=\"4\">\r\n<li style=\"text-align: justify;\"><strong>April and November (Shoulder Seasons):</strong> These months are transitional between the wet and dry seasons. You may encounter fewer tourists, and the weather can still be pleasant. However, there\'s a slightly higher chance of rainfall.</li>\r\n</ol>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Lima', 'lima', NULL, 'Perú', 1, '<p>Enjoy Lima\'s culture and embark on a culinary exploration in South America\'s food capital.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964376528portada gotoperu lima_1708964377.jpg', 1, NULL, '2019-11-19 14:33:56', '2024-02-26 19:43:35', '<p style=\"text-align: justify;\">Lima is located on the west coast of South America and is the historic capital of Peru. The history of Lima goes back from the occupation of its territory by the Pre-Inca cultures to the colonization of the Inca lands by the Spanish delegations.</p>\r\n<p style=\"text-align: justify;\">Today, Lima has become a bustling metropolis that combines the remaining colonial architecture with modern high-rise buildings and traditional markets where Lima\'s inhabitants buy primary products and groceries on the go.</p>\r\n<p style=\"text-align: justify;\">Famous for its culinary panorama. Lima delights all its visitors with a great gastronomic variety located in only one city, which has made it recognized as the number 1 culinary destination in the world and home to many restaurants positioned in the top 50 worldwide.</p>\r\n<p style=\"text-align: justify;\">Lima offers a wide variety of activities, from visits to pre-Hispanic ruins located on the city\'s outskirts to tours of the different boardwalks on a significant part of the coast of Lima.</p>', '<p style=\"text-align: justify;\">Lima is a coastal city with a climate somewhere between desert and valley with no significant variations in its temperature. The best time of the year to visit Peru\'s beautiful capital city depends on your preferences and the experiences you seek. Here, we have prepared a summary of each season in Lima.</p>\r\n<ol style=\"text-align: justify;\">\r\n<li><strong> Summer (early December to late March):</strong> It is the peak tourist season of the year and the most preferred by visitors because it is when you can enjoy Lima\'s beaches to the fullest. The average humidity in Lima is usually over 70%, but during the summer season, it can increase up to 90%. Despite this, summer in Lima has one of the most pleasant climates.</li>\r\n<li><strong> Autumn (late March to late June):</strong> Many travelers consider this season the best time to visit Lima because they avoid the crowds present in summer and the decrease in the humidity percentage.</li>\r\n<li><strong> Winter (from July to September):</strong> Despite being cataloged as the coldest season in Lima. Temperatures do not decrease considerably. There is no snow or heavy rain, so winter is the best time to visit Lima if you are looking for outdoor activities.</li>\r\n<li><strong> Spring (late September to November):</strong> The climate is very similar to autumn but with a slight increase in the percentage of humidity. With the beginning of the temperature rise and still being a low season for tourists, Spring is the best time to visit Lima and have culinary and cultural experiences.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">Lima\'s climate has the presence of the Humboldt Current, which implies a low temperature in the waters of the Peruvian coast, so if you intend to swim on Lima\'s beaches, you should visit Lima in the summer.</p>\r\n<p style=\"text-align: justify;\">Generally, your visit will depend on the activities you would like to do in Lima.</p>', NULL, NULL, '<p style=\"text-align: justify;\">The climate in the city of Lima is characterized by its stability despite having four different seasons during the year. The only factor maintained throughout the year is the humidity, which does not fall below 70%. Below is a table where you can find relevant information about the climate month by month in Lima.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'Arequipa', 'arequipa', NULL, 'Perú', 1, '<p style=\"text-align: justify;\">The white city of Arequipa is home to Peru\'s most famous volcano, the Misti volcano, and is a must for those visiting the Colca Canyon.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964473750portada gotoperu arequipa_1708964474.jpg', 1, NULL, '2019-11-19 14:34:28', '2024-02-26 19:20:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 'Puno', 'puno', NULL, 'Perú', 1, '<p>The shimmering blue waters of Lake Titicaca is home to the famous, man-made Floating Islands of Uros.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964505112portada gotoperu titicaca lake_1708964505.jpg', 1, NULL, '2019-11-19 14:34:40', '2024-02-26 16:21:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'Nazca Lines', 'nazca-lines', NULL, 'Perú', 1, '<p>hocking feat of ancient artwork ? and an unsolved mystery that has fed conspiracy</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/gotoperu-com/destinations/1708964593555portada gotoperu NAZCA_1708964594.jpg', 1, NULL, '2019-11-19 16:10:39', '2024-11-10 17:27:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdestinosimagen`
--

CREATE TABLE `tdestinosimagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `alt` varchar(250) DEFAULT NULL,
  `iddestinos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdestinosimagen`
--

INSERT INTO `tdestinosimagen` (`id`, `nombre`, `alt`, `iddestinos`, `created_at`, `updated_at`) VALUES
(80, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731253792715cusco_1731253793.webp', NULL, 1, '2024-11-10 15:49:54', '2024-11-10 15:49:54'),
(82, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731255577859sacred-valley_1731255578.webp', NULL, 3, '2024-11-10 16:19:39', '2024-11-10 16:19:39'),
(83, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731255590793machu-picchu_1731255591.webp', NULL, 2, '2024-11-10 16:19:52', '2024-11-10 16:19:52'),
(84, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731256114425lima_1731256115.webp', NULL, 4, '2024-11-10 16:28:35', '2024-11-10 16:28:35'),
(85, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731259539744arequipa_1731259540.webp', NULL, 5, '2024-11-10 17:25:40', '2024-11-10 17:25:40'),
(86, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731259560172puno_1731259560.webp', NULL, 6, '2024-11-10 17:26:01', '2024-11-10 17:26:01'),
(87, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/destinations/slider/1731259591475nazca-lines_1731259592.webp', NULL, 7, '2024-11-10 17:26:32', '2024-11-10 17:26:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdificultad`
--

CREATE TABLE `tdificultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdificultad`
--

INSERT INTO `tdificultad` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(5, 'EASY', 'Take it easy! Kick back with breathtaking views, different cultural experiences and rich History.  There might be easy hiking to the main attractions, for example steps at MachuPicchu.  Good for most fitness levels.', '2019-11-19 14:23:21', '2020-04-02 14:03:40'),
(6, 'MODERATE', 'For those who are used to do some exercise. Good basic fitness level is required. Mainly gently hilly.', '2019-11-19 14:32:45', '2020-04-02 14:12:46'),
(7, 'DEMANDING', '', '2020-04-02 14:13:03', '2020-04-02 14:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thotel`
--

CREATE TABLE `thotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` longtext,
  `estrellas` int(1) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `servicios` longtext,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expedia` varchar(50) DEFAULT NULL,
  `tripadvisor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `thotel`
--

INSERT INTO `thotel` (`id`, `nombre`, `descripcion`, `estrellas`, `direccion`, `url`, `servicios`, `imagen`, `created_at`, `updated_at`, `expedia`, `tripadvisor`) VALUES
(47, 'PALACIO DEL INKA', '<p>Una espl&eacute;ndida mansi&oacute;n en un templo real lo convierte en uno de los hoteles en Cusco m&aacute;s espectaculares. Cuenta con 141 habitaciones de lujo y 64 suites. &nbsp;En el<strong> </strong>hotel, puede mantener f&aacute;cilmente su rutina diaria de ejercicios en el gimnasio. Uniendo pasado y presente el Andes Spirit Spa ofrece tratamientos aut&oacute;ctonos y una piscina interior terap&eacute;utica. Adem&aacute;s, el restaurante Inti Raymi ofrece aut&eacute;nticos platos peruanos mientras que una variedad de espacios para reuniones y eventos invitan a los hu&eacute;spedes a celebrar ocasiones especiales. Sum&eacute;rjase en la historia de Cusco desde Palacio del Inka.</p>', 5, 'Plazoleta Santo Domingo Nª 259, Cusco, Perú', 'https://www.shutterstock.com/es/image-photo/antiplano-peru-may-23-2018-enjoying-2119152254', 'Restaurant,Internet,Laundry Service,Room Service,Bar,Spa', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/hotel/palaciodelInka_1637077181 (1)_1730771777.jpg', '2024-08-06 00:37:36', '2024-11-05 01:56:53', '3', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thoteldestino`
--

CREATE TABLE `thoteldestino` (
  `id` int(11) NOT NULL,
  `iddestinos` int(11) DEFAULT NULL,
  `idhotel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `thoteldestino`
--

INSERT INTO `thoteldestino` (`id`, `iddestinos`, `idhotel`, `created_at`, `updated_at`) VALUES
(1, 1, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(2, 2, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(3, 3, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(4, 4, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(5, 5, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(6, 6, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53'),
(7, 7, 47, '2024-11-05 01:56:53', '2024-11-05 01:56:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tincluye`
--

CREATE TABLE `tincluye` (
  `id` int(11) NOT NULL,
  `incluye` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tincluye`
--

INSERT INTO `tincluye` (`id`, `incluye`, `estado`, `created_at`, `updated_at`) VALUES
(10, 'Zugfahrticket Lima- Huancayo.', 1, '2019-05-21 03:21:17', '2019-05-21 03:21:17'),
(11, '1 Übernachtung im einem Standarthotel in Huancayo.', 1, '2019-05-21 03:21:28', '2019-05-21 03:21:28'),
(12, 'Transfers gemäss dem beschriebenem Programm.', 1, '2019-05-21 03:21:38', '2019-05-21 03:21:38'),
(13, 'Rückfahrt von Huancayo nach Lima in Form eines Tickets für den öffentlichen Bus.', 1, '2019-05-21 03:21:53', '2019-05-21 03:21:53'),
(14, 'Mahlzeiten : 1 Mittagsessen , 1 Frühstück.', 1, '2019-05-21 03:22:09', '2019-05-21 03:22:09'),
(15, '2 Übernachtungen in rustikalen  Unterkünften', 1, '2019-06-05 04:13:50', '2019-06-05 04:13:50'),
(16, 'Transfer zum Colcatal in einer Gruppe mit internationalem Teilnehmerkreis (exklusiver Service auf Anfrage )', 1, '2019-06-05 04:14:10', '2019-06-05 04:14:10'),
(17, 'Wanderung, wie im programm benannt, in Privatservice mit qualifizierter englischsprachiger Trekking- Guide ( Deutschsprachig auf Anfrage)', 1, '2019-06-05 04:14:32', '2019-06-05 04:14:32'),
(18, 'Vollpension während der Trekking-Exkursion', 1, '2019-06-05 04:14:52', '2019-06-05 04:14:52'),
(19, 'Alle Eintrittskarten ', 1, '2019-06-05 04:15:14', '2019-06-05 04:15:14'),
(20, '3x mal Frühstück, 2x mal Mittagessen, 2x Abendessen ', 1, '2019-06-05 04:15:30', '2019-06-05 04:15:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinquire`
--

CREATE TABLE `tinquire` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `hotel` varchar(250) DEFAULT NULL,
  `destinos` varchar(250) DEFAULT NULL,
  `pasajeros` varchar(250) DEFAULT NULL,
  `duracion` varchar(250) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `travel_date` datetime DEFAULT NULL,
  `travel_date2` datetime DEFAULT NULL,
  `telefono` varchar(250) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `codigo_pais` varchar(100) DEFAULT NULL,
  `device` varchar(100) DEFAULT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `precio_inicial` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `sub_profit` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL,
  `sent` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tinquire`
--

INSERT INTO `tinquire` (`id`, `producto`, `package`, `hotel`, `destinos`, `pasajeros`, `duracion`, `nombre`, `email`, `travel_date`, `travel_date2`, `telefono`, `comentario`, `codigo_pais`, `device`, `origen`, `browser`, `precio_inicial`, `precio_venta`, `sub_profit`, `profit`, `vendedor`, `sale_date`, `sent`, `estado`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, 'Superior,Normal,', NULL, '2,', '6-8,', 'Danelly Cruz', 'danemontelongo@gmail.com', '2024-10-19 00:00:00', '2024-10-19 00:00:00', '', '', NULL, NULL, NULL, NULL, 1000, 1230, 100, 50, 1, '2024-10-19 00:00:00', 1, 1, '2019-12-04 11:23:35', '2024-10-21 19:16:01'),
(4, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,', '2,', '3-5,', 'Teodoro Flores', 'teodoro.flores1@gmail.com', '2019-12-15 00:00:00', NULL, '01 55 1493 7193', 'Se necesita visa? como esta el clima en esa temporada? y que incluye haciendo el viaje con ustedes?', NULL, NULL, NULL, NULL, 900, 1000, 50, 233, 1, '2024-10-22 00:00:00', 1, 1, '2019-12-04 11:33:33', '2024-10-21 19:16:08'),
(5, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Cintia Ceballos', 'cindixsmile_@hotmail.com', '2020-03-23 00:00:00', NULL, '01 656 373 2229', '', NULL, NULL, NULL, NULL, 800, 500, 200, 100, 2, '2024-10-31 00:00:00', 2, 1, '2019-12-04 13:55:35', '2024-10-21 19:17:26'),
(6, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Montaña 7 colores,Lima,', '2,', '3-5,', 'PILAR LUGO HARO', 'PILARLUGOH22@GMAIL.COM', '2020-04-04 00:00:00', NULL, '01 33 3348 38505', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1, '2019-12-04 13:56:26', '2024-10-21 20:02:41'),
(7, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'jose luis corona', 'proyectocomo@hotmail.com', '2020-01-19 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-04 14:46:49', '2024-10-21 19:54:20'),
(8, NULL, NULL, 'Normal,', 'Machu Picchu,', '4,', '6-8,', 'Brenda Janet hernandez', 'Brendajanet101@gmail.com', '2020-10-12 00:00:00', NULL, '01 81 8021 4218', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-04 15:05:34', '2024-10-21 19:56:02'),
(9, NULL, NULL, 'Normal,', NULL, '1,', '6-8,', 'ANGIE', 'aglk0404@hotmail.com', '2020-02-01 00:00:00', NULL, '01 55 6064 2362', 'Cuál sería el costo total? \nEl vuelo de Lima a Cuzco tengo que comprarlo a parte o se puede incluir?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 14:27:00', '2024-10-21 19:56:15'),
(10, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,', '2,', '6-8,', 'Maricela Galvan', 'ladypink20.mg@gmail.com', '2020-02-07 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 14:41:46', '2019-12-05 14:41:46'),
(11, NULL, NULL, 'Economico,', NULL, '2,', '6-8,', 'Maricela', 'ladypink20.mg@gmail.com', '2020-02-07 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 14:47:24', '2019-12-05 14:47:24'),
(12, NULL, NULL, 'Superior,', NULL, '1,', '6-8,', 'armando gonzalez', 'Sixmit@hotmail.com', '2020-06-08 00:00:00', NULL, '01 477 523 2990', 'el viaje incluye voletos de avion?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 00:00:00', NULL, NULL, '2019-12-05 15:37:12', '2024-10-21 19:51:33'),
(13, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'ana mendez', 'ana_mendez2802@hotmail.com', '2020-04-10 00:00:00', NULL, '01 354 114 9477', 'Me interesa una cotizacion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 16:00:38', '2019-12-05 16:00:38'),
(14, NULL, NULL, 'Superior,', NULL, '5,', '6-8,', 'Tamahara Murga', 'Yozucki@gmail.com', '2021-07-12 00:00:00', NULL, '01 656 113 0058', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 16:06:35', '2019-12-05 16:06:35'),
(15, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Julio Espinosa Chávez', 'julioespinosa30@hotmail.com', '2020-09-08 00:00:00', NULL, '01 466 185 7771', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 16:59:51', '2019-12-05 16:59:51'),
(16, NULL, NULL, 'Economico,', NULL, '4,', '12-15,', 'vanessa zataray', 'vzataray@bioscents.com.mx', '2022-09-16 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 17:19:15', '2019-12-05 17:19:15'),
(17, NULL, NULL, 'Normal,', 'Cusco,', '3,', '12-15,', 'test', 'paul@gotoperu.com', '2019-12-26 00:00:00', NULL, '23232323232', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 12:01:48', '2019-12-06 12:01:48'),
(18, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,', '4,', '3-5,', 'julieta hernandez', 'hidzagruas@outlook.com', '2021-07-24 00:00:00', NULL, '', 'que especifique que y que incluye el costo por favor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 14:01:01', '2019-12-06 14:01:01'),
(19, NULL, NULL, 'Economico,', 'Machu Picchu,Montaña 7 colores,Cusco,', '2,', '3-5,', 'MISHTEL PEREZ BAHENA', 'mishtelbahena@hotmail.com', '2020-01-01 00:00:00', NULL, '01 232 125 8972', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 14:28:53', '2019-12-06 14:28:53'),
(20, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Felix Molina Angel', 'molina@uagro.mx', '2020-04-13 00:00:00', NULL, '01 747 124 6668', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 15:14:32', '2019-12-06 15:14:32'),
(21, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,Lima,', '2,', '3-5,', 'BRENDA MIRIAM PEREZ SANCHEZ', 'bren.miriamps@gmail.com', '2020-08-24 00:00:00', NULL, '01 442 300 8884', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 16:45:41', '2019-12-06 16:45:41'),
(22, NULL, NULL, 'Superior,', NULL, '1,', '', 'OLGA DIAZ QUINTANAR', 'olgadiaz6003@gmail.com', '2020-01-05 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 15:24:11', '2019-12-09 15:24:11'),
(23, NULL, NULL, 'Lujo,', 'Machu Picchu,Cusco,Montaña 7 colores,Camino inca,', '3,', '6-8,', 'Arlett Garcia', 'arlettt.g@gmail.com', '2020-12-18 00:00:00', NULL, '01 444 130 5282', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 15:33:44', '2019-12-09 15:33:44'),
(24, NULL, NULL, 'Superior,Normal,', 'Machu Picchu,Montaña 7 colores,', '3,', '3-5,', 'Eduardo Santiago Garcia Gonzales', 'Garciatmp@hotmail.com', '2021-08-17 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 16:49:46', '2019-12-09 16:49:46'),
(25, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Olaya', 'olasha_wolken@outlook.com', '2020-08-20 00:00:00', NULL, '01 55 4403 9793', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 17:31:21', '2019-12-09 17:31:21'),
(26, NULL, NULL, 'Normal,Economico,', 'Machu Picchu,Cusco,Montaña 7 colores,', '', '3-5,', 'sergio caro', 'car0sergio@hotmail.com', '2019-12-02 00:00:00', NULL, '01 311 847 9899', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 17:43:39', '2019-12-09 17:43:39'),
(27, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'elba', 'elba.fra@hotmail.com', '2020-04-06 00:00:00', NULL, '01 55 2769 3719', 'costos en pesos mexicanos y que mas incluye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 10:24:33', '2019-12-10 10:24:33'),
(28, NULL, NULL, 'Economico,', 'Machu Picchu,Montaña 7 colores,', '5,', '6-8,', 'Laura Jatziri Ramírez Pinto', 'jatziri_09@hotmai.com', '2020-07-14 00:00:00', NULL, '01 312 112 9749', 'llegamos primero a cuco y al final lima- huacachina', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 11:13:18', '2019-12-10 11:13:18'),
(29, NULL, NULL, 'Economico,', 'Montaña 7 colores,Machu Picchu,', '2,', '6-8,', 'Rebeca Raquel Cruz Hernandez', 'bekarcruz@gmail.com', '2020-01-13 00:00:00', NULL, '01 55 4085 3435', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 11:32:37', '2019-12-10 11:32:37'),
(30, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'ALEJANDRA GOMEZ', 'agomezcci@gmail.com', '2021-12-26 00:00:00', NULL, '01 81 1577 9990', 'INCLUYE COMIDAS Y TRANSPORTACION COMO TRENES, ENTRADAS A LOS LUGARES DE INTERES ETC..', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 14:02:48', '2019-12-10 14:02:48'),
(31, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '3,', '3-5,', 'Yess Luna', 'luniyess@gmail.com', '2020-02-15 00:00:00', NULL, '01 55 2171 0822', 'no por el momento', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 14:03:30', '2019-12-10 14:03:30'),
(32, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'TEST', 'TEST', '2019-12-19 00:00:00', NULL, '', 'TEST DANIEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 14:19:23', '2019-12-10 14:19:23'),
(33, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'TEST', 'TEST', '2019-12-19 00:00:00', NULL, '', 'TEST DANIEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 14:19:41', '2019-12-10 14:19:41'),
(34, NULL, NULL, 'Economico,', NULL, '1,', '3-5,', 'Alui silva', 'hp_alui@hotmail.com', '2020-02-16 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 14:21:07', '2019-12-10 14:21:07'),
(35, NULL, NULL, 'Economico,', 'Machu Picchu,Lima,', '2,', '3-5,', 'Jonathan emmanuel niño perez', 'jenptigres107911@outlook.com', '2020-10-23 00:00:00', NULL, '01 444 485 3898', 'Precio de un paquete a lima y machupichu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 20:56:40', '2019-12-10 20:56:40'),
(36, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'Emanuel Navarro', 'emanuelcorchaado@gmail.com', '2020-02-06 00:00:00', NULL, '01 55 6150 2488', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-11 13:02:27', '2019-12-11 13:02:27'),
(37, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '3-5,', 'BRENDA FUENTES', 'brendabryl@hotmail.com', '2020-11-18 00:00:00', NULL, '01 56 1170 6987', 'que costo tiene el boleto de avión', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-11 14:15:31', '2019-12-11 14:15:31'),
(38, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,', '1,', '3-5,', 'Carlos', 'carlosaflores13@yahoo.com.mx', '2020-01-08 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-11 14:34:13', '2019-12-11 14:34:13'),
(39, NULL, NULL, 'Economico,', NULL, '3,', '6-8,', 'Diana miraflores', 'dianamiraflores@hotmail.com', '2020-01-08 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-11 15:01:07', '2019-12-11 15:01:07'),
(40, NULL, NULL, 'Normal,Superior,', NULL, '1,', '9-11,', 'Priscila Vital', 'Priscilavitaln@gmail.com', '2020-04-20 00:00:00', NULL, '01 449 352 2374', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 00:00:00', NULL, NULL, '2019-12-11 15:04:23', '2024-10-15 23:29:59'),
(41, NULL, NULL, 'Economico,', 'Machu Picchu,Montaña 7 colores,Cusco,', '2,', '3-5,', 'CPiedras', 'carmen_piedras@live.com.mx', '2020-01-10 00:00:00', NULL, '', 'Agradezco su atención, quedo al pendiente.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-11 16:23:07', '2019-12-11 16:23:07'),
(42, NULL, NULL, 'Lujo,', 'Machu Picchu,', '2,', '6-8,', 'Primitivo javier Solís nava', 'xavier_sn@hotmail.com', '2019-12-16 00:00:00', NULL, '044 222 324 6805', 'Costo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-12 11:05:08', '2019-12-12 11:05:08'),
(43, NULL, NULL, 'Normal,', 'Machu Picchu,', '4,', '6-8,', 'Maria liduvina villanueva', 'Liduvinavred@gmeil.com', '2020-01-06 00:00:00', NULL, '01 461 345 5070', 'Cotizacion por persona adulta y niño de vuelo ida y vuelta hotel y desayuno.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-12 17:05:37', '2019-12-12 17:05:37'),
(44, NULL, NULL, 'Economico,', 'Machu Picchu,Montaña 7 colores,', '5,', '3-5,', 'Diana Laura Diosabot Pérez', 'dianadiosobot@hotmail.com', '2019-12-30 00:00:00', NULL, '01 222 102 8579', 'Cotización y caracteristicas del paquete de viaje.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-12 18:36:19', '2019-12-12 18:36:19'),
(45, NULL, NULL, 'Economico,', 'Cusco,Machu Picchu,Montaña 7 colores,', '', '3-5,', 'katia marin', 'katia_marin04@hotmail.com', '2020-08-20 00:00:00', NULL, '01 998 218 9442', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 10:18:50', '2019-12-13 10:18:50'),
(46, NULL, NULL, 'Normal,', 'Cusco,Montaña 7 colores,', '2,', '3-5,', 'Barbara', 'barby', '2020-03-14 00:00:00', NULL, '01 33 3172 3141', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 10:51:47', '2019-12-13 10:51:47'),
(47, NULL, NULL, 'Economico,', NULL, '2,', '6-8,', 'Da', 'daniela.rangel@polyrafia.com', '2019-12-16 00:00:00', NULL, '01 55 8525 2195', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 11:03:23', '2019-12-13 11:03:23'),
(48, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '3-5,', 'ROGELIO DURON', 'rogelio_duron@hotmail.com', '2020-06-01 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 11:26:39', '2019-12-13 11:26:39'),
(49, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Vicente Carrizoza', 'alex_czz@outlook.com', '2020-10-10 00:00:00', NULL, '01 33 1859 2734', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 12:46:31', '2019-12-13 12:46:31'),
(50, NULL, NULL, 'Superior,', NULL, '2,', '3-5,', 'sebastian', 'sebastianortegavalencia@gmail.com', '2020-07-02 00:00:00', NULL, '01 55 4346 4544', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 13:27:09', '2019-12-13 13:27:09'),
(51, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,', '4,', '3-5,', 'Carlos Alejandro Labra Villafaña', 'carloslabranopierdasestecorreo@gmail.com', '2020-11-17 00:00:00', NULL, '01 771 568 7571', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 13:40:20', '2019-12-13 13:40:20'),
(52, NULL, NULL, 'Lujo,', 'Cusco,Machu Picchu,Montaña 7 colores,Lago Titicaca,Camino inca,Lima,', '2,', '12-15,', 'Lorena Tirado Perez', 'lore.tiradop@gmail.com', '2020-08-29 00:00:00', NULL, '01 55 5100 6264', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 13:54:24', '2019-12-13 13:54:24'),
(53, NULL, NULL, 'Economico,', NULL, '1,', '12-15,', 'karen cabezut', 'karen.cabezut@gmail.com', '2020-02-02 00:00:00', NULL, '01 33 1321 7504', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 14:12:58', '2019-12-13 14:12:58'),
(54, NULL, NULL, 'Economico,', NULL, '2,', '6-8,', 'carlos', 'iori_yagami_es@hotmail.com', '2020-04-23 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 15:12:05', '2019-12-13 15:12:05'),
(55, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '4,', '6-8,', 'JOSE LUIS LOPEZ MORENO', 'coordinacioncontrartos@gmail.com', '2020-04-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 15:36:14', '2019-12-13 15:36:14'),
(56, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Karen De La Cruz', 'karen.delacruz.gtz@outlook.com', '2020-10-03 00:00:00', NULL, '01 33 1193 2851', 'hola me gustaría tener el presupuesto :) gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 17:15:21', '2019-12-13 17:15:21'),
(57, NULL, NULL, '', '', '', '', 'Karla Franyutti', 'mfranyuttik@gmail.com', '2019-12-28 00:00:00', NULL, '01 722 350 2306', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 10:08:44', '2019-12-16 10:08:44'),
(58, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'Uriel Palacios Montes De Oca', 'urielpalaciosmontesdeoca@gmail.com', '2020-07-09 00:00:00', NULL, '01 55 8826 6334', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 10:19:16', '2019-12-16 10:19:16'),
(59, NULL, NULL, 'Economico,', 'Machu Picchu,Lago Titicaca,Montaña 7 colores,', '3,', '3-5,', 'beatriz jasso martinez', 'betyjassom@live.com.mx', '2020-07-18 00:00:00', NULL, '01 55 1694 5391', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 10:55:31', '2019-12-16 10:55:31'),
(60, NULL, NULL, 'Economico,', 'Machu Picchu,Lago Titicaca,Camino inca,Montaña 7 colores,', '1,', '3-5,', 'ETHELIA NOEMI HERNANDEZ RUIZ', 'inarq.noemi.hr@gmail.com', '2020-01-14 00:00:00', NULL, '01 55 4067 8222', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 12:00:55', '2019-12-16 12:00:55'),
(61, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Lago Titicaca,', '2,', '3-5,', 'Alondra Sanz', 'jovana1990@live.com.mx', '2020-02-20 00:00:00', NULL, '01 55 4053 1070', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 13:02:19', '2019-12-16 13:02:19'),
(62, NULL, NULL, 'Economico,', 'Machu Picchu,Lima,Montaña 7 colores,', '1,', '6-8,', 'Maribel Villegas', 'm.a.vc@hotmail.com', '2020-01-02 00:00:00', NULL, '01 55 2850 4197', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 13:26:33', '2019-12-16 13:26:33'),
(63, NULL, NULL, '', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '2,', '12-15,', 'VIRGINIA LETICIA GARCIA LUNA ARCE', 'vicklety5@hotmail.com', '2020-07-16 00:00:00', NULL, '01 55 5103 2278', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 14:17:51', '2019-12-16 14:17:51'),
(64, NULL, NULL, 'Superior,Normal,', NULL, '2,', '3-5,', 'concepcion vazquez', 'cvm_z@hotmail.com', '2020-01-13 00:00:00', NULL, '01 953 537 0197', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 14:56:02', '2019-12-16 14:56:02'),
(65, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,', '2,', '', 'maria jose ocampo', 'mj_op29@hotmail.com', '2020-05-02 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 15:13:40', '2019-12-17 15:13:40'),
(66, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'Flavio Ramírez Arellano', 'flaramare57@hotmail.com', '2020-03-18 00:00:00', NULL, '01 229 527 5098', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 15:44:51', '2019-12-17 15:44:51'),
(67, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'José Carlos Fraga camarena', 'fragabronco@hotmail.com', '2020-05-25 00:00:00', NULL, '01 664 386 9070', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 19:33:42', '2019-12-17 19:33:42'),
(68, NULL, NULL, 'Economico,', NULL, '1,', '6-8,', 'Raquel Lara Montoya', 'raqelitolara@hotmail.com', '2020-04-07 00:00:00', NULL, '01 722 217 1675', 'El costo incluye el vuelo????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 19:48:06', '2019-12-17 19:48:06'),
(69, NULL, NULL, 'Normal,', 'Machu Picchu,Lima,Montaña 7 colores,', '2,', '6-8,', 'Francisco Daniel Mongoy Bailon', 'fdmongoyb@liverpool.com.mx', '2020-12-06 00:00:00', NULL, '01 442 747 9155', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 20:08:11', '2019-12-17 20:08:11'),
(70, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '3,', '12-15,', 'XOCHITL RUIZ GUTIERREZ', 'xochitl_95@hotmail.com', '2020-07-13 00:00:00', NULL, '', 'QUIERO VIAJE REDONDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 20:48:11', '2019-12-17 20:48:11'),
(71, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '3,', '12-15,', 'XOCHITL RUIZ GUTIERREZ', 'xochitl__95@hotmail.com', '2020-07-13 00:00:00', NULL, '', 'viaje redondo en avion desde cd. mexico', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 20:50:42', '2019-12-17 20:50:42'),
(72, NULL, NULL, 'Superior,', NULL, '3,', '6-8,', 'Roxana Crispin', 'roxana.cr102@gmail.com', '2020-08-24 00:00:00', NULL, '01 444 330 4982', 'Tienen paquetes completos, con vuelo y hospedaje incluido?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 10:56:02', '2019-12-18 10:56:02'),
(73, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Carlos Ramirez Garcia', 'mkey2408@icloud.com', '2020-06-15 00:00:00', NULL, '01 55 1583 3447', 'Que incluyen los paquetes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 16:11:16', '2019-12-18 16:11:16'),
(74, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Laura Villicaña', 'lauemma17@gmail.com', '2020-10-11 00:00:00', NULL, '01 55 6432 8713', 'Va el avión incluido', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 17:08:12', '2019-12-18 17:08:12'),
(75, NULL, NULL, 'Normal,', NULL, '3,', '9-11,', 'Veronica Valdez', 'vvaldez109@hotmail.com', '2020-01-28 00:00:00', NULL, '01 662 141 2580', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 17:27:30', '2019-12-18 17:27:30'),
(76, NULL, NULL, 'Normal,', 'Machu Picchu,Lago Titicaca,Cusco,Montaña 7 colores,Lima,', '', '9-11,', 'tatiana braga', 'tatisbraga97@gmail.com', '2020-06-18 00:00:00', NULL, '01 999 249 0440', 'Hola, como funciona? ustedes me mandan opciones de itinerarios??', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 18:08:11', '2019-12-18 18:08:11'),
(77, NULL, NULL, 'Economico,', 'Machu Picchu,', '4,', '3-5,', 'jose ramon', 'ing.ramon@gmail.com', '2020-06-15 00:00:00', NULL, '01 612 868 3603', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-20 15:35:11', '2019-12-20 15:35:11'),
(78, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,Camino inca,Lima,', '', '6-8,', 'Carolina Santiago', 'caro_se@hotmail.com', '2020-01-11 00:00:00', NULL, '01 624 191 2940', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-20 18:45:35', '2019-12-20 18:45:35'),
(79, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Aldo Miguel Vidal Gracia', 'aldovidalg@hotmail.co', '2020-05-18 00:00:00', NULL, '01 462 130 8567', 'Me puedes mandar una cotización para dos personas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-20 19:20:24', '2019-12-20 19:20:24'),
(80, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'CONCEPCION VAZQUEZ MARTINEZ', 'cvm_z@hotmail.com', '2020-01-13 00:00:00', NULL, '01 953 537 0197', 'estan incluidos alimentos ?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-26 13:06:00', '2019-12-26 13:06:00'),
(81, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'CONCEPCION VAZQUEZ MARTINEZ', 'cvm_z@hotmail.com', '2020-01-13 00:00:00', NULL, '01 953 537 0197', 'estan incluidos alimentos ?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-26 13:06:00', '2019-12-26 13:06:00'),
(82, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Itzel Torcuato Arias', 'itzel.torcuato@outlook.com', '2020-09-12 00:00:00', NULL, '01 221 120 5756', 'Cotizacion de viaje y cual seria el hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-27 13:37:51', '2019-12-27 13:37:51'),
(83, NULL, NULL, 'Normal,', 'Cusco,', '3,', '12-15,', 'test', 'test@test.com', '2020-01-03 00:00:00', NULL, '(223) 232-3232', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-30 22:41:22', '2019-12-30 22:41:22'),
(84, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,', '3,', '9-11,', 'Salvador', 'geotemoc@gmail.com', '2021-03-05 00:00:00', NULL, '', 'Me gustaría saber el costo de un paquete para dos adultos y un niño visitando \nLa montaña de los 7 colores , Machupicchu y cusco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 00:00:58', '2019-12-31 00:00:58'),
(85, NULL, NULL, 'Normal,Economico,', NULL, '1,', '12-15,', 'Fernando Rosales Santiago', 'fernandorosales5000@gmail.com', '2020-02-15 00:00:00', NULL, '01 55 1229 7853', 'el costo incluye entradas a los lugares traslados y algún alimento?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 00:36:05', '2019-12-31 00:36:05'),
(86, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Lago Titicaca,Camino inca,', '2,', '6-8,', 'Melina peña', 'Melinatalpa@gmail.com', '2020-09-21 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 00:44:03', '2019-12-31 00:44:03'),
(87, NULL, NULL, 'Superior,', NULL, '1,', '3-5,', 'René Said Castañeda García', 'rene_ame@hotmail.com', '2020-09-25 00:00:00', NULL, '01 55 8611 2717', 'Sí, todo! jajaja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 11:57:09', '2019-12-31 11:57:09'),
(88, NULL, NULL, 'Normal,', NULL, '', '6-8,', 'Juan Manuel basurto', 'jm_basurto@hotmail.com', '2020-04-19 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 12:35:29', '2019-12-31 12:35:29'),
(89, NULL, NULL, 'Normal,', NULL, '2,', '16+,6-8,3-5,', 'Javier González', 'javier8_gr@hotmail.com', '2020-02-20 00:00:00', NULL, '01 55 6687 1882', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 12:59:48', '2019-12-31 12:59:48'),
(90, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,', '2,', '3-5,', 'Marycruz Ojeda', 'macroj.macroj@gmail.com', '2020-11-15 00:00:00', NULL, '', 'Costos saliendo de Villahermosa Tabasco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-01 17:25:45', '2020-01-01 17:25:45'),
(91, NULL, NULL, 'Economico,', 'Machu Picchu,Lago Titicaca,Montaña 7 colores,Camino inca,Lima,Cusco,', '1,', '3-5,', 'laura cecilia jimenez perez', 'lci.cecilia.jimenez@gmail.com', '2020-01-22 00:00:00', NULL, '01 33 2486 0474', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-01 18:40:36', '2020-01-01 18:40:36'),
(92, NULL, NULL, 'Economico,', 'Camino inca,Lago Titicaca,Montaña 7 colores,Machu Picchu,', '2,', '6-8,', 'Andres  ceja', 'Andresrceja16@gmail.com', '2020-06-15 00:00:00', NULL, '01 662 444 2149', 'Hola buen dia quisiera  una cotización saliendo de cuzco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-01 20:34:48', '2020-01-01 20:34:48'),
(93, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Lago Titicaca,Lima,Montaña 7 colores,Camino inca,', '2,', '9-11,', 'Margot Mochon', 'mmochon@me.com', '2020-03-03 00:00:00', NULL, '01 55 3080 2378', 'Cual es la mejor fecha para visitar Peru?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-01 22:13:05', '2020-01-01 22:13:05'),
(94, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'PAULINA RODRIGUEZ PORRAS', 'paulinaroporras@gmail.com', '2020-05-02 00:00:00', NULL, '', '¿el vuelo viene incluido? y si quiero tomar l tren en vez de el bus a machu pichu?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-01 23:22:31', '2020-01-01 23:22:31'),
(95, NULL, NULL, 'Economico,', NULL, '2,', '6-8,', 'MAYRA ALEJANDRA JIEMENEZ RAMIREZ', 'mayra.ya@hotmail.com', '2020-09-26 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 10:02:03', '2020-01-02 10:02:03'),
(96, NULL, NULL, 'Economico,', NULL, '1,', '3-5,', 'Alan Ricardo Rodriguez Rivera', 'riverarodriguezalan@gmail.com', '2020-07-22 00:00:00', NULL, '01 81 1847 2548', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 10:17:48', '2020-01-02 10:17:48'),
(97, NULL, NULL, 'Normal,Superior,', 'Machu Picchu,Montaña 7 colores,Cusco,Camino inca,Lago Titicaca,', '1,', '3-5,', 'Penélope Valdez Aburto', 'penelopeval_1@hotmail.com', '2020-04-09 00:00:00', NULL, '01 55 8361 2207', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 10:39:30', '2020-01-02 10:39:30'),
(98, NULL, NULL, 'Normal,', NULL, '', '6-8,', 'Jazmin Soto', 'jaazsoto15@gmail.com', '2020-04-03 00:00:00', NULL, '552525765', 'Quiero informacion de todo el viaje, y si exitaran ofertas en alguna temporada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 12:47:05', '2020-01-02 12:47:05'),
(99, NULL, NULL, 'Normal,', NULL, '', '3-5,', 'Jazmin Soto', 'jaazsoto15@gmail.com', '2020-04-03 00:00:00', NULL, '01 55 2525 7965', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 12:53:16', '2020-01-02 12:53:16'),
(100, NULL, NULL, 'Normal,Superior,Economico,', NULL, '2,', '3-5,', 'Goretti Sanchez', 'gore.sare@hotmail.com', '2020-03-21 00:00:00', NULL, '01 55 3195 0839', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:04:29', '2020-01-02 13:04:29'),
(101, NULL, NULL, 'Normal,', NULL, '3,', '6-8,', 'nallely ruiz', 'ylellan_1305@hotmail.com', '2020-07-27 00:00:00', NULL, '01 55 1855 4000', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:18:03', '2020-01-02 13:18:03'),
(102, NULL, NULL, 'Normal,', NULL, '3,', '6-8,', 'Francisco javier aguirre zamora', 'Fjazarq@hotmail.com', '2020-01-22 00:00:00', NULL, '01 443 225 7749', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:45:17', '2020-01-02 13:45:17'),
(103, NULL, NULL, 'Superior,', NULL, '2,', '3-5,', 'ALFONSO MONDRAGON GARCIA', 'mondragonalf@hotmail.com', '2020-04-06 00:00:00', NULL, '055 3977 1378', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:52:57', '2020-01-02 13:52:57'),
(104, NULL, NULL, 'Economico,', NULL, '2,', '12-15,', 'Alejandro Sánchez Carrera', 'hp12de11@hotmail.com', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:55:45', '2020-01-02 13:55:45'),
(105, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,', '2,', '3-5,', 'Laura itzel alvarez gonzalez', 'laurakoko7@hotmail.com', '2020-03-14 00:00:00', NULL, '01 55 2418 5850', 'estoy buscando un viaje y me interesara información sobre sus paquetes del 14 al 18 de marzo para  personas al rededor de 24 años', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:59:16', '2020-01-02 13:59:16'),
(106, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Julian Antonio Leon Astorga', 'ju.leon@alumni.ipade.mx', '2020-04-09 00:00:00', NULL, '01 55 4190 4106', 'me gustaría salir el jueves 9 de abril y regresar el lunes 13 de abril en la tarde o noche y si el costo es por persona para que me enviaran la cotización ya con todo y aviones, hoteles, precio final', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 14:07:24', '2020-01-02 14:07:24'),
(107, NULL, NULL, 'Normal,', NULL, '5,', '6-8,', 'Beatriz Esquer Corella', 'beatriz.esquer@hotmail.com', '2020-07-22 00:00:00', NULL, '', 'Buenas tardes,\nEstoy interesada en cotizar los paquetes manejados para Perú, somos 3 adultos y 2 menores (de 7 años y 12 años) con un estancia estimada de 7 a 9 días.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 16:06:05', '2020-01-02 16:06:05'),
(108, NULL, NULL, 'Normal,Superior,', 'Montaña 7 colores,Machu Picchu,', '1,', '3-5,', 'Melissa Obeso Tejeda', 'melisatejeda@hotmail.es', '2020-02-21 00:00:00', NULL, '01 638 107 2719', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 17:40:05', '2020-01-02 17:40:05'),
(109, NULL, NULL, 'Normal,', 'Montaña 7 colores,Machu Picchu,Cusco,', '2,', '6-8,', 'Guadalupe Lima', 'lupitalimag@yahoo.com', '2020-05-15 00:00:00', NULL, '56594294', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 10:41:03', '2020-01-03 10:41:03'),
(110, NULL, NULL, 'Economico,', NULL, '1,', '6-8,', 'Daniel Toriz', 'daniel.toriz@outlook.com', '2020-04-20 00:00:00', NULL, '01 55 7919 8320', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 10:47:55', '2020-01-03 10:47:55'),
(111, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Itavi Sarmiento', 'itavi.sarmiento@gmail.com', '2020-05-28 00:00:00', NULL, '01 222 661 2263', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 11:36:32', '2020-01-03 11:36:32'),
(112, NULL, NULL, 'Superior,', NULL, '2,', '3-5,', 'Karla Benitez', 'kbb82@hotmail.com', '2020-04-01 00:00:00', NULL, '01 624 157 1756', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 11:42:14', '2020-01-03 11:42:14'),
(113, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'enrique morales francisco', 'emorales@tecautomation.com.mx', '2020-11-08 00:00:00', NULL, '01 55 4533 9159', 'cotización de viaje!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 12:19:46', '2020-01-03 12:19:46'),
(114, NULL, NULL, 'Normal,', NULL, '1,', '6-8,', 'Gabriela Edaena Carmona Alarcón', 'geda.ca04@gmail.com', '2020-10-05 00:00:00', NULL, '01 998 262 6101', 'Que incluye la cotización', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 12:43:34', '2020-01-03 12:43:34'),
(115, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Montaña 7 colores,', '2,', '6-8,', 'FABIAN PINO SANTIAGO', 'fabianpinosantiago@gmail.com', '2020-05-03 00:00:00', NULL, '01 961 165 1564', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 12:46:25', '2020-01-03 12:46:25'),
(116, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'María fernanda Montes de Oca', 'fernanda.montesdeoca7@hotmail.com', '2020-07-15 00:00:00', NULL, '044 777 367 8908', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 12:52:36', '2020-01-03 12:52:36'),
(117, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'María Fernanda Mones de Oca Villafaña', 'fernanda.montesdeoca7@hotmail.com', '2020-07-15 00:00:00', NULL, '044 777 367 8908', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 12:55:05', '2020-01-03 12:55:05'),
(118, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Bianca Flores', 'bianka11flores@gmail.com', '2020-11-19 00:00:00', NULL, '01 618 208 8329', 'De donde parte el viaje', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 13:36:56', '2020-01-03 13:36:56'),
(119, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Camino inca,Lago Titicaca,Cusco,Lima,', '4,', '3-5,', 'Marco Antonio Medina hernandez', 'Mmedinahernandez652@gmail. Com', '2021-03-08 00:00:00', NULL, '01 667 246 1256', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 13:43:07', '2020-01-03 13:43:07'),
(120, NULL, NULL, 'Normal,', 'Cusco,Machu Picchu,Montaña 7 colores,', '2,', '3-5,', 'guadalupe vazquez', 'mavazgpe@gmail.com', '2020-04-23 00:00:00', NULL, '', 'requisitos para menores de edad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 13:48:40', '2020-01-03 13:48:40'),
(121, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,Lima,Camino inca,', '2,', '6-8,', 'GUADALUPE DORANTES', 'dorantes.34595@live.com.mx', '2020-09-15 00:00:00', NULL, '01 442 104 4451', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 14:14:20', '2020-01-03 14:14:20'),
(122, NULL, NULL, 'Normal,', NULL, '1,', '3-5,', 'Francisco Ruiz Hernández', 'prh416@hotmail.com', '2020-09-10 00:00:00', NULL, '01 443 569 0273', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 14:18:57', '2020-01-03 14:18:57'),
(123, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Alberto', 'betoo76@gmail.com', '2020-12-25 00:00:00', NULL, '01 442 181 1428', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-03 14:33:00', '2020-01-03 14:33:00'),
(124, NULL, NULL, 'Normal,', NULL, '', '6-8,', 'Esteban Carrasco López', 'estebancarrascolopez@gmail.com', '2020-12-20 00:00:00', NULL, '01 449 299 5672', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 10:41:41', '2020-01-04 10:41:41'),
(125, NULL, NULL, 'Economico,', 'Machu Picchu,', '2,', '3-5,', 'Cristian García', 'cristiang.ocampo17@gmail.com', '2020-01-31 00:00:00', NULL, '01 777 534 7071', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 10:48:50', '2020-01-04 10:48:50'),
(126, NULL, NULL, 'Superior,', 'Machu Picchu,Montaña 7 colores,Lima,Lago Titicaca,Camino inca,Cusco,', '2,', '3-5,', 'Nataly Moncada garcia', 'nmoncadag@gmail.com', '2020-05-25 00:00:00', NULL, '01 722 634 6114', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 10:52:28', '2020-01-04 10:52:28'),
(127, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Daniela Merced Chávez', 'danny17.mc@gmail.com', '2020-06-15 00:00:00', NULL, '01 722 161 0195', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 12:02:13', '2020-01-04 12:02:13'),
(128, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,', '2,', '3-5,', 'rafael maldonado', 'susto@hotmail.com', '2020-07-05 00:00:00', NULL, '01 998 166 7904', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 12:28:08', '2020-01-04 12:28:08'),
(129, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,', '4,', '6-8,', 'Irene Fraga', 'fragairene@hotmail.com', '2020-04-11 00:00:00', NULL, '01 444 447 2101', 'Quisiera varias opciones', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 20:29:49', '2020-01-04 20:29:49'),
(130, NULL, NULL, 'Lujo,', 'Machu Picchu,Montaña 7 colores,Cusco,', '3,', '3-5,', 'Ana Karen guillen', 'anykaguillen89@gmail.com', '2020-02-27 00:00:00', NULL, '01 998 125 6711', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 23:30:34', '2020-01-04 23:30:34'),
(131, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,', '2,', '6-8,', 'Roberto Avila Ayala', 'ROBERTO.AVILA@IIMT-MEXICO.COM', '2020-01-13 00:00:00', NULL, '01 55 6965 4948', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-05 15:38:52', '2020-01-05 15:38:52'),
(132, NULL, NULL, 'Normal,', 'Cusco,Lima,Montaña 7 colores,Machu Picchu,', '3,', '6-8,', 'Amalia Molina', 'amaliajohannamolina@gmail.com', '2020-12-29 00:00:00', NULL, '300 5134618', 'Quisiera cotizar el viaje desde Bogotá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-05 20:56:40', '2020-01-05 20:56:40'),
(133, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,', '2,', '3-5,', 'rosario cristina juarez santacruz', 'bybay2409@hotmail.com', '2020-07-22 00:00:00', NULL, '01 55 3680 0626', 'costos y que necesito para viajar solo pasaporte ???', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 12:02:52', '2020-01-06 12:02:52'),
(134, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'Cecilia Aguilera', 'ceci.aguilera@gmail.com', '2020-02-16 00:00:00', NULL, '01 477 123 4985', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 13:30:36', '2020-01-06 13:30:36'),
(135, NULL, NULL, 'Superior,', 'Lago Titicaca,Lima,Cusco,Machu Picchu,', '2,', '3-5,', 'Saúl Ugalde González', 'sugalde72@gmail.com', '2020-04-20 00:00:00', NULL, '01 442 648 0218', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 13:33:25', '2020-01-06 13:33:25'),
(136, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,', '2,', '6-8,', 'Francisco Adrian Bañuelos Arellano', 'adrian240201@outlook.com', '2020-04-15 00:00:00', NULL, '01 33 1700 0406', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 13:52:00', '2020-01-06 13:52:00'),
(137, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Cusco,', '2,', '3-5,', 'ricardo max', 'pricardomax@hotmail.com', '2020-08-28 00:00:00', NULL, '', 'quiero añadir una visita al amazonas, a saqsaywaman, a la montaña de 7 colores y a machupichu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 14:23:45', '2020-01-06 14:23:45'),
(138, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Cusco,', '4,', '6-8,', 'Diana Gabriela Zaguilan garcia', 'gabrielazaguilan@gmail.com', '2020-07-18 00:00:00', NULL, '01 595 113 0448', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 14:26:08', '2020-01-06 14:26:08'),
(139, NULL, NULL, 'Economico,', '', '1,', '3-5,', 'graciela torre', 'villatai@hotmail.com', '2020-04-19 00:00:00', NULL, '01 314 352 0953', 'Estamos planeando llevar a un grupo de 30 estudiantes de la licenciatura de turismo. por eso necesito el precio por persona, pero consideren que seríamos 30 personas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 14:32:39', '2020-01-06 14:32:39'),
(140, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Linda Natalia Leyva Ramos', 'natsleyva55@gmail.com', '2020-08-24 00:00:00', NULL, '01 951 103 9098', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 14:48:43', '2020-01-06 14:48:43'),
(141, NULL, NULL, 'Normal,', 'Lima,Cusco,Machu Picchu,Montaña 7 colores,', '3,', '6-8,', 'Jeanett Baños', 'jeanettbv6@hotmail.com', '2020-07-16 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 15:15:31', '2020-01-06 15:15:31'),
(142, NULL, NULL, 'Normal,Superior,', NULL, '2,', '6-8,', 'yamilet hernandez jaimes', 'yazjaimes.yj@gmail.com', '2020-08-30 00:00:00', NULL, '01 771 370 2106', 'mas información sobre costos y la seguridad de los turistas durante el recorrido', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 15:30:00', '2020-01-06 15:30:00'),
(143, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'Brenda Lorena Castello', 'brenda_castello@hotmail.es', '2020-04-07 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 17:15:56', '2020-01-06 17:15:56'),
(144, NULL, NULL, 'Normal,Superior,', NULL, '3,', '6-8,', 'barbara Monroy', 'comsamo.bet@hotmail.com', '2021-12-28 00:00:00', NULL, '01 55 4562 8093', 'Solicito cotizacion.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-08 10:28:55', '2020-01-08 10:28:55'),
(145, NULL, NULL, 'Economico,', NULL, '1,', '3-5,', 'Lilia Sandoval', 'liliacruzsan@icloud.com', '2020-03-08 00:00:00', NULL, '01 55 8571 6823', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-08 10:36:52', '2020-01-08 10:36:52'),
(146, NULL, NULL, 'Normal,', NULL, '3,', '3-5,', 'LOURDES ADRIANA SANCHEZ CEDILLO', 'adriana.s.cedillo@gmail.com', '2020-07-17 00:00:00', NULL, '01 222 611 9612', 'Que incluyen los paquetes?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-08 17:38:10', '2020-01-08 17:38:10'),
(147, NULL, NULL, 'Economico,', NULL, '3,', '6-8,', 'Marian', 'Scottmarian@hotmail.com', '2020-07-27 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-08 18:31:52', '2020-01-08 18:31:52'),
(148, NULL, NULL, 'Normal,', 'Montaña 7 colores,Lima,Machu Picchu,Lago Titicaca,Cusco,', '2,', '6-8,', 'Ricardo Mancilla', 'ricardomr001@hotmail.com', '2020-09-30 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 10:46:41', '2020-01-09 10:46:41'),
(149, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,', '2,', '6-8,', 'Ricardo Mancilla', 'ricardomr001@yahoo.com.mx', '2020-09-30 00:00:00', NULL, '', 'Buenas tardes, hace rato puse mal mi correo. El correcto es este RICARDOMR00@YAHOO.COM.MX  puse erroneamente terminacion hotmail.com   MUCHAS GRACIAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 10:49:05', '2020-01-09 10:49:05'),
(150, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '5,', '12-15,', 'barbara nester', 'anaya.nesteredron.edu.mx', '2020-04-07 00:00:00', NULL, '55850674', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 11:20:01', '2020-01-09 11:20:01'),
(151, NULL, NULL, 'Normal,', 'Machu Picchu,Lima,Montaña 7 colores,Camino inca,Lago Titicaca,Cusco,', '5,', '9-11,', 'Alejandro Martinez', 'alejomata_rena@hotmail.com', '2021-04-05 00:00:00', NULL, '01 664 548 1288', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 12:25:25', '2020-01-09 12:25:25'),
(152, NULL, NULL, 'Economico,Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,Lima,Lago Titicaca,Camino inca,', '2,', '6-8,', 'Alma Dominguez', 'atufi1004@gmail.com', '2020-02-12 00:00:00', NULL, '', 'Hola buenas tardes, quisiera saber más acerca de sus paquetes, precios y que incluyen. Gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 13:54:51', '2020-01-09 13:54:51'),
(153, NULL, NULL, 'Normal,Superior,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Camino inca,Lago Titicaca,', '4,', '6-8,', 'veronica haro', 'lic.harouad@gmail.com', '2020-05-19 00:00:00', NULL, '01 618 158 8587', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:31:41', '2020-01-09 16:31:41'),
(154, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:45:24', '2020-01-09 16:45:24'),
(155, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:34', '2020-01-09 16:50:34'),
(156, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:34', '2020-01-09 16:50:34'),
(157, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:34', '2020-01-09 16:50:34'),
(158, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:35', '2020-01-09 16:50:35'),
(159, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:35', '2020-01-09 16:50:35'),
(160, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:35', '2020-01-09 16:50:35'),
(161, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:36', '2020-01-09 16:50:36'),
(162, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:50:36', '2020-01-09 16:50:36'),
(163, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:57:44', '2020-01-09 16:57:44'),
(164, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:57:44', '2020-01-09 16:57:44'),
(165, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:57:44', '2020-01-09 16:57:44'),
(166, NULL, NULL, 'Normal,', 'Machu Picchu,', '2,', '6-8,', 'ISABEL PEREZ MOLLINEDO', 'ngmonlinetours.com', '2027-08-13 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 16:57:44', '2020-01-09 16:57:44'),
(167, NULL, NULL, 'Normal,', NULL, '3,', '9-11,', 'test', 'tes@test.com', '2020-01-25 00:00:00', NULL, '5454555454', 'test / paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-09 17:07:36', '2020-01-09 17:07:36');
INSERT INTO `tinquire` (`id`, `producto`, `package`, `hotel`, `destinos`, `pasajeros`, `duracion`, `nombre`, `email`, `travel_date`, `travel_date2`, `telefono`, `comentario`, `codigo_pais`, `device`, `origen`, `browser`, `precio_inicial`, `precio_venta`, `sub_profit`, `profit`, `vendedor`, `sale_date`, `sent`, `estado`, `created_at`, `updated_at`) VALUES
(168, NULL, NULL, 'Normal,', 'Lago Titicaca,', '3,', '3-5,', 'irving alan martinez trejo', 'rasirving@hotmail.com', '2020-05-23 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 11:50:01', '2020-01-10 11:50:01'),
(169, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,', '3,', '6-8,', 'Elizabeth Hernandez', 'eli.hdz.lora@gmail.com', '2020-04-23 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 12:05:12', '2020-01-10 12:05:12'),
(170, NULL, NULL, 'Normal,', NULL, '2,', '9-11,', 'Arturo Jimenez', 'arturo.jimenez71@yahoo.com', '2020-05-01 00:00:00', NULL, '01 33 2338 7586', 'Cual es la mejor temporal para realizar este viaje?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 13:02:47', '2020-01-10 13:02:47'),
(171, NULL, NULL, 'Normal,', 'Cusco,Machu Picchu,Montaña 7 colores,Camino inca,', '1,', '3-5,', 'Akira Tanaka', 'akiratanakav@hotmail.com', '2020-08-09 00:00:00', NULL, '01 55 2299 4912', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 13:20:05', '2020-01-10 13:20:05'),
(172, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Angelica Romero', 'chris.romero.cebreros@gmail.com', '2020-01-24 00:00:00', NULL, '01 55 1694 7671', 'Quiero saber los costos y si incluye vuelos. Mil gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 13:50:52', '2020-01-10 13:50:52'),
(173, NULL, NULL, 'Normal,', 'Machu Picchu,', '4,', '6-8,', 'ARMANDO DELGADO GONZALEZ', 'rzx100@live.com.mx', '2020-04-06 00:00:00', NULL, '01 55 2769 0490', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 14:01:48', '2020-01-10 14:01:48'),
(174, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'Jose Moreno Ruiz', 'josemorenoruiz18@gmail.com', '2020-08-03 00:00:00', NULL, '01 443 730 4423', 'Me gustaria saber todo ll que incluye el paquete asi como su precio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 14:02:18', '2020-01-10 14:02:18'),
(175, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,', '4,', '3-5,', 'Piedad González', 'cobranza.ver@tractozone.com.mx', '2020-07-31 00:00:00', NULL, '01 229 120 0374', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 14:18:17', '2020-01-10 14:18:17'),
(176, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'orlando tonatiuh', 'orlandoto28@gmail.com', '2020-02-21 00:00:00', NULL, '01 33 3190 1672', 'cuanto sale un viaje para dos personas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 15:12:25', '2020-01-10 15:12:25'),
(177, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Lima,', '4,', '3-5,', 'ELY GALLO', 'ELY_GALLO@HOTMAIL.COM', '2020-04-04 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 16:10:53', '2020-01-10 16:10:53'),
(178, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,Lima,', '2,', '6-8,', 'Sofia alejandra zubieta', 'Sazgala@hotmail.com', '2020-01-19 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 16:45:23', '2020-01-10 16:45:23'),
(179, NULL, NULL, 'Superior,', NULL, '2,', '3-5,', 'Claudia curiel', 'Cuaya18@yahoo.com.mx', '2020-02-20 00:00:00', NULL, '01 55 5438 2934', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 16:56:29', '2020-01-10 16:56:29'),
(180, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Camino inca,', '2,', '6-8,', 'KARINA LILIAN ARANDA GONZALEZ', 'karina.arandag@gmail.com', '2020-04-05 00:00:00', NULL, '01 644 462 0489', 'Que lugares son los mas emblematicos para visitar en Peru estamos de domingo 05 a sabado 11 de abril.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 17:05:42', '2020-01-10 17:05:42'),
(181, NULL, NULL, 'Superior,', 'Montaña 7 colores,Lima,Cusco,Machu Picchu,', '2,', '6-8,', 'nancy alicia ramirez tress', 'nancyalicia3@gmail.com', '2020-06-14 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 17:37:14', '2020-01-10 17:37:14'),
(182, NULL, NULL, 'Economico,', NULL, '3,', '9-11,', 'hugo', 'hugo_hdz_87@hotmail.com', '2020-09-11 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 13:59:00', '2020-01-13 13:59:00'),
(183, NULL, NULL, 'Normal,', 'Machu Picchu,', '3,', '6-8,', 'ZULMA VILLEGAS VERÁ', 'zuveradoval@hotmail.com', '2021-03-01 00:00:00', NULL, '01 55 6810 3683', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 14:47:27', '2020-01-13 14:47:27'),
(184, NULL, NULL, 'Economico,', 'Lima,Cusco,Machu Picchu,Montaña 7 colores,', '1,', '6-8,', 'Leonardo Díaz Valverde', 'ldiaz@naver.com', '2020-03-14 00:00:00', NULL, '01 55 5997 8252', 'La salida de la Ciudad de México prefiero hacerla por la noche', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 15:28:03', '2020-01-13 15:28:03'),
(185, NULL, NULL, 'Lujo,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,Camino inca,', '2,', '9-11,', 'Bertha Gastelum', 'bgastelum@msn.com', '2020-04-03 00:00:00', NULL, '01 55 1473 4202', 'mis fechas son flexibles queremos un viaje de uinos 10 dias por lo mas lindo de peru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 16:10:26', '2020-01-13 16:10:26'),
(186, NULL, NULL, 'Economico,', 'Machu Picchu,Cusco,Montaña 7 colores,Lago Titicaca,', '2,', '6-8,', 'Regina Navarro', 'gina_1088@hotmail.com', '2020-01-16 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 16:25:03', '2020-01-13 16:25:03'),
(187, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lago Titicaca,', '2,', '3-5,', 'jose luis', 'vernierJL@hotmail.com', '2020-02-17 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 16:25:53', '2020-01-13 16:25:53'),
(188, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Yasbeth Muñoz Moreno', 'yasbeth_06@hotmail.com', '2020-04-08 00:00:00', NULL, '01 55 2094 3194', '¿Incluye avión?!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 16:29:17', '2020-01-13 16:29:17'),
(189, NULL, NULL, 'Economico,', NULL, '2,', '6-8,', 'AVELINO ORTEGS', 'CP_AOR@YAHOO.COM', '2020-02-07 00:00:00', NULL, '01 722 222 2222', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 17:12:42', '2020-01-13 17:12:42'),
(190, NULL, NULL, 'Economico,', NULL, '2,', '3-5,', 'Karla Cecilia Castro Rivera', 'karlacastro-31@hotmail.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 17:45:03', '2020-01-13 17:45:03'),
(191, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'Ivonne Delgado Lemus', 'leemusictheatre@hotmail.com', '2020-07-05 00:00:00', NULL, '01 55 2244 5916', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 17:54:41', '2020-01-13 17:54:41'),
(192, NULL, NULL, 'Economico,', NULL, '4,', '6-8,', 'Rubén Vera Ramírez', 'ruben_vera_ocha@hotmail.com', '2020-06-27 00:00:00', NULL, '01 987 100 6638', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 10:31:28', '2020-01-14 10:31:28'),
(193, NULL, NULL, '', NULL, '', '', 'Ariadna Gómez', 'dg.ariadnagomez@gmail.com', '2020-06-15 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 14:05:06', '2020-01-14 14:05:06'),
(194, NULL, NULL, 'Normal,Economico,', 'Machu Picchu,Montaña 7 colores,', '4,', '6-8,', 'NALLELY MENDOZA', 'nallely7@live.com', '2020-06-22 00:00:00', NULL, '', 'me gustaría conocer el precio aproximado . gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 14:33:26', '2020-01-14 14:33:26'),
(195, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Mary Vizcarra', 'maryzanbada@hotmail.com', '2020-02-21 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 14:56:41', '2020-01-14 14:56:41'),
(196, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'DIANA ISIDRO', 'disidrov40@gmail.com', '2022-04-11 00:00:00', NULL, '782 894971', 'cotizacion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 15:19:09', '2020-01-14 15:19:09'),
(197, NULL, NULL, 'Superior,', 'Machu Picchu,Montaña 7 colores,Lima,Lago Titicaca,Camino inca,Cusco,', '4,', '6-8,', 'Ruthsi', 'Ruthsicorrea83@gmail.com', '2020-04-29 00:00:00', NULL, '01 56 1088 0030', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 15:42:53', '2020-01-14 15:42:53'),
(198, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'Paola Brenes', 'srta.brenes@hotmail.com', '2020-03-08 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 16:00:04', '2020-01-14 16:00:04'),
(199, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Elizabeth Jimenez', 'elijmz@live.com.mx', '2020-10-03 00:00:00', NULL, '', 'Me interesa uno de sus paquetes, me podrian cotizar y las foras y facilidades de pago.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 16:01:20', '2020-01-14 16:01:20'),
(200, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'Jose Alberto Montes', 'jocundosan@gmail.com', '2020-05-23 00:00:00', NULL, '01 312 138 6313', 'Me interesa conocer Machu Picchu. Volaría de Mexico el sabado 23 de mayo y necesito estar de regreso en Lima antes del 28 del mismo mes.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 17:30:57', '2020-01-14 17:30:57'),
(201, NULL, NULL, 'Economico,', NULL, '1,', '12-15,', 'KARLA LILIANA PADILLA MIRANDA', 'karlapadilla0297@gmail.com', '2020-08-12 00:00:00', NULL, '01 33 1300 1665', 'Cotizaciones, por favor.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-14 17:36:29', '2020-01-14 17:36:29'),
(202, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Gabriela García Sánchez', 'gab_gar96@hotmail.com', '2020-05-16 00:00:00', NULL, '', 'Hola, buen día. ¿El paquete incluye los traslados desde Ciudad de México hasta Perú? ¿Contempla el precio todas las actividades que incluye el resumen del paquete de parejas?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 10:03:49', '2020-01-15 10:03:49'),
(203, NULL, NULL, 'Lujo,', NULL, '1,', '12-15,', 'José Soriano', 'jcasg', '2020-11-01 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:03:13', '2020-01-15 11:03:13'),
(204, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'GABRIELA GARCIA SANCHEZ', 'gab_gar96@hotmail.com', '2020-05-16 00:00:00', NULL, '01 722 269 8362', 'Hola,  buen día, quería saber si los precios que manejan incluyen el traslado y las actividades que vienen en el resumen, así como los hoteles. Gracias.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:08:29', '2020-01-15 11:08:29'),
(205, NULL, NULL, 'Lujo,', NULL, '1,', '12-15,', 'José Soriano', 'jcasg', '2020-11-01 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:17:12', '2020-01-15 11:17:12'),
(206, NULL, NULL, 'Superior,', 'Machu Picchu,Montaña 7 colores,Cusco,Lima,', '5,', '12-15,', 'Ana Rosales', 'anie110@hotmail.com', '2032-08-01 00:00:00', NULL, '01 33 1665 5857', 'nos llamo la atencion estos lugares, podrian hacer un tour algo asi:\nLima\nCusco\nAguas Calientes\nMachu Picchu\nMaras, las salinas\nIslas Galapagos\nCordillera Blanca ir a un glaciar\nVolar a Bolivia al Salar de Uyuni y regresar a Lima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:17:55', '2020-01-15 11:17:55'),
(207, NULL, NULL, 'Superior,', NULL, '4,', '3-5,', 'edgwar zarate', 'edgwar_z@hotmail.com', '2020-08-09 00:00:00', NULL, '01 322 226 8499', 'Hola,\n\nSolo saber si en esta consulta de viaje incluye boletos de avion?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:26:20', '2020-01-15 11:26:20'),
(208, NULL, NULL, 'Superior,', NULL, '4,', '3-5,', 'edgwar zarate', 'edgwar_z@hotmail.com', '2020-08-09 00:00:00', NULL, '01 322 226 8499', 'Hola,\n\nSolo saber si en esta consulta de viaje incluye boletos de avion?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 11:26:20', '2020-01-15 11:26:20'),
(209, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'elizabeth peñuñuri', 'elizabethpv@hotmail.com', '2020-02-29 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 12:27:13', '2020-01-15 12:27:13'),
(210, NULL, NULL, 'Normal,', NULL, '1,', '3-5,', 'Karla Santana', 'karlasc87@icloud.com', '2020-03-09 00:00:00', NULL, '01 55 2843 5684', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 13:27:14', '2020-01-15 13:27:14'),
(211, NULL, NULL, 'Economico,', NULL, '3,', '9-11,', 'luis chiquete gomez', 'archiquet@gmail.com', '2020-03-19 00:00:00', NULL, '01 55 2803 7594', 'la fecha de salida puede variar si es mas barato en otro dia de marzo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 14:31:12', '2020-01-15 14:31:12'),
(212, NULL, NULL, 'Normal,', 'Cusco,Lima,Machu Picchu,', '2,', '6-8,', 'Juana Ivis Fernandez Leon', 'j.i.bayon@icloud.com', '2020-03-06 00:00:00', NULL, '01 55 4442 7236', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 14:38:55', '2020-01-15 14:38:55'),
(213, NULL, NULL, 'Superior,', NULL, '1,', '6-8,', 'Cristina Sumano', 'sumanogc@yahoo.com.mx', '2020-04-03 00:00:00', NULL, '01 55 4084 5651', 'Quiero saber que incluye y que no.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 14:44:11', '2020-01-15 14:44:11'),
(214, NULL, NULL, 'Normal,', 'Machu Picchu,Lago Titicaca,Montaña 7 colores,Cusco,Lima,', '3,', '9-11,', 'shantal chiquete gomez', 'shg_shan@hotmail.com', '2022-03-19 00:00:00', NULL, '01 55 2803 7596', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 14:46:17', '2020-01-15 14:46:17'),
(215, NULL, NULL, 'Normal,', NULL, '1,', '3-5,', 'WENDY JAZMIN MOCTEZUMA ARIAS', 'wendymoctezumaarias@gmail.com', '2020-09-12 00:00:00', NULL, '055 305 94655', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 14:47:31', '2020-01-15 14:47:31'),
(216, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Diego', 'diegoespinosa1010@gmail.com', '2020-04-06 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 15:17:02', '2020-01-15 15:17:02'),
(217, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,', '2,', '9-11,', 'stefania cuellar', 'fanycuellar86@gmail.com', '2020-09-10 00:00:00', NULL, '01 33 2237 0193', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 22:08:37', '2020-01-15 22:08:37'),
(218, NULL, NULL, 'Lujo,Superior,', NULL, '2,', '3-5,', 'Francisco Maximiliano Macedo Mondragón', 'maximilianomacedo09@gmail.com', '2020-12-18 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 23:08:43', '2020-01-15 23:08:43'),
(219, NULL, NULL, 'Normal,', NULL, '2,', '12-15,', 'Sergio Cruz Zepeda', 'cruz.checo@gmail.com', '2020-09-11 00:00:00', NULL, '01 33 3809 8306', 'Donde estan ubicadas sus oficinas en CDMX? cuales son las opciones de pago?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-15 23:13:51', '2020-01-15 23:13:51'),
(220, NULL, NULL, 'Economico,', NULL, '3,', '9-11,', 'Rosario sanchez', 'Citlali_zaje@hotmail.com', '2020-06-26 00:00:00', NULL, '01 55 4814 2021', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 10:54:47', '2020-01-16 10:54:47'),
(221, NULL, NULL, 'Normal,', NULL, '1,', '6-8,', 'Paul Andres Urtusuastegui Campaña', 'paul_urtu@outlook.com', '2020-08-21 00:00:00', NULL, '01 614 427 6702', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 11:31:31', '2020-01-16 11:31:31'),
(222, NULL, NULL, '', 'Machu Picchu,Montaña 7 colores,', '5,', '12-15,', 'Patricia García', 'fridapatt02@yahoo.com.mx', '2020-04-05 00:00:00', NULL, '01 492 136 0293', 'Precio de adultos y niños, 2 adultos 2niños 1 bebé en brazos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 13:46:23', '2020-01-16 13:46:23'),
(223, NULL, NULL, 'Economico,', 'Cusco,Machu Picchu,Montaña 7 colores,Lima,', '2,', '3-5,', 'PILAR LUGO', 'pilarlugoh22@gmail.com', '2020-05-20 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 14:09:22', '2020-01-16 14:09:22'),
(224, NULL, NULL, 'Normal,', NULL, '', '6-8,', 'LUIS ALONSO HERNANDEZ LOPEZ', 'viajesyprogramas@gmail.com', '2020-04-12 00:00:00', NULL, '01 33 2343 0247', 'Son 6 pasajeros en habitación doble,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 14:50:20', '2020-01-16 14:50:20'),
(225, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Cusco,Lago Titicaca,Camino inca,Lima,', '1,', '6-8,', 'Aylin', 'Mollyluna1998@hotmail..com', '2020-12-01 00:00:00', NULL, '01 221 119 5607', 'Costos y horarios', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 14:55:34', '2020-01-16 14:55:34'),
(226, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,Camino inca,', '3,4,', '9-11,', 'mary campos', 'marycam_2003@yahoo.com.mx', '2020-04-20 00:00:00', NULL, '', 'uno de los pasajeros es bebe de dos años', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 15:43:24', '2020-01-16 15:43:24'),
(227, NULL, NULL, 'Economico,', NULL, '1,', '6-8,', 'Karen Vázquez Hernández', 'kjvh95@hotmail.com', '2020-07-11 00:00:00', NULL, '01 464 155 5336', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 16:01:26', '2020-01-16 16:01:26'),
(228, NULL, NULL, 'Economico,', NULL, '1,', '9-11,', 'amalia fernandez', 'f5m1a03@gmail.com', '2021-01-08 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-16 17:01:29', '2020-01-16 17:01:29'),
(229, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'MONICA BEJAR MARTINEZ', 'monica_bejar@hotmail.com', '2020-07-15 00:00:00', NULL, '', 'informes por favor.gracias.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 11:08:19', '2020-01-17 11:08:19'),
(230, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Lago Titicaca,Camino inca,', '3,', '3-5,', 'María de los Angeles', 'Angeles.ruiz@rimpo.com.mx', '2020-02-04 00:00:00', NULL, '01 722 576 4607', 'Regreso a México el día 11 del mismo mes, buscamos también explorar la experiencia gastronómica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 11:22:03', '2020-01-17 11:22:03'),
(231, NULL, NULL, 'Normal,', NULL, '2,', '3-5,', 'fernando diaz', 'ing.diaz.gil@gmail.com', '2020-02-15 00:00:00', NULL, '01 771 231 5663', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 11:24:12', '2020-01-17 11:24:12'),
(232, NULL, NULL, 'Normal,', 'Machu Picchu,Montaña 7 colores,Camino inca,Cusco,', '2,', '6-8,', 'IRIS DIAZ', 'irisdiaz.mdm@gmail.com', '2020-09-15 00:00:00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 12:32:05', '2020-01-17 12:32:05'),
(233, NULL, NULL, 'Normal,', 'Machu Picchu,Lago Titicaca,Cusco,Montaña 7 colores,Lima,', '2,', '6-8,', 'Liliana Hernández', 'liliana_hernandez_lili@hotmail.com', '2020-05-12 00:00:00', NULL, '01 775 173 0963', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 12:47:08', '2020-01-17 12:47:08'),
(234, NULL, NULL, 'Normal,', 'Machu Picchu,Cusco,Montaña 7 colores,Camino inca,', '2,', '3-5,', 'gina torres', 'orresand1979@gmail.com', '2021-04-03 00:00:00', NULL, '01 55 3302 5802', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 12:48:08', '2020-01-17 12:48:08'),
(235, NULL, NULL, 'Superior,', NULL, '2,', '6-8,', 'Itza Samira Fierros Chacón', 'itzafierros@hotmail.com', '2020-04-09 00:00:00', NULL, '01 993 228 2362', 'Quiero los costos de viaje y que incluye, métodos de pago etc.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-17 13:14:21', '2020-01-17 13:14:21'),
(236, NULL, NULL, 'Normal,', NULL, '2,', '6-8,', 'Alma Rosa Paulino Lopez', 'alma_rpl@hotmail.com', '2020-05-25 00:00:00', NULL, '', 'Incluye vuelo redondo?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-18 11:07:20', '2020-01-18 11:07:20'),
(237, NULL, NULL, 'Superior,', NULL, '5,', '3-5,', 'Itzel Nañez', 'Historiasdelu@hotmail.com', '2020-04-17 00:00:00', NULL, '01 961 593 6263', 'Hola ;) me gustaría saber la información y cotización de este tour, gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-18 11:12:05', '2020-01-18 11:12:05'),
(238, NULL, NULL, 'Normal,', 'Machu Picchu,Lima,Cusco,Montaña 7 colores,Lago Titicaca,Camino inca,', '', '3-5,6-8,', 'Ross Miranda', 'pasionsonora.rosy@gmail.com', '2020-10-15 00:00:00', NULL, '01 662 296 9720', 'Nuestra salida sería desde Hermosillo Sonora México.\nNuestros grupos son variables alguna opción dónde un día pueda alguien tomar diferente tour de acuerdo. Así condicion física o interés de licra. Gracias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-18 11:43:49', '2020-01-18 11:43:49'),
(239, NULL, NULL, 'Superior,', NULL, '2,', '3-5,', 'Diego David Mora Puente', 'diegomora049@gmail.com', '2021-01-02 00:00:00', NULL, '01 81 2587 9605', 'Incluye vuelos?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-20 10:28:31', '2020-01-20 10:28:31'),
(240, NULL, NULL, 'Superior,', 'Machu Picchu,Cusco,Lima,Montaña 7 colores,Lago Titicaca,Camino inca,', '2,', '9-11,', 'JOSE ROSADO PENICHE', 'sag98@prodigy.net.mx', '2021-01-13 00:00:00', NULL, '01 999 200 3567', 'LLEGO A LIMA EL 12 ALAS 23.30 HORAS Y REGRESO EL 23 A LAS 00.35 HORAS A LA CIUDAD DE MEXICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-20 10:33:30', '2020-01-20 10:33:30'),
(241, NULL, NULL, 'Turismo,', NULL, '3,', '12-15,', 'Robert Calderon', 'robcalalv@gmail.com', '2023-11-08 00:00:00', NULL, '+506 7296 6681', 'quiero todos los detalles del viaje y su itinerario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-08 21:20:30', '2023-11-08 21:20:30'),
(242, NULL, NULL, 'Turismo,', NULL, '', '3-5,', '7', 'maritzarios00@gmail.com', '2024-03-25 00:00:00', NULL, '9577-9408', 'Precio del paquete y lo q incluye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-08 21:26:45', '2023-11-08 21:26:45'),
(243, NULL, NULL, 'Turista,', 'Machu Picchu,Cusco,', '3,', '3-5,', 'larissa barrios', 'larisbarrios@yahoo.com', '2023-11-15 00:00:00', NULL, '4218 2850', 'quisieramos visitar lugares historicos, culturales, naturales pero no con mucha dificultad de caminata o senderismo puesto que somos dos señoras de 56 años', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 20:11:31', '2023-11-09 20:11:31'),
(244, NULL, NULL, '5, 4, 3', '', '1', 'Undecided, 22+, 17-21, 12-16, 8-11, 3-7', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', NULL, NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 20:31:38', '2024-10-08 20:31:38'),
(245, NULL, NULL, '', '', '1', '', 'Hidalgo Edely Chata Ponce', 'hola@g.com', NULL, NULL, '973182133', 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 23:48:54', '2024-10-08 23:48:54'),
(246, NULL, NULL, '5, 4, 3', '', '1', 'Undecided, 22+, 17-21, 12-16, 8-11, 3-7', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', NULL, NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 23:51:10', '2024-10-08 23:51:10'),
(247, NULL, NULL, '5,, 4,', '', '4', '6-8, 9-11', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 23:59:30', '2024-10-08 23:59:30'),
(248, NULL, NULL, '5,, 4,', '', '3', '6-8, 9-11', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:02:51', '2024-10-09 00:02:51'),
(249, NULL, NULL, '5,, 4,, 3,', '', '3', '3-5, 6-8, 9-11, 12-16, 16+', 'Hidalgo Edely Chata Ponce', 'lulu@g.com', NULL, NULL, '973182133', 'asdadsss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:07:35', '2024-10-09 00:07:35'),
(250, NULL, NULL, '5, 4, 3', '', '4', '3-5, 6-8, 9-11, 12-16, 16+', 'Hidalgo Edely Chata Ponce', 'hola@g.com', NULL, NULL, '973182133', 'asdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:09:51', '2024-10-09 00:09:51'),
(251, NULL, NULL, '5, 4, 3', '', '4', '3-5, 6-8, 9-11, 12-16, 16+', 'Hidalgo Edely Chata Ponce', 'lucero@g.com', NULL, NULL, '973182133', 'asdasdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:15:51', '2024-10-09 00:15:51'),
(252, NULL, NULL, '5, 4', '', '23', '16+', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'sdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:19:57', '2024-10-09 00:19:57'),
(253, NULL, NULL, '5, 4', '', 'Undecided', '16+', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:22:38', '2024-10-09 00:22:38'),
(254, NULL, NULL, '5', '', '3', ', , , , , Undecided', 'Hidalgo Edely Chata Ponce', 'hid2a@g.com', NULL, NULL, '973182133', 'sdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:25:01', '2024-10-09 00:25:01'),
(255, NULL, NULL, '5', '', '3', '12-16, Undecided', 'Hidalgo Edely Chata Ponce', 'asdad@g.com', NULL, NULL, '973182133', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:26:16', '2024-10-09 00:26:16'),
(256, NULL, NULL, '5, 4', '', '3', ', Undecided', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:32:52', '2024-10-09 00:32:52'),
(257, NULL, NULL, '5', '', '3', '9-11, 12-16', 'Hidalgo Edely Chata Ponce', 'hoda@g.com', NULL, NULL, '973182133', 'sdfsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:35:43', '2024-10-09 00:35:43'),
(258, NULL, NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'asdasd@g.com', NULL, NULL, '973182133', 'asdasdsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 00:49:59', '2024-10-09 00:49:59'),
(259, NULL, NULL, '5', '', '1', '3-5', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 02:29:13', '2024-10-09 02:29:13'),
(260, NULL, NULL, '5, 4', '', '3', '6-8, 9-11', 'Hidalgo Edely Chata Ponce', 'asdasd@g.com', '2024-10-24 00:00:00', NULL, '973182133', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 02:34:53', '2024-10-09 02:34:53'),
(261, NULL, NULL, '5, 4', '', '1', '6-8', 'hidal', 'hiad@g.com', '2024-10-17 00:00:00', NULL, '973192133', 'ssdfsdff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2024-10-09 15:53:42', '2024-10-22 19:51:21'),
(262, NULL, NULL, '5', '', '2', '9-11', 'hidalgo', 'gotoperu@prueba.com', '2024-10-18 00:00:00', NULL, '9234234243', 'sdfsdfsdfsdfdsf', NULL, NULL, NULL, NULL, NULL, 3455, 1233, NULL, 2, '2024-10-21 00:00:00', 1, 2, '2024-10-09 16:11:49', '2024-10-22 00:33:28'),
(263, NULL, NULL, '5, 4, 3', '', '4', '6-8, 9-11, 12-16, 16+', 'Hidalgo Edely Chata Ponce', 'hida@g.com', '2024-10-18 00:00:00', NULL, '973182133', 'asdadasd', NULL, NULL, NULL, NULL, NULL, 456, 234, 56, 4, '2024-10-31 00:00:00', 1, 2, '2024-10-09 16:39:39', '2024-10-22 00:26:11'),
(264, NULL, NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'hida@g.com', '2024-10-10 00:00:00', NULL, '973182133', 'asdads', 'PE', 'Desktop', 'Web', 'Chrome', NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2024-10-09 16:42:07', '2024-10-22 00:22:05'),
(265, NULL, NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'hida@g.com', '2024-10-10 00:00:00', NULL, '973182133', 'sdfsdf', 'PE', 'Desktop', 'Web', 'Chrome', NULL, NULL, 12, NULL, 3, NULL, 1, 1, '2024-10-09 16:43:44', '2024-10-22 19:38:02'),
(266, 'gotoperu.com', NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'hida@g.com', '2024-10-10 00:00:00', NULL, '973182133', 'asdasd', 'PE', 'Desktop', 'Web', 'Chrome', 1150, 1250, 200, 2, 1, '2024-10-24 00:00:00', 1, 1, '2024-10-09 16:47:22', '2024-10-21 23:00:03'),
(267, 'gotoperu.com', NULL, '5, 4, 3', '', '5', '6-8, 12-16', 'Lulu', 'lulu@gmail.com', '2024-10-31 00:00:00', NULL, '98234737467', 'sdjkfsjhdfgsjdf', 'PE', 'Desktop', 'Web', 'Chrome', NULL, 2, 2, 2, 4, '2024-10-23 00:00:00', 1, 1, '2024-10-16 14:32:22', '2024-10-21 22:58:17'),
(268, 'gotoperu.com', NULL, '5, 4, 3', '', '1', 'Undecided, 22+, 17-21, 12-16, 8-11, 3-7', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', '2014-05-12 00:00:00', NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, 1234, 12, NULL, 2, '2024-10-21 00:00:00', 1, 2, '2024-10-21 17:32:29', '2024-10-22 00:21:02'),
(269, 'gotoperu.com', NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'hida@g.com', NULL, NULL, '973182133', 'sdfsdf', 'PE', 'Desktop', 'Web', 'Chrome', NULL, 1200, 1000, 200, 3, NULL, 1, 1, '2024-10-21 17:33:41', '2024-10-21 20:17:47'),
(270, 'gotoperu.com', NULL, '5, 4, 3', '', '1', 'Undecided, 22+, 17-21, 12-16, 8-11, 3-7', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', '2014-05-12 00:00:00', NULL, '973182133', 'test', NULL, NULL, NULL, NULL, NULL, 1000, 11111, 10, 2, '2024-10-21 00:00:00', 1, 2, '2024-10-21 17:34:15', '2024-10-22 00:52:24'),
(271, 'gotoperu.com', NULL, '5', '', '2', '6-8', 'Hidalgo Edely Chata Ponce', 'hida@g.com', '2024-10-24 00:00:00', NULL, '973182133', 'sdfsdf', 'PE', 'Desktop', 'Web', 'Chrome', NULL, 22, 1222, 20, 1, '2024-10-22 00:00:00', 1, 1, '2024-10-21 17:37:18', '2024-10-21 23:04:07'),
(272, 'gotoperu.com', NULL, '5, 4', '', '3', '9-11', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', '2024-10-23 00:00:00', NULL, '973182133', 'test', 'PE', 'Desktop', 'Web', 'Chrome', NULL, 33233, 1233, 2233, 2, '2024-10-22 00:00:00', NULL, 2, '2024-10-22 19:42:56', '2024-10-22 19:50:47'),
(273, 'gotoperu.com', NULL, '5, 4, 3', '', '2', '3-5, 6-8, 9-11, 12-16, 16+', 'Hidalgo Edely Chata Ponce', 'hidalgochponce@gmail.com', '2024-10-31 00:00:00', NULL, '973182133', 'test 2', NULL, 'Desktop', 'Web', 'Chrome', NULL, NULL, NULL, NULL, 4, NULL, 1, 1, '2024-10-22 19:44:38', '2024-10-22 19:45:21'),
(274, 'gotoperu.com', NULL, '', '', '4', '9-11', 'Laura Buria', 'Laura.demayola@gmail.com', '2024-11-10 00:00:00', NULL, '7203573725', 'Toddler friendly ideas', 'US', 'Móvil', 'Web', 'Chrome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-22 20:58:15', '2024-10-22 20:58:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titinerario`
--

CREATE TABLE `titinerario` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `dia` int(2) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `resumen` longtext,
  `descripcion` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titinerario`
--

INSERT INTO `titinerario` (`id`, `codigo`, `dia`, `titulo`, `resumen`, `descripcion`, `created_at`, `updated_at`) VALUES
(465, 'MAPI01', NULL, 'Welcome to Lima, Peru', '<p style=\"text-align: justify;\">As you start on your journey to this vibrant South American city, prepare to discover a rich mix of ancient history and modern city life. Upon arrival at the Jorge Chavez International Airport, our representative will greet you with warm hospitality and take you to your hotel, where you will find comfortable accommodations that suit each traveler\'s needs. Whether you\'re looking for relaxation or adventure, this capital has it all. &iexcl;Pack your bags and get ready for an unforgettable travel experience in Lima, Peru!</p>', '<p style=\"text-align: justify;\">As you start on your journey to this vibrant South American city, prepare to discover a rich mix of ancient history and modern city life. Upon arrival at the Jorge Chavez International Airport, our representative will greet you with warm hospitality and take you to your hotel, where you will find comfortable accommodations that suit each traveler\'s needs. Whether you\'re looking for relaxation or adventure, this capital has it all. &iexcl;Pack your bags and get ready for an unforgettable travel experience in Lima, Peru!</p>', '2024-09-09 16:47:04', '2024-09-09 16:47:04'),
(466, 'MAPI02', NULL, 'Lima City Tour and Lunch at Larco Museum', '<p style=\"text-align: justify;\">A city tour in Lima, the vibrant capital of Peru, promises an enriching journey through history and culture. Embarking on this adventure unveils a remarkable landmark that showcases Lima\'s proud heritage. The San Francisco Convent is an architectural gem dating back to colonial times. Your next stop will be at the City Hall, exuding grandeur as it symbolizes civic pride and administrative power. Beyond lies the iconic Government Palace &ndash; an opulent edifice where Peruvian presidents have resided since the country\'s birth. Next to the Government Palace is the Basilica Cathedral at Plaza de Armas&mdash;the heart of Lima&rsquo;s historical center&mdash;where architectural marvels intertwine beautifully with religious devotion. The tour continues into the Larco Museum, where you will enjoy lunch before returning to your hotel.</p>', '<p style=\"text-align: justify;\">A city tour in Lima, the vibrant capital of Peru, promises an enriching journey through history and culture. Embarking on this adventure unveils a remarkable landmark that showcases Lima\'s proud heritage. The San Francisco Convent is an architectural gem dating back to colonial times. Your next stop will be at the City Hall, exuding grandeur as it symbolizes civic pride and administrative power. Beyond lies the iconic Government Palace &ndash; an opulent edifice where Peruvian presidents have resided since the country\'s birth. Next to the Government Palace is the Basilica Cathedral at Plaza de Armas&mdash;the heart of Lima&rsquo;s historical center&mdash;where architectural marvels intertwine beautifully with religious devotion. The tour continues into the Larco Museum, where you will enjoy lunch before returning to your hotel.</p>', '2024-09-09 16:47:49', '2024-09-09 16:47:49'),
(467, 'MAPI03', NULL, 'Flight to Cusco from Lima and Transfer to the Sacred Valley', '<p style=\"text-align: justify;\">Our private assistant will visit you at your hotel in Lima and take you to Jorge Chavez International Airport. You will board a flight to the city of Cusco. Once you arrive in the Land of the Incas, our staff will welcome you at the Alejandro Velasco Astete International Airport and will escort you to your hotel in the Sacred Valley. On the way to the Sacred Valley, you will enjoy a visit to Sulca Textiles and the Archeological Site of Pisac.</p>', '<p style=\"text-align: justify;\">Our private assistant will visit you at your hotel in Lima and take you to Jorge Chavez International Airport. You will board a flight to the city of Cusco. Once you arrive in the Land of the Incas, our staff will welcome you at the Alejandro Velasco Astete International Airport and will escort you to your hotel in the Sacred Valley. On the way to the Sacred Valley, you will enjoy a visit to Sulca Textiles and the Archeological Site of Pisac.</p>', '2024-09-09 16:48:20', '2024-09-09 16:48:20'),
(468, 'MAPI04', NULL, 'Full-day tour to Chinchero and Ollantaytambo ', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the Sacred Valley, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Chinchero, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs in textile centers. In the afternoon, you will visit Ollantaytambo, an Inca site that began as a palace or fortress but was eventually used as the last Inca strong.</p>', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the Sacred Valley, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Chinchero, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs in textile centers. In the afternoon, you will visit Ollantaytambo, an Inca site that began as a palace or fortress but was eventually used as the last Inca strong.</p>', '2024-09-09 16:49:57', '2024-09-09 16:49:57'),
(469, 'MAPI05', NULL, 'Visit Machu Picchu from the Sacred Valley – overnight in Aguas Calientes', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel at the Sacred Valley and take you to the Train Station, where you will board your train to Aguas Calientes. Upon arrival, your private assistant will escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. You will return to Aguas Calientes in the late afternoon to spend the night.</p>', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel at the Sacred Valley and take you to the Train Station, where you will board your train to Aguas Calientes. Upon arrival, your private assistant will escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. You will return to Aguas Calientes in the late afternoon to spend the night.</p>', '2024-09-09 16:51:30', '2024-09-09 17:18:10'),
(470, 'MAPI06', NULL, 'Second visit to Machu Picchu and return to Cusco', '<p style=\"text-align: justify;\">We will head to the Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a second private guided tour of the citadel. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. Late in the afternoon, you will board the train from Aguas Calientes Train Station to Ollantaytambo Train Station, where a vehicle will be ready to take you back to your hotel in Cusco.</p>', '<p style=\"text-align: justify;\">We will head to the Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a second private guided tour of the citadel. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. Late in the afternoon, you will board the train from Aguas Calientes Train Station to Ollantaytambo Train Station, where a vehicle will be ready to take you back to your hotel in Cusco.</p>', '2024-09-09 16:56:33', '2024-09-09 16:56:33'),
(471, 'MAPI07', NULL, 'Cusco City tour', '<p style=\"text-align: justify;\">Before your half-day city tour begins, you will have the morning free to take a short walk and take photos around the city\'s historical center. In the afternoon, you will enjoy a guided City Tour of Cusco and the surrounding archaeological sites, such as Qorikancha temple &ndash; most known as the Temple of the Sun and Sacsayhuaman Fortress &ndash; a place that served for the Inti Raymi to take place. You will also visit Tambomachay, located in the upper part of the beautiful city of Cusco.</p>', '<p style=\"text-align: justify;\">Before your half-day city tour begins, you will have the morning free to take a short walk and take photos around the city\'s historical center. In the afternoon, you will enjoy a guided City Tour of Cusco and the surrounding archaeological sites, such as Qorikancha temple &ndash; most known as the Temple of the Sun and Sacsayhuaman Fortress &ndash; a place that served for the Inti Raymi to take place. You will also visit Tambomachay, located in the upper part of the beautiful city of Cusco.</p>', '2024-09-09 16:57:02', '2024-09-09 16:57:02'),
(472, 'MAPI08', NULL, 'Departure from Cusco', '<p>We will escort you to the Alejandro Velasco Astete International Airport to take your flight back home.</p>', '<p style=\"text-align: justify;\">We will escort you to the Alejandro Velasco Astete International Airport to take your flight back home.</p>', '2024-09-09 16:57:29', '2024-09-09 16:57:29'),
(473, 'MAPI09', NULL, 'Peruvian Biodiversity Food Tour', '<p style=\"text-align: justify;\">In this tour, you will taste a wide variety of Peruvian food from Peru\'s main regions and altitudinal levels. We will pick you up from your hotel to visit three of the main restaurants in the city (each from a different area of Peru). During your tour, you will be delighted with the main dishes that combine the biodiversity found in Peruvian territory, and you will participate in a tasting of award-winning chocolates. At the end of the visit to the last restaurant, we will have lunch (or dinner) before taking you back to your hotel.</p>', '<p style=\"text-align: justify;\">In this tour, you will taste a wide variety of Peruvian food from Peru\'s main regions and altitudinal levels. We will pick you up from your hotel to visit three of the main restaurants in the city (each from a different area of Peru). During your tour, you will be delighted with the main dishes that combine the biodiversity found in Peruvian territory, and you will participate in a tasting of award-winning chocolates. At the end of the visit to the last restaurant, we will have lunch (or dinner) before taking you back to your hotel.</p>', '2024-09-09 16:58:22', '2024-09-09 16:58:22'),
(474, 'MAPI10', NULL, 'Flight to Cusco from Lima', '<p style=\"text-align: justify;\">Our private assistant staff will visit you at your hotel in Lima and transfer you to Jorge Chavez International Airport. You will board a flight to the city of Cusco. Once you arrive in the Land of the Incas, our staff will welcome you at the Alejandro Velasco Astete International Airport and escort you to your hotel.</p>', '<p style=\"text-align: justify;\">Our private assistant staff will visit you at your hotel in Lima and transfer you to Jorge Chavez International Airport. You will board a flight to the city of Cusco. Once you arrive in the Land of the Incas, our staff will welcome you at the Alejandro Velasco Astete International Airport and escort you to your hotel.</p>', '2024-09-09 16:58:50', '2024-09-09 16:58:50'),
(475, 'MAPI11', NULL, 'Full-day tour to the Sacred Valley and return to Cusco', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the city of Cusco, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Pisac, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs &ndash; most known as artesanias. As you browse through the selection of traditional clothing and handicrafts, you\'ll quickly understand why the Pisac market has a reputation of its own. In the afternoon, you will visit Ollantaytambo. This Inca site began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will return to your hotel in Cusco City.</p>', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the city of Cusco, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Pisac, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs &ndash; most known as artesanias. As you browse through the selection of traditional clothing and handicrafts, you\'ll quickly understand why the Pisac market has a reputation of its own. In the afternoon, you will visit Ollantaytambo. This Inca site began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will return to your hotel in Cusco City.</p>', '2024-09-09 17:09:53', '2024-09-09 17:09:53'),
(476, 'MAPI12', NULL, 'Visit Machu Picchu from Cusco– overnight in Aguas Calientes', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel in Cusco and take you to the Train Station in the Sacred Valley, where you will board your train to Aguas Calientes. Upon arrival, your private assistant will escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. You will return to Aguas Calientes in the late afternoon to spend the night.</p>', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel in Cusco and take you to the Train Station in the Sacred Valley, where you will board your train to Aguas Calientes. Upon arrival, your private assistant will escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. You will return to Aguas Calientes in the late afternoon to spend the night.</p>', '2024-09-09 17:20:50', '2024-09-09 17:20:50'),
(477, 'MAPI13', NULL, 'Andean Train from Cusco to Puno', '<p style=\"text-align: justify;\">Be swept up in the beauty of Lake Titicaca, the stunning final destination, as you travel from Cusco to Puno. Train journeys aboard the Andean Explorer promise countless memories to treasure. The Spirit of the Water journey departs every Wednesday, Friday, and Sunday.</p>', '<p style=\"text-align: justify;\">Be swept up in the beauty of Lake Titicaca, the stunning final destination, as you travel from Cusco to Puno. Train journeys aboard the Andean Explorer promise countless memories to treasure. The Spirit of the Water journey departs every Wednesday, Friday, and Sunday.</p>', '2024-09-09 17:21:24', '2024-09-09 17:21:24'),
(478, 'MAPI14', NULL, 'Full-day tour to Titicaca Lake', '<p style=\"text-align: justify;\">In the morning, our private staff guide will pick you up from your hotel in Puno to begin your full-day tour of Lake Titicaca and the nearby islands. The majestic beauty of Lake Titicaca has captivated the hearts of countless explorers and travelers for centuries. Situated high in the Andean mountains between Peru and Bolivia, this enchanting lake is the largest in South America and the highest navigable lake in the world. Our tour starts with a boat trip to the floating islands of the Uros, a collection of artificial islands built from floating bundles of reeds. You will have free time to buy souvenirs at the market and explore these floating marvels created by the Uros tribe to defend themselves against rival tribes. Then, we will continue with a 2-hour boat ride to Taquile Island, home to a Quechua community that continues the tradition of male residents producing fine handicrafts. Here, you will have lunch with a magnificent view of Lake Titicaca before your return to Puno.</p>', '<p style=\"text-align: justify;\">In the morning, our private staff guide will pick you up from your hotel in Puno to begin your full-day tour of Lake Titicaca and the nearby islands. The majestic beauty of Lake Titicaca has captivated the hearts of countless explorers and travelers for centuries. Situated high in the Andean mountains between Peru and Bolivia, this enchanting lake is the largest in South America and the highest navigable lake in the world. Our tour starts with a boat trip to the floating islands of the Uros, a collection of artificial islands built from floating bundles of reeds. You will have free time to buy souvenirs at the market and explore these floating marvels created by the Uros tribe to defend themselves against rival tribes. Then, we will continue with a 2-hour boat ride to Taquile Island, home to a Quechua community that continues the tradition of male residents producing fine handicrafts. Here, you will have lunch with a magnificent view of Lake Titicaca before your return to Puno.</p>', '2024-09-09 17:21:54', '2024-09-09 17:21:54'),
(479, 'MAPI15', NULL, 'Departure from Juliaca', '<p style=\"text-align: justify;\">We will escort you to the Juliaca Airport to take your flight back home.</p>', '<p style=\"text-align: justify;\">We will escort you to the Juliaca Airport to take your flight back home.</p>', '2024-09-09 17:22:15', '2024-09-09 17:22:15'),
(480, 'MAPI16', NULL, 'Full-day tour to the Sacred Valley and Overnight in Aguas Calientes', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the city of Cusco, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Pisac, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs &ndash; most known as artesanias. As you browse through the selection of traditional clothing and handicrafts, you will quickly understand why the Pisac market has a reputation of its own. In the afternoon, you will visit Ollantaytambo, an Inca site that began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will board the train to Machu Picchu town &ndash; worldwide known as Aguas Calientes &ndash; at the Ollantaytambo train station. Upon your arrival at Aguas Calientes, a representative will be waiting for you at the Aguas Calientes train station to take you to your hotel.</p>', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the city of Cusco, a representative will pick you up to start your Sacred Valley tour. The first stop will be the City of Pisac, a small town with exquisite architecture that is the perfect place to buy authentic Andean souvenirs &ndash; most known as artesanias. As you browse through the selection of traditional clothing and handicrafts, you will quickly understand why the Pisac market has a reputation of its own. In the afternoon, you will visit Ollantaytambo, an Inca site that began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will board the train to Machu Picchu town &ndash; worldwide known as Aguas Calientes &ndash; at the Ollantaytambo train station. Upon your arrival at Aguas Calientes, a representative will be waiting for you at the Aguas Calientes train station to take you to your hotel.</p>', '2024-09-13 20:09:56', '2024-09-13 20:09:56'),
(481, 'MAPI17', NULL, 'Visit to Machu Picchu and return to Cusco', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel and escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. During your tour, you can visit historical places in the Citadel of Machu Picchu, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. Late in the afternoon, you will board the train from Aguas Calientes Train Station to Ollantaytambo Train Station, where a vehicle will be ready to take you back to your hotel in Cusco.</p>', '<p style=\"text-align: justify;\">&iexcl;The Main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel and escort you to the Aguas Calientes Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. During your tour, you can visit historical places in the Citadel of Machu Picchu, such as the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town. Late in the afternoon, you will board the train from Aguas Calientes Train Station to Ollantaytambo Train Station, where a vehicle will be ready to take you back to your hotel in Cusco.</p>', '2024-09-13 20:10:36', '2024-09-13 20:10:36'),
(482, 'MAPI18', NULL, 'Maras & Moray and Ollantaytambo – overnight in Aguas Calientes', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the Sacred Valley, a representative will pick you up to start your Sacred Valley tour. The first stop will be the Salt Mines of Maras before heading to Moray to enjoy the highest level of Inca architecture. &nbsp;In the afternoon, you will visit Ollantaytambo. This Inca site began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will board the train to Machu Picchu town &ndash; most worldwide known as Aguas Calientes &ndash; at the Ollantaytambo train station. Upon your arrival at Aguas Calientes, a representative will be waiting for you at the Aguas Calientes train station to take you to your hotel.</p>', '<p style=\"text-align: justify;\">After an early breakfast at your hotel in the Sacred Valley, a representative will pick you up to start your Sacred Valley tour. The first stop will be the Salt Mines of Maras before heading to Moray to enjoy the highest level of Inca architecture. &nbsp;In the afternoon, you will visit Ollantaytambo. This Inca site began as a palace or fortress but was eventually used as the last Inca stronghold against the invading Spanish conquistadors. After an exciting day of archaeological exploration, you will board the train to Machu Picchu town &ndash; most worldwide known as Aguas Calientes &ndash; at the Ollantaytambo train station. Upon your arrival at Aguas Calientes, a representative will be waiting for you at the Aguas Calientes train station to take you to your hotel.</p>', '2024-09-13 20:26:02', '2024-09-13 20:26:02'),
(483, 'MAPI19', NULL, 'Full-day Tour to Machu Picchu – overnight in Aguas Calientes', '<p style=\"text-align: justify;\">&iexcl;The main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel and take you to the Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, like the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town before you return to your hotel to spend the night.</p>', '<p style=\"text-align: justify;\">&iexcl;The main day of your trip! Be ready to visit the Citadel of Machu Picchu. Our representative will pick you up from your hotel and take you to the Bus Station for a 30-minute bus ride to the Citadel of Machu Picchu, where you will have a private guided tour of the citadel. You can visit historical places in the Citadel of Machu Picchu during your tour, like the Sun Stone, Sun Temple, and the Room of the Three Windows. After your tour finishes, you will have free time to explore Aguas Calientes, buy local artesanias, and enjoy a fantastic view of Machu Picchu town before you return to your hotel to spend the night.</p>', '2024-09-13 20:27:49', '2024-09-13 20:27:49'),
(484, 'MAPI20', NULL, 'Welcome to Cusco, Peru', '<p style=\"text-align: justify;\">Welcome to Cusco, the historic capital of the Inca Empire and one of the most iconic cities in the world. We will await your arrival at Alejandro Velasco Astete International Airport and then transfer you to your hotel in the city. You will have the afternoon free to explore the different locations around the Plaza de Armas and acclimate.</p>', '<p style=\"text-align: justify;\">Welcome to Cusco, the historic capital of the Inca Empire and one of the most iconic cities in the world. We will await your arrival at Alejandro Velasco Astete International Airport and then transfer you to your hotel in the city. You will have the afternoon free to explore the different locations around the Plaza de Armas and acclimate.</p>', '2024-09-13 20:35:37', '2024-09-13 20:35:37'),
(485, 'MAPI21', NULL, 'Flight to Iquitos from Cusco', '<p style=\"text-align: justify;\">Our private transportation will pick you up from your hotel in Cusco and transfer you to Alejandro Velasco Astete International Airport. You will board a flight to Iquitos, with a stopover in Lima. Once you arrive in Iquitos, our travel assistant will welcome you at the airport and escort you to your hotel.</p>', '<p style=\"text-align: justify;\">Our private transportation will pick you up from your hotel in Cusco and transfer you to Alejandro Velasco Astete International Airport. You will board a flight to Iquitos, with a stopover in Lima. Once you arrive in Iquitos, our travel assistant will welcome you at the airport and escort you to your hotel.</p>', '2024-09-13 20:36:08', '2024-09-13 20:36:08'),
(486, 'MAPI22', NULL, 'Amazon Cruise Day 1 – Nauta City', '<p style=\"text-align: justify;\">We will pick you up from your hotel in Iquitos and transfer you by private vehicle to Nauta Port to start your cruise journey. On the road, you will enjoy a box lunch.</p>\r\n<p style=\"text-align: justify;\">The staff will show you your suite with comfortable beds, air conditioning, and a private bathroom with a shower and amenities.</p>\r\n<p style=\"text-align: justify;\">Once we start sailing, our naturalist guides will offer an overview of the travel itinerary, including activities, routes, information about wildlife, geographical and historical context, and other helpful information.</p>\r\n<p style=\"text-align: justify;\">After the briefing, we will enjoy a delicious brunch and have time to rest before the next outing on skiffs to Pahuashiro, where you will enjoy a night excursion in search of alligators, tarantulas, frogs, and other species that appear when the sun goes down. We will come back to the leading boat for dinner.</p>', '<p style=\"text-align: justify;\">We will pick you up from your hotel in Iquitos and transfer you by private vehicle to Nauta Port to start your cruise journey. On the road, you will enjoy a box lunch.</p>\r\n<p style=\"text-align: justify;\">The staff will show you your suite with comfortable beds, air conditioning, and a private bathroom with a shower and amenities.</p>\r\n<p style=\"text-align: justify;\">Once we start sailing, our naturalist guides will offer an overview of the travel itinerary, including activities, routes, information about wildlife, geographical and historical context, and other helpful information.</p>\r\n<p style=\"text-align: justify;\">After the briefing, we will enjoy a delicious brunch and have time to rest before the next outing on skiffs to Pahuashiro, where you will enjoy a night excursion in search of alligators, tarantulas, frogs, and other species that appear when the sun goes down. We will come back to the leading boat for dinner.</p>', '2024-09-13 20:36:40', '2024-09-13 20:36:40'),
(487, 'MAPI23', NULL, 'Amazon Cruise Day 2 – Ucayali River', '<p style=\"text-align: justify;\">Before breakfast, we will head out on a boat to the Yanallpa area of the Ucayali River in the Pacaya Samiria National Reserve, where you will observe native flora and fauna. After breakfast, we will head to the Tapiche River in search of wildlife. Before midday, we will come back to the boat for a cooking demonstration.</p>\r\n<p style=\"text-align: justify;\">In the afternoon, we will head to the Dorado River, where we will fish using local techniques. Before heading back on board, we&rsquo;ll enjoy a nighttime outing in search of caimans, tarantulas, and other species that appear after the sun goes down.</p>', '<p style=\"text-align: justify;\">Before breakfast, we will head out on a boat to the Yanallpa area of the Ucayali River in the Pacaya Samiria National Reserve, where you will observe native flora and fauna. After breakfast, we will head to the Tapiche River in search of wildlife. Before midday, we will come back to the boat for a cooking demonstration.</p>\r\n<p style=\"text-align: justify;\">In the afternoon, we will head to the Dorado River, where we will fish using local techniques. Before heading back on board, we&rsquo;ll enjoy a nighttime outing in search of caimans, tarantulas, and other species that appear after the sun goes down.</p>', '2024-09-13 20:37:07', '2024-09-13 20:37:07'),
(488, 'MAPI24', NULL, 'Amazon Cruise Day 3 – Ucayali Black Waters', '<p style=\"text-align: justify;\">After breakfast, we will explore the Yarapa River, where the famous pink and gray river dolphins swim in its black waters. Back on the boat, we will see the confluence of the Ucayali and Mara&ntilde;on rivers, which give birth to the Amazon River.</p>\r\n<p style=\"text-align: justify;\">After enjoying lunch and resting, we will start sailing on the Amazon River. We will explore and observe the daily activities that local communities do on the river banks. Before heading back to the boat, enjoy a colorful Amazon sunset.</p>\r\n<p style=\"text-align: justify;\">Back on the boat, you will have some time to relax and enjoy live music before the crew\'s presentation and farewell dinner.</p>', '<p style=\"text-align: justify;\">After breakfast, we will explore the Yarapa River, where the famous pink and gray river dolphins swim in its black waters. Back on the boat, we will see the confluence of the Ucayali and Mara&ntilde;on rivers, which give birth to the Amazon River.</p>\r\n<p style=\"text-align: justify;\">After enjoying lunch and resting, we will start sailing on the Amazon River. We will explore and observe the daily activities that local communities do on the river banks. Before heading back to the boat, enjoy a colorful Amazon sunset.</p>\r\n<p style=\"text-align: justify;\">Back on the boat, you will have some time to relax and enjoy live music before the crew\'s presentation and farewell dinner.</p>', '2024-09-13 20:37:39', '2024-09-13 20:37:39'),
(489, 'MAPI25', NULL, 'Amazon Cruise Day 4 and Departure', '<p style=\"text-align: justify;\">Breakfast is served, and lunch can also be arranged (additional cost applies), depending on your departure flight time. Embark on your boat trip along the Amazon River until you arrive at the airport, where you will board your flight back home.</p>', '<p style=\"text-align: justify;\">Breakfast is served, and lunch can also be arranged (additional cost applies), depending on your departure flight time. Embark on your boat trip along the Amazon River until you arrive at the airport, where you will board your flight back home.</p>', '2024-09-13 20:38:10', '2024-09-13 20:38:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titinerarioimagen`
--

CREATE TABLE `titinerarioimagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `alt` varchar(250) DEFAULT NULL,
  `iditinerario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnoincluye`
--

CREATE TABLE `tnoincluye` (
  `id` int(11) NOT NULL,
  `noincluye` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tnoincluye`
--

INSERT INTO `tnoincluye` (`id`, `noincluye`, `estado`, `created_at`, `updated_at`) VALUES
(3, 'Transatlantische Flüge, Innlandsflug.', 1, '2019-05-21 03:22:33', '2019-05-21 03:22:33'),
(4, 'Reiserücktritt, Reiseabbruch- und Reisekrankenversicherung.', 1, '2019-05-21 03:22:43', '2019-05-21 03:23:19'),
(5, 'Persönliche Ausgaben und Trinkgelder.', 1, '2019-05-21 03:22:51', '2019-05-21 03:22:51'),
(6, 'Nicht im Programm erwähnte Mahlzeiten, alkoholische Getränke. Sollten im Falle von Streiks, Naturkatastrophen oder Ähnlichem Programmänderungen notwendig werden, die zusätzliche Kosten verursachen, so sind diese Kosten ebenfalls nicht enthalten.', 1, '2019-05-21 03:23:05', '2019-05-21 03:23:05'),
(7, 'Inlandsflug', 1, '2019-06-05 04:15:59', '2019-06-05 04:15:59'),
(8, 'Reiserücktritt-, Reiseabbruch- und Reisekrankenversicherung.', 1, '2019-06-05 04:16:14', '2019-06-05 04:16:14'),
(9, 'Persönliche Ausgaben und Trinkgelder.', 1, '2019-06-05 04:16:30', '2019-06-05 04:16:30'),
(10, 'Nicht im Programm erwähnte, alkoholische Getränke.', 1, '2019-06-05 04:16:50', '2019-06-05 04:16:50'),
(11, 'Sollten im Falle von Streiks, Naturkatastrophen oder Ähnlichem Programmänderungen notwendig werden, die zusätzliche Kosten verursachen, so sind diese Kosten ebenfalls nicht enthalten.', 1, '2019-06-05 04:17:11', '2019-06-05 04:17:11'),
(12, 'Qualifizierter englischsprachiger Trekking-Guide', 1, '2019-06-05 04:17:28', '2019-06-05 04:17:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpais`
--

CREATE TABLE `tpais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `resumen` longtext,
  `descripcion` longtext,
  `imagen` varchar(255) DEFAULT NULL,
  `imagen_s` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `intro` longtext,
  `best_time` longtext,
  `top_tours` longtext,
  `things` longtext,
  `weather` longtext,
  `airports` longtext,
  `hotels` longtext,
  `restaurants` longtext,
  `payment` longtext,
  `festivities` longtext,
  `information` longtext,
  `places` longtext,
  `clima` longtext,
  `recomendaciones` longtext,
  `geografia` longtext,
  `donde_ir` longtext,
  `atracciones` longtext,
  `entretenimiento` longtext,
  `gastronomia` longtext,
  `fiestas` longtext,
  `historia` longtext,
  `estado` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tpais`
--

INSERT INTO `tpais` (`id`, `nombre`, `url`, `resumen`, `descripcion`, `imagen`, `imagen_s`, `created_at`, `updated_at`, `intro`, `best_time`, `top_tours`, `things`, `weather`, `airports`, `hotels`, `restaurants`, `payment`, `festivities`, `information`, `places`, `clima`, `recomendaciones`, `geografia`, `donde_ir`, `atracciones`, `entretenimiento`, `gastronomia`, `fiestas`, `historia`, `estado`) VALUES
(1, 'Perú', 'peru', NULL, '<p>Peru is undeniably the crown jewel of South American travel hotspots, and it offers an endless variety of exciting experiences. This magical place is well-known for its varied landscapes and rich cultural history, making it ideal for tourists of all interests.</p>\r\n<p>Fans of the great outdoors and wildlife have a plethora of options, from visits to the Amazon Rainforest to the deepest canyon in the world at Colca and Lake Titicaca. Oh, and don\\\'t forget the food; you\\\'re in for a real treat.</p>\r\n<p>When it comes to food, Peru is a shining star on the international stage. Lima is the culinary capital of South America, and visitors come from all over to indulge in the city\\\'s grand colonial architecture and tantalizing local, Spanish, African, and Asian-influenced fare.</p>', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272013161cusco2_1574272012.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/1574357091600valle_1574357088.jpg', '2022-03-02 21:39:40', '2024-02-25 16:01:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(2, 'Ecuador', 'ecuador', NULL, NULL, NULL, NULL, '2024-08-13 13:59:27', '2024-08-13 13:59:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaisesimagen`
--

CREATE TABLE `tpaisesimagen` (
  `id` int(11) NOT NULL,
  `nombre` longtext,
  `alt` varchar(250) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetes`
--

CREATE TABLE `tpaquetes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `codigo_f` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `precio_tours` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `altitud` varchar(100) DEFAULT NULL,
  `group_size` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `incluye` text,
  `noincluye` text,
  `opcional` longtext,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `offers_home` int(1) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estadoslider` int(1) DEFAULT NULL,
  `is_paquete` int(11) DEFAULT NULL,
  `is_tours` int(11) DEFAULT NULL,
  `is_p_t` int(1) DEFAULT NULL,
  `maps` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpaquetes`
--

INSERT INTO `tpaquetes` (`id`, `codigo`, `codigo_f`, `titulo`, `precio_tours`, `url`, `duracion`, `altitud`, `group_size`, `descripcion`, `incluye`, `noincluye`, `opcional`, `imagen`, `fecha`, `estado`, `offers_home`, `descuento`, `estadoslider`, `is_paquete`, `is_tours`, `is_p_t`, `maps`, `created_at`, `updated_at`, `mapa`) VALUES
(182, 'MAPICO001', NULL, 'Machu Picchu and Beyond', 0, 'machu-picchu-and-beyond', 8, NULL, NULL, NULL, '<ul>\r\n<li>Private transportation for transfers.</li>\r\n<li>Private services</li>\r\n<li>Professional and local guides.</li>\r\n<li>Meals mentioned on your itinerary.</li>\r\n<li>Entrance tickets to the tourist attractions.</li>\r\n<li>24/7 Support.</li>\r\n<li>Bus, boat, and train tickets.</li>\r\n</ul>', '<ul>\r\n<li>International and Domestic flights.</li>\r\n<li>Travel Insurance (Recommended).</li>\r\n<li>Visas (Check&nbsp;VisaHQ&nbsp;to see if you need a Visa for your trip).</li>\r\n<li>Tips (Not mandatory).</li>\r\n<li>Meals not mentioned in your program.</li>\r\n<li>Additional hotel services not mentioned above.</li>\r\n</ul>', NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/luxury mapi_1725902859.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-09 17:26:10', '2024-11-27 14:34:55', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/Machu-Picchu-and-Beyond_1732718094.webp'),
(183, 'MAPICO002', NULL, 'Luxury Inca Path', 0, 'luxury-inca-path', 10, NULL, NULL, NULL, '<ul>\r\n<li>Private transportation for transfers.</li>\r\n<li>All accommodations on the destinations mentioned.</li>\r\n<li>Private services according to itinerary.</li>\r\n<li>Professional and local guides.</li>\r\n<li>Meals mentioned on your itinerary.</li>\r\n<li>Entrance tickets to the tourist attractions.</li>\r\n<li>24/7 Support.</li>\r\n<li>Bus, boat, and train tickets.</li>\r\n</ul>', '<ul>\r\n<li>International and Domestic flights.</li>\r\n<li>Travel Insurance (Recommended).</li>\r\n<li>Visas (Check&nbsp;VisaHQ&nbsp;to see if you need a Visa for your trip).</li>\r\n<li>Tips (Not mandatory).</li>\r\n<li>Meals not mentioned in your program.</li>\r\n<li>Additional hotel services not mentioned above.</li>\r\n</ul>', NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/luxury-inca_1729788138.jpg', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-09 17:36:07', '2024-11-27 14:40:33', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/luxury-inca-path_1732718433.webp'),
(184, 'MAPICO003', NULL, 'Machu Picchu Classic Deluxe', 0, 'machu-picchu-classic-deluxe', 6, NULL, NULL, NULL, '<ul>\r\n<li>Private transportation for transfers.</li>\r\n<li>All accommodations on the destinations mentioned.</li>\r\n<li>Private services according to itinerary.</li>\r\n<li>Professional and local guides.</li>\r\n<li>Meals mentioned on your itinerary.</li>\r\n<li>Entrance tickets to the tourist attractions.</li>\r\n<li>24/7 Support.</li>\r\n<li>Bus, boat, and train tickets.</li>\r\n</ul>', '<ul>\r\n<li>International and Domestic flights.</li>\r\n<li>Travel Insurance (Recommended).</li>\r\n<li>Visas (Check&nbsp;VisaHQ&nbsp;to see if you need a Visa for your trip).</li>\r\n<li>Tips (Not mandatory).</li>\r\n<li>Meals not mentioned in your program.</li>\r\n<li>Additional hotel services not mentioned above.</li>\r\n</ul>', NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/DELUXE MAPI_1726258374.jpg', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-13 20:09:07', '2024-11-27 14:29:25', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/Machu-Picchu-Classic-Deluxe_1732717764.webp'),
(185, 'MAPICO004', NULL, 'Sacred Valley and Machu Picchu Ultimate Program', 0, 'ultimate-sacred-valley-and-machu-picchu', 7, NULL, NULL, NULL, '<ul>\r\n<li>Private transportation for transfers.</li>\r\n<li>All accommodations on the destinations mentioned.</li>\r\n<li>Private services according to itinerary.</li>\r\n<li>Professional and local guides.</li>\r\n<li>Meals mentioned on your itinerary.</li>\r\n<li>Entrance tickets to the tourist attractions.</li>\r\n<li>24/7 Support.</li>\r\n<li>Bus, boat, and train tickets.</li>\r\n</ul>', '<ul>\r\n<li>International and Domestic flights.</li>\r\n<li>Travel Insurance (Recommended).</li>\r\n<li>Visas (Check&nbsp;VisaHQ&nbsp;to see if you need a Visa for your trip).</li>\r\n<li>Tips (Not mandatory).</li>\r\n<li>Meals not mentioned in your program.</li>\r\n<li>Additional hotel services not mentioned above.</li>\r\n</ul>', NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/mapi otro_1726259118.jpg', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-13 20:25:24', '2024-11-27 14:32:24', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/Sacred-Valley-and-Machu-Picchu-Ultimate-Program_1732717943.webp'),
(186, 'MAPICO005', NULL, 'Luxury trip to Machu Picchu and Amazon Cruise in the Amazon', 0, 'luxury-machu-picchu-and-amazon-cruise', 9, NULL, NULL, NULL, '<ul>\r\n<li>Private transportation for transfers.</li>\r\n<li>All accommodations on the destinations mentioned.</li>\r\n<li>Private services according to itinerary.</li>\r\n<li>Professional and local guides.</li>\r\n<li>Meals mentioned on your itinerary.</li>\r\n<li>Entrance tickets to the tourist attractions.</li>\r\n<li>24/7 Support.</li>\r\n<li>Bus, boat, and train tickets.</li>\r\n</ul>', '<ul>\r\n<li>International and Domestic flights.</li>\r\n<li>Travel Insurance (Recommended).</li>\r\n<li>Visas (Check&nbsp;VisaHQ&nbsp;to see if you need a Visa for your trip).</li>\r\n<li>Tips (Not mandatory).</li>\r\n<li>Meals not mentioned in your program.</li>\r\n<li>Additional hotel services not mentioned above.</li>\r\n</ul>', NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/ZAFIRO-Rex-Relation-Redefined_1726259511.jpg', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-13 20:34:54', '2024-11-27 14:37:15', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/Luxury-trip-to-Machu-Picchu-and-Amazon-Cruise-in-the-Amazon_1732718234.webp'),
(187, 'MAPILUX06', NULL, 'Ultimate Journey through Peru', 0, 'ultimate-journey-through-peru', 11, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/huayna-picchu_1727727447.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-30 20:16:41', '2024-11-27 14:42:13', 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/map/Ultimate-Journey-through-Peru_1732718532.webp'),
(188, 'MAPILUX07', NULL, 'Romantic journey in Peru', 0, 'romantic-journey-peru', 12, NULL, NULL, NULL, NULL, NULL, NULL, 'https://s3.us-west-1.amazonaws.com/machupicchu-company/package/playas peru_1727727678.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-30 20:21:23', '2024-09-30 20:21:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetescategoria`
--

CREATE TABLE `tpaquetescategoria` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpaquetescategoria`
--

INSERT INTO `tpaquetescategoria` (`id`, `idpaquetes`, `idcategoria`, `created_at`, `updated_at`) VALUES
(1026, 184, 31, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(1027, 185, 31, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(1028, 182, 31, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(1029, 186, 31, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(1030, 183, 31, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(1035, 188, 31, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(1036, 188, 32, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(1037, 187, 31, '2024-11-27 14:49:26', '2024-11-27 14:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesdestinos`
--

CREATE TABLE `tpaquetesdestinos` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `iddestinos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpaquetesdestinos`
--

INSERT INTO `tpaquetesdestinos` (`id`, `idpaquetes`, `iddestinos`, `created_at`, `updated_at`) VALUES
(2284, 184, 1, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(2285, 184, 2, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(2286, 184, 3, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(2287, 184, 4, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(2288, 185, 1, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(2289, 185, 2, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(2290, 185, 3, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(2291, 185, 4, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(2292, 182, 1, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(2293, 182, 2, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(2294, 182, 3, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(2295, 182, 4, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(2296, 186, 1, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(2297, 186, 2, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(2298, 186, 3, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(2299, 183, 1, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(2300, 183, 2, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(2301, 183, 3, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(2302, 183, 4, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(2303, 183, 6, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(2304, 188, 1, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(2305, 188, 2, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(2306, 188, 3, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(2307, 188, 4, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(2308, 188, 7, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(2309, 187, 1, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(2310, 187, 2, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(2311, 187, 3, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(2312, 187, 4, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(2313, 187, 6, '2024-11-27 14:49:26', '2024-11-27 14:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesdificultad`
--

CREATE TABLE `tpaquetesdificultad` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `iddificultad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpaquetesdificultad`
--

INSERT INTO `tpaquetesdificultad` (`id`, `idpaquetes`, `iddificultad`, `created_at`, `updated_at`) VALUES
(451, 184, 6, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(452, 185, 6, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(453, 182, 6, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(454, 186, 6, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(455, 183, 6, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(459, 188, 6, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(460, 187, 6, '2024-11-27 14:49:26', '2024-11-27 14:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesimagen`
--

CREATE TABLE `tpaquetesimagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesincluye`
--

CREATE TABLE `tpaquetesincluye` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `idincluye` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesitinerario`
--

CREATE TABLE `tpaquetesitinerario` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `iditinerario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpaquetesitinerario`
--

INSERT INTO `tpaquetesitinerario` (`id`, `idpaquetes`, `iditinerario`, `created_at`, `updated_at`) VALUES
(6179, 184, 465, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6180, 184, 474, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6181, 184, 471, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6182, 184, 480, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6183, 184, 481, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6184, 184, 472, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(6185, 185, 465, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6186, 185, 467, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6187, 185, 482, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6188, 185, 483, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6189, 185, 470, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6190, 185, 471, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6191, 185, 472, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(6192, 182, 465, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6193, 182, 466, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6194, 182, 467, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6195, 182, 468, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6196, 182, 469, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6197, 182, 470, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6198, 182, 471, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6199, 182, 472, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(6200, 186, 484, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6201, 186, 471, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6202, 186, 480, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6203, 186, 481, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6204, 186, 485, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6205, 186, 486, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6206, 186, 487, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6207, 186, 488, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6208, 186, 489, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(6209, 183, 465, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6210, 183, 473, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6211, 183, 474, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6212, 183, 471, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6213, 183, 475, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6214, 183, 476, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6215, 183, 470, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6216, 183, 477, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6217, 183, 478, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6218, 183, 479, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(6253, 188, 465, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6254, 188, 474, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6255, 188, 468, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6256, 188, 471, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6257, 188, 483, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6258, 188, 470, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6259, 188, 485, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6260, 188, 486, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6261, 188, 487, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6262, 188, 488, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6263, 188, 489, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6264, 188, 489, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(6265, 187, 465, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6266, 187, 466, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6267, 187, 474, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6268, 187, 471, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6269, 187, 475, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6270, 187, 483, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6271, 187, 470, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6272, 187, 477, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6273, 187, 468, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6274, 187, 478, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(6275, 187, 479, '2024-11-27 14:49:26', '2024-11-27 14:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesnoincluye`
--

CREATE TABLE `tpaquetesnoincluye` (
  `id` int(11) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `idnoincluye` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaquetesvuelos`
--

CREATE TABLE `tpaquetesvuelos` (
  `id` int(11) NOT NULL,
  `idvuelos` int(11) DEFAULT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpasajero`
--

CREATE TABLE `tpasajero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pasajeros` int(2) DEFAULT NULL,
  `id_paquete` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpasajero`
--

INSERT INTO `tpasajero` (`id`, `nombre`, `email`, `fecha`, `pasajeros`, `id_paquete`, `id_usuario`, `created_at`, `updated_at`) VALUES
(5, 'hidalgo', 'hidalgochponce@gmail.com', '2027-05-12', 2, 52, 1, '2020-01-20 17:02:24', '2020-01-20 17:02:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal`
--

CREATE TABLE `tpersonal` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpersonal`
--

INSERT INTO `tpersonal` (`id`, `nombres`, `apellidos`, `direccion`, `email`, `telefono`, `area`, `estado`) VALUES
(1, 'SARA', 'SANTISTEBAN', 'URB. LOS NOGALES  WANCHAQ ', 'sara@gmail.com', '984526987', 'ventas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprecioaeropuerto`
--

CREATE TABLE `tprecioaeropuerto` (
  `id` int(11) NOT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idaeropuerto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tprecioaeropuerto`
--

INSERT INTO `tprecioaeropuerto` (`id`, `precio`, `fecha`, `idaeropuerto`) VALUES
(17, '1499', '2019-01-05', 1),
(18, '1499', '2019-01-12', 1),
(19, '1499', '2019-01-19', 1),
(20, '1499', '2019-01-26', 1),
(21, '1499', '2019-02-02', 1),
(22, '1499', '2019-02-05', 1),
(23, '1499', '2019-02-13', 1),
(24, '1499', '2019-02-20', 1),
(25, '1499', '2019-03-02', 1),
(26, '1499', '2019-03-09', 1),
(27, '1499', '2019-03-16', 1),
(28, '1499', '2019-03-23', 1),
(29, '1499', '2019-04-06', 1),
(30, '1499', '2019-04-13', 1),
(31, '1499', '2019-04-20', 1),
(32, '1499', '2019-04-27', 1),
(33, '1499', '2019-05-05', 1),
(34, '1499', '2019-05-12', 1),
(35, '1499', '2019-05-19', 1),
(36, '1499', '2019-05-26', 1),
(37, '1499', '2019-06-02', 1),
(38, '1499', '2019-06-09', 1),
(39, '1499', '2019-06-16', 1),
(40, '1499', '2019-06-23', 1),
(57, '1799', '2019-01-05', 2),
(58, '1799', '2019-01-12', 2),
(59, '1799', '2019-01-19', 2),
(60, '1799', '2019-01-26', 2),
(61, '1499', '2019-02-02', 2),
(62, '1499', '2019-02-05', 2),
(63, '1499', '2019-02-13', 2),
(64, '1499', '2019-02-20', 2),
(65, '1599', '2019-03-02', 2),
(66, '1599', '2019-03-09', 2),
(67, '1599', '2019-03-16', 2),
(68, '1599', '2019-03-23', 2),
(69, '1699', '2019-04-06', 2),
(70, '1699', '2019-04-13', 2),
(71, '1699', '2019-04-20', 2),
(72, '1699', '2019-04-27', 2),
(73, '1799', '2019-05-05', 2),
(74, '1799', '2019-05-12', 2),
(75, '1799', '2019-05-19', 2),
(76, '1799', '2019-05-26', 2),
(77, '1699', '2019-06-02', 2),
(78, '1699', '2019-06-09', 2),
(79, '1699', '2019-06-16', 2),
(80, '1699', '2019-06-23', 2),
(97, '1599', '2019-01-05', 3),
(98, '1599', '2019-01-12', 3),
(99, '1599', '2019-01-19', 3),
(100, '1599', '2019-01-26', 3),
(101, '1499', '2019-02-02', 3),
(102, '1499', '2019-02-05', 3),
(103, '1499', '2019-02-13', 3),
(104, '1499', '2019-02-20', 3),
(105, '1599', '2019-03-02', 3),
(106, '1599', '2019-03-09', 3),
(107, '1599', '2019-03-16', 3),
(108, '1599', '2019-03-23', 3),
(109, '1699', '2019-04-06', 3),
(110, '1699', '2019-04-13', 3),
(111, '1699', '2019-04-20', 3),
(112, '1699', '2019-04-27', 3),
(113, '1799', '2019-05-05', 3),
(114, '1799', '2019-05-12', 3),
(115, '1799', '2019-05-19', 3),
(116, '1799', '2019-05-26', 3),
(117, '1699', '2019-06-02', 3),
(118, '1699', '2019-06-09', 3),
(119, '1699', '2019-06-16', 3),
(120, '1699', '2019-06-23', 3),
(137, '1599', '2019-01-05', 4),
(138, '1599', '2019-01-12', 4),
(139, '1599', '2019-01-19', 4),
(140, '1599', '2019-01-26', 4),
(141, '1499', '2019-02-02', 4),
(142, '1499', '2019-02-05', 4),
(143, '1499', '2019-02-13', 4),
(144, '1499', '2019-02-20', 4),
(145, '1599', '2019-03-02', 4),
(146, '1599', '2019-03-09', 4),
(147, '1599', '2019-03-16', 4),
(148, '1599', '2019-03-23', 4),
(149, '1699', '2019-04-06', 4),
(150, '1699', '2019-04-13', 4),
(151, '1699', '2019-04-20', 4),
(152, '1699', '2019-04-27', 4),
(153, '1799', '2019-05-05', 4),
(154, '1799', '2019-05-12', 4),
(155, '1799', '2019-05-19', 4),
(156, '1799', '2019-05-26', 4),
(157, '1699', '2019-06-02', 4),
(158, '1699', '2019-06-09', 4),
(159, '1699', '2019-06-16', 4),
(160, '1699', '2019-06-23', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpreciopaquetes`
--

CREATE TABLE `tpreciopaquetes` (
  `id` int(11) NOT NULL,
  `estrellas` int(1) DEFAULT NULL,
  `precio_s` int(5) DEFAULT NULL,
  `precio_d` int(5) DEFAULT NULL,
  `precio_t` int(5) DEFAULT NULL,
  `codigo_s` varchar(255) DEFAULT NULL,
  `codigo_d` varchar(255) DEFAULT NULL,
  `codigo_t` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpreciopaquetes`
--

INSERT INTO `tpreciopaquetes` (`id`, `estrellas`, `precio_s`, `precio_d`, `precio_t`, `codigo_s`, `codigo_d`, `codigo_t`, `estado`, `idpaquetes`, `created_at`, `updated_at`) VALUES
(4493, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 184, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(4494, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 184, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(4495, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 184, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(4496, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 184, '2024-09-25 16:12:37', '2024-09-25 16:12:37'),
(4497, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 185, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(4498, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 185, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(4499, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 185, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(4500, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 185, '2024-09-25 16:13:09', '2024-09-25 16:13:09'),
(4501, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 182, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(4502, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 182, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(4503, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 182, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(4504, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 182, '2024-09-25 16:13:36', '2024-09-25 16:13:36'),
(4505, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 186, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(4506, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 186, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(4507, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 186, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(4508, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 186, '2024-09-25 16:14:06', '2024-09-25 16:14:06'),
(4509, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 183, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(4510, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 183, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(4511, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 183, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(4512, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 183, '2024-09-25 16:15:00', '2024-09-25 16:15:00'),
(4525, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 188, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(4526, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 188, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(4527, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 188, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(4528, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 188, '2024-11-27 14:48:06', '2024-11-27 14:48:06'),
(4529, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 187, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(4530, 3, 0, 0, 0, NULL, NULL, NULL, NULL, 187, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(4531, 4, 0, 0, 0, NULL, NULL, NULL, NULL, 187, '2024-11-27 14:49:26', '2024-11-27 14:49:26'),
(4532, 5, 0, 0, 0, NULL, NULL, NULL, NULL, 187, '2024-11-27 14:49:26', '2024-11-27 14:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tseo`
--

CREATE TABLE `tseo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `descripcion` varchar(160) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `og_tipo` varchar(100) DEFAULT NULL,
  `keywords` longtext,
  `microdata` longtext,
  `localizacion` varchar(100) DEFAULT NULL,
  `nombre_sitio` varchar(100) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `imagen_width` int(6) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `id_t` int(11) DEFAULT NULL,
  `imagen_height` int(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tseo`
--

INSERT INTO `tseo` (`id`, `titulo`, `descripcion`, `url`, `og_tipo`, `keywords`, `microdata`, `localizacion`, `nombre_sitio`, `imagen`, `imagen_width`, `estado`, `id_t`, `imagen_height`, `updated_at`, `created_at`) VALUES
(65, 'Ecuador on the Sky', NULL, NULL, NULL, 'Ecuador,visit Ecuador,Ecuador tours, sky in Ecuador,Cloudest forest,Otavalo Market,Quito', NULL, NULL, NULL, NULL, NULL, 1, 171, NULL, '2024-08-29 11:31:08', '2024-08-29 11:31:08'),
(66, 'Luxury trip to Galapagos Islands', NULL, NULL, NULL, 'Ecuador,visit Ecuador,Ecuador tours,,Galapagos Islands,Quito,Luxury tours in Ecuador,Ecuador Luxury', NULL, NULL, NULL, NULL, NULL, 1, 170, NULL, '2024-08-29 11:33:02', '2024-08-29 11:32:41'),
(67, 'Quito Colonial and Galapagos Cruise', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands,Galapagos Cruise', NULL, NULL, NULL, NULL, NULL, 1, 169, NULL, '2024-08-29 12:27:34', '2024-08-29 12:14:25'),
(68, 'Ecuador and the Amazing Galapagos Islands', NULL, NULL, NULL, 'Ecuador,Galapagos Islands,visit Ecuador,Ecuador tours,tours at Galapagos Islands,visit Galapagos', NULL, NULL, NULL, NULL, NULL, 1, 174, NULL, '2024-08-29 12:26:41', '2024-08-29 12:26:41'),
(69, 'Ecuador Exploration', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Ecuador Amazon,Amazon Ecuador', NULL, NULL, NULL, NULL, NULL, 1, 166, NULL, '2024-08-29 12:28:36', '2024-08-29 12:28:36'),
(70, 'Ecuador Highlights', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands,Otavalo Market,Cotopaxi,Riobamba,Guayaquil', NULL, NULL, NULL, NULL, NULL, 1, 167, NULL, '2024-08-29 12:29:33', '2024-08-29 12:29:33'),
(71, 'Galapagos Family tour', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands,family tour in Ecuador,Ecuador family', NULL, NULL, NULL, NULL, NULL, 1, 172, NULL, '2024-08-29 12:30:18', '2024-08-29 12:30:18'),
(72, 'Taylor-made Ecuador and Galapagos', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands,Taylor-made tour', NULL, NULL, NULL, NULL, NULL, 1, 165, NULL, '2024-08-29 12:31:11', '2024-08-29 12:31:11'),
(73, 'Ecuador Ultimate tour', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands', NULL, NULL, NULL, NULL, NULL, 1, 168, NULL, '2024-08-29 12:37:02', '2024-08-29 12:37:02'),
(74, 'Complete Ecuador and Galapagos Program', NULL, NULL, NULL, 'Ecuador,tours in Ecuador,visit Ecuador,Quito,tours in Galapagos,Galapagos Islands', NULL, NULL, NULL, NULL, NULL, 1, 173, NULL, '2024-08-29 12:40:29', '2024-08-29 12:40:29'),
(75, 'Peruvian Andes and Galapagos Cruise', NULL, NULL, NULL, 'Lima,visit Lima,Machu Picchu,tours in Machu Picchu,Cusco,Cusco tours,Ecuador,Quito,Otavalo Market,Galapagos Islands,Galapagos Cruise', NULL, NULL, NULL, NULL, NULL, 1, 175, NULL, '2024-08-29 12:50:20', '2024-08-29 12:50:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tteam`
--

CREATE TABLE `tteam` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `frase` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `imagen_perfil` varchar(200) DEFAULT NULL,
  `imagen_portada` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tteam`
--

INSERT INTO `tteam` (`id`, `nombre`, `actividad`, `cargo`, `frase`, `email`, `imagen_perfil`, `imagen_portada`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Jugar Fútbol', 'Travel Advisor', '', 'daniel@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/daniel-mx.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574271697505AV922-1_1574271696.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(3, 'Freddy Silva', 'Programar', 'Programador Full Stack', '', 'freddy@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/freddy.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272277110ica_1574272276.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(4, 'Hidalgo Ponce', 'Juegos de Computadora', 'Jefe de Proyectos', '', 'hidalgo@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/hidalgo.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272361816AV600-1_1574272361.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(5, 'Franklin Perez', 'Jugar Fútbol', 'Guia Senior', '', 'franklin@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/franklin.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272400065AV1300-1_1574272400.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(6, 'Joana Sequeiros', 'Viajar', 'Operaciones', '', 'yovana@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/yovana.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272629328AVX102-1_1574272629.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(7, 'Marina Melo', 'Viajar', 'Contabilidad', '', 'marina@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/marina.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272727139montana7colores_1574272726.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(8, 'Jackeline', 'Ver Peliculas', 'Operaciones', '', 'jacky@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/jacky.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272741697AV1204-2_1574272740.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(9, 'Katy', 'Caminar', 'Guia', '', 'katy@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/katy.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272773751AV600-2_1574272772.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(10, 'Doriam Perez', 'Tocar el Violín', 'Jefe de Operaciones', '', 'doriam@gotoperu.com.mx', 'https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/doriam.jpg', 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574271697505AV922-1_1574271696.jpg', '2019-12-20 16:07:16', '2019-12-20 16:07:17'),
(11, 'Americo Diaz', 'Viajar', 'Travel Guide', NULL, 'americo@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272741697AV1204-2_1574272740.jpg', NULL, NULL),
(12, 'Joel Guzman', 'Viajar', 'Senior Travel Guide', NULL, 'joel@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272277110ica_1574272276.jpg', NULL, NULL),
(13, 'Martin Catano', 'Cocinar', 'General Manager', NULL, 'martin@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272277110ica_1574272276.jpg', NULL, NULL),
(15, 'Marco Gonzales', 'Viajar', 'Driver', NULL, 'marco@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272013161cusco2_1574272012.jpg', NULL, NULL),
(16, 'Ivan Ochoa', 'Viajar', 'Lima Representative', NULL, 'ivan@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574271697505AV922-1_1574271696.jpg', NULL, NULL),
(17, 'Carmelo M', 'Viajar', 'Operations', NULL, 'carmelo@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574272629328AVX102-1_1574272629.jpg', NULL, NULL),
(18, 'Edward Zambrano', 'Fotografia', 'Marketing', NULL, 'edward@gotoperu.com', NULL, 'http://gotoperu-mx.s3-us-west-1.amazonaws.com/destinations/slider/1574271697505AV922-1_1574271696.jpg', NULL, NULL),
(19, 'Karina Machaca', 'Accounting', 'Accounting', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/karina.jpg', NULL, NULL, NULL),
(20, 'Saira Gutierrez', 'Travel Advisor', 'Travel Advisor', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/saira.jpg', NULL, NULL, NULL),
(21, 'Denner Soncco', 'Operations', 'Operations', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/denner.jpg', NULL, NULL, NULL),
(22, 'Pabel Paucar', 'Travel Advisor', 'Travel Advisor', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/pabel.jpg', NULL, NULL, NULL),
(23, 'Fiorella Bejar', 'Travel Advisor', 'Travel Advisor', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/maja.jpg', NULL, NULL, NULL),
(24, 'Gianli Palomino', 'Reservations', 'Reservations\r\n', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/gianli.jpg', NULL, NULL, NULL),
(25, 'Crisdel Gamarra', NULL, 'Coordinator', NULL, NULL, 'https://gotoperu-com.s3.us-west-1.amazonaws.com/team/crisdel.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttestimonios`
--

CREATE TABLE `ttestimonios` (
  `id` int(11) NOT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `contenido` text,
  `fecha` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttours`
--

CREATE TABLE `ttours` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `incluye` longtext,
  `noincluye` longtext,
  `opcional` longtext,
  `horario` varchar(30) DEFAULT NULL,
  `duracion` varchar(30) DEFAULT NULL,
  `precio_g` decimal(8,2) DEFAULT NULL,
  `precio_p` decimal(8,2) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(50) DEFAULT NULL,
  `tipousuario` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`id`, `nombre`, `apellidos`, `dni`, `email`, `direccion`, `telefono`, `usuario`, `contrasenia`, `tipousuario`, `estado`) VALUES
(1, 'hidalgo', 'chata', 0, '', '', '', 'hida', '123', 'administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvideotestimonio`
--

CREATE TABLE `tvideotestimonio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `imagen` longtext,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tvideotestimonio`
--

INSERT INTO `tvideotestimonio` (`id`, `titulo`, `codigo`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'x2', 'https://youtu.be/X66EvFu1pHA', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435279827testimonio-2_1595435283.jpg', NULL, NULL, '2020-07-22 16:28:04'),
(3, NULL, 'https://youtu.be/8-EAxytD7Z8', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435346651testimonio-3_1595435349.jpg', NULL, NULL, '2020-07-22 16:29:10'),
(4, NULL, 'https://youtu.be/qNJlLHI0Vd0', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435363602testimonio-4_1595435365.jpg', NULL, NULL, '2020-07-22 16:29:26'),
(5, 'Gary', 'https://youtu.be/iWqyeyUVruE', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435369798testimonio-5_1595435371.jpg', NULL, NULL, '2020-07-22 16:32:43'),
(6, NULL, 'https://youtu.be/RrZ-Pl6J41g', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435375196testimonio-6_1595435376.jpg', NULL, NULL, '2020-07-22 16:29:37'),
(7, NULL, 'https://youtu.be/RrZ-Pl6J41g', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435380868testimonio-7_1595435382.jpg', NULL, NULL, '2020-07-22 16:29:43'),
(8, 'x1', 'https://youtu.be/I0PUQOoboPE', 'http://gotoperu-20.s3-us-west-1.amazonaws.com/video-testimonio/1595435388111testimonio-8_1595435389.jpg', NULL, NULL, '2020-07-22 16:33:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvuelos`
--

CREATE TABLE `tvuelos` (
  `id` int(11) NOT NULL,
  `vuelo` varchar(100) DEFAULT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tvuelos`
--

INSERT INTO `tvuelos` (`id`, `vuelo`, `origen`, `destino`, `tipo`, `precio`) VALUES
(1, NULL, 'LIMA', 'CUSCO', 'IDA', '89.00'),
(2, NULL, 'CUSCO', 'LIMA', 'IDA', '89.00'),
(3, NULL, 'LIMA', 'JULIACA', 'IDA', '159.00'),
(4, NULL, 'JULIACA', 'LIMA', 'IDA', '159.00'),
(5, NULL, 'LIMA', 'AREQUIPA', 'IDA', '99.00'),
(6, NULL, 'AREQUIPA', 'LIMA', 'IDA', '99.00'),
(7, NULL, 'LIMA', 'PUERTO MALDONADO', 'IDA', '129.00'),
(8, NULL, 'PUERTO MALDONADO', 'LIMA', 'IDA', '129.00'),
(9, NULL, 'CUSCO', 'PUERTO MALDONADO', 'IDA', '89.00'),
(10, NULL, 'PUERTO MALDONADO', 'CUSCO', 'IDA', '89.00'),
(11, NULL, 'LIMA', 'TRUJILLO', 'IDA', '109.00'),
(12, NULL, 'TRUJILLO', 'LIMA', 'IDA', '109.00'),
(13, NULL, 'LA PAZ', 'UYUNI', 'IDA', '135.00'),
(14, NULL, 'UYUNI', 'LA PAZ', 'IDA', '135.00'),
(15, NULL, 'CHICLAYO', 'JULIACA', 'IDA', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'gotoecuador', 'admin@gotoperu.com', NULL, '$2y$10$fvvoKtWg/OHZg7ws7bpUKOQeaV3Cv8UyPmWvGdd1jMezQiaQe2NJC', NULL, NULL, 'W1pX4RGY9QzJJtvFP17OgDFdrjrh2zAYLTjPdjO9RrqbJwi294CBalnylhml', '2020-03-20 16:50:46', '2020-03-20 16:50:46'),
(2, 'Info', 'info@gmail.com', NULL, '$2y$10$Ci//fvoxSNlea6QSl/jeUOnDJPm5kYpEXdJJ9bT1fFX5qs6BlZcJK', NULL, NULL, NULL, '2021-08-06 16:01:35', '2021-08-06 16:01:35'),
(3, 'dono', 'dono@gmail.com', NULL, '$2y$10$hL/jJ3Sh/FRBNLTsKR6jreJursm0.8SyNU0P6OYv7XDNsJJ6oBzqy', NULL, NULL, NULL, '2023-01-28 15:34:29', '2023-01-28 15:35:10'),
(4, 'admin', 'admin@gotoecuador.com', NULL, '$2y$10$f9vJSBrtvwx5TaAIvHHH5uqF6Ev2WR1g27JnuO9nuekrPwQsWSxvS', NULL, NULL, '7Y2EqGEdyNbjetaMMDSkGbGHE0uD2VpEXKUo0gORDCNp0wQOZjERMm9GuERR', '2024-07-21 17:22:02', '2024-07-21 17:22:02'),
(5, 'Admin', 'admin@machupicchu.company', NULL, '$2y$10$oxS9.iNmrKtgpNaBerUviuBtU/a.5tx.jhm4tfrLY7IlEs954MyRe', NULL, NULL, 'FPHlvgaWuPwJF5GcnmeyTNk5GWyZZkGlAPBdkDovADhCmT8aShJgOSptW9HH', '2024-09-03 19:32:13', '2024-09-03 19:32:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagens_post_id_foreign` (`post_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `taeropuerto`
--
ALTER TABLE `taeropuerto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tcategoria`
--
ALTER TABLE `tcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tcomentario`
--
ALTER TABLE `tcomentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`);

--
-- Indices de la tabla `tdestinos`
--
ALTER TABLE `tdestinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tdestinosimagen`
--
ALTER TABLE `tdestinosimagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddestinos` (`iddestinos`);

--
-- Indices de la tabla `tdificultad`
--
ALTER TABLE `tdificultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `thotel`
--
ALTER TABLE `thotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `thoteldestino`
--
ALTER TABLE `thoteldestino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddestinos` (`iddestinos`),
  ADD KEY `idhotel` (`idhotel`);

--
-- Indices de la tabla `tincluye`
--
ALTER TABLE `tincluye`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tinquire`
--
ALTER TABLE `tinquire`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titinerario`
--
ALTER TABLE `titinerario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titinerarioimagen`
--
ALTER TABLE `titinerarioimagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iditinerario` (`iditinerario`);

--
-- Indices de la tabla `tnoincluye`
--
ALTER TABLE `tnoincluye`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpais`
--
ALTER TABLE `tpais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpaisesimagen`
--
ALTER TABLE `tpaisesimagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpaquetes`
--
ALTER TABLE `tpaquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpaquetescategoria`
--
ALTER TABLE `tpaquetescategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `tpaquetesdestinos`
--
ALTER TABLE `tpaquetesdestinos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `iddestinos` (`iddestinos`);

--
-- Indices de la tabla `tpaquetesdificultad`
--
ALTER TABLE `tpaquetesdificultad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `iddificultad` (`iddificultad`);

--
-- Indices de la tabla `tpaquetesimagen`
--
ALTER TABLE `tpaquetesimagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`);

--
-- Indices de la tabla `tpaquetesincluye`
--
ALTER TABLE `tpaquetesincluye`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `idincluye` (`idincluye`);

--
-- Indices de la tabla `tpaquetesitinerario`
--
ALTER TABLE `tpaquetesitinerario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `iditinerario` (`iditinerario`);

--
-- Indices de la tabla `tpaquetesnoincluye`
--
ALTER TABLE `tpaquetesnoincluye`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`),
  ADD KEY `idnoincluye` (`idnoincluye`);

--
-- Indices de la tabla `tpaquetesvuelos`
--
ALTER TABLE `tpaquetesvuelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idvuelos` (`idvuelos`),
  ADD KEY `idpaquetes` (`idpaquetes`);

--
-- Indices de la tabla `tpasajero`
--
ALTER TABLE `tpasajero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tprecioaeropuerto`
--
ALTER TABLE `tprecioaeropuerto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idaeropuerto` (`idaeropuerto`);

--
-- Indices de la tabla `tpreciopaquetes`
--
ALTER TABLE `tpreciopaquetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaquetes` (`idpaquetes`);

--
-- Indices de la tabla `tseo`
--
ALTER TABLE `tseo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tteam`
--
ALTER TABLE `tteam`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ttestimonios`
--
ALTER TABLE `ttestimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ttours`
--
ALTER TABLE `ttours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tvideotestimonio`
--
ALTER TABLE `tvideotestimonio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tvuelos`
--
ALTER TABLE `tvuelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `taeropuerto`
--
ALTER TABLE `taeropuerto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tcategoria`
--
ALTER TABLE `tcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tcomentario`
--
ALTER TABLE `tcomentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tdestinos`
--
ALTER TABLE `tdestinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tdestinosimagen`
--
ALTER TABLE `tdestinosimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `tdificultad`
--
ALTER TABLE `tdificultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `thotel`
--
ALTER TABLE `thotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `thoteldestino`
--
ALTER TABLE `thoteldestino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tincluye`
--
ALTER TABLE `tincluye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tinquire`
--
ALTER TABLE `tinquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de la tabla `titinerario`
--
ALTER TABLE `titinerario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT de la tabla `titinerarioimagen`
--
ALTER TABLE `titinerarioimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tnoincluye`
--
ALTER TABLE `tnoincluye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tpais`
--
ALTER TABLE `tpais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tpaisesimagen`
--
ALTER TABLE `tpaisesimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpaquetes`
--
ALTER TABLE `tpaquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT de la tabla `tpaquetescategoria`
--
ALTER TABLE `tpaquetescategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;

--
-- AUTO_INCREMENT de la tabla `tpaquetesdestinos`
--
ALTER TABLE `tpaquetesdestinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2314;

--
-- AUTO_INCREMENT de la tabla `tpaquetesdificultad`
--
ALTER TABLE `tpaquetesdificultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT de la tabla `tpaquetesimagen`
--
ALTER TABLE `tpaquetesimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpaquetesincluye`
--
ALTER TABLE `tpaquetesincluye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpaquetesitinerario`
--
ALTER TABLE `tpaquetesitinerario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6276;

--
-- AUTO_INCREMENT de la tabla `tpaquetesnoincluye`
--
ALTER TABLE `tpaquetesnoincluye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpaquetesvuelos`
--
ALTER TABLE `tpaquetesvuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpasajero`
--
ALTER TABLE `tpasajero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tprecioaeropuerto`
--
ALTER TABLE `tprecioaeropuerto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `tpreciopaquetes`
--
ALTER TABLE `tpreciopaquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4533;

--
-- AUTO_INCREMENT de la tabla `tseo`
--
ALTER TABLE `tseo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `tteam`
--
ALTER TABLE `tteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ttestimonios`
--
ALTER TABLE `ttestimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttours`
--
ALTER TABLE `ttours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tvideotestimonio`
--
ALTER TABLE `tvideotestimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tvuelos`
--
ALTER TABLE `tvuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tcomentario`
--
ALTER TABLE `tcomentario`
  ADD CONSTRAINT `tcomentario_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tdestinosimagen`
--
ALTER TABLE `tdestinosimagen`
  ADD CONSTRAINT `tdestinosimagen_ibfk_1` FOREIGN KEY (`iddestinos`) REFERENCES `tdestinos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `thoteldestino`
--
ALTER TABLE `thoteldestino`
  ADD CONSTRAINT `thoteldestino_ibfk_1` FOREIGN KEY (`iddestinos`) REFERENCES `tdestinos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thoteldestino_ibfk_2` FOREIGN KEY (`idhotel`) REFERENCES `thotel` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `titinerarioimagen`
--
ALTER TABLE `titinerarioimagen`
  ADD CONSTRAINT `titinerarioimagen_ibfk_1` FOREIGN KEY (`iditinerario`) REFERENCES `titinerario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetescategoria`
--
ALTER TABLE `tpaquetescategoria`
  ADD CONSTRAINT `tpaquetescategoria_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetescategoria_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `tcategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesdestinos`
--
ALTER TABLE `tpaquetesdestinos`
  ADD CONSTRAINT `tpaquetesdestinos_ibkf_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesdestinos_ibkf_2` FOREIGN KEY (`iddestinos`) REFERENCES `tdestinos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesdificultad`
--
ALTER TABLE `tpaquetesdificultad`
  ADD CONSTRAINT `tpaquetesdificultad_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesdificultad_ibfk_2` FOREIGN KEY (`iddificultad`) REFERENCES `tdificultad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesimagen`
--
ALTER TABLE `tpaquetesimagen`
  ADD CONSTRAINT `tpaquetesimagen_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesincluye`
--
ALTER TABLE `tpaquetesincluye`
  ADD CONSTRAINT `tpaquetesincluye_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesincluye_ibfk_2` FOREIGN KEY (`idincluye`) REFERENCES `tincluye` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesitinerario`
--
ALTER TABLE `tpaquetesitinerario`
  ADD CONSTRAINT `tpaquetesitinerario_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesitinerario_ibfk_2` FOREIGN KEY (`iditinerario`) REFERENCES `titinerario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesnoincluye`
--
ALTER TABLE `tpaquetesnoincluye`
  ADD CONSTRAINT `tpaquetesnoincluye_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesnoincluye_ibfk_2` FOREIGN KEY (`idnoincluye`) REFERENCES `tnoincluye` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpaquetesvuelos`
--
ALTER TABLE `tpaquetesvuelos`
  ADD CONSTRAINT `tpaquetesvuelos_ibfk_1` FOREIGN KEY (`idvuelos`) REFERENCES `tvuelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpaquetesvuelos_ibfk_2` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tprecioaeropuerto`
--
ALTER TABLE `tprecioaeropuerto`
  ADD CONSTRAINT `tprecioaeropuerto_ibfk_1` FOREIGN KEY (`idaeropuerto`) REFERENCES `taeropuerto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tpreciopaquetes`
--
ALTER TABLE `tpreciopaquetes`
  ADD CONSTRAINT `tpreciopaquetes_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `tpaquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
