-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Hazırlanma Vaxtı: 03 Okt, 2023 saat 18:14
-- Server versiyası: 10.3.34-MariaDB
-- PHP Versiyası: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `text_case`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `year_experience` int(11) NOT NULL,
  `image` varchar(1500) NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `year_experience`, `image`, `locale`) VALUES
(1, 'Electronic Tourist <span>Visa</span>', '<p>Prospective travelers have a possibility to obtain the visa without visiting Azerbaijan Embassy or Consular Office, following three simple steps: applying, making online payment and printing out ready e-Visa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Starting from March 15, 2013 new procedure of tourist e-visa system has been implementing in Azerbaijan to provide the execution of the Decree of the President of the Republic of Azerbaijan dated November 20, 2012 &rdquo;On the facilitation of visa procedures for foreigners and stateless persons, traveling to the Republic of Azerbaijan&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Applying for a visa through this portal has lots of advantages. No need to make an appointment or present original documents to the Embassy or Consular Office. All you need is internet connection, credit or debit card and scanned copies of your documents.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are providing e-Visa Application processing service available online. Our visa experts will follow up your visa application until you get visa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We offer Digital Tourist Guide services, in addition, helps you to get an official e-visa for Azerbaijan. We are not an official visa service organization, it simplifies your operation process. The official visa portal for Azerbaijan is only ASAN Visa.</p>\r\n\r\n<p>Azerbaijan eVisa Requirements</p>\r\n\r\n<p>Additional information about the e-Visa for Azerbaijan. The Azerbaijan e-Visa is electronically issued travel authorization that is permitting visits for up to thirty (30) days and is valid for a three (3) months&#39; period. It&#39;s mandatory the visitor&rsquo;s passport is valid for at least six (6) months from the date of arrival in Azerbaijan.</p>\r\n', 12, '/uploads/images/about/5bc24983ddonlinevisaazerbaijan.jpg', 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `administration`
--

INSERT INTO `administration` (`id`, `fullname`, `username`, `password`, `status`, `image`) VALUES
(1, 'Oruc Seyidov', 'orucseyidov', '138b24fc2e5028c15f78b887ac793614', 1, '');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(10) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `advantages`
--

INSERT INTO `advantages` (`id`, `icon_class`, `title`, `description`, `locale`, `rank`) VALUES
(1, 'fa-solid fa-download', 'Download the Video', '<p>Click <strong>Download Without Watermark</strong> to download video <strong>Mp4 without watermark</strong>.</p>\r\n', 'en', 0),
(2, 'fa-solid fa-copy', 'Paste Video URL', '<p>Paste the <strong>TikTok video URL</strong> in the box above and hit the <strong>Download</strong> button.</p>\r\n', 'en', 0),
(3, 'fa-solid fa-video', 'Find the Video', '<p>Copy the TikTok video URL by clicking <strong>Share</strong> and choosing <strong>Copy Link</strong>.</p>\r\n', 'en', 0),
(4, 'fa-solid fa-video', 'Найдите Видео', '<p>Скопируйте URL-адрес видео TikTok, нажав &laquo;Поделиться&raquo; и выбрав &laquo;Копировать ссылку&raquo;.</p>\r\n', 'ru', 0),
(5, 'fa-solid fa-video', 'Videoyu Bul', '<p>Paylaş&#39;ı tıklayıp Bağlantıyı Kopyala&#39;yı se&ccedil;erek TikTok video URL&#39;sini kopyalayın.</p>\r\n', 'tr', 0),
(6, 'fa-solid fa-video', 'Encuentra el Vídeo', '<p>Copie la URL del video de TikTok haciendo clic en Compartir y eligiendo Copiar enlace.</p>\r\n', 'es', 0),
(8, 'fa-solid fa-copy', 'Вставить URL-Адрес Видео', '<p>Вставьте URL-адрес видео TikTok в поле выше и нажмите кнопку &laquo;Загрузить&raquo;.</p>\r\n', 'ru', 1),
(9, 'fa-solid fa-copy', 'Video URL\'sini Yapıştır', '<p>TikTok video URL&#39;sini yukarıdaki kutuya yapıştırın ve İndir d&uuml;ğmesine basın.</p>\r\n', 'tr', 1),
(10, 'fa-solid fa-copy', 'Pegar URL de Vídeo', '<p>Pegue la URL del video de TikTok en el cuadro de arriba y presione el bot&oacute;n Descargar.</p>\r\n', 'es', 1),
(11, 'fa-solid fa-copy', 'Colar URL do Vídeo', '<p>Cole o URL do v&iacute;deo TikTok na caixa acima e pressione o bot&atilde;o Download.</p>\r\n', 'pt', 1),
(12, 'fa-solid fa-download', 'Скачать Видео', '<p>Нажмите &laquo;Загрузить без водяных знаков&raquo;, чтобы загрузить видео в формате MP4 без водяных знаков.</p>\r\n', 'ru', 2),
(13, 'fa-solid fa-download', 'Videoyu İndir', '<p>Videoyu filigransız indirmek i&ccedil;in Filigran Olmadan İndir&#39;e tıklayın.</p>\r\n', 'tr', 2),
(14, 'fa-solid fa-download', 'Descarga el Vídeo', '<p>Haga clic en Descargar sin marca de agua para descargar el video Mp4 sin marca de agua.</p>\r\n', 'es', 2),
(15, 'fa-solid fa-download', 'Baixe o Vídeo', '<p>Clique em Baixar sem marca d&#39;&aacute;gua para baixar o v&iacute;deo Mp4 sem marca d&#39;&aacute;gua.</p>\r\n', 'pt', 2),
(16, 'fa-solid fa-video', 'Encontre o Vídeo', '<p>Copie o URL do v&iacute;deo TikTok clicando em Compartilhar e escolhendo Copiar link.</p>\r\n', 'pt', 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `position` varchar(500) NOT NULL,
  `image` varchar(1500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `position`, `image`, `status`) VALUES
(1, 'Banner 1', '', 'above-steps_ad', '/uploads/images/banners/e0b43f345c-62f1026b86ed9.jpg', 1),
(2, 'Banner 2', '', 'faq_banner_ad', '/uploads/images/banners/84b44e4170-62f102c9493ae.jpg', 1),
(3, 'Banner 3', '', 'below_search_ad', '/uploads/images/banners/c005d91a0e-62f102f98e490.jpg', 1),
(4, 'Banner 4', '', 'below_steps_ad', '/uploads/images/banners/86e9d451a1-62f103330545f.jpg', 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `common_contents`
--

CREATE TABLE `common_contents` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `common_contents`
--

INSERT INTO `common_contents` (`id`, `page_id`, `table_name`, `title`, `description`, `seo_title`, `seo_description`, `keywords`, `image`, `locale`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 'tool_groups', 'Text Modification', '', NULL, NULL, '', NULL, 'en', '', '2023-10-02 18:18:01', NULL, NULL),
(6, 3, 'other_tools', 'Sentence case', '<p>Sentence case</p>\r\n', NULL, NULL, 'Sentence case', NULL, 'en', '', '2023-10-02 18:29:44', NULL, NULL),
(7, 4, 'other_tools', 'lower case', '<p>lower case</p>\r\n', NULL, NULL, 'lower case', NULL, 'en', '', '2023-10-02 18:30:26', NULL, NULL),
(8, 5, 'other_tools', 'Upper Case', '<p>Upper Case</p>\r\n', NULL, NULL, 'Upper Case', NULL, 'en', '', '2023-10-02 18:31:36', NULL, NULL),
(9, 6, 'other_tools', 'Capitalized Case', '<p>Capitalized Case</p>\r\n', NULL, NULL, 'Capitalized Case', NULL, 'en', '', '2023-10-02 18:32:01', NULL, NULL),
(10, 7, 'other_tools', 'Alternating Case', '<p>Alternating Case</p>\r\n', NULL, NULL, 'Alternating Case', NULL, 'en', '', '2023-10-02 18:32:28', NULL, NULL),
(11, 8, 'other_tools', 'Title Case', '<p>Title Case</p>\r\n', NULL, NULL, 'Title Case', NULL, 'en', '', '2023-10-02 18:32:44', NULL, NULL),
(12, 9, 'other_tools', 'Inverse Case', '<p>Inverse Case</p>\r\n', NULL, NULL, 'Inverse Case', NULL, 'en', '', '2023-10-02 18:33:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `map` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `contacts`
--

INSERT INTO `contacts` (`id`, `adress`, `map`, `phone`, `mobile`, `whatsapp`, `fax`, `mail`) VALUES
(1, 'Unvan', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13419.040333881774!2d-79.93218134282569!3d32.77209999120473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a1ae84ff639%3A0xe5c782f71924a526!2s24%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1635894790855!5m2!1str!2str\" width=\"100%\" height=\"500\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+994 00000000', '+994 00 000 00 00 ', '+994 00 000 00 00 ', '+994 00 000 00 00 ', 'info@cortex.com.az');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `content`
--

INSERT INTO `content` (`id`, `keyword`, `title`, `description`, `locale`) VALUES
(1, 'home_intro_text', 'Convert Case', '<p><strong>Convert Case</strong> is the perfect tool for your text editing and transformation needs. This free online service allows you to easily convert text to <strong>uppercase</strong>, <strong>lowercase</strong>, <strong>sentence case</strong>, <strong>title case</strong>, or custom capitalization styles you prefer. <strong>Capitalized Case</strong> highlights your texts, while<strong> Inverse Case</strong> reverses them.<strong> Alternating Case</strong> shuffles the letter case for an appealing look. Choose <strong>Convert Case</strong> for various text formatting options to enhance readability. Optimize your text with ease, and boost your content&#39;s impact!</p>\r\n', 'en'),
(2, 'recommend_tool', 'Recommend Your Preferred Tools', '<p>We value your insights! Share your favorite online tools and let us know which ones you recommend.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:906px; position:absolute; top:-6px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', 'en'),
(3, 'feedback_text', 'Saytimizda olan funksialari beyenirsiniz ?', '<p>Bunu bizimle bolusun</p>\r\n', 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countrycode` char(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL,
  `flag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `country`
--

INSERT INTO `country` (`id`, `countrycode`, `name`, `code`, `flag`) VALUES
(1, 'AFG', 'Afghanistan', 'AF', 'af.png'),
(2, 'ALA', 'Åland', 'AX', 'ax.png'),
(3, 'ALB', 'Albania', 'AL', 'al.png'),
(4, 'DZA', 'Algeria', 'DZ', 'dz.png'),
(5, 'ASM', 'American Samoa', 'AS', 'as.png'),
(6, 'AND', 'Andorra', 'AD', 'ad.png'),
(7, 'AGO', 'Angola', 'AO', 'ao.png'),
(8, 'AIA', 'Anguilla', 'AI', 'ai.png'),
(9, 'ATA', 'Antarctica', 'AQ', 'aq.png'),
(10, 'ATG', 'Antigua and Barbuda', 'AG', 'ag.png'),
(11, 'ARG', 'Argentina', 'AR', 'ar.png'),
(12, 'ARM', 'Armenia', 'AM', 'am.png'),
(13, 'ABW', 'Aruba', 'AW', 'aw.png'),
(14, 'AUS', 'Australia', 'AU', 'au.png'),
(15, 'AUT', 'Austria', 'AT', 'at.png'),
(16, 'AZE', 'Azerbaijan', 'AZ', 'az.png'),
(17, 'BHS', 'Bahamas', 'BS', 'bs.png'),
(18, 'BHR', 'Bahrain', 'BH', 'bh.png'),
(19, 'BGD', 'Bangladesh', 'BD', 'bd.png'),
(20, 'BRB', 'Barbados', 'BB', 'bb.png'),
(21, 'BLR', 'Belarus', 'BY', 'by.png'),
(22, 'BEL', 'Belgium', 'BE', 'be.png'),
(23, 'BLZ', 'Belize', 'BZ', 'bz.png'),
(24, 'BEN', 'Benin', 'BJ', 'bj.png'),
(25, 'BMU', 'Bermuda', 'BM', 'bm.png'),
(26, 'BTN', 'Bhutan', 'BT', 'bt.png'),
(27, 'BOL', 'Bolivia', 'BO', 'bo.png'),
(28, 'BES', 'Bonaire', 'BQ', 'bq.png'),
(29, 'BIH', 'Bosnia and Herzegovina', 'BA', 'ba.png'),
(30, 'BWA', 'Botswana', 'BW', 'bw.png'),
(31, 'BVT', 'Bouvet Island', 'BV', 'bv.png'),
(32, 'BRA', 'Brazil', 'BR', 'br.png'),
(33, 'IOT', 'British Indian Ocean Territory', 'IO', 'io.png'),
(34, 'VGB', 'British Virgin Islands', 'VG', 'vg.png'),
(35, 'BRN', 'Brunei', 'BN', 'bn.png'),
(36, 'BGR', 'Bulgaria', 'BG', 'bg.png'),
(37, 'BFA', 'Burkina Faso', 'BF', 'bf.png'),
(38, 'BDI', 'Burundi', 'BI', 'bi.png'),
(39, 'KHM', 'Cambodia', 'KH', 'kh.png'),
(40, 'CMR', 'Cameroon', 'CM', 'cm.png'),
(41, 'CAN', 'Canada', 'CA', 'ca.png'),
(42, 'CPV', 'Cape Verde', 'CV', 'cv.png'),
(43, 'CYM', 'Cayman Islands', 'KY', 'ky.png'),
(44, 'CAF', 'Central African Republic', 'CF', 'cf.png'),
(45, 'TCD', 'Chad', 'TD', 'td.png'),
(46, 'CHL', 'Chile', 'CL', 'cl.png'),
(47, 'CHN', 'China', 'CN', 'cn.png'),
(48, 'CXR', 'Christmas Island', 'CX', 'cx.png'),
(49, 'CCK', 'Cocos [Keeling] Islands', 'CC', 'cc.png'),
(50, 'COL', 'Colombia', 'CO', 'co.png'),
(51, 'COM', 'Comoros', 'KM', 'km.png'),
(52, 'COK', 'Cook Islands', 'CK', 'ck.png'),
(53, 'CRI', 'Costa Rica', 'CR', 'cr.png'),
(54, 'HRV', 'Croatia', 'HR', 'hr.png'),
(55, 'CUB', 'Cuba', 'CU', 'cu.png'),
(56, 'CUW', 'Curacao', 'CW', 'cw.png'),
(57, 'CYP', 'Cyprus', 'CY', 'cy.png'),
(58, 'CZE', 'Czech Republic', 'CZ', 'cz.png'),
(59, 'COD', 'Democratic Republic of the Congo', 'CD', 'cd.png'),
(60, 'DNK', 'Denmark', 'DK', 'dk.png'),
(61, 'DJI', 'Djibouti', 'DJ', 'dj.png'),
(62, 'DMA', 'Dominica', 'DM', 'dm.png'),
(63, 'DOM', 'Dominican Republic', 'DO', 'do.png'),
(64, 'TLS', 'East Timor', 'TL', 'tl.png'),
(65, 'ECU', 'Ecuador', 'EC', 'ec.png'),
(66, 'EGY', 'Egypt', 'EG', 'eg.png'),
(67, 'SLV', 'El Salvador', 'SV', 'sv.png'),
(68, 'GNQ', 'Equatorial Guinea', 'GQ', 'gq.png'),
(69, 'ERI', 'Eritrea', 'ER', 'er.png'),
(70, 'EST', 'Estonia', 'EE', 'ee.png'),
(71, 'ETH', 'Ethiopia', 'ET', 'et.png'),
(72, 'FLK', 'Falkland Islands', 'FK', 'fk.png'),
(73, 'FRO', 'Faroe Islands', 'FO', 'fo.png'),
(74, 'FJI', 'Fiji', 'FJ', 'fj.png'),
(75, 'FIN', 'Finland', 'FI', 'fi.png'),
(76, 'FRA', 'France', 'FR', 'fr.png'),
(77, 'GUF', 'French Guiana', 'GF', 'gf.png'),
(78, 'PYF', 'French Polynesia', 'PF', 'pf.png'),
(79, 'ATF', 'French Southern Territories', 'TF', 'tf.png'),
(80, 'GAB', 'Gabon', 'GA', 'ga.png'),
(81, 'GMB', 'Gambia', 'GM', 'gm.png'),
(82, 'GEO', 'Georgia', 'GE', 'ge.png'),
(83, 'DEU', 'Germany', 'DE', 'de.png'),
(84, 'GHA', 'Ghana', 'GH', 'gh.png'),
(85, 'GIB', 'Gibraltar', 'GI', 'gi.png'),
(86, 'GRC', 'Greece', 'GR', 'gr.png'),
(87, 'GRL', 'Greenland', 'GL', 'gl.png'),
(88, 'GRD', 'Grenada', 'GD', 'gd.png'),
(89, 'GLP', 'Guadeloupe', 'GP', 'gp.png'),
(90, 'GUM', 'Guam', 'GU', 'gu.png'),
(91, 'GTM', 'Guatemala', 'GT', 'gt.png'),
(92, 'GGY', 'Guernsey', 'GG', 'gg.png'),
(93, 'GIN', 'Guinea', 'GN', 'gn.png'),
(94, 'GNB', 'Guinea-Bissau', 'GW', 'gw.png'),
(95, 'GUY', 'Guyana', 'GY', 'gy.png'),
(96, 'HTI', 'Haiti', 'HT', 'ht.png'),
(97, 'HMD', 'Heard Island and McDonald Islands', 'HM', 'hm.png'),
(98, 'HND', 'Honduras', 'HN', 'hn.png'),
(99, 'HKG', 'Hong Kong', 'HK', 'hk.png'),
(100, 'HUN', 'Hungary', 'HU', 'hu.png'),
(101, 'ISL', 'Iceland', 'IS', 'is.png'),
(102, 'IND', 'India', 'IN', 'in.png'),
(103, 'IDN', 'Indonesia', 'ID', 'id.png'),
(104, 'IRN', 'Iran', 'IR', 'ir.png'),
(105, 'IRQ', 'Iraq', 'IQ', 'iq.png'),
(106, 'IRL', 'Ireland', 'IE', 'ie.png'),
(107, 'IMN', 'Isle of Man', 'IM', 'im.png'),
(108, 'ISR', 'Israel', 'IL', 'il.png'),
(109, 'ITA', 'Italy', 'IT', 'it.png'),
(110, 'CIV', 'Ivory Coast', 'CI', 'ci.png'),
(111, 'JAM', 'Jamaica', 'JM', 'jm.png'),
(112, 'JPN', 'Japan', 'JP', 'jp.png'),
(113, 'JEY', 'Jersey', 'JE', 'je.png'),
(114, 'JOR', 'Jordan', 'JO', 'jo.png'),
(115, 'KAZ', 'Kazakhstan', 'KZ', 'kz.png'),
(116, 'KEN', 'Kenya', 'KE', 'ke.png'),
(117, 'KIR', 'Kiribati', 'KI', 'ki.png'),
(118, 'XKX', 'Kosovo', 'XK', 'xk.png'),
(119, 'KWT', 'Kuwait', 'KW', 'kw.png'),
(120, 'KGZ', 'Kyrgyzstan', 'KG', 'kg.png'),
(121, 'LAO', 'Laos', 'LA', 'la.png'),
(122, 'LVA', 'Latvia', 'LV', 'lv.png'),
(123, 'LBN', 'Lebanon', 'LB', 'lb.png'),
(124, 'LSO', 'Lesotho', 'LS', 'ls.png'),
(125, 'LBR', 'Liberia', 'LR', 'lr.png'),
(126, 'LBY', 'Libya', 'LY', 'ly.png'),
(127, 'LIE', 'Liechtenstein', 'LI', 'li.png'),
(128, 'LTU', 'Lithuania', 'LT', 'lt.png'),
(129, 'LUX', 'Luxembourg', 'LU', 'lu.png'),
(130, 'MAC', 'Macao', 'MO', 'mo.png'),
(131, 'MKD', 'Macedonia', 'MK', 'mk.png'),
(132, 'MDG', 'Madagascar', 'MG', 'mg.png'),
(133, 'MWI', 'Malawi', 'MW', 'mw.png'),
(134, 'MYS', 'Malaysia', 'MY', 'my.png'),
(135, 'MDV', 'Maldives', 'MV', 'mv.png'),
(136, 'MLI', 'Mali', 'ML', 'ml.png'),
(137, 'MLT', 'Malta', 'MT', 'mt.png'),
(138, 'MHL', 'Marshall Islands', 'MH', 'mh.png'),
(139, 'MTQ', 'Martinique', 'MQ', 'mq.png'),
(140, 'MRT', 'Mauritania', 'MR', 'mr.png'),
(141, 'MUS', 'Mauritius', 'MU', 'mu.png'),
(142, 'MYT', 'Mayotte', 'YT', 'yt.png'),
(143, 'MEX', 'Mexico', 'MX', 'mx.png'),
(144, 'FSM', 'Micronesia', 'FM', 'fm.png'),
(145, 'MDA', 'Moldova', 'MD', 'md.png'),
(146, 'MCO', 'Monaco', 'MC', 'mc.png'),
(147, 'MNG', 'Mongolia', 'MN', 'mn.png'),
(148, 'MNE', 'Montenegro', 'ME', 'me.png'),
(149, 'MSR', 'Montserrat', 'MS', 'ms.png'),
(150, 'MAR', 'Morocco', 'MA', 'ma.png'),
(151, 'MOZ', 'Mozambique', 'MZ', 'mz.png'),
(152, 'MMR', 'Myanmar [Burma]', 'MM', 'mm.png'),
(153, 'NAM', 'Namibia', 'NA', 'na.png'),
(154, 'NRU', 'Nauru', 'NR', 'nr.png'),
(155, 'NPL', 'Nepal', 'NP', 'np.png'),
(156, 'NLD', 'Netherlands', 'NL', 'nl.png'),
(157, 'NCL', 'New Caledonia', 'NC', 'nc.png'),
(158, 'NZL', 'New Zealand', 'NZ', 'nz.png'),
(159, 'NIC', 'Nicaragua', 'NI', 'ni.png'),
(160, 'NER', 'Niger', 'NE', 'ne.png'),
(161, 'NGA', 'Nigeria', 'NG', 'ng.png'),
(162, 'NIU', 'Niue', 'NU', 'nu.png'),
(163, 'NFK', 'Norfolk Island', 'NF', 'nf.png'),
(164, 'PRK', 'North Korea', 'KP', 'kp.png'),
(165, 'MNP', 'Northern Mariana Islands', 'MP', 'mp.png'),
(166, 'NOR', 'Norway', 'NO', 'no.png'),
(167, 'OMN', 'Oman', 'OM', 'om.png'),
(168, 'PAK', 'Pakistan', 'PK', 'pk.png'),
(169, 'PLW', 'Palau', 'PW', 'pw.png'),
(170, 'PSE', 'Palestine', 'PS', 'ps.png'),
(171, 'PAN', 'Panama', 'PA', 'pa.png'),
(172, 'PNG', 'Papua New Guinea', 'PG', 'pg.png'),
(173, 'PRY', 'Paraguay', 'PY', 'py.png'),
(174, 'PER', 'Peru', 'PE', 'pe.png'),
(175, 'PHL', 'Philippines', 'PH', 'ph.png'),
(176, 'PCN', 'Pitcairn Islands', 'PN', 'pn.png'),
(177, 'POL', 'Poland', 'PL', 'pl.png'),
(178, 'PRT', 'Portugal', 'PT', 'pt.png'),
(179, 'PRI', 'Puerto Rico', 'PR', 'pr.png'),
(180, 'QAT', 'Qatar', 'QA', 'qa.png'),
(181, 'COG', 'Republic of the Congo', 'CG', 'cg.png'),
(182, 'REU', 'Réunion', 'RE', 're.png'),
(183, 'ROU', 'Romania', 'RO', 'ro.png'),
(184, 'RUS', 'Russia', 'RU', 'ru.png'),
(185, 'RWA', 'Rwanda', 'RW', 'rw.png'),
(186, 'BLM', 'Saint Barthélemy', 'BL', 'bl.png'),
(187, 'SHN', 'Saint Helena', 'SH', 'sh.png'),
(188, 'KNA', 'Saint Kitts and Nevis', 'KN', 'kn.png'),
(189, 'LCA', 'Saint Lucia', 'LC', 'lc.png'),
(190, 'MAF', 'Saint Martin', 'MF', 'mf.png'),
(191, 'SPM', 'Saint Pierre and Miquelon', 'PM', 'pm.png'),
(192, 'VCT', 'Saint Vincent and the Grenadines', 'VC', 'vc.png'),
(193, 'WSM', 'Samoa', 'WS', 'ws.png'),
(194, 'SMR', 'San Marino', 'SM', 'sm.png'),
(195, 'STP', 'São Tomé and Príncipe', 'ST', 'st.png'),
(196, 'SAU', 'Saudi Arabia', 'SA', 'sa.png'),
(197, 'SEN', 'Senegal', 'SN', 'sn.png'),
(198, 'SRB', 'Serbia', 'RS', 'rs.png'),
(199, 'SYC', 'Seychelles', 'SC', 'sc.png'),
(200, 'SLE', 'Sierra Leone', 'SL', 'sl.png'),
(201, 'SGP', 'Singapore', 'SG', 'sg.png'),
(202, 'SXM', 'Sint Maarten', 'SX', 'sx.png'),
(203, 'SVK', 'Slovakia', 'SK', 'sk.png'),
(204, 'SVN', 'Slovenia', 'SI', 'si.png'),
(205, 'SLB', 'Solomon Islands', 'SB', 'sb.png'),
(206, 'SOM', 'Somalia', 'SO', 'so.png'),
(207, 'ZAF', 'South Africa', 'ZA', 'za.png'),
(208, 'SGS', 'South Georgia and the South Sandwich Islands', 'GS', 'gs.png'),
(209, 'KOR', 'South Korea', 'KR', 'kr.png'),
(210, 'SSD', 'South Sudan', 'SS', 'ss.png'),
(211, 'ESP', 'Spain', 'ES', 'es.png'),
(212, 'LKA', 'Sri Lanka', 'LK', 'lk.png'),
(213, 'SDN', 'Sudan', 'SD', 'sd.png'),
(214, 'SUR', 'Suriname', 'SR', 'sr.png'),
(215, 'SJM', 'Svalbard and Jan Mayen', 'SJ', 'sj.png'),
(216, 'SWZ', 'Swaziland', 'SZ', 'sz.png'),
(217, 'SWE', 'Sweden', 'SE', 'se.png'),
(218, 'CHE', 'Switzerland', 'CH', 'ch.png'),
(219, 'SYR', 'Syria', 'SY', 'sy.png'),
(220, 'TWN', 'Taiwan', 'TW', 'tw.png'),
(221, 'TJK', 'Tajikistan', 'TJ', 'tj.png'),
(222, 'TZA', 'Tanzania', 'TZ', 'tz.png'),
(223, 'THA', 'Thailand', 'TH', 'th.png'),
(224, 'TGO', 'Togo', 'TG', 'tg.png'),
(225, 'TKL', 'Tokelau', 'TK', 'tk.png'),
(226, 'TON', 'Tonga', 'TO', 'to.png'),
(227, 'TTO', 'Trinidad and Tobago', 'TT', 'tt.png'),
(228, 'TUN', 'Tunisia', 'TN', 'tn.png'),
(229, 'TUR', 'Turkey', 'TR', 'tr.png'),
(230, 'TKM', 'Turkmenistan', 'TM', 'tm.png'),
(231, 'TCA', 'Turks and Caicos Islands', 'TC', 'tc.png'),
(232, 'TUV', 'Tuvalu', 'TV', 'tv.png'),
(233, 'UMI', 'U.S. Minor Outlying Islands', 'UM', 'um.png'),
(234, 'VIR', 'U.S. Virgin Islands', 'VI', 'vi.png'),
(235, 'UGA', 'Uganda', 'UG', 'ug.png'),
(236, 'UKR', 'Ukraine', 'UA', 'ua.png'),
(237, 'ARE', 'United Arab Emirates', 'AE', 'ae.png'),
(238, 'GBR', 'United Kingdom', 'GB', 'gb.png'),
(239, 'USA', 'United States', 'US', 'us.png'),
(240, 'URY', 'Uruguay', 'UY', 'uy.png'),
(241, 'UZB', 'Uzbekistan', 'UZ', 'uz.png'),
(242, 'VUT', 'Vanuatu', 'VU', 'vu.png'),
(243, 'VAT', 'Vatican City', 'VA', 'va.png'),
(244, 'VEN', 'Venezuela', 'VE', 've.png'),
(245, 'VNM', 'Vietnam', 'VN', 'vn.png'),
(246, 'WLF', 'Wallis and Futuna', 'WF', 'wf.png'),
(247, 'ESH', 'Western Sahara', 'EH', 'eh.png'),
(248, 'YEM', 'Yemen', 'YE', 'ye.png'),
(249, 'ZMB', 'Zambia', 'ZM', 'zm.png'),
(250, 'ZWE', 'Zimbabwe', 'ZW', 'zw.png');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1500) NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en',
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `parent` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `home_about_blocks`
--

CREATE TABLE `home_about_blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `home_about_blocks`
--

INSERT INTO `home_about_blocks` (`id`, `title`, `description`, `locale`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Special title treatment', '<p>With supporting text below as a natural lead-in to additional content.</p>\r\n', 'en', '2023-10-02 16:26:19', NULL, NULL),
(2, 'Special title treatment', '<p>With supporting text below as a natural lead-in to additional content.</p>\r\n', 'en', '2023-10-02 16:26:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `info_msg`
--

CREATE TABLE `info_msg` (
  `id` int(11) NOT NULL,
  `title` varchar(1500) NOT NULL,
  `description` text NOT NULL,
  `keyword` varchar(1500) NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `info_msg`
--

INSERT INTO `info_msg` (`id`, `title`, `description`, `keyword`, `locale`) VALUES
(1, 'Sistem xətası baş verdi', 'Sistem xətası baş verdi', 'sistemxetasi', 'en'),
(2, 'Müraciətiniz uğurla qeydiyyata alınmışdır təşəkkür edirik.', 'Müraciətiniz uğurla qeydiyyata alınmışdır təşəkkür edirik.', 'success_sent', 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `languages`
--

INSERT INTO `languages` (`id`, `locale`, `flag`, `name`, `status`) VALUES
(1, 'en', '/uploads/images/languages/51620749f9us_flag.jpg', 'English', 1),
(2, 'ru', '/uploads/images/languages/606c9d6991russia_flag.jpg', 'Русский', 0),
(3, 'tr', '/uploads/images/languages/c9cff51ab6tr.jpg', 'Türkçe', 0),
(4, 'es', '/uploads/images/languages/4af8cd3e05-Espaol.jpg', 'Español', 0),
(5, 'pt', '/uploads/images/languages/5a10f1cffapt.jpg', 'Português', 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `menu`
--

INSERT INTO `menu` (`id`, `name`, `slug`, `status`, `locale`) VALUES
(1, 'Home', '/', 1, 'en'),
(2, 'About', 'about', 1, 'en'),
(3, 'F.A.Q', 'faq', 1, 'en'),
(4, 'Contacts', 'contact', 1, 'en'),
(24, 'Terms of Services', 'terms-of-services', 1, 'en'),
(25, 'Privacy Policy', 'privacy-policy', 1, 'en'),
(26, 'Cookie Privacy', 'cookie-privacy', 1, 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `messages`
--

INSERT INTO `messages` (`id`, `fullname`, `email`, `subject`, `message`, `date`, `status`) VALUES
(4, 'Mrs RaveN', 'raven@gmail.com', 'Subject 3', 'asdasdasdasd', '2022-04-13', 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`, `date`) VALUES
(1, 'test@asas.as', '2020-06-30 00:51:13');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `other_tools`
--

CREATE TABLE `other_tools` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 1,
  `rank` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `other_tools`
--

INSERT INTO `other_tools` (`id`, `group_id`, `name`, `status`, `slug`, `page_status`, `rank`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 'Sentence case', 1, 'sentence-case', 1, 0, '2023-10-02 18:21:41', NULL, NULL),
(4, 2, 'Lower case', 1, 'lower-case-converter', 1, 0, '2023-10-02 18:22:14', NULL, NULL),
(5, 2, 'Upper Case', 1, 'upper-case-converter', 1, 0, '2023-10-02 18:22:43', NULL, NULL),
(6, 2, 'Capitalized Case', 1, 'capitalized-case-converter', 1, 0, '2023-10-02 18:23:08', NULL, NULL),
(7, 2, 'Alternating Case', 1, 'alternating-case-converter', 1, 0, '2023-10-02 18:23:49', NULL, NULL),
(8, 2, 'Title Case', 1, 'title-case-converter', 1, 0, '2023-10-02 18:24:16', NULL, NULL),
(9, 2, 'Inverse Case', 1, 'inverse-case-converter', 1, 0, '2023-10-02 18:24:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `image_size` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `positions`
--

INSERT INTO `positions` (`id`, `title`, `slug`, `image_size`, `status`) VALUES
(1, 'Below-steps Ad', 'below_steps_ad', '452 × 96', 1),
(2, 'Below Search Ad', 'below_search_ad', '452 × 140', 1),
(3, 'Above-steps Ad', 'above-steps_ad', '452 × 96', 1),
(4, 'FAQ Banner Ad', 'faq_banner_ad', '728 × 90', 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 - user | 2 - system '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `rating`
--

INSERT INTO `rating` (`id`, `rating`, `ip`, `locale`, `device`, `user_agent`, `country_code`, `country`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(1, 5, '185.32.44.101', 'en', 'mobile', 'Mozilla/5.0 (Linux; Android 11; 2201116SG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36', 'AZ', 'Azerbaijan', '2022-09-27 23:45:00', '2022-09-27 23:45:00', NULL, 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(1500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `tags` varchar(1500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `locale` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page`, `title`, `description`, `keywords`, `image`, `locale`) VALUES
(2, 'privacy-policy', 'Privacy Policy', 'TikTok, formerly known as Musically (sometimes called Douyin in China), is a social media platform for watching and making quick viral videos. The quickest method to download TikTok videos in mp3 or mp4 is with www.bomtik.com TikTok Video Downloader.', 'Privacy Policy,How To Download,Video,Downloader,TikTok Video Downloader,Video Download,video download,Save Videos,No Watermark,HD,HD download,MP4 Download,mp4,TikTok Video,tiktok video save,watermark,TikTok,video downloader,Download TikTok video,Fastest TikTok Downloader,mp4 video downloader online,mp4 video downloader,mp4 video,fast and free,fast download,free download,mp4 downloader,free mp4,free online download,tiktok free video,tik tok video online,tiktok online,online free,tiktok video downloader with watermark,download tiktok videos without watermark,tiktok video download by username,tiktok video downloader hd,tiktok video downloader app,Download TikTok Video Without Watermark (HD),Video Downloader For Tiktok,TikTok app,Video Downloader,Tiktok lite,how to save,how to blog,wikihow,blog for how to,how to download and save,how to download and save on iphone,how to download and save on android,how to download and save on android phone,how to download and save on windows,how to downlo', '/uploads/images/seo_settings/dbefc9174b00002.png', 'en'),
(3, 'terms-of-services', 'Terms of Services', 'Download TikTok videos, Musically videos on any devices that you want: mobile, PC, or tablet. www.bomtik.com TikTok downloader offers you the fastest way to download videos from TikTok in mp3 or mp4. The fastest and easiest way to download save TikTok videos.', 'Terms of Services,How To Download,Video,Downloader,TikTok Video Downloader,Video Download,video download,Save Videos,No Watermark,HD,HD download,MP4 Download,mp4,TikTok Video,tiktok video save,watermark,TikTok,video downloader,Download TikTok video,Fastest TikTok Downloader,mp4 video downloader online,mp4 video downloader,mp4 video,fast and free,fast download,free download,mp4 downloader,free mp4,free online download,tiktok free video,tik tok video online,tiktok online,online free,tiktok video downloader with watermark,download tiktok videos without watermark,tiktok video download by username,tiktok video downloader hd,tiktok video downloader app,Download TikTok Video Without Watermark (HD),Video Downloader For Tiktok,TikTok app,Video Downloader,Tiktok lite,how to save,how to blog,wikihow,blog for how to,how to download and save,how to download and save on iphone,how to download and save on android,how to download and save on android phone,how to download and save on windows,how to dow', '/uploads/images/seo_settings/0ac2f2f27a00002.png', 'en'),
(4, 'home', 'Case Converter - Your Handy FREE Online Tool!', 'Convert Case: Your Go-To Text Transformation Tool\r\n\r\nLooking for an easy way to convert text? Convert Case is your one-stop solution for changing text case. With a user-friendly interface, it\'s perfect for converting text to uppercase, lowercase, title case, and more. Boost your productivity with our ', 'Convert Case: Your Go-To,Free,Online Text Transformation Tool - Uppercase,lowercase,Title Case', '/uploads/images/seo_settings/ed72e4d020New-Project-(1).png', 'en'),
(27, 'about', 'about', 'about', 'about', '', 'en'),
(28, 'faq', 'faq', 'faq', 'faq', '', 'en'),
(29, 'contact', 'contact', 'contact', 'contact', '', 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(1500) NOT NULL,
  `site_status` tinyint(1) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `logo_mobile` varchar(1000) NOT NULL,
  `og_image` varchar(1500) DEFAULT NULL,
  `favicon` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `description`, `tags`, `site_status`, `image`, `logo_mobile`, `og_image`, `favicon`) VALUES
(1, 'Case Converter - Your Handy FREE Online Tool!', 'Convert Case: Your Go-To Text Transformation Tool\r\n\r\nLooking for an easy way to convert text? Convert Case is your one-stop solution for changing text case. With a user-friendly interface, it\'s perfect for converting text to uppercase, lowercase, title case, and more. Boost your productivity with our free online tool!', 'Convert Case: Your Go-To,Free,Online Text Transformation Tool - Uppercase,lowercase,Title Case', 1, '/uploads/images/statics/cfd092fa2c-TikTok-Video-Downloader-Download-TikTok-Video-Without-Watermark-HD-TikTok-to-MP4.png', '/uploads/images/statics/133525f7b5-Logo_mobileTikTok-Video-Downloader-Download-TikTok-Video-Without-Watermark-HD-TikTok-to-MP4.png', '/uploads/images/statics/0d74d7f0ac-Og_imageTikTok-Video-Downloader-Download-TikTok-Video-Without-Watermark-HD-TikTok-to-MP4.png', '/uploads/images/statics/27846092fb-Favicon.ico');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `social`
--

INSERT INTO `social` (`id`, `name`, `icon`, `link`) VALUES
(1, 'E-mail', 'fa-solid fa-envelope-open-text', 'xd@gmail.com'),
(2, 'facebook', 'fa-brands fa-facebook', 'https://www.facebook.com'),
(8, 'reddit', 'fab fa-reddit', 'https://www.reddit.com/r/bomtik/'),
(9, 'linktr ee', 'fa-brands fa-intercom', 'https://linktr.ee/orucseyidov');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `title_menu` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `image` varchar(1500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `tags` varchar(1500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `locale` varchar(10) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1- menyu || 2 - footer',
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `title_menu`, `description`, `image`, `slug`, `tags`, `created_at`, `is_deleted`, `status`, `locale`, `type`, `rank`) VALUES
(1, 'Terms of Services', 'Terms of Services', 'Terms of Services', '', 'terms-of-services', 'terms-of-services', '2023-10-02 17:47:49', 0, 1, 'en', 1, 0),
(2, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '', 'privacy-policy', '', '2023-10-02 17:47:49', 0, 1, 'en', 1, 0),
(3, 'Cookie Privacy', 'Cookie Privacy', 'Cookie Privacy', '', 'cookie-privacy', 'cookie-privacy', '2023-10-02 17:48:25', 0, 1, 'en', 1, 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `titles`
--

INSERT INTO `titles` (`id`, `keyword`, `title`, `locale`) VALUES
(1, 'recommendations_btn', 'Share Your Recommendations', 'en'),
(2, 'character_count', 'Character Count:', 'en'),
(3, 'word_count', 'Word Count:', 'en'),
(4, 'line_count', 'Line Count:', 'en'),
(5, 'buy_me_a_coffee', 'Buy me a Coffee', 'en'),
(6, 'clear_btn', 'Clear', 'en'),
(7, 'sentence_case', 'Sentence case', 'en'),
(8, 'to_lower_case', 'To lower case', 'en'),
(9, 'upper_case', 'UPPER CASE', 'en'),
(10, 'capitalized_case', 'Capitalized Case', 'en'),
(11, 'alternating_case', 'aLtErNaTiNg cAsE', 'en'),
(12, 'title_case', 'Title Case', 'en'),
(13, 'inverse_case', 'InVeRsE CaSe', 'en'),
(14, 'download_text', 'Download text', 'en'),
(15, 'copy_to_clipboard', 'Copy to Clipboard', 'en'),
(16, 'submit_btn', 'Submit', 'en'),
(17, 'home_about_blocks_title', 'About Convert case', 'en');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `tool_groups`
--

CREATE TABLE `tool_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rank` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `tool_groups`
--

INSERT INTO `tool_groups` (`id`, `name`, `status`, `rank`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Text Modification', 1, 0, '2023-10-02 18:17:08', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `common_contents`
--
ALTER TABLE `common_contents`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `home_about_blocks`
--
ALTER TABLE `home_about_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `info_msg`
--
ALTER TABLE `info_msg`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `other_tools`
--
ALTER TABLE `other_tools`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `tool_groups`
--
ALTER TABLE `tool_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Cədvəl üçün AUTO_INCREMENT `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Cədvəl üçün AUTO_INCREMENT `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Cədvəl üçün AUTO_INCREMENT `common_contents`
--
ALTER TABLE `common_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Cədvəl üçün AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- Cədvəl üçün AUTO_INCREMENT `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Cədvəl üçün AUTO_INCREMENT `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Cədvəl üçün AUTO_INCREMENT `home_about_blocks`
--
ALTER TABLE `home_about_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `info_msg`
--
ALTER TABLE `info_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Cədvəl üçün AUTO_INCREMENT `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Cədvəl üçün AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Cədvəl üçün AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Cədvəl üçün AUTO_INCREMENT `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `other_tools`
--
ALTER TABLE `other_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Cədvəl üçün AUTO_INCREMENT `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Cədvəl üçün AUTO_INCREMENT `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Cədvəl üçün AUTO_INCREMENT `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Cədvəl üçün AUTO_INCREMENT `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Cədvəl üçün AUTO_INCREMENT `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Cədvəl üçün AUTO_INCREMENT `tool_groups`
--
ALTER TABLE `tool_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
