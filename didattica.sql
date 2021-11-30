-- -------------------------------------------------------------
-- TablePlus 4.5.0(396)
--
-- https://tableplus.com/
--
-- Database: didattica
-- Generation Time: 2021-11-30 09:11:48.1150
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `pros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `personalsite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `votes_post_id_user_id_unique` (`post_id`,`user_id`),
  KEY `votes_user_id_foreign` (`user_id`),
  CONSTRAINT `votes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `style`) VALUES
(10, 'Valutazione', 'valutazione', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#88E0EF'),
(11, 'Collaborazione', 'collaborazione', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#FF9B6A'),
(12, 'Erogazione contenuti', 'erogazione-contenuti', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#E1578A'),
(13, 'Auto-Riflessione', 'auto-riflessione', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#700B97'),
(14, 'Comunicazione e discussione', 'comunicazione-e-discussione', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#4E9F3D'),
(15, 'Esercitazione', 'esercitazione', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#1597E5'),
(16, 'Organizzazione percorso didattico', 'organizzazione-percorso-didattico', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#FEE440'),
(17, 'Gestione personale', 'gestione-personale', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#77D970'),
(18, 'Simulazioni', 'simulazioni', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#916BBF'),
(19, 'Ricerca contenuti', 'ricerca-contenuti', '2021-10-29 09:34:19', '2021-10-29 09:34:19', '#FE8F8F');

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 'Davvero uno strumento utile!', '2021-11-26 10:37:48', '2021-11-26 10:37:48'),
(2, 9, 1, 'Molto interessante', '2021-11-26 13:04:28', '2021-11-26 13:04:28');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2021_08_30_062508_create_trix_rich_texts_table', 1),
(93, '2014_10_12_000000_create_users_table', 2),
(94, '2014_10_12_100000_create_password_resets_table', 2),
(95, '2019_08_19_000000_create_failed_jobs_table', 2),
(96, '2021_04_08_180818_create_posts_table', 2),
(97, '2021_04_16_154312_create_categories_table', 2),
(98, '2021_06_18_143226_create_comments_table', 2),
(99, '2021_09_08_102530_add_style_to_categories_table', 2),
(100, '2021_09_22_093419_add_pros_to_posts_table', 2),
(101, '2021_09_22_093429_add_cons_to_posts_table', 2),
(102, '2021_11_22_082417_create_votes_table', 2),
(103, '2021_11_26_095639_add_profession_to_users_table', 2),
(104, '2021_11_26_102542_add_role_to_users_table', 2),
(105, '2021_11_26_102632_add_socials_to_users_table', 2);

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `slug`, `title`, `thumbnail`, `excerpt`, `body`, `created_at`, `updated_at`, `published_at`, `pros`, `cons`) VALUES
(1, 1, 14, 'forum-moodle', 'Forum Moodle', 'thumbnails/niiEIbDg2y6Z3HvuqXzfARSWHFUgQmjWwqgYO3C1.png', 'Forum moodle', '<p><span style=\"text-align: left;\">Moodle è un ambiente informatico per la gestione di corsi, ispirato al costruzionismo, teoria secondo la quale ogni apprendimento sarebbe facilitato dalla produzione di oggetti tangibili.</span></p><p><span style=\"text-align: left;\"><br></span></p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/gtpVNjuM2dY\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">L\'idea costruzionista alla base di Moodle, dalla quale è nato lo statunitense \"No Child Left Behind Act of 2011\", è evidenziata da vari aspetti del suo sviluppo, come la possibilità di far inserire e commentare tabelle di dati o&nbsp;<a href=\"https://it.wikipedia.org/wiki/Wiki\" title=\"Wiki\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">wiki</a>&nbsp;agli studenti, o di consegnare e correggere compiti tramite internet. Per il docente è prevista la possibilità di visualizzare tutti i&nbsp;<a href=\"https://it.wikipedia.org/wiki/Log\" title=\"Log\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">log</a>&nbsp;degli studenti e di visualizzare quali non si sono collegati da più tempo.</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Moodle lascia comunque la possibilità all\'insegnante di gestire da sé il proprio corso, anche orientandolo al conseguimento dei risultati.</p><div><br></div><p><img src=\"https://i.ytimg.com/vi/O_1u0NRiZRA/maxresdefault.jpg\"></p><p><br></p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Utenti e sviluppatori di Moodle si incontrano periodicamente in convegni che chiamano \"<font color=\"#202122\"><span style=\"white-space: normal; background-color: rgb(255, 255, 255);\">MoodleMoot\"</span></font><a href=\"https://it.wikipedia.org/wiki/Moodle#cite_note-48\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1; unicode-bidi: isolate;\">[48]</a><span style=\"line-height: 1; unicode-bidi: isolate;\">, dove hanno la possibilità di condividere le proprie esperienze e dove vengono presentati alcuni sviluppi previsti. Tali convegni, che si svolgono regolarmente in tutto il mondo, sono generalmente ospitati da un\'università o da altre istituzioni.</span></p><div><br></div>', '2021-10-29 07:36:50', '2021-11-26 13:29:36', NULL, '<ul><li class=\"Checklist_list-item__1xL9g\" style=\"display: flex;\"><span style=\"vertical-align: inherit;\">Erogazione dell\'apprendimento guidato dal corso.</span></li><li class=\"Checklist_list-item__1xL9g\" style=\"display: flex;\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Reporting e stato sui progressi dello studente.</span></span></li><li class=\"Checklist_list-item__1xL9g\" style=\"display: flex;\"><span style=\"vertical-align: inherit;\">Supportare l\'apprendimento asincrono.</span></li></ul>', '<ul class=\"Checklist_icon-list__2-6vc\" data-slug=\"things-done-poorly\" style=\"margin-top: 16px; text-align: start;\"><li class=\"Checklist_list-item__1xL9g\" style=\"display: flex; margin-top: 4px;\"><span style=\"vertical-align: inherit;\">Alcune funzioni richiedono il drill down di più livelli.</span></li><li class=\"Checklist_list-item__1xL9g\" style=\"display: flex; margin-top: 4px;\"><span style=\"vertical-align: inherit;\">La creazione di report è di base e richiede molte regole di confronto manuali tra diversi gruppi di apprendimento.</span></li></ul>'),
(2, 1, 19, 'open-clipart', 'Open Clipart', 'thumbnails/cKB0Nux6X6hBDES27Fnop4vZeLSrxYARny8XgSvG.png', 'Clipart', '<p>descrizione</p><p>ddddddddddddddddddddddddddddddddd</p>', '2021-10-29 07:38:44', '2021-11-09 13:14:26', NULL, '<p>pro</p><p>- SSS</p><p>SSS</p><p>SS</p>', '<p>contro</p><p>- eeee</p><p>-eeee</p><p>-rrr</p><p><br></p>'),
(3, 1, 16, 'microsoft-teams', 'Microsoft Teams', 'thumbnails/ObU3E3Jwj3RKiScpHE5tc7a2LNnaUaks9lYAC5VA.png', 'MS Teams', '<p>descrizione</p>', '2021-10-29 07:40:09', '2021-10-29 07:40:09', NULL, '<p>pro</p>', '<p>contro</p>'),
(4, 1, 14, 'zoom', 'Zoom', 'thumbnails/V73GpWGQYB9ptFdZ0mFo11Ja9ADbQqICC5HTj1eQ.jpg', 'zoom', '<p>descrizione</p>', '2021-10-29 07:41:26', '2021-10-29 07:41:26', NULL, '<p>pro</p>', '<p>contro</p>'),
(5, 1, 10, 'google-forms', 'Google Forms', 'thumbnails/Ptbr4YeVRY4C3nFvUvl7mjV98goeVheuMmNNf9qK.jpg', 'google forms', '<p>descrizione</p>', '2021-10-29 07:42:20', '2021-10-29 07:42:20', NULL, '<p>pro</p>', '<p>contro</p>'),
(6, 1, 11, 'collaboard', 'Collaboard', 'thumbnails/rLTmqXg3qCCGa1ntQXGgkAgKPlWB9DViAwRig2f6.jpg', 'Strumento utile per attività di gruppo', '<p>\r\n\r\n</p>\r\n<p><video controls=\"\" src=\"https://cdn2.hubspot.net/hubfs/7368680/Collaboard_Webseiten_Teaser.mp4\" width=\"640\" height=\"360\" class=\"note-video-clip\"></video></p>', '2021-10-29 07:43:32', '2021-11-26 13:20:44', NULL, '<p>Aiuta la collaborazione</p>', '<p><br></p>'),
(8, 2, 13, 'ivideoeducation', 'iVideo.education', 'thumbnails/wlaTlYrvGIqW0ZQPxHPw9C7V6DIqo0FUmJh6mMS3.png', 'iVideo.education permette di trasformare un video semplice, già esistente, in un video interattivo', '<p><p>&nbsp;<span style=\"text-align: start;\">iVideo.education è un progetto innovativo che vuole sfruttare la possibilità di rendere interattivi brevi spezzoni video, al fine di favorire l\'apprendimento.</span></p><span style=\"text-align: start;\">Il materiale audiovisivo ha molteplici potenzialità per essere integrato in attività didattiche, che spesso però non vengono sfruttate vuoi per limiti infrastrutturali, vuoi per la difficoltà di trovare materiale che risponda davvero alle esigenze dei formatori e delle formatrici: molta documentazione, ma precostituita e poco duttile.</span><br style=\"text-align: start;\"><br style=\"text-align: start;\"><span style=\"text-align: start;\">iVideo.education vuole permettere a tutti i formatori e le formatrici, senza particolari competenze informatiche, di personalizzare e strutturare materiale didattico per le proprie attività di formazione, sfruttando il video e collegandovi ulteriori risorse di qualsiasi genere (documenti, immagini, audio, ...), nonché dando la possibilità alle persone in formazione di annotare il video individualmente o collaborativamente.</span><br style=\"text-align: start;\"><br style=\"text-align: start;\"><span style=\"text-align: start;\">iVideo.education si basa sui risultati ottenuti con Scuolavisione, un progetto realizzato dalla Scuola Universitaria Federale per la Formazione Professionale (SUFFP) a cui ha collaborato anche la Radiotelevisione svizzera di lingua italiana (RSI) e sostenuto dalla Segreteria di Stato per la formazione, ricerca e innovazione (SEFRI).</span></p><p><span style=\"text-align: start;\"><br></span></p><p><video controls=\"\" src=\"http://ivideo.education/ivideodata/introVideo/ivideo-it.mp4\" width=\"640\" height=\"360\" class=\"note-video-clip\"></video><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal; background-color: rgb(255, 255, 255);\"><br></span></p>', '2021-11-03 11:01:42', '2021-11-26 13:17:30', NULL, '<span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"><span style=\"font-family: Arial;\">Un progetto innovativo</span></span><br style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"><p><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"><span style=\"font-family: Arial;\">Un portale di condivisione</span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"><span style=\"font-family: Arial;\">Un\'offerta di formazione continua</span></span><br style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"><br style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; white-space: normal;\"></p>', '<p><br></p>'),
(9, 2, 10, 'kahoot', 'Kahoot', 'thumbnails/h0D67AeE2FcfbD3eoL8ZaFHEq6FxLb0O6vdD8UZ2.png', 'Strumento per svolgere quiz coinvolgenti.', '<p><span style=\"text-align: left;\">Kahoot! è una piattaforma di apprendimento basata sul gioco, utilizzata a scopo educativo nelle scuole e in altre istituzioni educative. I suoi giochi di apprendimento, \"Kahoots\", sono quiz a scelta multipla che possono essere scritti dagli utenti e sono accessibili tramite un Browser Web o attraverso l\'App Kahoot.</span><br></p><p><iframe width=\"100%\" height=\"100%\" src=\"https://tube.switch.ch/embed/914afd52\" frameborder=\"0\" allow=\"fullscreen\" allowfullscreen=\"\"></iframe></p>', '2021-11-09 13:01:23', '2021-11-26 13:16:17', NULL, '<ul><li>Motivazione allievi</li><li>Feedback immediato</li><li>Facilità uso</li></ul>', '<ul><li>Distrazione dai contenuti</li><li>Limitazioni versione free</li><li>-</li></ul>');

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profession`, `role`, `linkedin`, `personalsite`) VALUES
(1, 'matthias.conte', 'Matthias', 'matth.conte@gmail.com', NULL, '$2y$10$Jvwa0cG3NeSr8j6alKNZXOAwmhhUbkrndlmfFsBfG4h51KD.JccZC', NULL, '2021-10-29 07:34:40', '2021-11-26 13:51:36', 'Studente', 'Informatica di Gestione', 'https://www.linkedin.com/in/matthias-conte-81375b213/', 'http://didattica.test/profile/matthias.conte'),
(2, 'admin', 'Admin', 'admin@didattica.swiss', NULL, '$2y$10$6J0SjpphIvyffOASOttvxO//ZNZYCAzvlJCm8S3gBZaJZ2AdzOdJK', NULL, '2021-11-02 12:12:31', '2021-11-26 13:49:58', 'Docente', 'Matematica', '', 'http://didattica.test/profile/admin'),
(3, 'SAl', 'siegfried alberton', 'siegfried.alberton@suffp.swiss', NULL, '$2y$10$XR/86Wb5iFs2hFxcAjT9G./tbinXotGaWcWFkNNcbzlguOZxYytX2', NULL, '2021-11-02 13:14:07', '2021-11-02 13:14:07', '', '', '', ''),
(4, 'matt', 'Matthias', 'matthias.conte@suffp.swiss', NULL, '$2y$10$RI1kAbG/oxQF9Jt4QnO1q.eP9WpZ0LlJ2Lo9NIKyi16Xucmtsom.i', NULL, '2021-11-03 10:58:47', '2021-11-03 10:58:47', '', '', '', '');

INSERT INTO `votes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '2021-11-26 10:37:42', '2021-11-26 10:37:42'),
(2, 9, 2, '2021-11-26 13:15:39', '2021-11-26 13:15:39'),
(3, 9, 1, '2021-11-26 13:52:14', '2021-11-26 13:52:14'),
(4, 6, 1, '2021-11-26 14:12:00', '2021-11-26 14:12:00');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;