-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Okt 2015 um 14:43
-- Server-Version: 5.6.26
-- PHP-Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `laravel_base`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `content`, `seen`, `user_id`, `post_id`) VALUES
(1, '2015-09-30 22:00:00', '2015-10-01 22:00:00', 'Das ist ja Wahnsinn. Danke!', 0, 62, 1),
(2, '2015-10-01 22:00:00', '2015-10-07 22:00:00', 'Na voll irre. Fein sowas.', 0, 2, 2),
(3, '2015-10-04 07:04:43', '2015-10-04 07:05:09', '<p>Ja warum auch nicht.</p>\r\n', 0, 5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `text`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Dupont', 'dupont@la.fr', 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.', 0, '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(2, 'Durand', 'durand@la.fr', ' Lorem ipsum erat non elit ultrices placerat, netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in. Himenaeos vitae aptent consequat luctus purus eleifend enim, sollicitudin eleifend porta malesuada ac class conubia, condimentum mauris facilisis conubia quis scelerisque. Lacinia tempus nullam felis fusce ac potenti netus ornare semper molestie, iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod.', 0, '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(3, 'Martin', 'martin@la.fr', 'Lorem ipsum tempor netus aenean ligula habitant vehicula tempor ultrices, placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit. Malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui. Lectus curabitur euismod ad, erat.', 1, '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(4, 'bernd', '3trashkiller@gmail.com', 'das ist ein test', 0, '2015-09-22 07:52:13', '2015-09-22 07:52:13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_21_105844_create_roles_table', 1),
('2014_10_21_110325_create_foreign_keys', 1),
('2014_10_24_205441_create_contact_table', 1),
('2014_10_26_172107_create_posts_table', 1),
('2014_10_26_172631_create_tags_table', 1),
('2014_10_26_172904_create_post_tag_table', 1),
('2014_10_26_222018_create_comments_table', 1),
('2014_07_05_111905_create_visitors_table', 2),
('2014_07_05_144447_create_articles_table', 2),
('2014_07_05_152557_create_options_table', 2),
('2014_07_07_005653_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `slug`, `summary`, `content`, `seen`, `active`, `user_id`) VALUES
(1, '2015-09-22 07:48:24', '2015-09-27 20:49:10', 'MOZART', 'post-1', '<p>MOZART! Das Musical - AKTION: Die ersten 200 gebuchten Tickets erhalten einen gratis Gutschein f&uuml;r ein Getr&auml;nk Ihrer Wahl! Ein Rock-Star zu Zeiten des Rokoko: MOZART! Das Musical aus der Feder des Erfolgsduos Michael Kunze und Sylvester Levay beleuchtet den Weltmusiker, die historischen Figur, eine Legende der klassischen Musik. Mozart wird hier als au&szlig;erordentlich begabter K&uuml;nstler gezeigt, der dennoch oder gerade deshalb mit den einfachen Herausforderungen des Lebens k&auml;mpft. MOZART! - ein Drama &uuml;ber das Erwachsenwerden - will eine zum Klischee gewordene historische Figur von Verkitschung und Verg&ouml;tterung befreien.</p>\r\n', '<p>MOZART! Das Musical - AKTION: Die ersten 200 gebuchten Tickets erhalten einen gratis Gutschein f&uuml;r ein Getr&auml;nk Ihrer Wahl! Ein Rock-Star zu Zeiten des Rokoko: MOZART! Das Musical aus der Feder des Erfolgsduos Michael Kunze und Sylvester Levay beleuchtet den Weltmusiker, die historischen Figur, eine Legende der klassischen Musik. Mozart wird hier als au&szlig;erordentlich begabter K&uuml;nstler gezeigt, der dennoch oder gerade deshalb mit den einfachen Herausforderungen des Lebens k&auml;mpft. MOZART! - ein Drama &uuml;ber das Erwachsenwerden - will eine zum Klischee gewordene historische Figur von Verkitschung und Verg&ouml;tterung befreien.</p>\r\n', 0, 1, 1),
(2, '2015-09-22 07:48:24', '2015-09-27 20:52:05', 'Lipizzaner ', 'post-2', '<p>Lipizzaner - Spanische Hofreitschule Die Spanische Hofreitschule Wien... ...ist die &auml;lteste und letzte Reitschule der Welt, in der klassische Reitkunst in reiner Form gepflegt wird. Ihr Name leitet sich davon her, dass an diesem Institut bei seiner Gr&uuml;ndung im Jahre 1572 Pferde spanischer Herkunft verwendet wurden. Der Lipizzaner gilt als die &auml;lteste Kulturpferderasse Europas. Das Dorf Lipizza in dessen N&auml;he 1580 das einstige k. u. k. Hofgest&uuml;t gegr&uuml;ndet wurde, gab der Pferderasse den Namen. 1915 musste das Gest&uuml;t zur G&auml;nze evakuiert werden und fand eine vorl&auml;ufige Bleibe in Laxenburg bei Wien. 1920 erfolgte die &Uuml;bersiedlung der Lipizzaner in das Bundesgest&uuml;t Piber. Die Republik &Ouml;sterreich als Rechtsnachfolgerin der alten Donaumonarchie hatte die Kontinuit&auml;t f&uuml;r die Lipizzanerzucht &uuml;bernommen und mit der &Ouml;ffnung der Spanischen Hofreitschule Wien eine der bedeutendsten Kulturinstitutionen der &Ouml;ffentlichkeit zug&auml;nglich gemacht.</p>\r\n', '<p>Lipizzaner - Spanische Hofreitschule Die Spanische Hofreitschule Wien... ...ist die &auml;lteste und letzte Reitschule der Welt, in der klassische Reitkunst in reiner Form gepflegt wird. Ihr Name leitet sich davon her, dass an diesem Institut bei seiner Gr&uuml;ndung im Jahre 1572 Pferde spanischer Herkunft verwendet wurden. Der Lipizzaner gilt als die &auml;lteste Kulturpferderasse Europas. Das Dorf Lipizza in dessen N&auml;he 1580 das einstige k. u. k. Hofgest&uuml;t gegr&uuml;ndet wurde, gab der Pferderasse den Namen. 1915 musste das Gest&uuml;t zur G&auml;nze evakuiert werden und fand eine vorl&auml;ufige Bleibe in Laxenburg bei Wien. 1920 erfolgte die &Uuml;bersiedlung der Lipizzaner in das Bundesgest&uuml;t Piber. Die Republik &Ouml;sterreich als Rechtsnachfolgerin der alten Donaumonarchie hatte die Kontinuit&auml;t f&uuml;r die Lipizzanerzucht &uuml;bernommen und mit der &Ouml;ffnung der Spanischen Hofreitschule Wien eine der bedeutendsten Kulturinstitutionen der &Ouml;ffentlichkeit zug&auml;nglich gemacht.</p>\r\n', 1, 1, 2),
(3, '2015-09-22 07:48:24', '2015-09-29 16:26:33', 'Gepflegtes', 'post-3', '<p>Gepflegtes Brauchtum, zeitlose Tradition und eine angeborene Geselligkeit. Gelebt von fröhlichen Menschen mit einer kunterbunten Dialektvielfalt. Das ist Österreich. Und das ist das ´Wiener Wiesn-Fest´. Heimat eben.<br />\r\n<br />\r\nAls Österreichs größtes Brauchtums- und Volksmusikfest bieten wir alles, was unser Land so unvergleichlich macht: Brauchtum, Handwerk und herzhafte Schmankerl.<br />\r\n<br />\r\nBodenständige Volksmusik genauso wie eine einzigartige Partystimmung Abends bei den Live-Konzerten. Für Lederhose und Dirndl. Für Jung und Alt. In liebevoll dekorierten Zelten, gemütlichen Schanigärten, urigen Aldddmen und im stimmungsvollen Wiesndorf. Ohne Kitsch, dafür sehr ehrlich.<br />\r\n<br />\r\nFür Musik-Begeisterte warten auch heuer wieder zahlreiche musikalische Highlights mit tollen Künstlerinnen und Künstlern und einem breiten Angebot, bei dem für jeden etwas dabei und beste Stimmung garantiert ist. ´Die Münchener Freiheit´ spielt erstmals auf dem Wiener Wiesn-Fest und heizet mit ihren Hits ´Ohne dich (schlaf ich heut Nacht nicht ein)´ und ´Tausendmal du´ das Gösser-Zelt ein. Ebenfalls zum ersten Mal wird am Vorarlberg-Tag der ´Holstuonarmusigbigbandclub´ - kurz HMBC - auftreten und für einen außergewöhnlichen Abend sorgen. Ein weiterer musikalischer Höhepunkt ist der Auftritt von ´DJ Ötzi´ mit Band im Gösser-Zelt. Weiteres im Repertoire: die beliebten ´Edlseer´, die ganz nebenbei 20-jähriges Bühnenjubiläum feiern.</p>\r\n', '<p>Gepflegtes Brauchtum, zeitlose Tradition und eine angeborene Geselligkeit. Gelebt von fröhlichen Menschen mit einer kunterbunten Dialektvielfalt. Das ist Österreich. Und das ist das ´Wiener Wiesn-Fest´. Heimat eben.<br />\r\n<br />\r\nAls Österreichs größtes Brauchtums- und Volksmusikfest bieten wir alles, was unser Land so unvergleichlich macht: Brauchtum, Handwerk und herzhafte Schmankerl.<br />\r\n<br />\r\nBodenständige Volksmusik genauso wie eine einzigartige Partystimmung Abends bei den Live-Konzerten. Für Lederhose und Dirndl. Für Jung und Alt. In liebevoll dekorierten Zelten, gemütlichen Schanigärten, urigen Almen und im stimmungsvollen Wiesndorf. Ohne Kitsch, dafür sehr ehrlich.<br />\r\n<br />\r\nFür Musik-Begeisterte warten auch heuer wieder zahlreiche musikalische Highlights mit tollen Künstlerinnen und Künstlern und einem breiten Angebot, bei dem für jeden etwas dabei und beste Stimmung garantiert ist. ´Die Münchener Freiheit´ spielt erstmals auf dem Wiener Wiesn-Fest und heizet mit ihren Hits ´Ohne dich (schlaf ich heut Nacht nicht ein)´ und ´Tausendmal du´ das Gösser-Zelt ein. Ebenfalls zum ersten Mal wird am Vorarlberg-Tag der ´Holstuonarmusigbigbandclub´ - kurz HMBC - auftreten und für einen außergewöhnlichen Abend sorgen. Ein weiterer musikalischer Höhepunkt ist der Auftritt von ´DJ Ötzi´ mit Band im Gösser-Zelt. Weiteres im Repertoire: die beliebten ´Edlseer´, die ganz nebenbei 20-jähriges Bühnenjubiläum feiern.</p>\r\n', 0, 1, 2),
(4, '2015-09-22 07:48:24', '2015-09-27 20:48:34', 'Muse', 'post-4', '<p>Muse<br />\r\n2016 in Wien!<br />\r\n<br />\r\nDie britische Rockband Muse gastiert am 9. Mai 2016 in der Wiener Stadthalle. Angek&uuml;ndigt ist eine atemberaubende B&uuml;hnenshow: Die Band spielt dabei auf einer 360 Grad B&uuml;hne inmitten der Konzerthalle, so die Veranstalter. Passend zu ihrem aktuellen Album Drones sollen sie w&auml;hrend der Show auch kleine Kameradrohnen in die Luft steigen lassen.</p>\r\n', '<p>Muse<br />\r\n2016 in Wien!<br />\r\n<br />\r\nDie britische Rockband Muse gastiert am 9. Mai 2016 in der Wiener Stadthalle. Angek&uuml;ndigt ist eine atemberaubende B&uuml;hnenshow: Die Band spielt dabei auf einer 360 Grad B&uuml;hne inmitten der Konzerthalle, so die Veranstalter. Passend zu ihrem aktuellen Album Drones sollen sie w&auml;hrend der Show auch kleine Kameradrohnen in die Luft steigen lassen.</p>\r\n', 0, 0, 2),
(5, '2015-09-27 20:51:08', '2015-09-27 20:51:55', 'Wiener Wiesn Fest Programm 2015:', 'wienerwiesn', '<p>Gepflegtes Brauchtum, zeitlose Tradition und eine angeborene Geselligkeit. Gelebt von fr&ouml;hlichen Menschen mit einer kunterbunten Dialektvielfalt. Das ist &Ouml;sterreich. Und das ist das &acute;Wiener Wiesn-Fest&acute;. Heimat eben.<br />\r\n<br />\r\nAls &Ouml;sterreichs gr&ouml;&szlig;tes Brauchtums- und Volksmusikfest bieten wir alles, was unser Land so unvergleichlich macht: Brauchtum, Handwerk und herzhafte Schmankerl.<br />\r\n<br />\r\nBodenst&auml;ndige Volksmusik genauso wie eine einzigartige Partystimmung Abends bei den Live-Konzerten. F&uuml;r Lederhose und Dirndl. F&uuml;r Jung und Alt. In liebevoll dekorierten Zelten, gem&uuml;tlichen Schanig&auml;rten, urigen Almen und im stimmungsvollen Wiesndorf. Ohne Kitsch, daf&uuml;r sehr ehrlich.<br />\r\n<br />\r\nF&uuml;r Musik-Begeisterte warten auch heuer wieder zahlreiche musikalische Highlights mit tollen K&uuml;nstlerinnen und K&uuml;nstlern und einem breiten Angebot, bei dem f&uuml;r jeden etwas dabei und beste Stimmung garantiert ist. &acute;Die M&uuml;nchener Freiheit&acute; spielt erstmals auf dem Wiener Wiesn-Fest und heizet mit ihren Hits &acute;Ohne dich (schlaf ich heut Nacht nicht ein)&acute; und &acute;Tausendmal du&acute; das G&ouml;sser-Zelt ein. Ebenfalls zum ersten Mal wird am Vorarlberg-Tag der &acute;Holstuonarmusigbigbandclub&acute; - kurz HMBC - auftreten und f&uuml;r einen au&szlig;ergew&ouml;hnlichen Abend sorgen. Ein weiterer musikalischer H&ouml;hepunkt ist der Auftritt von &acute;DJ &Ouml;tzi&acute; mit Band im G&ouml;sser-Zelt. Weiteres im Repertoire: die beliebten &acute;Edlseer&acute;, die ganz nebenbei 20-j&auml;hriges B&uuml;hnenjubil&auml;um feiern.</p>\r\n', '<p>Gepflegtes Brauchtum, zeitlose Tradition und eine angeborene Geselligkeit. Gelebt von fr&ouml;hlichen Menschen mit einer kunterbunten Dialektvielfalt. Das ist &Ouml;sterreich. Und das ist das &acute;Wiener Wiesn-Fest&acute;. Heimat eben.<br />\r\n<br />\r\nAls &Ouml;sterreichs gr&ouml;&szlig;tes Brauchtums- und Volksmusikfest bieten wir alles, was unser Land so unvergleichlich macht: Brauchtum, Handwerk und herzhafte Schmankerl.<br />\r\n<br />\r\nBodenst&auml;ndige Volksmusik genauso wie eine einzigartige Partystimmung Abends bei den Live-Konzerten. F&uuml;r Lederhose und Dirndl. F&uuml;r Jung und Alt. In liebevoll dekorierten Zelten, gem&uuml;tlichen Schanig&auml;rten, urigen Almen und im stimmungsvollen Wiesndorf. Ohne Kitsch, daf&uuml;r sehr ehrlich.<br />\r\n<br />\r\nF&uuml;r Musik-Begeisterte warten auch heuer wieder zahlreiche musikalische Highlights mit tollen K&uuml;nstlerinnen und K&uuml;nstlern und einem breiten Angebot, bei dem f&uuml;r jeden etwas dabei und beste Stimmung garantiert ist. &acute;Die M&uuml;nchener Freiheit&acute; spielt erstmals auf dem Wiener Wiesn-Fest und heizet mit ihren Hits &acute;Ohne dich (schlaf ich heut Nacht nicht ein)&acute; und &acute;Tausendmal du&acute; das G&ouml;sser-Zelt ein. Ebenfalls zum ersten Mal wird am Vorarlberg-Tag der &acute;Holstuonarmusigbigbandclub&acute; - kurz HMBC - auftreten und f&uuml;r einen au&szlig;ergew&ouml;hnlichen Abend sorgen. Ein weiterer musikalischer H&ouml;hepunkt ist der Auftritt von &acute;DJ &Ouml;tzi&acute; mit Band im G&ouml;sser-Zelt. Weiteres im Repertoire: die beliebten &acute;Edlseer&acute;, die ganz nebenbei 20-j&auml;hriges B&uuml;hnenjubil&auml;um feiern.</p>\r\n', 0, 0, 64),
(7, '2015-10-02 11:27:07', '2015-10-02 11:27:07', 'adsf', 'dsfa', '<p>asdf</p>\r\n', '<p>adsf</p>\r\n', 0, 0, 64),
(8, '2015-10-03 16:56:57', '2015-10-03 16:56:57', 'fddf', 'dfdf', '<p>dffdfd</p>\r\n', '<p>dffdfdfdfd</p>\r\n', 0, 0, 64);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 3, 1),
(7, 3, 2),
(8, 3, 4),
(10, 7, 8),
(11, 8, 9);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(2, 'Redactor', 'redac', '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(3, 'User', 'user', '2015-09-22 07:48:24', '2015-09-22 07:48:24'),
(4, 'Guest', 'guest', '2015-08-31 22:00:00', '2015-08-31 22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `tag`) VALUES
(1, '2015-09-22 07:48:24', '2015-09-22 07:48:24', 'Tag1'),
(2, '2015-09-22 07:48:24', '2015-09-22 07:48:24', 'Tag2'),
(3, '2015-09-22 07:48:24', '2015-09-22 07:48:24', 'Tag3'),
(4, '2015-09-22 07:48:24', '2015-09-22 07:48:24', 'Tag4'),
(5, '2015-09-29 16:27:39', '2015-09-29 16:27:39', 'asdfasdf'),
(6, '2015-09-30 19:17:35', '2015-09-30 19:17:35', 'd'),
(7, '2015-10-02 11:26:45', '2015-10-02 11:26:45', 'sadf'),
(8, '2015-10-02 11:27:07', '2015-10-02 11:27:07', 'asdf'),
(9, '2015-10-03 16:56:57', '2015-10-03 16:56:57', 'dfdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasklist`
--

CREATE TABLE IF NOT EXISTS `tasklist` (
  `id` int(10) unsigned NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `tasklist`
--

INSERT INTO `tasklist` (`id`, `headline`, `info`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Arbeit ', 'Nicht wichtig', NULL, '2015-09-24 01:36:09', '2015-09-28 14:13:18'),
(11, 'Routing', 'Nicht wichtig', NULL, '2015-09-24 01:44:27', '2015-10-01 21:39:07'),
(17, 'Error Meldungen', 'Sehr dringend', NULL, '2015-09-24 04:50:16', '2015-10-01 21:38:53'),
(18, 'Header Webfront', 'Sehr dringend', NULL, '2015-09-24 04:52:48', '2015-10-01 21:38:41'),
(23, 'Jquery ', 'Sehr dringend', NULL, '2015-09-24 04:57:38', '2015-10-01 21:38:14'),
(24, 'Layout', 'Erledigt', NULL, '2015-09-29 21:17:39', '2015-10-01 21:38:23'),
(27, 'Domains', 'Sehr dringend', NULL, '2015-10-01 21:39:22', '2015-10-01 21:39:22'),
(28, 'Multitask', 'Sehr dringend', NULL, '2015-10-01 21:39:39', '2015-10-01 21:39:39'),
(29, 'White and Black Design', 'Sehr dringend', NULL, '2015-10-01 21:39:55', '2015-10-01 21:39:55');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagepath` text COLLATE utf8_unicode_ci NOT NULL,
  `imagefilename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagex` blob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `seen`, `valid`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`, `remember_token`, `imagepath`, `imagefilename`, `imagex`) VALUES
(1, 'GreatAdmin', 'admin@la.fr', '$2y$10$sQi6IOC8dc/fqt2rLvF1a.Ri6GHDPJycZGfkRq54MgaCT00jnLPZW', 1, 1, 1, 1, NULL, '2015-09-22 07:48:24', '2015-09-30 19:43:49', '3lSmLT2XL1E8Zns6Y6IYuJ0SygTHbnrPmBsYUBdoBYgZJrqdBqdz73uYbhu8', '/filemanager/userfiles/users', 'user8-128x128.jpg', ''),
(2, 'Mike Redatkteur', 'redac@la.fr', '$2y$10$D9Hyi68hpybBxrrqk4RVce7glgmFdgngtnxPeJw6LrhuF5rh0tv9S', 2, 1, 1, 1, NULL, '2015-09-22 07:48:24', '2015-10-01 21:34:05', 'qcXcsDThCUfDBkvRrOqyAmTFHc3VVthSRXCiUCjUhZT9FzAv2N5QQK1gaK6P', '/filemanager/userfiles/users', 'avatar5.png', ''),
(5, 'Bernd Obendorfer', 'bernd.obendorfer@chello.at', '$2y$10$EMxBcsYnvFNvJ./QI6a.Z.H.cyMdEatT8Y1p4XgFbCTWLxVaqNXTO', 1, 1, 1, 1, NULL, '2015-09-27 19:55:30', '2015-10-04 07:32:59', 'AWhQcBJiZPYJK0xnWdyLy5y9y5E5yUX7Qs2Avh7Mka0vq67IXCJVf0fRPQS8', '/filemanager/userfiles/users', 'user2-160x160.jpg', ''),
(62, 'Maria Userwitz', 'user@user.at', '$2y$10$2i5g.fi2FH3wbaQfYqEB3eZ6a.nhQZ0XKOC4qMTup99M3RN4esJ7G', 3, 1, 1, 1, NULL, '2015-09-30 19:20:48', '2015-10-03 16:57:38', '8tScDlwT9yWPa3wzFPCi4teqzdxav9P7gvcgcsnWn4bTZ85kOkf5tRwJ9Vtz', '/filemanager/userfiles/users', 'user5-128x128.jpg', ''),
(63, 'Heiz Gastowitsch', 'gast@gast.at', '$2y$10$1q0a3V99Ndd7zGn0X6YUwuRijSWovAm.0p364CturT.02YDoLYUi6', 4, 1, 1, 1, NULL, '2015-09-30 19:21:35', '2015-10-02 09:57:26', '3oI2735GlLW20q2xsXQWqEO2qUmt4OSdzqnJv76sqsy4XgQnPG6d0DbQoYgw', '/filemanager/userfiles/users', 'user1-128x128.jpg', ''),
(64, 'Walter Redatkteurowitsch', 'redakteur@redakteur.at', '$2y$10$gSRKJRKHw3mfSN8eMgOQh.glFpBgBpUySv/cIZMAfvqluyc0N1VDG', 2, 1, 1, 1, NULL, '2015-09-30 19:24:09', '2015-10-03 16:57:17', 'ncP2KJ8DfjVwWJuTXSMFDwTxXPCH7dK7aq0OWrWXHeW0lQhSICyTbk8Z88M3', '/filemanager/userfiles/users', 'user6-128x128.jpg', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(10) unsigned NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indizes für die Tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indizes für die Tabelle `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indizes für die Tabelle `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT für Tabelle `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
