-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 01:41 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_housesharemarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'only enlgish - only for show',
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-active, 0 - deactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'where-can-i-learn-how-to-start-an-inflatable-bounce-house-and-party-rental-business-and-work-from-home', 'Where can I learn how to start an inflatable bounce house and party rental business and work from home?', '<p>When you start a kids party rental business to plan picnics, parties, promotions, play-time, you are going to experience what it is like to work for yourself.\r\nYou are the boss now. As with any business the top person on the bounce house ladder oversees it all... including inflatables'' business location, bounce house manufacturers, common safety issues and insurance protection, finding financing, internet use, social marketing, web page, keeping the books, scheduling, finding employees. Bringing your new party rental company to fruition takes time, attention to detail, keeping your rides and games new, clean, and sanitized for the next party, promoting your company, and maintaing a good business reputation.  We offer connections to industry resources including manufacturers and suppliers of wholesale commercial quality bounce houses and inflatables. Use our guide into the world of the Bounce House and Party Rental industry when you need help, resources, ideas. We offer an A to Z approach to the business of renting inflatable kids games and rides for profit. Visit this page for new articles to be published in reference to the inflatables industry.</p>\r\n\r\n<p>When you start a kids party rental business to plan picnics, parties, promotions, play-time, you are going to experience what it is like to work for yourself.\r\nYou are the boss now. As with any business the top person on the bounce house ladder oversees it all... including inflatables'' business location, bounce house manufacturers, common safety issues and insurance protection, finding financing, internet use, social marketing, web page, keeping the books, scheduling, finding employees. Bringing your new party rental company to fruition takes time, attention to detail, keeping your rides and games new, clean, and sanitized for the next party, promoting your company, and maintaing a good business reputation.  We offer connections to industry resources including manufacturers and suppliers of wholesale commercial quality bounce houses and inflatables. Use our guide into the world of the Bounce House and Party Rental industry when you need help, resources, ideas. We offer an A to Z approach to the business of renting inflatable kids games and rides for profit. Visit this page for new articles to be published in reference to the inflatables industry.</p>', 1, '2016-02-11 01:09:40', '2016-04-01 10:13:09'),
(2, 'amusements', 'Amusements', '<p>Top favorite inflatable amusements that offer the most returns in amusing entertainment, enjoyable inflatable amusement competition for team building, and inflatable fun, (not to mention increased ROI for your planned and produced events):</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inflatable Bungee Runs- The Inflatable Amusements known as Bungee Runs are as fun as anything to compete with for laughs, strength, resistance body pulling. Inflatable Bungee Runs are fun at quick action challenges, where one winning person takes on the new challenger. The structure is an inflatable alley with side walls, contestants separated by an inflatable wall.&nbsp;Some inflatable bungee runs offer targets to strive toward like a basketball hoop or football pass or more sports related end games that make a bungee run worth winning. See how far you can stretch once the bungee cord catches up the slack, it&rsquo;s crazy wild amusement fun.</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inflatable Twister Game- Inflatable Amusements made to please a crowd of players include fun games from your childhood that are now played bigger, better, and more fun on an inflatable surface.&nbsp;Take the fun Twister game by Milton Bradley.&nbsp; You must land on the color chosen with one of your hands or feet!&nbsp;Now imagine this fun Twister type game played on an inflatable surface.&nbsp; The rules can remain or change to include bouncing to the next color spot.&nbsp; Inflatable Twister type game is one fun inflatable amusement and goes great with kids or adults. This inflatable amusement is rated safe for all when kept in age groups.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Inflatable Bull Ride- What about the Bull Ride Inflatable Amusement? One rider takes on the bull with 4 others pulling bungee type cords to make the bull buck up and down and around. The inflatable bull ride is a party rental amusement that is safe with kids as there is a large inflatable arena with matt to fall on upon being bucked off. Popular with older boys and girls parties, this inflatable Bull Ride amusement goes well with country music and a big old outdoor arena.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Inflatable Movie Screens- One last inflatable amusements you should consider adding to your party rental business inventory for rent is the Inflatable Movie Screen Amusement.&nbsp; This is a rental for all seasons all reasons and a fun entertaining party rental for outdoor events.&nbsp; Use in backyards, parks, driveways, kids love it anywhere.&nbsp; Adults are reminded of the old drive-in movies. Inflatable movie screens are a creative invention and a very profitable inflatable amusement to offer at your inflatable party rentals business.</p>\r\n\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not to be overshadowed by flashy inflatables another category of kid friendly kid favorite inflatable amusements are the group that includes anything with a siren and red light replicas, the inflatable emergency firetrucks. Inflatable firetrucks, big, red, and bright with exact replication of real fire trucks from the dalmation dogs to the big ladders on the side.&nbsp; There are even dalmation dog inflatable amusements that are bounce houses, slides, and combo units.</p>\r\n', 1, '2016-02-12 06:22:32', '2016-08-10 11:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '0- Top Category, ID- Sub category',
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1-active, 0 - deactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 0, 'Games', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(3, 0, 'Swimming pool', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(2, 0, 'Slides', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(1, 0, 'Sofa & Beds', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(5, 0, 'Toys', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(6, 0, 'Mattress', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(7, 0, 'Balloons', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(8, 0, 'Tents', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(9, 0, 'Air Dancer', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(10, 0, 'Arch', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(11, 0, 'Sumo Costume', 1, '2016-01-22 11:55:25', '2016-01-22 11:55:25'),
(15, 0, 'Water Units', 1, NULL, NULL),
(12, 0, 'Bouncers', 1, NULL, NULL),
(13, 0, 'Obstacles  ', 1, NULL, NULL),
(14, 0, 'Combos', 1, NULL, NULL),
(16, 0, 'Interactives ', 1, NULL, NULL),
(17, 0, 'Table & Chairs ', 1, NULL, NULL),
(18, 0, 'Shootings', 1, NULL, NULL),
(20, 0, 'Special Products', 1, NULL, '2016-02-01 05:10:44'),
(21, 0, 'Moonwalks', 1, NULL, NULL),
(35, 0, 'Slides dry', 1, '2016-01-28 04:31:44', '2016-01-28 04:31:44'),
(33, 0, 'Bounce Houses', 1, '2016-01-28 04:30:40', '2016-01-28 04:30:40'),
(34, 0, 'Module Units', 0, '2016-01-28 04:31:12', '2016-02-01 05:44:06'),
(32, 0, 'New inflatables', 1, '2016-01-28 04:29:26', '2016-01-28 04:29:26'),
(36, 0, 'Slides wet/dry', 1, '2016-01-28 04:32:30', '2016-01-28 04:32:30'),
(37, 0, 'Water Slides', 1, '2016-01-28 04:32:49', '2016-01-28 04:32:49'),
(38, 0, 'Big Slip Slides', 1, '2016-01-28 04:33:14', '2016-01-28 04:33:14'),
(39, 0, 'Combo Units', 1, '2016-01-28 04:33:40', '2016-01-28 04:33:40'),
(40, 0, 'Obstacle Courses', 1, '2016-01-28 04:33:58', '2016-01-28 04:33:58'),
(41, 0, 'Jr Obstacle Courses', 1, '2016-01-28 04:34:22', '2016-01-28 04:34:22'),
(42, 0, 'Kids/ Toddlers Inflatables', 1, '2016-01-28 04:34:43', '2016-01-28 04:34:43'),
(43, 0, 'Interactive Inflatables', 1, '2016-01-28 04:35:09', '2016-01-28 04:35:09'),
(44, 0, 'Inflatable Games', 1, '2016-01-28 04:35:41', '2016-01-28 04:35:41'),
(45, 44, 'shooting galleries', 1, '2016-01-28 04:36:27', '2016-01-28 04:36:27'),
(46, 44, ' inflatable archery game', 1, '2016-01-28 04:37:20', '2016-02-17 09:16:11'),
(47, 0, 'Extreme Challenging Inflatables', 0, '2016-01-28 04:37:46', '2016-02-01 05:45:52'),
(48, 0, 'Really BIG inflatables', 1, '2016-01-28 04:38:39', '2016-02-01 06:25:48'),
(49, 48, '$5', 1, '2016-01-28 04:40:14', '2016-02-01 07:09:37'),
(50, 48, '000+', 1, '2016-01-28 04:40:49', '2016-02-01 06:26:10'),
(51, 0, 'Custom Inflatables', 0, '2016-01-28 04:41:15', '2016-02-01 05:46:01'),
(52, 0, 'Used/Auctions Inflatables', 1, '2016-01-28 04:41:36', '2016-01-28 04:41:36'),
(53, 0, 'Sports Games/ Tunnels', 1, '2016-01-28 04:42:48', '2016-02-01 05:42:41'),
(54, 53, 'Volleyball Inflatable EZ', 0, '2016-01-28 04:43:27', '2016-01-28 04:43:27'),
(55, 53, 'Inflatable Soccer Ball', 0, '2016-01-28 04:43:57', '2016-01-28 04:43:57'),
(56, 53, 'Football Throw', 0, '2016-01-28 04:44:23', '2016-01-28 04:44:23'),
(57, 53, ' Racetrack', 1, '2016-01-28 04:44:52', '2016-02-02 06:10:54'),
(58, 0, 'Tracks/ Mazes', 1, '2016-01-28 04:45:30', '2016-01-28 04:45:30'),
(59, 0, 'Inflatable Balls', 1, '2016-01-28 04:45:58', '2016-01-28 04:45:58'),
(60, 59, 'Zorb Balls', 1, '2016-01-28 04:46:25', '2016-01-28 04:46:25'),
(61, 59, 'Walk on Water', 1, '2016-01-28 04:46:44', '2016-01-28 04:46:44'),
(62, 0, 'Inflatable Money Machines', 1, '2016-01-28 04:47:06', '2016-01-28 04:47:06'),
(63, 0, 'Inflatable Movie Screens', 1, '2016-01-28 04:47:27', '2016-01-28 04:47:27'),
(64, 0, 'Indoor Inflatables', 1, '2016-01-28 04:47:48', '2016-01-28 04:47:48'),
(65, 0, 'Seasonal Inflatables', 1, '2016-01-28 04:48:05', '2016-01-28 04:48:05'),
(66, 0, 'Licensed Themes', 1, '2016-01-28 04:48:21', '2016-01-28 04:48:21'),
(67, 0, 'Dunk Tanks', 0, '2016-01-28 04:48:42', '2016-02-01 05:45:57'),
(68, 0, 'Water Games', 1, '2016-01-28 04:48:57', '2016-02-01 04:34:44'),
(69, 0, 'Trains', 1, '2016-01-28 04:49:14', '2016-01-28 04:49:14'),
(70, 0, 'Carnival Games', 1, '2016-01-28 04:49:27', '2016-01-28 04:49:27'),
(71, 0, 'Kiddie Mobile Rides', 1, '2016-01-28 04:49:47', '2016-01-28 04:49:47'),
(72, 0, 'Tents', 1, '2016-01-28 04:50:37', '2016-01-28 04:50:37'),
(73, 0, 'Concessions', 1, '2016-01-28 04:50:52', '2016-01-28 04:50:52'),
(74, 0, 'Advertising Inflatables', 1, '2016-01-28 04:51:07', '2016-01-28 04:51:07'),
(75, 0, 'Module Panels', 1, '2016-01-28 04:51:24', '2016-01-28 04:51:24'),
(76, 0, 'Vinyl Banners', 1, '2016-01-28 04:51:38', '2016-01-28 04:51:38'),
(77, 0, 'Specialty Products', 1, '2016-01-28 04:51:54', '2016-02-01 11:19:01'),
(78, 77, 'EZ roller', 0, '2016-01-28 04:52:43', '2016-01-28 04:52:43'),
(79, 77, 'rolling machines', 0, '2016-01-28 04:53:19', '2016-01-28 04:53:19'),
(80, 77, ' new items', 1, '2016-01-28 04:53:38', '2016-02-01 11:19:16'),
(81, 0, 'Repairs', 1, '2016-01-28 04:53:58', '2016-01-28 04:53:58'),
(82, 0, 'Accessories', 1, '2016-01-28 04:54:13', '2016-01-28 04:54:13'),
(83, 0, 'Blowers', 1, '2016-01-28 04:54:28', '2016-01-28 04:54:28'),
(84, 0, 'Service Insurance', 1, '2016-01-28 04:54:43', '2016-01-28 04:54:43'),
(85, 0, 'Service Software', 1, '2016-01-28 04:55:10', '2016-01-28 04:55:10'),
(86, 0, 'Start-Up/ Franchise', 1, '2016-01-28 04:55:30', '2016-01-28 04:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `contact_method` tinyint(4) DEFAULT '1' COMMENT '1-Contact me by phone at time noted below, 2- Contact Any, 3- Contact me by email ',
  `email_bpt_listing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_big_blasts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'if any',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_1` mediumtext COLLATE utf8_unicode_ci,
  `state` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `accept_terms` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0->no, 1->yes',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_method`, `email_bpt_listing`, `email_big_blasts`, `first_name`, `last_name`, `company_name`, `title`, `phone`, `website`, `street_1`, `state`, `city`, `zip`, `province`, `country`, `notes`, `accept_terms`, `created_at`, `updated_at`) VALUES
(1, 2, 'test@test.com', 'test@test.com', 'NFLATABLES', NULL, 'NFLATABLES', 'Commercial Inflatables1', '1234567896', 'http://workplace.gisllp.com/biginfo/myaccount', '2425 Enterprise Drive', 'Indiana', 'Mendota Heights', '11111', '123', 'UNITED STATES', 'Tesd fjksjfhsdf sdfsjkdfhsdfs dfsdkjfhsdjf', 1, '2016-02-10 19:15:18', '2016-02-10 19:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`) VALUES
(1, 'Andorra', 'AD', 1),
(2, 'United Arab Emirates', 'AE', 1),
(3, 'Afghanistan', 'AF', 1),
(4, 'Antigua and Barbuda', 'AG', 1),
(5, 'Anguilla', 'AI', 1),
(6, 'Albania', 'AL', 1),
(7, 'Armenia', 'AM', 1),
(8, 'Netherlands Antilles', 'AN', 1),
(9, 'Angola', 'AO', 1),
(10, 'Asia/Pacific Region', 'AP', 1),
(11, 'Antarctica', 'AQ', 1),
(12, 'Argentina', 'AR', 1),
(13, 'American Samoa', 'AS', 1),
(14, 'Austria', 'AT', 1),
(15, 'Australia', 'AU', 1),
(16, 'Aruba', 'AW', 1),
(17, 'Aland Islands', 'AX', 1),
(18, 'Azerbaijan', 'AZ', 1),
(19, 'Bosnia and Herzegovina', 'BA', 1),
(20, 'Barbados', 'BB', 1),
(21, 'Bangladesh', 'BD', 1),
(22, 'Belgium', 'BE', 1),
(23, 'Burkina Faso', 'BF', 1),
(24, 'Bulgaria', 'BG', 1),
(25, 'Bahrain', 'BH', 1),
(26, 'Burundi', 'BI', 1),
(27, 'Benin', 'BJ', 1),
(28, 'Saint Bartelemey', 'BL', 1),
(29, 'Bermuda', 'BM', 1),
(30, 'Brunei Darussalam', 'BN', 1),
(31, 'Bolivia', 'BO', 1),
(32, 'Brazil', 'BR', 1),
(33, 'Bahamas', 'BS', 1),
(34, 'Bhutan', 'BT', 1),
(35, 'Bouvet Island', 'BV', 1),
(36, 'Botswana', 'BW', 1),
(37, 'Belarus', 'BY', 1),
(38, 'Belize', 'BZ', 1),
(39, 'Canada', 'CA', 1),
(40, 'Cocos (Keeling) Islands', 'CC', 1),
(41, 'Congo, The Democratic Republic of the', 'CD', 1),
(42, 'Central African Republic', 'CF', 1),
(43, 'Congo', 'CG', 1),
(44, 'Switzerland', 'CH', 1),
(45, 'Cote d''Ivoire', 'CI', 1),
(46, 'Cook Islands', 'CK', 1),
(47, 'Chile', 'CL', 1),
(48, 'Cameroon', 'CM', 1),
(49, 'China', 'CN', 1),
(50, 'Colombia', 'CO', 1),
(51, 'Costa Rica', 'CR', 1),
(52, 'Cuba', 'CU', 1),
(53, 'Cape Verde', 'CV', 1),
(54, 'Christmas Island', 'CX', 1),
(55, 'Cyprus', 'CY', 1),
(56, 'Czech Republic', 'CZ', 1),
(57, 'Germany', 'DE', 1),
(58, 'Djibouti', 'DJ', 1),
(59, 'Denmark', 'DK', 1),
(60, 'Dominica', 'DM', 1),
(61, 'Dominican Republic', 'DO', 1),
(62, 'Algeria', 'DZ', 1),
(63, 'Ecuador', 'EC', 1),
(64, 'Estonia', 'EE', 1),
(65, 'Egypt', 'EG', 1),
(66, 'Western Sahara', 'EH', 1),
(67, 'Eritrea', 'ER', 1),
(68, 'Spain', 'ES', 1),
(69, 'Ethiopia', 'ET', 1),
(70, 'Europe', 'EU', 1),
(71, 'Finland', 'FI', 1),
(72, 'Fiji', 'FJ', 1),
(73, 'Falkland Islands (Malvinas)', 'FK', 1),
(74, 'Micronesia, Federated States of', 'FM', 1),
(75, 'Faroe Islands', 'FO', 1),
(76, 'France', 'FR', 1),
(77, 'France, Metropolitan', 'FX', 1),
(78, 'Gabon', 'GA', 1),
(79, 'United Kingdom', 'GB', 1),
(80, 'Grenada', 'GD', 1),
(81, 'Georgia', 'GE', 1),
(82, 'French Guiana', 'GF', 1),
(83, 'Guernsey', 'GG', 1),
(84, 'Ghana', 'GH', 1),
(85, 'Gibraltar', 'GI', 1),
(86, 'Greenland', 'GL', 1),
(87, 'Gambia', 'GM', 1),
(88, 'Guinea', 'GN', 1),
(89, 'Guadeloupe', 'GP', 1),
(90, 'Equatorial Guinea', 'GQ', 1),
(91, 'Greece', 'GR', 1),
(92, 'South Georgia and the South Sandwich Islands', 'GS', 1),
(93, 'Guatemala', 'GT', 1),
(94, 'Guam', 'GU', 1),
(95, 'Guinea-Bissau', 'GW', 1),
(96, 'Guyana', 'GY', 1),
(97, 'Hong Kong', 'HK', 1),
(98, 'Heard Island and McDonald Islands', 'HM', 1),
(99, 'Honduras', 'HN', 1),
(100, 'Croatia', 'HR', 1),
(101, 'Haiti', 'HT', 1),
(102, 'Hungary', 'HU', 1),
(103, 'Indonesia', 'ID', 1),
(104, 'Ireland', 'IE', 1),
(105, 'Israel', 'IL', 1),
(106, 'Isle of Man', 'IM', 1),
(107, 'India', 'IN', 1),
(108, 'British Indian Ocean Territory', 'IO', 1),
(109, 'Iraq', 'IQ', 1),
(110, 'Iran, Islamic Republic of', 'IR', 1),
(111, 'Iceland', 'IS', 1),
(112, 'Italy', 'IT', 1),
(113, 'Jersey', 'JE', 1),
(114, 'Jamaica', 'JM', 1),
(115, 'Jordan', 'JO', 1),
(116, 'Japan', 'JP', 1),
(117, 'Kenya', 'KE', 1),
(118, 'Kyrgyzstan', 'KG', 1),
(119, 'Cambodia', 'KH', 1),
(120, 'Kiribati', 'KI', 1),
(121, 'Comoros', 'KM', 1),
(122, 'Saint Kitts and Nevis', 'KN', 1),
(123, 'Korea, Democratic People''s Republic of', 'KP', 1),
(124, 'Korea, Republic of', 'KR', 1),
(125, 'Kuwait', 'KW', 1),
(126, 'Cayman Islands', 'KY', 1),
(127, 'Kazakhstan', 'KZ', 1),
(128, 'Lao People''s Democratic Republic', 'LA', 1),
(129, 'Lebanon', 'LB', 1),
(130, 'Saint Lucia', 'LC', 1),
(131, 'Liechtenstein', 'LI', 1),
(132, 'Sri Lanka', 'LK', 1),
(133, 'Liberia', 'LR', 1),
(134, 'Lesotho', 'LS', 1),
(135, 'Lithuania', 'LT', 1),
(136, 'Luxembourg', 'LU', 1),
(137, 'Latvia', 'LV', 1),
(138, 'Libyan Arab Jamahiriya', 'LY', 1),
(139, 'Morocco', 'MA', 1),
(140, 'Monaco', 'MC', 1),
(141, 'Moldova, Republic of', 'MD', 1),
(142, 'Montenegro', 'ME', 1),
(143, 'Saint Martin', 'MF', 1),
(144, 'Madagascar', 'MG', 1),
(145, 'Marshall Islands', 'MH', 1),
(146, 'Macedonia', 'MK', 1),
(147, 'Mali', 'ML', 1),
(148, 'Myanmar', 'MM', 1),
(149, 'Mongolia', 'MN', 1),
(150, 'Macao', 'MO', 1),
(151, 'Northern Mariana Islands', 'MP', 1),
(152, 'Martinique', 'MQ', 1),
(153, 'Mauritania', 'MR', 1),
(154, 'Montserrat', 'MS', 1),
(155, 'Malta', 'MT', 1),
(156, 'Mauritius', 'MU', 1),
(157, 'Maldives', 'MV', 1),
(158, 'Malawi', 'MW', 1),
(159, 'Mexico', 'MX', 1),
(160, 'Malaysia', 'MY', 1),
(161, 'Mozambique', 'MZ', 1),
(162, 'Namibia', 'NA', 1),
(163, 'New Caledonia', 'NC', 1),
(164, 'Niger', 'NE', 1),
(165, 'Norfolk Island', 'NF', 1),
(166, 'Nigeria', 'NG', 1),
(167, 'Nicaragua', 'NI', 1),
(168, 'Netherlands', 'NL', 1),
(169, 'Norway', 'NO', 1),
(170, 'Nepal', 'NP', 1),
(171, 'Nauru', 'NR', 1),
(172, 'Niue', 'NU', 1),
(173, 'New Zealand', 'NZ', 1),
(174, 'Oman', 'OM', 1),
(175, 'Panama', 'PA', 1),
(176, 'Peru', 'PE', 1),
(177, 'French Polynesia', 'PF', 1),
(178, 'Papua New Guinea', 'PG', 1),
(179, 'Philippines', 'PH', 1),
(180, 'Pakistan', 'PK', 1),
(181, 'Poland', 'PL', 1),
(182, 'Saint Pierre and Miquelon', 'PM', 1),
(183, 'Pitcairn', 'PN', 1),
(184, 'Puerto Rico', 'PR', 1),
(185, 'Palestinian Territory', 'PS', 1),
(186, 'Portugal', 'PT', 1),
(187, 'Palau', 'PW', 1),
(188, 'Paraguay', 'PY', 1),
(189, 'Qatar', 'QA', 1),
(190, 'Reunion', 'RE', 1),
(191, 'Romania', 'RO', 1),
(192, 'Serbia', 'RS', 1),
(193, 'Russian Federation', 'RU', 1),
(194, 'Rwanda', 'RW', 1),
(195, 'Saudi Arabia', 'SA', 1),
(196, 'Solomon Islands', 'SB', 1),
(197, 'Seychelles', 'SC', 1),
(198, 'Sudan', 'SD', 1),
(199, 'Sweden', 'SE', 1),
(200, 'Singapore', 'SG', 1),
(201, 'Saint Helena', 'SH', 1),
(202, 'Slovenia', 'SI', 1),
(203, 'Svalbard and Jan Mayen', 'SJ', 1),
(204, 'Slovakia', 'SK', 1),
(205, 'Sierra Leone', 'SL', 1),
(206, 'San Marino', 'SM', 1),
(207, 'Senegal', 'SN', 1),
(208, 'Somalia', 'SO', 1),
(209, 'Suriname', 'SR', 1),
(210, 'Sao Tome and Principe', 'ST', 1),
(211, 'El Salvador', 'SV', 1),
(212, 'Syrian Arab Republic', 'SY', 1),
(213, 'Swaziland', 'SZ', 1),
(214, 'Turks and Caicos Islands', 'TC', 1),
(215, 'Chad', 'TD', 1),
(216, 'French Southern Territories', 'TF', 1),
(217, 'Togo', 'TG', 1),
(218, 'Thailand', 'TH', 1),
(219, 'Tajikistan', 'TJ', 1),
(220, 'Tokelau', 'TK', 1),
(221, 'Timor-Leste', 'TL', 1),
(222, 'Turkmenistan', 'TM', 1),
(223, 'Tunisia', 'TN', 1),
(224, 'Tonga', 'TO', 1),
(225, 'Turkey', 'TR', 1),
(226, 'Trinidad and Tobago', 'TT', 1),
(227, 'Tuvalu', 'TV', 1),
(228, 'Taiwan', 'TW', 1),
(229, 'Tanzania, United Republic of', 'TZ', 1),
(230, 'Ukraine', 'UA', 1),
(231, 'Uganda', 'UG', 1),
(232, 'United States Minor Outlying Islands', 'UM', 1),
(233, 'United States', 'US', 1),
(234, 'Uruguay', 'UY', 1),
(235, 'Uzbekistan', 'UZ', 1),
(236, 'Holy See (Vatican City State)', 'VA', 1),
(237, 'Saint Vincent and the Grenadines', 'VC', 1),
(238, 'Venezuela', 'VE', 1),
(239, 'Virgin Islands, British', 'VG', 1),
(240, 'Virgin Islands, U.S.', 'VI', 1),
(241, 'Vietnam', 'VN', 1),
(242, 'Vanuatu', 'VU', 1),
(243, 'Wallis and Futuna', 'WF', 1),
(244, 'Samoa', 'WS', 1),
(245, 'Yemen', 'YE', 1),
(246, 'Mayotte', 'YT', 1),
(247, 'South Africa', 'ZA', 1),
(248, 'Zambia', 'ZM', 1),
(249, 'Zimbabwe', 'ZW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `order` int(6) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `order`, `status`, `created_at`) VALUES
(2, 'Natoque Nunc Netus At', '<p>Dictumst id suspendisse augue montes. Quisque faucibus nisi dolor <em>vel</em> bibendum cubilia viverra metus eros, class curabitur, purus dignissim nunc massa mauris imperdiet nisl tempus <em>pellentesque</em> auctor condimentum justo praesent.</p>\r\n', NULL, 1, '2016-09-08'),
(3, 'Montes Erat Orci Class Urna', '<h3>Non Ornare Nostra Mauris Leo Facilisi Condimentum Vitae</h3>\r\n\r\n<p>Feugiat scelerisque primis. Porta orci hendrerit. Vulputate luctus curae;. Curae; erat massa aenean potenti dictumst parturient libero ac lorem nisi sociosqu dapibus condimentum parturient, vestibulum. Lorem sodales Nullam suscipit aptent accumsan, cubilia viverra. Elementum dictumst adipiscing fusce malesuada condimentum.</p>\r\n', NULL, 1, '2016-09-08'),
(4, 'Libero Integer Aliquet Convallis In Lectus', '<p>Orci sed hac nunc quis lectus facilisi Ridiculus vehicula est phasellus tempus. Amet cum primis gravida habitasse etiam hac fusce arcu erat tellus sollicitudin lobortis. Lacus hymenaeos sapien nulla fringilla fusce. Quisque ridiculus <em>diam</em> risus vitae blandit venenatis quisque phasellus.</p>\r\n', NULL, 1, '2016-09-08'),
(6, 'This is a testing...', '<p>yy</p>\r\n', NULL, 1, '2017-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `bottom_tagline` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` tinytext COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-active, 0 - deactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `bottom_tagline`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about-us', 'Test', '<p>Test</p>\r\n', 'Tents, Interactive Sports, Modules, Module Art Panels, Interactive Sports, Games Air Dancers, Zorb Balls, Carnival Rides, Mechanical Bull, Dunk Tanks, Balloons', 'Test', 'Test', 'Test', 1, '2014-09-18 05:13:18', '2017-05-05 10:54:42'),
(2, 'advertise', 'Advertise, promote, and market your wholesale inflatables company for maximum exposure. Reach buyers of Commercial Bounce Houses, Inflatables, Carnival Games, Rides, and Party Rentals.', '<p><b>Want an edge on your competition?</b></p>\r\n\r\n<p>Put your company in front of the most inflatables, amusements, and party rental companies on one site. Advertise your message to our hot active email database. Reach buyers of Commercial Inflatables, Slides, Bounce Houses, DunkTanks, Carnival Games.</p>\r\n\r\n<p><b><span class="auto-style40">Inflatables&#39; Suppliers and Manufacturers:</span><br />\r\n<a class="auto-style42" href="mailto:BIG@BIGINFLATABLETHINGS.COM?subject=BIG Subscription Information request"><span class="auto-style41">Request Subscription information</span></a> for THE BIG internet marketing and email promotions programs. </b></p>\r\n\r\n<p>Our Internet marketing efforts allow you to reach new buyers and decision makers, owners, rental dealers, organizations, corporations, schools, churches, promoters, event planners, and individuals interested in your products for purchase. Gain exposure for your fun inflatable rides, rental amusements, carnival and water games, prizes, unique mobile amusements for rentals like miniature golf, challenging competitions such as inflatable shooting galleries.</p>\r\n\r\n<ul class="static_page_ul">\r\n	<li>Tile image ad linked to your company page</li>\r\n	<li>Company Page links to your site page indexed in Search Engines for added page rank</li>\r\n	<li>Access to Sales Leads - complete contact information</li>\r\n	<li>Monthly Email Blast - customer list of thousands opt-in to receive your messages</li>\r\n	<li>Subscribe using PayPal, company check, or credit card</li>\r\n</ul>\r\n\r\n<p>BigInflatableThings.com - Huge exposure with an ad on our site linked to yours.&nbsp; See sales leads now!&nbsp; We&#39;ve got customers looking for inflatables, amusements, and party rentals for &quot;Purchase&quot;, &quot;Start-up Business&quot; and &quot;Party Rental Inventory!&quot;&nbsp;</p>\r\n\r\n<p><br />\r\n- <b>As a subscriber </b>you contact customers directly and offer assistance to companies planning their purchases while helping figure rental rates to bring strong returns on their investments.<br />\r\n- <b>As a subscriber</b> you access continual leads from potential customers including contact information to meet them and help research their projects.<br />\r\n<br />\r\nAfter one year you will own a customer database of rental dealers, start-ups, and interested individuals enabling you to continue your marketing efforts! Ads, Exposure, Back links, Email Blasts, Leads - subscribe now!</p>\r\n\r\n<div class="auto-style40" style="margin: 20px 0px;"><b><span class="auto-style40">Email us: </span> <a class="auto-style40" href="mailto:BIG@BIGinflatableThings.com"> <span class="auto-style40">BIG@BIGinflatableThings.com</span></a><br />\r\n<span class="auto-style40"><span class="auto-style42">or call Jill 210-657-2012</span></span></b></div>\r\n\r\n<p><span class="auto-style40"><b>Only $199 - reach our members with your message!</b></span></p>\r\n\r\n<p>Put your company in front of the most inflatables, amusements, and party rental companies on one site. Advertise your message to our hot active email database. Reach buyers of Commercial Inflatables, Slides, Bounce Houses, DunkTanks, Carnival Games.</p>\r\n\r\n<p><b><span class="auto-style40">BIG BLASTS are sent for you via email from</span><br />\r\n<span class="auto-style40">BIGinflatableThings.com</span> and delivered to 5,000 recipients whose interest is in the inflatables and amusements indutries. </b></p>\r\n\r\n<p>Find customers... meet active contacts... get fresh product inquiries. Communicate your message to industry specific contacts in inflatables and party rentals .Get your announcement into thousands of email in-boxes today!</p>\r\n\r\n<ul class="static_page_ul">\r\n	<li>Reach 5,000 individuals who make purchasing decisions.</li>\r\n	<li>Adults 25+ with $3,500+ avg. major purchases.</li>\r\n	<li>Put your current specials or sales in front of buyers.</li>\r\n	<li>Re-send your blast to all who did not open first time.</li>\r\n	<li>Free contact info on 25 individuals who clicked on your ad!</li>\r\n</ul>\r\n\r\n<h2 style="padding:25px;font-weight:bold;font-size:medium;">REACH IMPORTANT CONTACTS LIKE THESE:</h2>\r\n\r\n<ul class="static_page_ul">\r\n	<li>Bounce House Companies</li>\r\n	<li>Party Rental Companies</li>\r\n	<li>FEC Family Entertainment Centers</li>\r\n	<li>Schools and Churches</li>\r\n	<li>Small and Large Businesses</li>\r\n	<li>Start-Up Companies</li>\r\n	<li>Individual Purchases</li>\r\n	<li>Event Planners</li>\r\n	<li>Catering Companies</li>\r\n	<li>Community Purchases</li>\r\n	<li>Franchises</li>\r\n	<li>Military</li>\r\n</ul>\r\n\r\n<p>Reach Buyers. BIG Blast your email today!<br />\r\nSend us the image, or the URL to your ad, a subject line and your preferred schedule for your BIG BLAST.</p>\r\n\r\n<p>If you aren&#39;t sending email messages monthly then you&#39;re missing out on some real and affordable direct target marketing.</p>\r\n\r\n<div class="auto-style40" style="margin: 20px 0px;"><b><span class="auto-style40">Email us: </span> <a class="auto-style40" href="mailto:BIG@BIGinflatableThings.com"> <span class="auto-style40">BIG@BIGinflatableThings.com</span></a><br />\r\n<span class="auto-style40"><span class="auto-style42">or call Jill 210-657-2012</span></span></b></div>\r\n', 'Licensed bounce houses, water slides, jumpers, bouncy castles, inflatable jumpers, combos, obstacles, trackless trains, zorb balls, photo booths, custom inflatables.', 'Advertise', 'Advertise', 'Advertise', 1, '2014-09-18 06:17:17', '2016-02-20 05:33:52'),
(4, 'promotion', 'Promotions', '<p>Fusce dictum pharetra nam sociis cum est. Lacus magna sapien dis. Morbi nullam posuere elit cras dictumst. Ornare imperdiet mauris ut diam felis Felis commodo, curabitur senectus luctus tincidunt consectetuer iaculis tortor est iaculis, dictumst, vel. Mauris molestie primis convallis vestibulum quam morbi vulputate cras. Blandit, curae;. Ante tincidunt aenean sollicitudin habitasse dolor, cum netus id ultricies natoque id sed ultrices metus velit per pharetra commodo etiam semper. Nulla. Mattis taciti vitae semper nascetur sodales netus Inceptos primis ultricies lobortis vestibulum blandit commodo sem elementum feugiat ipsum phasellus ultricies Bibendum litora massa luctus velit nisi. Aenean interdum cubilia fames duis tellus, nullam primis pharetra nec eu non lacus et purus etiam at. Suscipit arcu montes nec praesent. Dolor, in proin turpis risus nisl.</p>\r\n\r\n<p>Mattis venenatis amet eleifend praesent fames litora nunc facilisi. Nam tempus mattis, morbi auctor interdum consequat velit, metus ipsum sagittis amet venenatis ut auctor convallis praesent habitasse elit class sociis nascetur dolor mus hendrerit sociosqu ullamcorper. Curabitur tellus. Sem rutrum sociis nulla cursus purus pretium montes per pulvinar condimentum luctus. Mus elit libero, aliquet. Scelerisque aenean cubilia euismod praesent est, facilisi montes, libero nisl tempor venenatis sem hendrerit id. Dictum. Primis ligula integer semper volutpat leo dignissim velit ac gravida.</p>\r\n\r\n<p>Aptent. Ipsum rutrum at metus vel egestas eu mollis euismod. Tincidunt tellus. Volutpat diam. Orci donec. Gravida aptent, aliquet ridiculus Quisque quam adipiscing nam lobortis inceptos. Neque cursus mi. Torquent suspendisse eros velit. Netus aptent. Feugiat bibendum lacus ultricies pretium sociis. Mauris ultricies cum lectus. Mus, euismod tempus suspendisse volutpat etiam gravida senectus vehicula tempor nibh potenti faucibus netus nibh. Interdum pulvinar. Feugiat per, purus semper adipiscing fusce leo tempor. Natoque quis fringilla neque volutpat, taciti praesent, nibh natoque fames. Inceptos. Lacinia venenatis cum metus gravida a fusce. Magnis dictum felis donec habitasse venenatis adipiscing inceptos et.</p>\r\n', 'Licensed bounce houses, water slides, jumpers, bouncy castles, inflatable jumpers, combos, obstacles, trackless trains, zorb balls, photo booths, custom inflatables', 'Promotions', 'Promotions', 'Promotions', 1, '2014-09-18 06:17:17', '2016-05-06 04:40:16'),
(3, 'contact-us', 'Contact BIGinflatableThings.com', '<p><strong><a href="mailto:BIG@BIGinflatableThings.com" title="mailto:BIG@BIGinflatableThings.com">BIG@BIGinflatableThings.com </a><br />\r\nJill Fox/ SALES and MARKETING:<br />\r\noffice 210-896-6010, text 210-896-6011 </strong></p>\r\n\r\n<p><strong>Rent Bounce Houses and other party rentals </strong> <a href="http://192.168.1.16/projects/laravel/biginfo/form/start-a-inflatables-biz"><strong>here</strong></a></p>\r\n\r\n<p><strong><a href="http://192.168.1.16/projects/laravel/biginfo/free-company-submission">FREE Company submission to the BIG Rental Search</a></strong><br />\r\nYour company contact information for increased exposure.<br />\r\nMake sure you are found where rental customers are looking for you.</p>\r\n\r\n<ul>\r\n	<li>The BIG Rental search by city, state, and zip.</li>\r\n	<li>Company listing uses backlinks to your website.</li>\r\n	<li>BIG custom Google Site Search by keywords.</li>\r\n	<li>Your contact info available to web site visitors.</li>\r\n</ul>\r\n\r\n<p><strong>Direct Contact with Manufacturers and Suppliers</strong></p>\r\n\r\n<ul>\r\n	<li>Receive email-only inflatables and amusements specials and discounts<br />\r\n	from dealers who want to do business with you.</li>\r\n	<li>Be among the first who are introduced to new inflatables&#39; suppliers.</li>\r\n	<li>Get in on offers sent by email to members only.</li>\r\n	<li>Take part in Interactive Promotions, Contests, and Prizes.</li>\r\n	<li>Find out about Specials, Discounts, Catalogs, Products, Auctions, Liquidations, New and Used inflatables.</li>\r\n</ul>\r\n\r\n<p>Contact BIGinflatableThings.com today.&nbsp; Learn how you can actively participate with us and gain exposure to interested potential customers in the inflatables and party rentals industries searching online for your products for rent and for sale.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Inflatable Blowers, Bounce Houses, Rides, Wet Slides, Play Grounds, Mazes, Tracks Strikers, Water Games, Dunk Tanks, Bouncers, Interactive Games, Dry Slides, Tents', 'Contact Big', 'Contact Big', 'Contact Big', 1, '2014-09-18 06:17:17', '2016-06-29 12:47:40'),
(6, 'privacy-statement', 'Privacy Statement', '<p><font face="Arial" size="2">Privacy Statement\r\n<a href="http://www.BIGinflatableThings.com">www.BIGinflatableThings.com</a></font></p>\r\n<p><font face="Arial" size="2">Thank you for your interest in the inflatables \r\nand party rentals industries.</font></p>\r\n\r\n<p><font face="Arial" size="2">By submitting your information you are asking to \r\nreceive communication from BIGinflatableThings.com and \r\nsuppliers of inflatables and party rentals for wholesale purchase.</font></p>\r\n\r\n<p><font face="Arial" size="2">Responding companies'' actual business is \r\n                                          conducted \r\n                                            individually and totally separately from FOXyGARCIA, Inc and \r\n                                            <a href="http://www.BIGinflatableThings.com">www.BIGinflatableThings.com</a></font></p>\r\n\r\n<p><font face="Arial" size="2">BIGinflatableThings.com is owned and business is \r\nconducted by FOXyGARCIA, Inc., a Texas corporation in good standing.</font></p>\r\n\r\n<p><font face="Arial" size="2">Contact FOXyGARCIA, Inc at \r\nBIG@BIGinflatableThings.com, or write us at 12031 Woodsrim St San Antonio TX \r\n78233.</font></p>\r\n\r\n<p><font face="Arial" size="2">At any time you can unsubscribe from \r\nour email list by visiting the link provided in each message.</font></p>\r\n<p><font face="Arial" size="2">updated January 2016.</font></p>\r\n\r\n<p><font face="Arial" size="2">\r\n      <a href="javascript:window.close()">close window</a></font></p>', 'Licensed bounce houses, water slides, jumpers, bouncy castles, inflatable jumpers, combos, obstacles, trackless trains, zorb balls, photo booths, custom inflatables', 'Privacy Statement', 'Privacy Statement', 'Privacy Statement', 1, '2016-02-08 06:15:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `slug`, `value`, `type`, `description`) VALUES
(1, 'Site Name', 'site_name', 'Housesharemarket', 'text', 'Website name will be used in site emails, from name etc'),
(2, 'Admin Email', 'admin_email', 'admin@test.com', 'text', 'Website primary email used by emails as from address'),
(4, 'Linked Profile', 'linkedin_api_id', 'http://in.linkedin.com/', 'text', 'Linked in URL with http'),
(5, 'Google Plus', 'gplus', 'https://plus.google.com', 'text', 'Google plus url with http'),
(6, 'Facebook', 'facebook', 'https://www.facebook.com/', 'text', 'Facebook url with http'),
(7, 'Twitter', 'twitter', 'https://twitter.com/', 'text', 'Twitter url with http');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT 'access email by this code',
  `name` varchar(256) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `content` text,
  `description` text,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `slug`, `name`, `subject`, `content`, `description`, `updated_at`) VALUES
(2, 'activate-business', 'Business Activation', 'Business Activation', '<p>Hi {NAME},</p>\r\n\r\n<p>Your business have been activated. Please login with following detail over site to manage your products and request leads.</p>\r\n\r\nUser: {Username}<br/>\r\nPassword: {Password}<br/>\r\n\r\n<p>Thanks&nbsp;<br />\r\n{SITE}</p>\r\n', '{NAME} = Name <br/>\r\nUser: {Username}<br/>\r\nPassword: {Password}<br/>\r\n{SITE} = Site Name', '2016-01-02 00:00:00'),
(16, 'forgot_password', 'Forgot Password', 'Recover Your Profile Password', '<p>Hi {NAME}</p><p>Recover your profile password on {SITE}!</p><p>Your login information is:</p><p>Username/Email: <strong>{EMAIL_ADDRESS}</strong></p><p>Password: <strong>{NEW_PASSWORD}</strong></p><p>If you did not request this action, please ignore this mail.</p><p>Please feel free to contact us if you need any assistance.</p><p>Thanks<br /><br />{SITE}</p>', '<p> \r\n	Required short keys are:<br />\r\n	{NAME} : Name of Receiver<br /> \r\n{NEW_PASSWORD} : Your new password password generate<br /> 	{SITE} : Website Name</p>', '2016-03-01 00:00:00'),
(15, 'add-to-cart-admin', 'Request for Add to Cart', '{NAME} added {P_COUNT} products to his cart', '<p>Hi {SITE},</p>\r\n\r\n<p>{NAME} has added {P_COUNT} products to his cart.</p>\r\n\r\n<p>Buyer Detail:</p>\r\n<p>Name : {NAME}<br /><br />\r\nEmail : {EMAIL}<br /><br />\r\nPhone Number : {PHONE} <br /><br />\r\nAddress : {ADDRESS}<br /><br />\r\nCity : {CITY}<br /><br />\r\nState : {STATE} <br /><br />\r\nZip Code : {ZIP}\r\n</p>\r\n<p>Product Details</p>\r\n{PRODUCT_TABLE}\r\n<p>Thanks<br /><br />\r\n{SITE}</p>\r\n', '{NAME} : Buyer Name\n{EMAIL} : Buyer Email Address\n{PHONE} : Buyer''s Phone Number\n{ADDRESS} : Buyer''s ADDRESS\n{CITY} : Buyer''s City\n{STATE} : Buyer''s State\n{ZIP} : Buyer''s Zip Code\n{PRODUCT_TABLE} : Products Table\n{SITE} : Site Name', '2016-01-28 12:01:50'),
(17, 'classified_signup', 'General user sign up for profile', 'Get full control on your profile', '<p>Hi {NAME}</p>\n\n<p>Login on {SITE} and control your profile!</p>\n\n<p>Your login information is:</p>\n\n<p>Username/Email: <strong>{EMAIL_ADDRESS}</strong></p>\n\n<p>Password: <strong>{NEW_PASSWORD}</strong></p>\n\n<p>If you did not request this action, please ignore this mail.</p>\n\n<p>Please feel free to contact us if you need any assistance.</p>\n\n<p>Thanks<br /><br />\n{SITE}</p>', '<p> \r\n	Required short keys are:<br />\r\n	{NAME} : Name of Receiver<br /> \r\n{NEW_PASSWORD} : Your new password password generate<br /> 	{SITE} : Website Name</p>', '2016-03-01 00:00:00'),
(18, 'reply-on-jobs', 'Reply on jobs', 'Reply on jobs', '<p>Hi {NAME},</p>\r\n\r\n<p>{MESSAGE}</p>\r\n\r\n<p>Thanks&nbsp;<br />\r\n{SITE}</p>\r\n', NULL, '2016-04-13 08:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` tinyint(4) DEFAULT NULL COMMENT '1-Admin, 2 - User',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1-male, 2-female',
  `street_1` mediumtext COLLATE utf8_unicode_ci,
  `street_2` mediumtext COLLATE utf8_unicode_ci,
  `state` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=inactive | 1=active | 2- blocked',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `varify_hash` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `first_name`, `last_name`, `office_name`, `office_website`, `description`, `mobile`, `photo`, `gender`, `street_1`, `street_2`, `state`, `city`, `zip`, `country_id`, `status`, `created_at`, `updated_at`, `remember_token`, `varify_hash`) VALUES
(1, 1, 'admin@test.com', '$2y$10$aA.T.xfStJrqzR20Sr.tX.U03Lb8NzkC/oPm.D7zK.40bDztzVPAK', 'Vardhaman', 'Admin', '', '', ' Lorem ipsum dolor sit amet diam nonummy nibh dolore.', '1234567890', '1493894555_357096354.png', 1, 'Gt Road 125', 'Landmark', 'Rajasthan', 'Jaipur', '302017', 107, 1, '2015-10-29 05:10:16', '2017-05-05 10:58:06', 'SJ2a7r0YRq6AUOlsaxmSNRxRUKpcUrNDAt8PRI3oFayPOpHIbbYjpciYLbUV', NULL),
(2, 2, 'johan@test.com', '$2y$10$6WC8rLbaMWIFIn0IL0ofD.vBkpdvllm9H0LTcxnue0wDKWgLmXEgK', 'Johan', 'Dev', 'NFLATABLES', '', '<p>We''ve helped countless customers take their business to the next level. The Cutting Edge™ brand is the leading of commercial-grade inflatables, and our team has decades of experience. If you''re looking for anything from an inflatable bounce house, moonwalk or jumper, an inflatable slide or water slide, or even an inflatable game or obstacle course, we have something you''ll love.</p>\r\n', '', '1473340874_792941623.png', 1, '2425 Enterprise Drive', 'Suite 600', 'MN', 'Mendota Heights', '55120', 107, 1, '2015-10-29 05:10:16', '2016-09-08 13:21:14', 'no1SebIPVRzLNp32DSnw8PA2wPCXTdSIcelt7QZ4YI15s7dSQLpYUbn4kAx3', NULL),
(3, 2, 'dev@test.com', '$2y$10$6WC8rLbaMWIFIn0IL0ofD.vBkpdvllm9H0LTcxnue0wDKWgLmXEgK', 'Darren', 'Sammy', '', 'https://www.google.co.in', 'This is testing........', '9785825735', '1473340808_548502604.jpg', 2, '45, Test Dev', 'Jaipur', 'Rajasthan', 'Jaipur', '302017', 107, 1, '2015-10-29 05:10:16', '2016-09-08 13:20:08', 'no1SebIPVRzLNp32DSnw8PA2wPCXTdSIcelt7QZ4YI15s7dSQLpYUbn4kAx3', NULL),
(4, 2, 'test@test.com', '$2y$10$aMbWHW1DOZxAC.jQZQ2d4.97eMbfem4iSr.yzgkI2edmlK4l2MvRC', 'Jay', 'Whatson', NULL, NULL, 'This is a testing...', '1234567890', '1493972789_341796874.png', 2, 'Gt Road 125', 'Landmark', 'Rajasthan', 'Jaipur', '123456', 107, 1, '2017-05-05 08:26:29', '2017-05-05 08:28:46', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
