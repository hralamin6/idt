-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2022 at 07:37 AM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oiouhuxp_idt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `name_bn`, `description`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'I controlled my eyes', 'চোখ নিয়ন্ত্রণ করেছি', 'I Did Not Voluntarily Look At Any Haram SceneRather, I Have Tried My Best To Keep My Eyes Restrained.', 'কোনো ভাবেই কোনো হারাম দৃশ্যের দিকে সেচ্ছায় দৃষ্টি দেই নি, বরং চোখ সংযত রাখার সর্বোচ্চ চেস্টা করেছি।', 1, '2022-04-27 10:56:06', '2022-04-27 10:56:06'),
(2, 'I have controlled my ears', 'কান সংযত রেখেছি', 'I refrain from listening to all kinds of haraam things, including song, music etc.', 'সব ধরণের গান-বাজনা মিউজিক সহ সকল হারাম জিনিস শোনা থেকে বিরত থেকেছি।', 1, '2022-04-27 04:56:06', '2022-04-27 04:56:06'),
(3, 'I didn\'t insult anyone', 'কাউকে গালি দেইনি', 'I have refrained from calling in a fake name or insulting anyone, I have not insulted or hurt anyone unnecessarily.', 'মন্দ নামে ডাকা বা গালি দেয়া থেকে বিরত থেকেছি, অকারণে কাউকে অপমান বা কারো মনে কষ্ট দেইনি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(4, 'I did not gossip', 'গিবত করিনি', 'I did not gossip about him in the absence of anyone, but I stopped the gossipers or left their company.', 'কারো অনুপস্থিতিতে তার পরচর্চা করিনি, বরং গিবতকারীদের বাঁধা দিয়েছি বা তাদের সঙ্গ ত্যাগ করেছি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(5, 'I did not lie', 'মিথ্যা কথা বলিনি', 'It\'s a far cry from lying, I didn\'t even try to lie. I didn\'t even talk to anyone vaguely.', 'মিথ্যা বলা তো দূরের কথা, মিথ্যা বলার চেষ্টাও করিনি। এমনকি কারো সাথে অস্পষ্টভাবেও কথা বলিনি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(6, 'I suppressed anger', 'রাগ দমন করেছি', 'I did not speak loudly to the adults, I treated the children as best I could.', 'বড়দের সাথে উচ্চস্বরে কথা বলিনি, ছোটদের সাথে যথাসম্ভব  উৎকৃষ্ট আচরণ করেছি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(7, 'I did not cheat', 'প্রতারণা করিনি', 'I did not even try to deceive or harm people without their knowledge.', 'মানুষের অজান্তে তাদের ঠকানো বা কোনো ক্ষতি করার চেস্টাও করিনি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(8, 'I did not disobey my parents', 'পিতামাতার অবাধ্য হইনি', 'I obeyed or tried my best to obey all the commands of parents.', 'পিতা মাতার শরীয়তসম্মত সকল আদেশ পালন করেছি বা করার সর্বাত্মক চেষ্টা করেছি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(9, 'I did not miss prayer', 'সালাত মিস করিনি', 'I have performed the five daily prayers on time.', 'পাঁচ ওয়াক্ত সালাতই সময়মতো আদায় করেছি।', 1, '2022-04-27 16:56:06', '2022-04-27 16:56:06'),
(10, 'I did not miss Jamaat', 'জামায়াত মিস করিনি', 'I have prayed five times prayers with Jamaat.', 'পাঁচ ওয়াক্ত সালাতই জামায়াতের সাথে আদায় করেছি।', 1, '2022-04-27 10:56:06', '2022-04-27 10:56:06'),
(11, 'I exercised', 'ব্যায়াম করেছি', 'I did physical exercise for at least ten minutes.', 'অন্তত দশ মিনিটের জন্য হলেও শারীরিক কসরত করেছি।', 1, '2022-04-28 05:35:59', '2022-04-28 05:35:59'),
(12, 'I slept properly', 'যথাযথ ঘুমিয়েছি', 'I slept routinely on time, never got too sleepy or sleepless.', 'সময়মত রুটিনমাফিক ঘুমিয়েছি, কোনোভাবেই অতি নিদ্রা বা নিদ্রাহীন থাকিনি।', 1, '2022-04-28 05:40:56', '2022-04-28 05:40:56'),
(13, 'I studied/worked properly', 'যথাযথ পড়াশোনা/কাজ করেছি', 'I have studied / worked for a certain period of time as per routine.', 'রুটিনঅনুসারে নির্দিষ্ট সময় পর্যন্ত পড়াশোনা/কাজ করেছি।', 1, '2022-04-28 05:50:43', '2022-04-28 05:50:43'),
(14, 'I acquired Islamic knowledge', 'দ্বিনি ইলম অর্জন করেছি', 'I have studied Quran, Hadith or Sirah for at least 20 minutes.', 'অন্তত ২০ মিনিটের জন্য হলেও কুআন, হাদিস বা সীরাহ গ্রন্থ অধ্যায়ন করেছি।', 1, '2022-04-28 05:57:02', '2022-04-28 05:57:02'),
(15, 'I donated', 'দান করেছি', 'I have donated at least five taka to the zakat fund according to my ability.', 'সামর্থ অনুযায়ী অন্তত পাঁচ টাকা হলেও যাকাত ফান্ডে দান করেছি।', 1, '2022-04-28 06:01:32', '2022-04-28 06:01:32'),
(16, 'I did not get drunk', 'নেশা করিনি', 'I did not take any kind of alcohol including bidi, cigarette, jorda, yaba.', 'বিড়ি, সিগারেট, জর্দা, ইয়াবা সহ কোনো প্রকার মদ্যপ বস্তু গ্রহণ করিনি।', 1, '2022-04-28 06:08:42', '2022-04-28 06:08:42'),
(17, 'I ate healthy food', 'স্বাস্থকর খাবার খেয়েছি', 'I have not eaten any food which is harmful to health including junk food, cold drinks, fried food, open food on the sidewalk.', 'জাঙ্কফুড, কোল্ডড্রিংকস, ভাজাপোড়া, ফুটপাতের খোলা খাবার সহ স্বাস্থের জন্য ক্ষতিকর কোনো খাবার খাইনি।', 1, '2022-04-28 06:14:07', '2022-04-28 06:14:07'),
(18, 'I did not use social media', 'স্যোসাল মিডিয়া ইউজ করিনি', 'Even if I use social media for a valid reason, I try not to take a much time.', 'একান্ত প্রয়োজনে স্যোসাল মিডিয়া ইউজ করলেও অতিরিক্ত সময় নেইনি।', 1, '2022-04-28 06:25:45', '2022-04-28 06:25:45'),
(19, 'I did not waste', 'অপচয় করিনি', 'I did not waste money, food, clothes, or any other material, even I did use time wisely.', 'টাকাপয়সা, খাবার, পোষাক সহ কোনো বস্তু সামগ্রী অপচয় করিনি, এমনকি সময়েরও সঠিক ব্যবহার করেছি।', 1, '2022-04-28 06:34:12', '2022-04-28 06:34:12'),
(20, 'I guarded private part', 'লজ্জাস্থান হেফাজত করেছি', 'I have properly maintained the Islamic Porda and did not exceed the limits.', 'যথাযথভাবে পর্দা মেইনটেইন করেছি এবং সীমালঙ্ঘন করিনি।', 1, '2022-04-28 06:47:13', '2022-04-28 06:47:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
