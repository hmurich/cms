-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 03 2018 г., 22:00
-- Версия сервера: 5.5.23
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rux`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note_kz` longtext COLLATE utf8mb4_unicode_ci,
  `note_ru` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `created_at`, `updated_at`, `note_kz`, `note_ru`) VALUES
(1, '2018-03-01 21:59:42', '2018-03-01 21:59:42', '<p>\r\n\r\nОписание на казахском\r\n\r\n<br></p>', '<p>\r\n\r\nОписание на русском:<br></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_kz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coor_json` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `created_at`, `updated_at`, `address_ru`, `address_kz`, `phone`, `insta`, `mail_link`, `coor_json`) VALUES
(1, '2018-03-01 22:13:23', '2018-03-01 22:13:23', 'Адрес на русском', 'Адрес на казахском', 'Телефон', 'Isntagramm', 'Email', '{\"lng\":\"51.36406531\",\"lat\":\"71.08338031\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `mail_send`
--

CREATE TABLE `mail_send` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mail_send`
--

INSERT INTO `mail_send` (`id`, `title`, `note`, `to_email`, `to_name`, `created_at`, `updated_at`) VALUES
(1, 'Новое сообщение от сайта', '<p><strong>Имя:</strong>123123</p><p><strong>Телефон:</strong>+7(123) 123-1231</p>', 'test@mail.ru', 'Administrator', '2018-03-02 04:42:45', '2018-03-02 04:42:45'),
(2, 'Новое сообщение от сайта', '<p><strong>Имя:</strong>12313</p><p><strong>Телефон:</strong>+7(123) 123-1231</p>', 'test@mail.ru', 'Administrator', '2018-03-02 04:50:06', '2018-03-02 04:50:06');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_gen`
--

CREATE TABLE `model_gen` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sys_name` varchar(255) DEFAULT NULL,
  `has_rel` tinyint(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sys_model_name` varchar(255) NOT NULL,
  `is_many` tinyint(1) NOT NULL DEFAULT '1',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `is_crud` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_gen`
--

INSERT INTO `model_gen` (`id`, `name`, `sys_name`, `has_rel`, `created_at`, `updated_at`, `sys_model_name`, `is_many`, `sort_num`, `is_crud`) VALUES
(14, 'Портфолио', 'portfolio', 0, '2018-03-02 03:09:54', '2018-03-02 03:09:54', 'Portfolio', 1, 10, 1),
(15, 'О нас', 'about', 0, '2018-03-02 03:58:19', '2018-03-02 03:58:19', 'About', 0, 5, 1),
(16, 'Акции', 'sales', 0, '2018-03-02 04:07:21', '2018-03-02 04:07:21', 'Sale', 1, 20, 1),
(17, 'Контакты', 'contact', 0, '2018-03-02 04:12:26', '2018-03-02 04:12:26', 'Contact', 0, 50, 1),
(18, 'Сервисы', 'services', 0, '2018-03-02 04:24:12', '2018-03-02 04:24:12', 'Service', 1, 7, 1),
(19, 'Фото сервиса', 'service_img', 1, '2018-03-02 04:34:45', '2018-03-02 04:35:24', 'ServiceImg', 1, 40, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `model_gen_attr`
--

CREATE TABLE `model_gen_attr` (
  `id` int(11) NOT NULL,
  `model_id` int(11) DEFAULT NULL,
  `model_sys_name` varchar(255) NOT NULL,
  `attr_type_key` varchar(255) DEFAULT NULL,
  `attr_title` varchar(255) DEFAULT NULL,
  `attr_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `attr_rel_table` varchar(255) DEFAULT NULL,
  `attr_rel_title` varchar(255) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_gen_attr`
--

INSERT INTO `model_gen_attr` (`id`, `model_id`, `model_sys_name`, `attr_type_key`, `attr_title`, `attr_name`, `created_at`, `updated_at`, `attr_rel_table`, `attr_rel_title`, `sort_num`) VALUES
(34, 14, 'portfolio', 'string', 'Заголовок на русском', 'name_ru', '2018-03-02 03:11:02', '2018-03-02 03:11:02', NULL, NULL, 0),
(35, 14, 'portfolio', 'string', 'Заголовок на казахском', 'name_kz', '2018-03-02 03:11:02', '2018-03-02 03:11:02', NULL, NULL, 0),
(36, 14, 'portfolio', 'string', 'Ссылка на youtube', 'youtube_href', '2018-03-02 03:11:02', '2018-03-02 03:11:02', NULL, NULL, 0),
(39, 15, 'about', 'text', 'Описание на казахском', 'note_kz', '2018-03-02 03:59:22', '2018-03-02 03:59:22', NULL, NULL, 0),
(40, 15, 'about', 'text', 'Описание на русском', 'note_ru', '2018-03-02 03:59:22', '2018-03-02 03:59:22', NULL, NULL, 0),
(41, 16, 'sales', 'string', 'Заголовок на русском', 'name_ru', '2018-03-02 04:07:21', '2018-03-02 04:07:21', NULL, NULL, 0),
(42, 16, 'sales', 'string', 'Заголовок на казахском', 'name_kz', '2018-03-02 04:07:22', '2018-03-02 04:07:22', NULL, NULL, 0),
(43, 16, 'sales', 'img', 'Фото', 'img_path', '2018-03-02 04:07:22', '2018-03-02 04:07:22', NULL, NULL, 0),
(44, 16, 'sales', 'short_text', 'Описание на русском', 'note_ru', '2018-03-02 04:07:22', '2018-03-02 04:07:22', NULL, NULL, 0),
(45, 16, 'sales', 'short_text', 'Описание на казахском', 'note_kz', '2018-03-02 04:07:22', '2018-03-02 04:07:22', NULL, NULL, 0),
(46, 17, 'contact', 'string', 'Адрес на русском', 'address_ru', '2018-03-02 04:12:26', '2018-03-02 04:12:26', NULL, NULL, 0),
(47, 17, 'contact', 'string', 'Адрес на казахском', 'address_kz', '2018-03-02 04:12:26', '2018-03-02 04:12:26', NULL, NULL, 0),
(48, 17, 'contact', 'string', 'Телефон', 'phone', '2018-03-02 04:12:27', '2018-03-02 04:12:27', NULL, NULL, 0),
(49, 17, 'contact', 'string', 'Isntagramm', 'insta', '2018-03-02 04:12:27', '2018-03-02 04:12:27', NULL, NULL, 0),
(50, 17, 'contact', 'string', 'Email', 'mail_link', '2018-03-02 04:12:27', '2018-03-02 04:12:27', NULL, NULL, 0),
(51, 17, 'contact', 'coor', 'Координаты', 'coor_json', '2018-03-02 04:13:09', '2018-03-02 04:13:09', NULL, NULL, 0),
(52, 18, 'services', 'string', 'Заголовок на русском', 'name_ru', '2018-03-02 04:24:12', '2018-03-02 04:24:12', NULL, NULL, 0),
(53, 18, 'services', 'string', 'Заголовок на казахском', 'name_kz', '2018-03-02 04:24:12', '2018-03-02 04:24:12', NULL, NULL, 0),
(61, 18, 'services', 'short_text', 'Описание на русском', 'note_ru', '2018-03-02 04:27:00', '2018-03-02 04:27:00', NULL, NULL, 0),
(63, 18, 'services', 'short_text', 'Описание на казахском', 'note_kz', '2018-03-02 04:27:48', '2018-03-02 04:27:48', NULL, NULL, 0),
(64, 19, 'service_img', 'img', 'Фото', 'img_path', '2018-03-02 04:34:45', '2018-03-02 04:34:45', NULL, NULL, 0),
(65, 19, 'service_img', 'relation', 'Сервис', 'service_id', '2018-03-02 04:35:24', '2018-03-02 04:35:24', 'services', 'name_ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `portfolio`
--

INSERT INTO `portfolio` (`id`, `created_at`, `updated_at`, `name_ru`, `name_kz`, `youtube_href`) VALUES
(1, '2018-03-01 21:12:10', '2018-03-01 21:12:10', 'Вечер без галстука 2017', 'Вечер без галстука 2017 kz', 'nskVqXeeuJA');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_ru` text COLLATE utf8mb4_unicode_ci,
  `note_kz` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `created_at`, `updated_at`, `name_ru`, `name_kz`, `img_path`, `note_ru`, `note_kz`) VALUES
(1, '2018-03-01 22:07:47', '2018-03-01 22:07:47', 'Заголовок на русском', 'Заголовок на казахском', 'store/2018/03/02/15199636670.jpg', 'Описание на русском', 'Описание на казахском');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_ru` text COLLATE utf8mb4_unicode_ci,
  `note_kz` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `name_ru`, `name_kz`, `note_ru`, `note_kz`) VALUES
(1, '2018-03-01 22:29:07', '2018-03-01 22:29:07', 'Заголовок на русском', 'Заголовок на казахском', '<b>Перечень услуг:</b>\r\n\r\n                            <ul>\r\n                                <li>\r\n                                     Телевизионные проекты;\r\n                                </li>\r\n                                <li>Документальные фильмы;</li>\r\n                                <li>Корпоративные и презентационные фильмы;</li>\r\n                                <li>Анимационные фильмы;</li>\r\n                                <li>Рекламные ролики;</li>\r\n                                <li>Видео презентации для бизнеса;</li>\r\n                                <li>PR - фильмы;</li>\r\n                                <li>съёмка семинаров;</li>\r\n                                <li>Cоздание обучающих видеороликов;</li>\r\n                                <li>Выездная видеосъёмка;</li>\r\n                                <li>Видео для сайта;</li>\r\n                                <li>Социальные ролики;</li>\r\n                                <li>Видео монтаж;</li>\r\n                                <li>Свадебное видео;</li>\r\n                                <li>Love story;</li>\r\n                                <li>Торжественные мероприятия.</li>\r\n                            </ul>', '<b>Перечень услуг:</b>\r\n\r\n                            <ul>\r\n                                <li>\r\n                                     Телевизионные проекты;\r\n                                </li>\r\n                                <li>Документальные фильмы;</li>\r\n                                <li>Корпоративные и презентационные фильмы;</li>\r\n                                <li>Анимационные фильмы;</li>\r\n                                <li>Рекламные ролики;</li>\r\n                                <li>Видео презентации для бизнеса;</li>\r\n                                <li>PR - фильмы;</li>\r\n                                <li>съёмка семинаров;</li>\r\n                                <li>Cоздание обучающих видеороликов;</li>\r\n                                <li>Выездная видеосъёмка;</li>\r\n                                <li>Видео для сайта;</li>\r\n                                <li>Социальные ролики;</li>\r\n                                <li>Видео монтаж;</li>\r\n                                <li>Свадебное видео;</li>\r\n                                <li>Love story;</li>\r\n                                <li>Торжественные мероприятия.</li>\r\n                            </ul>'),
(2, '2018-03-01 22:29:19', '2018-03-01 22:29:19', 'Заголовок на русском 2', 'Заголовок на казахском 3', '<b>Перечень услуг:</b>\r\n\r\n                            <ul>\r\n                                <li>\r\n                                     Телевизионные проекты;\r\n                                </li>\r\n                                <li>Документальные фильмы;</li>\r\n                                <li>Корпоративные и презентационные фильмы;</li>\r\n                                <li>Анимационные фильмы;</li>\r\n                                <li>Рекламные ролики;</li>\r\n                                <li>Видео презентации для бизнеса;</li>\r\n                                <li>PR - фильмы;</li>\r\n                                <li>съёмка семинаров;</li>\r\n                                <li>Cоздание обучающих видеороликов;</li>\r\n                                <li>Выездная видеосъёмка;</li>\r\n                                <li>Видео для сайта;</li>\r\n                                <li>Социальные ролики;</li>\r\n                                <li>Видео монтаж;</li>\r\n                                <li>Свадебное видео;</li>\r\n                                <li>Love story;</li>\r\n                                <li>Торжественные мероприятия.</li>\r\n                            </ul>', '<b>Перечень услуг:</b>\r\n\r\n                            <ul>\r\n                                <li>\r\n                                     Телевизионные проекты;\r\n                                </li>\r\n                                <li>Документальные фильмы;</li>\r\n                                <li>Корпоративные и презентационные фильмы;</li>\r\n                                <li>Анимационные фильмы;</li>\r\n                                <li>Рекламные ролики;</li>\r\n                                <li>Видео презентации для бизнеса;</li>\r\n                                <li>PR - фильмы;</li>\r\n                                <li>съёмка семинаров;</li>\r\n                                <li>Cоздание обучающих видеороликов;</li>\r\n                                <li>Выездная видеосъёмка;</li>\r\n                                <li>Видео для сайта;</li>\r\n                                <li>Социальные ролики;</li>\r\n                                <li>Видео монтаж;</li>\r\n                                <li>Свадебное видео;</li>\r\n                                <li>Love story;</li>\r\n                                <li>Торжественные мероприятия.</li>\r\n                            </ul>'),
(3, '2018-03-01 22:36:11', '2018-03-01 22:36:11', 'Заголовок на русском: 3', 'Заголовок на казахском: 3', 'Описание на русском: 3', 'Описание на казахском: 4');

-- --------------------------------------------------------

--
-- Структура таблицы `service_img`
--

CREATE TABLE `service_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `service_img`
--

INSERT INTO `service_img` (`id`, `created_at`, `updated_at`, `img_path`, `service_id`) VALUES
(1, '2018-03-01 22:35:33', '2018-03-01 22:35:33', 'store/2018/03/02/15199653337.jpg', 1),
(2, '2018-03-01 22:35:43', '2018-03-01 22:35:43', 'store/2018/03/02/15199653430.jpg', 2),
(3, '2018-03-01 22:35:48', '2018-03-01 22:35:48', 'store/2018/03/02/15199653482.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `name`) VALUES
(1, 'social_insta', '1'),
(2, 'social_youtube', '2'),
(3, 'social_vk', '3'),
(4, 'phone', '4'),
(5, 'mobile_phone', '5'),
(6, 'skype', '6'),
(7, 'email', '7'),
(8, 'main_email', 'test@mail.ru'),
(9, 'num_1', '10'),
(10, 'num_2', '20'),
(11, 'num_3', '30'),
(12, 'num_4', '40');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_gen_attr_types`
--

CREATE TABLE `sys_gen_attr_types` (
  `id` int(11) NOT NULL,
  `sys_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_gen_attr_types`
--

INSERT INTO `sys_gen_attr_types` (`id`, `sys_name`, `name`) VALUES
(1, 'string', 'Строка'),
(2, 'int', 'Число'),
(3, 'bool', 'Логический'),
(4, 'short_text', 'Краткий текст'),
(5, 'text', 'Полный текст'),
(6, 'date', 'Дата'),
(7, 'file', 'Файл'),
(8, 'img', 'Изображение'),
(9, 'coor', 'Координата'),
(10, 'relation', 'Отношение');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) DEFAULT NULL,
  `syper_admin` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type_id`, `syper_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hmurich@mail.ru', '$2y$10$4Qst6G39T4k4LLEK/j7J2uh6W2/yxM4Q02uCnCTkxKblI94o3kKhi', 1, 1, 'aYmlyBRQqiAt60Y5d88oCLp12Umdku37l2a2DsFfBBxKGnTNiKwjTLTX5wDj', '2018-02-11 06:18:14', '2018-02-11 06:21:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mail_send`
--
ALTER TABLE `mail_send`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_gen`
--
ALTER TABLE `model_gen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `model_gen_attr`
--
ALTER TABLE `model_gen_attr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_model_gen_attr_model_id` (`model_id`);

--
-- Индексы таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_img`
--
ALTER TABLE `service_img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_site_settings_setting_id` (`key`);

--
-- Индексы таблицы `sys_gen_attr_types`
--
ALTER TABLE `sys_gen_attr_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `mail_send`
--
ALTER TABLE `mail_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `model_gen`
--
ALTER TABLE `model_gen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `model_gen_attr`
--
ALTER TABLE `model_gen_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `service_img`
--
ALTER TABLE `service_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `sys_gen_attr_types`
--
ALTER TABLE `sys_gen_attr_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_gen_attr`
--
ALTER TABLE `model_gen_attr`
  ADD CONSTRAINT `FK_model_gen_attr_model_id` FOREIGN KEY (`model_id`) REFERENCES `model_gen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
