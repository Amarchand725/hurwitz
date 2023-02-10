-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2023 at 10:07 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hurwitz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Doe', 'admin@gmail.com', '$2a$12$gGLiZ7dw8Yd1dFwkzOFqoeHoV.CGG34tsp7mQ5kjOGtni3wDvXLzu', NULL, '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
CREATE TABLE IF NOT EXISTS `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `initial_price` double(8,2) DEFAULT NULL,
  `final_price` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auction_statuses`
--

DROP TABLE IF EXISTS `auction_statuses`;
CREATE TABLE IF NOT EXISTS `auction_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_statuses`
--

INSERT INTO `auction_statuses` (`id`, `name`, `class`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Open', 'success', 1, '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL),
(2, 'Closed', 'danger', 1, '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biddings`
--

DROP TABLE IF EXISTS `biddings`;
CREATE TABLE IF NOT EXISTS `biddings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidding_statuses`
--

DROP TABLE IF EXISTS `bidding_statuses`;
CREATE TABLE IF NOT EXISTS `bidding_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidding_statuses`
--

INSERT INTO `bidding_statuses` (`id`, `name`, `class`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', 'warning', '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL),
(2, 'Approved', 'success', '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL),
(3, 'Rejected', 'danger', '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL),
(4, 'Closed', 'danger', '2023-01-04 18:48:20', '2023-01-04 18:48:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `long_description`, `main_image`, `featured_image`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Success And the Many Fathers', 'Some people assume that success does not come from dedication but is handed to them. Fighting for that token gives them control, authority, and the belief that they can influence others..', '<p>Living your life is more than ensuring you adhere to your needs and requirements. It is more than making sure your essentials are met or the fact that you have a particular goal</p>', 'main_1672880665success-and-the-many-fathers.png', 'featured_1672880665success-and-the-many-fathers.png', 'success-and-the-many-fathers', 1, '2023-01-05 01:04:25', '2023-01-05 01:04:25', NULL),
(2, 'More Than Just Living', 'Living your life is more than ensuring you adhere to your needs and requirements.', '<p>Living your life is more than ensuring you adhere to your needs and requirements. It is more than making sure your essentials are met or the fact that you have a particular goal</p>', 'main_1672880746more-than-just-living.png', 'featured_1672880746more-than-just-living.png', 'more-than-just-living', 1, '2023-01-05 01:05:46', '2023-01-05 01:05:46', NULL),
(3, 'Light at the end of the tunnel', 'When you look at the brighter side of life.', '<p>When you look at the brighter side of life, you fill your entire life with light. This light affects not only you and your perception of the world but also your surroundings and the people around you.</p>', 'main_1672880834light-at-the-end-of-the-tunnel.png', 'featured_1672880834light-at-the-end-of-the-tunnel.png', 'light-at-the-end-of-the-tunnel', 1, '2023-01-05 01:07:14', '2023-01-05 01:07:14', NULL),
(4, 'Adipisci odio in ips', 'Enim voluptas aut do', '<p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada.</p><p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.</p><p>Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta. Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla porttitor accumsan tincidunt. Proin eget tortor risus.</p><p>Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>', 'main_1673974044adipisci-odio-in-ips.png', NULL, 'adipisci-odio-in-ips', 1, '2023-01-17 16:37:48', '2023-01-17 16:52:43', '2023-01-17 16:52:43'),
(5, 'Evolution', 'There are several stages in life when you change. For some, it can be a particular moment that physically and emotionally', '<p>There are several stages in life when you change. For some, it can be a particular moment that physically and emotionally evolves them into a different version of themselves. Sometimes something happens, and you decide from that point on you want to act on something other than certainty. Sometimes change is for good, and sometimes, unfortunately, it can be for the worst. The third kind of change- gradual change-allows you to adjust steadily to your surroundings. You transform into the growing environment, and it conditions you to be the person society wants you to be. This can be the person you used to admire or did not like growing up. Even so, when you reach a certain age, you realize you are becoming them. If you do not like who you are at that point, you try to return to the person you were before, but if the changes are for good, you are happy you turned out this way.</p><p>Life shapes us as we grow older. Through various circumstances, it shapes you. It’s like you are a raw piece of clay, and the world around you is a pottery well twisting and turning you-molding and breaking you down. Is it nature and nurture? It may seem that we don’t have a say in our evolution. Still, there is evidence that we can develop our conscious being, which is our emotions, actions, and the ability to do even the basic things that allow us to move forward.</p><p>We often think that change can only be physical. Sometimes you change into a new person, a person who has adjusted and accommodated to various circumstances, cultural standards, and situational requirements. In these circumstances, we often have no other choice. Whether you opt to change or perish in the struggle, you may bring about change. You have to decide which fight you want to be a part of.</p><p>After experiencing things, it must have dawned upon you that people around you constantly try to prove how happy or prosperous they are instead of actually living in the moment and enjoying that happiness or success. This is because they find it more important to showcase it to the rest of the world before actually analyzing what that particular emotion means to them. But when they sit and analyze how they have been living, they realize that they were living a vision of success that society dictated to them, not what they actually thought or believed. This is when their evolution journey begins.</p><p>Go to Peter’s website for more content like this in his latest book, ‘From Brick And Mortar<br>To Prosperity’.</p><p><a href=\"https://peterpaulsen.org/\">peterpaulsen.org</a></p><p>Want to read more on the topic? Check out Peter’s latest release “From Brick and Mortar to Prosperity.”</p><p><a href=\"https://peterpaulsen.org/\">peterpaulsen.org</a></p><p>The book will be available for purchase on Amazon, Google Books, and Lulu.</p><p>Links: <a href=\"https://www.amazon.com/Brick-Mortar-Prosperity-Created-Banking/dp/B09WH59BF6/ref=sr_1_1?crid=20EHW8IKR063Y&amp;keywords=Peter+Paulsen&amp;qid=1662524366&amp;sprefix=%2Caps%2C1029&amp;sr=8-1\">Amazon</a>, <a href=\"https://www.barnesandnoble.com/w/from-brick-and-mortar-to-prosperity-peter-h-paulsen/1141354141?ean=2940186698630\">Barnes &amp; Noble</a> <a href=\"https://books.google.com.pk/books?id=oVcTzwEACAAJ&amp;dq=FROM+BRICK+AND+MORTAR+TO+PROSPERITY&amp;hl=en&amp;sa=X&amp;redir_esc=y\">Google Books</a>, and <a href=\"https://www.lulu.com/shop/peter-h-paulsen/from-brick-and-mortar-to-prosperity/paperback/product-7m4nrn.html?q=Peter+H+Paulsen&amp;page=1&amp;pageSize=4\">Lulu</a></p>', 'main_1673974341evolution.png', 'featured_1673974341evolution.png', 'evolution', 1, '2023-01-17 16:52:21', '2023-01-17 16:52:21', NULL),
(6, 'Is Success a Blessing or a Curse?', 'What does success mean to you? What do you think it does to a person? Have you ever tasted it? And if you have, what did it feel like? Did you feel different after, or do you think that you were the same person before it? These questions may sound strange, but they can constrain or benefit people around them depending on how one uses their success.', '<p>Success can come in all forms. It is essentially the ability to have a hold on someone or people at large. You must have heard the phrase, ‘With great success comes great responsibility’. But in many cases, people abuse their success to the extent that it hurts the people around them. Very few experience the feeling, the worth, the luxury, and in some cases, the recognition that success brings to their life. It somehow turns them blind to other people’s feelings and what they might be going through. And the most unfortunate part of it all is that most people don’t understand that exploiting people in the name of success is wrong. They defend their actions by romanticizing their intentions. How often have you heard people around you justify exploitation for a better future for their family? One too many times, I’m sure.</p><p>Sometimes the person abusing their success receives the short end of the stick, which acts as a noose in the neck that keeps on tightening. There will come a point when they can do nothing about it. In other cases, success can be used for good. Usually, this later acts as an example for the masses. There may be hope for us all in this not-so very-just world.</p><p>It is up to us to decide what kind of people we want to be. Dreaming and hoping to change the world may sound cliché, but it is never too late to make decisions that don’t abuse your success you never know where you might land. To put it simply, success can change who you are, but it is up to you to decide how you mold yourself. For better or for worse- that is something you decide.</p><p>It is surprising how people change once they experience a glint of success. It changes the way people talk and their overall stature. It is essential to have a certain mindset to succeed in life. Take a look at Peter’s new novel ‘From Brick And Mortar To Prosperity’, where he presents an insight into what we can achieve if we put our mind to it.</p><p>Want to read more on the topic? Check out Peter’s latest release “From Brick and Mortar to Prosperity.”</p><p><a href=\"https://peterpaulsen.org/\">peterpaulsen.org</a></p><p>The book will be available for purchase on Amazon, Google Books, and Lulu.</p><p>Links: <a href=\"https://www.amazon.com/Brick-Mortar-Prosperity-Created-Banking/dp/B09WH59BF6/ref=sr_1_1?crid=20EHW8IKR063Y&amp;keywords=Peter+Paulsen&amp;qid=1662524366&amp;sprefix=%2Caps%2C1029&amp;sr=8-1\">Amazon</a>, <a href=\"https://www.barnesandnoble.com/w/from-brick-and-mortar-to-prosperity-peter-h-paulsen/1141354141?ean=2940186698630\">Barnes &amp; Noble</a> <a href=\"https://books.google.com.pk/books?id=oVcTzwEACAAJ&amp;dq=FROM+BRICK+AND+MORTAR+TO+PROSPERITY&amp;hl=en&amp;sa=X&amp;redir_esc=y\">Google Books</a>, and <a href=\"https://www.lulu.com/shop/peter-h-paulsen/from-brick-and-mortar-to-prosperity/paperback/product-7m4nrn.html?q=Peter+H+Paulsen&amp;page=1&amp;pageSize=4\">Lulu</a></p>', 'main_1673974443is-success-a-blessing-or-a-curse.png', 'featured_1673974443is-success-a-blessing-or-a-curse.png', 'is-success-a-blessing-or-a-curse', 1, '2023-01-17 16:54:03', '2023-01-17 16:54:03', NULL),
(7, 'The Long Road To Success', 'Every successful person has a story. For some, it is a life full of struggles, and for others, it can be an adventure like no other. It could be a happy story, a perfectly normal one, or a downright emotional rollercoaster making you want to bawl your eyes out. But, in the end, you are left wondering how it all happened and, most importantly, how the person got through it.', '<p>That’s when you yearn to get to the top of the mountain. But when does the long road eventually end with a success story? Many people around us spend their lives striving for success but never really get where they want, and their struggle often ends with failure. Why does it have no meaning and no worth? Society makes us feel like if we haven’t achieved anything in life in our 20s, we are incapable of nothing to do anything in the future. However, that is not the case.</p><p>If you ask an individual for their experience, they may not be at a point in life where society expects them to be. That is incomparable to a person who has taken an instant and guaranteed route to success on their first try. If you listen to their experience, you can quickly figure out what to stay clear of and what to pay more attention to when you start your journey. At some point in life, you start to understand that although college and degrees are important, they can never come close to what you experience in the practical world. This is why this assumption that a long road can only lead to success needs to be brushed. It will be okay if things do not turn out a certain way.</p><p>This is supposed to be yours, and it is up to how long you want to take to reach a certain place. You have to understand that you can do what you like and achieve what you have dreamed of if you block out all the external noise that says otherwise and focus on yourself. It does not matter that it took you a bit longer than others. It doesn’t matter where others are. All that matters is where you stand and where you want to go in life.</p><p>You must take a second to see what is happening around you and evaluate your performance accordingly. To learn more, read Peter’s latest book, ‘From Brick And Mortar To Prosperity’.</p><p>Want to read more on the topic? Check out Peter’s latest release “From Brick and Mortar to Prosperity.”</p><p><a href=\"https://peterpaulsen.org/\">peterpaulsen.org</a></p><p>The book will be available for purchase on Amazon, Google Books, and Lulu.</p><p>Links: <a href=\"https://www.amazon.com/Brick-Mortar-Prosperity-Created-Banking/dp/B09WH59BF6/ref=sr_1_1?crid=20EHW8IKR063Y&amp;keywords=Peter+Paulsen&amp;qid=1662524366&amp;sprefix=%2Caps%2C1029&amp;sr=8-1\">Amazon</a>, <a href=\"https://www.barnesandnoble.com/w/from-brick-and-mortar-to-prosperity-peter-h-paulsen/1141354141?ean=2940186698630\">Barnes &amp; Noble</a> <a href=\"https://books.google.com.pk/books?id=oVcTzwEACAAJ&amp;dq=FROM+BRICK+AND+MORTAR+TO+PROSPERITY&amp;hl=en&amp;sa=X&amp;redir_esc=y\">Google Books</a>, and <a href=\"https://www.lulu.com/shop/peter-h-paulsen/from-brick-and-mortar-to-prosperity/paperback/product-7m4nrn.html?q=Peter+H+Paulsen&amp;page=1&amp;pageSize=4\">Lulu</a></p>', 'main_1673974511the-long-road-to-success.png', 'featured_1673974511the-long-road-to-success.png', 'the-long-road-to-success', 1, '2023-01-17 16:55:11', '2023-01-17 16:55:11', NULL),
(8, 'Contagious Enthusiasm', 'You may have been hearing ever since you were a child, that nothing great was ever achieved without a little risk and enthusiasm. However, enthusiasm spreads like fire, keeping in mind that it must be genuine enthusiasm, not a strong interest or excitement. Excitement can be exaggerated.', '<p>A striking interest can be overstated. Enthusiasm, on the other hand, occupies the sweet spot in the middle. The desire and passion for the subject or work are inspiring and serve as motivators for the entire group. It keeps the fire burning inside but does not burn itself out. The other members of the group are aware of the distinction. Your actions and words reveal whether or not your enthusiasm is genuine. Everyone desires that level of passion and desire in their lives. If they haven’t found anything that they truly enjoy, when they see it in someone else, they want to share in their joy. There is no other word to describe what it’s like to be part of something where every day and every action is enjoyable. The majority of the population lacks this level of enthusiasm.</p><p>Don’t let this elude you. Find something you are passionate about and feed off of that enthusiasm. Let that enthusiasm fuel your thoughts and actions toward that <i>something</i>. Your enthusiasm will shine through and touch those around you as you work toward your goal. They will sense your genuine enthusiasm for what you do. Because of this, people will want to assist you in reaching your goal. Enthusiasm is the antidote to negativity, circumstances, naysayers, and even the voices in your head. You can complete a task without it, but with it, you can ACCOMPLISH A LOT! Assisting others in finding excitement in order to develop their own everyday excellence. Enthusiasm isn’t limited to work. Enthusiasm for everything you do not only puts you ahead in dealing with whatever comes your way but also demonstrates that you are a model of what it means to be a person of value.</p><p>When it is genuine, enthusiasm can be a powerful motivator. It is a spirit that motivates us to move forward in a positive direction of our choosing. Consider the advantages of being enthusiastic: you’ll be more productive and confident, others will perceive you favorably, and you’ll have peace of mind at the end of each day. Having said that, we’ve all struggled to stay motivated and enthusiastic at work. You can see that there is a huge difference between being complete and accomplished. Accomplishment means <i>succeeding</i> at something. The little extras you leave behind with the intention of making people smile. Essentially, it is your personal imprint that makes life amazing for everyone who comes into contact with you! Find your passion, my friend, and feed it to yourself. Live with purpose!</p>', 'main_1673974610contagious-enthusiasm.png', 'featured_1673974610contagious-enthusiasm.png', 'contagious-enthusiasm', 1, '2023-01-17 16:56:50', '2023-01-17 16:56:50', NULL),
(9, 'Quia aut cillum rati', 'Doloremque at enim a', '<p>lorem ipsum&nbsp;</p>', 'main_1675366451quia-aut-cillum-rati.jpg', 'featured_1675366451quia-aut-cillum-rati.jpg', 'quia-aut-cillum-rati', 1, '2023-02-02 14:34:11', '2023-02-02 14:45:45', NULL),
(10, 'Illo officia asperio updated', 'Ea quia consequuntur updated', '<p>lorem ipsum updated</p>', 'main_1675366579illo-officia-asperio.jfif', NULL, 'illo-officia-asperio-updated', 0, '2023-02-02 14:36:19', '2023-02-02 14:45:36', '2023-02-02 14:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `paper_back_price` double(8,2) DEFAULT NULL,
  `ebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ebook_price` double(8,2) DEFAULT NULL,
  `audio_book_price` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `google_book_link` text COLLATE utf8mb4_unicode_ci,
  `sample_audio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `slug`, `front_image`, `back_image`, `short_description`, `long_description`, `paper_back_price`, `ebook`, `ebook_price`, `audio_book_price`, `status`, `created_at`, `updated_at`, `deleted_at`, `google_book_link`, `sample_audio`) VALUES
(1, 'Ipsa debitis necess', 'ipsa-debitis-necess', 'front_1675295758ipsa-debitis-necess.jpg', 'back_1675295758ipsa-debitis-necess.png', 'Ex dolore ex sed aut', '<p>lorem ipsum description</p>', 884.00, 'ebook_1675295758ipsa-debitis-necess.pdf', 318.00, 671.00, 0, '2023-02-01 18:55:58', '2023-02-01 19:03:06', '2023-02-01 19:03:06', NULL, 'sample_1675295758ipsa-debitis-necess.mp3'),
(2, 'Eum ut nostrum alias', 'eum-ut-nostrum-alias', 'front_1675295847eum-ut-nostrum-alias.jpg', 'back_1675295847eum-ut-nostrum-alias.png', 'Veniam ad dolor omn', '<p>lorem ipusm description</p>', NULL, 'ebook_1675295847eum-ut-nostrum-alias.pdf', 80.00, 331.00, 0, '2023-02-01 18:57:27', '2023-02-01 19:08:52', NULL, NULL, 'sample_1675295847eum-ut-nostrum-alias.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `book_audio`
--

DROP TABLE IF EXISTS `book_audio`;
CREATE TABLE IF NOT EXISTS `book_audio` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `audio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_audio`
--

INSERT INTO `book_audio` (`id`, `book_id`, `audio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Audio_ipsa-debitis-necess1675295758tt2QatRfySCw0suxFmxW.mp3', '2023-02-01 18:55:58', '2023-02-01 18:55:58', NULL),
(2, 2, 'Audio_eum-ut-nostrum-alias1675295847XREZu5DQQ45BwZ7rILl0.mp3', '2023-02-01 18:57:27', '2023-02-01 19:52:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_urls`
--

DROP TABLE IF EXISTS `book_urls`;
CREATE TABLE IF NOT EXISTS `book_urls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `orderType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_urls`
--

INSERT INTO `book_urls` (`id`, `book_id`, `orderType`, `url`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '5', 'https://www.kemutyv.ws', NULL, NULL, '2023-02-01 18:55:58', '2023-02-01 18:55:58', NULL),
(2, 2, '6', 'https://www.cudyky.biz', NULL, NULL, '2023-02-01 18:57:27', '2023-02-01 19:08:51', '2023-02-01 19:08:51'),
(3, 2, '6', 'https://www.cudyky.biz', NULL, NULL, '2023-02-01 19:08:52', '2023-02-01 19:09:09', '2023-02-01 19:09:09'),
(4, 2, '6', 'https://www.cudyky.biz', NULL, NULL, '2023-02-01 19:09:09', '2023-02-01 19:09:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

DROP TABLE IF EXISTS `company_profiles`;
CREATE TABLE IF NOT EXISTS `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `logo`, `favicon`, `company`, `email`, `phone`, `website`, `country`, `language`, `timezone`, `currency`, `created_at`, `updated_at`) VALUES
(1, '1675384842.png', '1675384842.png', 'Peter Paulsen', 'loceq@mailinator.com', '+1 (738) 802-1563', 'http://peter-paulsen.rubosa.com/', 'USA', NULL, NULL, NULL, '2022-11-18 12:06:41', '2023-02-02 19:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_configs`
--

DROP TABLE IF EXISTS `email_configs`;
CREATE TABLE IF NOT EXISTS `email_configs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mail_mailer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `email_configs`
--

INSERT INTO `email_configs` (`id`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `mail_from_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.gmail.com', '587', 'softwaredeveloper992@gmail.com', 'wvorxgnruauklioz', 'tls', 'softwaredeveloper992@gmail.com', NULL, 1, '2022-11-16 12:29:20', '2023-02-10 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_passwords`
--

DROP TABLE IF EXISTS `forgot_passwords`;
CREATE TABLE IF NOT EXISTS `forgot_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forgot_passwords_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `fund_raisers`
--

DROP TABLE IF EXISTS `fund_raisers`;
CREATE TABLE IF NOT EXISTS `fund_raisers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 16:07:49', '2022-11-16 16:07:49'),
(3, 'New Role Inserted', 'http://admindefault/admin/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:12:54', '2022-11-16 19:12:54'),
(4, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:13:31', '2022-11-16 19:13:31'),
(5, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:17:25', '2022-11-16 19:17:25'),
(6, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:17:45', '2022-11-16 19:17:45'),
(7, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:22:00', '2022-11-16 19:22:00'),
(8, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:31:22', '2022-11-16 19:31:22'),
(9, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:31:43', '2022-11-16 19:31:43'),
(10, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:36:15', '2022-11-16 19:36:15'),
(11, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:36:37', '2022-11-16 19:36:37'),
(12, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:52:01', '2022-11-16 19:52:01'),
(13, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:52:13', '2022-11-16 19:52:13'),
(14, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-16 19:52:40', '2022-11-16 19:52:40'),
(15, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 11:18:22', '2022-11-17 11:18:22'),
(16, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 11:25:51', '2022-11-17 11:25:51'),
(17, 'New Role Inserted', 'http://admindefault/admin/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 12:46:07', '2022-11-17 12:46:07'),
(18, 'User Updated', 'http://admindefault/admin/user/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 13:18:47', '2022-11-17 13:18:47'),
(19, 'User Updated', 'http://admindefault/admin/user/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 13:19:23', '2022-11-17 13:19:23'),
(20, 'User Updated', 'http://admindefault/admin/user/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 13:19:46', '2022-11-17 13:19:46'),
(21, 'User Updated', 'http://admindefault/admin/user/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 13:24:57', '2022-11-17 13:24:57'),
(22, 'User Updated', 'http://admindefault/admin/user/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 13:24:57', '2022-11-17 13:24:57'),
(23, 'New User Registered', 'http://admindefault/admin/user', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 18:05:31', '2022-11-17 18:05:31'),
(24, 'New Role Inserted', 'http://admindefault/admin/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 18:06:04', '2022-11-17 18:09:50'),
(25, 'New User Registered', 'http://admindefault/register', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, NULL, '2022-11-17 18:41:43', '2022-11-17 18:41:43'),
(26, 'New User Registered', 'http://admindefault/register', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, NULL, '2022-11-17 18:44:49', '2022-11-17 18:44:49'),
(36, 'New User Registered', 'http://admindefault/register', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, NULL, '2022-11-17 19:06:09', '2022-11-17 19:06:09'),
(37, 'New User Registered', 'http://admindefault/register', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, NULL, '2022-11-17 19:09:28', '2022-11-18 15:58:43'),
(38, 'New Role Inserted', 'http://admindefault/admin/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:20:04', '2022-11-17 19:20:04'),
(39, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:20:28', '2022-11-17 19:20:28'),
(40, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:20:51', '2022-11-17 19:20:51'),
(41, 'User Updated', 'http://admindefault/admin/user/18', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:40:06', '2022-11-17 19:40:06'),
(42, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:40:59', '2022-11-17 19:40:59'),
(43, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-17 19:41:26', '2022-11-17 19:41:26'),
(44, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, '2022-11-18 20:58:37', '2022-11-18 12:24:00', '2022-11-18 15:58:37'),
(45, 'New User Registered', 'http://admindefault/admin/user', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 16:39:16', '2022-11-18 16:39:16'),
(46, 'New User Registered', 'http://admindefault/admin/user', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 16:43:19', '2022-11-18 16:43:19'),
(47, 'New Role Inserted', 'http://admindefault/admin/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 16:47:11', '2022-11-18 16:47:11'),
(48, 'New User Registered', 'http://admindefault/admin/user', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 16:47:27', '2022-11-18 16:47:27'),
(49, 'Updated direct permissions', 'http://admindefault/admin/user/update-spacial-permission/22', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 17:43:35', '2022-11-18 17:43:35'),
(50, 'Updated direct permissions', 'http://admindefault/admin/user/update-spacial-permission/22', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 17:43:51', '2022-11-18 17:43:51'),
(51, 'Assign direct permissions', 'http://admindefault/admin/user/store-spacial-permission', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 18:02:14', '2022-11-18 18:02:14'),
(52, 'User Updated', 'http://admindefault/admin/user/21', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-18 18:03:39', '2022-11-18 18:03:39'),
(53, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-21 14:33:42', '2022-11-21 14:33:42'),
(54, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-21 18:27:27', '2022-11-21 18:27:27'),
(55, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-22 17:13:51', '2022-11-22 17:13:51'),
(56, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-22 17:20:17', '2022-11-22 17:20:17'),
(57, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-24 13:15:48', '2022-11-24 13:15:48'),
(58, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-24 13:43:45', '2022-11-24 13:43:45'),
(59, 'Role updated', 'http://admindefault/admin/role/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 3, NULL, '2022-11-24 15:11:54', '2022-11-24 15:11:54'),
(60, 'User Updated', 'http://peter-paulsen.local/admin/user/21', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, NULL, '2023-01-31 16:37:56', '2023-01-31 16:37:56'),
(61, 'User Updated', 'http://peter-paulsen.local/admin/user/14', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, NULL, '2023-01-31 18:26:26', '2023-01-31 18:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2022_02_24_023842_create_admins_table', 1),
(14, '2022_10_26_003609_create_password_reset_codes_table', 1),
(20, '2022_11_01_224917_add_username_to_users', 1),
(22, '2022_11_03_173355_create_orders_table', 1),
(24, '2022_11_03_232317_create_fund_raisers_table', 1),
(25, '2022_11_03_233157_create_player_ids_table', 1),
(32, '2022_11_11_192403_create_settings_table', 1),
(34, '2022_11_17_002305_create_biddings_table', 1),
(35, '2022_11_17_002422_create_bidding_statuses_table', 1),
(36, '2022_11_17_163025_create_auctions_table', 1),
(37, '2022_11_17_163502_create_auction_statuses_table', 1),
(39, '2022_11_30_234533_add_google_book_link_to_books_table', 1),
(79, '2023_02_09_224053_create_forgot_passwords_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(9, 'App\\Models\\User', 21),
(13, 'App\\Models\\User', 21),
(9, 'App\\Models\\User', 22),
(10, 'App\\Models\\User', 22),
(13, 'App\\Models\\User', 22),
(14, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 5),
(8, 'App\\Models\\User', 6),
(8, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 8),
(8, 'App\\Models\\User', 18),
(10, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 21),
(8, 'App\\Models\\User', 22),
(11, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('b9809663-1505-4fe4-be81-bad09dab6fc5', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 3, '{\"user_id\":18,\"name\":\"Melinda Riggs\",\"email\":\"chandamar725@gmail.com\"}', '2022-11-18 18:57:21', '2022-11-17 19:06:09', '2022-11-18 18:57:21'),
('daecbe32-595b-49cf-8062-5e1a4fcdd77a', 'App\\Notifications\\RegisterUserNotification', 'App\\Models\\User', 3, '{\"user_id\":19,\"name\":\"Kenyon Vaughan\",\"email\":\"chandamar725@gmail.com\"}', '2022-11-18 12:47:03', '2022-11-17 19:09:28', '2022-11-18 12:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `sub_total` double(8,2) DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `grand_total` double(8,2) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT '1',
  `order_type_id` int(11) NOT NULL DEFAULT '1',
  `payment_id` longtext COLLATE utf8mb4_unicode_ci,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `book_id`, `user_id`, `quantity`, `sub_total`, `shipping_charges`, `grand_total`, `country_id`, `state_id`, `city_id`, `address`, `zip_code`, `order_status_id`, `order_type_id`, `payment_id`, `provider`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '1673572300', 5, 8, 1, 785.00, 0.00, 785.00, NULL, NULL, NULL, NULL, NULL, 3, 2, '3KG19504S0046240X', 'Paypal', '2023-01-13 01:11:40', '2023-01-18 23:43:00', '2023-01-18 23:43:00'),
(15, '1673572301', 5, 8, 1, 548.00, 9.90, 557.90, 233, 233, 1462, 'Consequatur Iste vo', 47, 1, 3, '21', 'Abc', '2023-01-13 21:54:05', '2023-01-16 18:35:59', '2023-01-16 18:35:59'),
(16, '1673572302', 5, 8, 1, 548.00, 9.90, 557.90, 233, 233, 1462, 'Temporibus unde pari', 15, 1, 3, '21', 'Abc', '2023-01-16 16:22:22', '2023-01-16 18:35:41', '2023-01-16 18:35:41'),
(17, '1673572303', 5, 8, 1, 878.00, NULL, 878.00, NULL, NULL, NULL, NULL, NULL, 2, 4, '28P55141XC115220S', 'Paypal', '2023-01-16 17:53:59', '2023-01-18 23:42:54', '2023-01-18 23:42:54'),
(18, '1673572304', 5, 8, 1, 878.00, NULL, 878.00, NULL, NULL, NULL, NULL, NULL, 1, 4, '877275073E468832L', 'Paypal', '2023-01-16 18:37:28', '2023-01-18 23:42:51', '2023-01-18 23:42:51'),
(19, '1673572305', 5, 12, 1, 548.00, 9.90, 557.90, 233, 233, 1462, 'abc 123', 85589, 1, 3, '21', 'Abc', '2023-01-16 19:02:06', '2023-01-18 23:42:49', '2023-01-18 23:42:49'),
(20, '1673572306', 5, 8, 1, 19.99, NULL, 19.99, NULL, NULL, NULL, NULL, NULL, 1, 4, '11957167YW506232K', 'Paypal', '2023-01-18 22:01:34', '2023-01-18 23:42:57', '2023-01-18 23:42:57'),
(21, '1673572307', 5, 8, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '1WR81473PJ994490N', 'Paypal', '2023-01-18 22:02:04', '2023-01-18 23:42:44', '2023-01-18 23:42:44'),
(22, '1673572308', 5, 8, 1, 19.99, 9.90, 29.89, 233, 233, 1462, 'abc', 2116, 1, 3, '21', 'Abc', '2023-01-18 22:03:27', '2023-01-18 23:42:42', '2023-01-18 23:42:42'),
(23, '1673572309', 5, 8, 1, 19.99, 9.90, 29.89, 233, 233, 1462, 'abce', 211621, 1, 3, 'Paypal', '8V0852751C875245J', '2023-01-18 23:35:30', '2023-01-18 23:42:40', '2023-01-18 23:42:40'),
(24, '1263572309', 5, 8, 1, 19.99, 9.90, 29.89, 233, 233, 1462, 'aCVDDS', 211621, 1, 3, '26482995CS076150R', 'Paypal', '2023-01-18 23:45:21', '2023-01-18 23:45:21', '2023-01-09 05:05:09'),
(25, '1675792309', 5, 8, 1, 19.99, NULL, 19.99, 247, 247, 1955, 'acb', 211621, 1, 3, '30973529MK683231U', 'Paypal', '2023-01-18 23:46:49', '2023-01-18 23:46:49', '2023-01-08 05:05:14'),
(26, '1675772309', 5, 8, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '8WG64912NE3876213', 'Paypal', '2023-01-18 23:47:48', '2023-01-18 23:47:48', '2023-01-09 05:05:19'),
(27, '1677572309', 5, 8, 1, 19.99, NULL, 19.99, NULL, NULL, NULL, NULL, NULL, 1, 4, '2D820181A6712615B', 'Paypal', '2023-01-18 23:48:38', '2023-01-18 23:48:38', '2023-01-03 05:05:23'),
(28, '1677572310', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:01:40', '2023-01-19 00:03:16', '2023-01-19 00:03:16'),
(29, '1677572311', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:02:47', '2023-01-19 00:03:10', '2023-01-19 00:03:10'),
(30, '1677572312', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:02:55', '2023-01-19 00:03:07', '2023-01-19 00:03:07'),
(31, '1677572313', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:02:57', '2023-01-19 00:03:14', '2023-01-19 00:03:14'),
(32, NULL, 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:05:54', '2023-01-19 16:26:02', '2023-01-19 16:26:02'),
(33, NULL, 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:10:08', '2023-01-19 16:26:06', '2023-01-19 16:26:06'),
(34, NULL, 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 1, 1, '12424', '1', '2023-01-19 00:10:46', '2023-01-19 16:26:09', '2023-01-19 16:26:09'),
(35, NULL, 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '08X74856LV1058438', 'Paypal', '2023-01-19 00:11:56', '2023-01-19 16:26:13', '2023-01-19 16:26:13'),
(36, '3456031', 5, 14, 1, 19.99, NULL, 19.99, NULL, NULL, NULL, NULL, NULL, 4, 4, '93F124217K090610E', 'Paypal', '2023-01-19 00:14:33', '2023-01-24 18:28:06', '2023-01-24 18:28:06'),
(37, '3456032', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 4, 1, '12424', '1', '2023-01-19 00:14:49', '2023-01-19 20:54:49', '2023-01-19 20:54:49'),
(38, '3456033', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 3, 1, '12424', '1', '2023-01-19 00:14:52', '2023-01-24 18:28:11', '2023-01-24 18:28:11'),
(39, '3456034', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 3, 1, '12424', '1', '2023-01-19 00:14:55', '2023-01-24 18:28:08', '2023-01-24 18:28:08'),
(40, '3456035', 5, 1, 1, 11.00, 9.90, 12.00, 233, 233, 1462, 'fgg', 656, 3, 1, '12424', '1', '2023-01-19 00:14:57', '2023-01-24 18:28:26', '2023-01-24 18:28:26'),
(41, '3456036', 5, 14, 1, 19.99, 9.90, 29.89, 233, 233, 1462, 'streek', 2116, 4, 3, '0SU01927RU753273T', 'Paypal', '2023-01-19 00:15:50', '2023-01-24 18:28:14', '2023-01-24 18:28:14'),
(42, '3456037', 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '4GK609921T508520C', 'Paypal', '2023-01-19 00:25:39', '2023-01-24 18:28:17', '2023-01-24 18:28:17'),
(43, '3456038', 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '3EN51587VN9537209', 'Paypal', '2023-01-19 20:37:40', '2023-01-24 18:28:22', '2023-01-24 18:28:22'),
(44, '3456039', 5, 14, 1, 19.99, NULL, 19.99, 1, 1, 3870, 'street', 211661, 3, 3, '2HS616099J1925147', 'Paypal', '2023-01-19 20:42:18', '2023-01-24 18:28:19', '2023-01-24 18:28:19'),
(45, '3456040', 5, 14, 1, 19.99, 9.90, 29.89, 233, 233, 1462, 'street', 1621, 4, 3, '8RW791944N1108451', 'Paypal', '2023-01-19 20:51:27', '2023-01-24 18:28:24', '2023-01-24 18:28:24'),
(46, '4804891', 5, 8, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '3J697808HF819723X', 'Paypal', '2023-01-24 22:56:29', '2023-01-25 21:56:36', '2023-01-25 21:56:36'),
(47, '4804892', 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '4CK85154EW976423K', 'Paypal', '2023-01-24 23:03:21', '2023-01-25 21:56:34', '2023-01-25 21:56:34'),
(48, '4804893', 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '4T992498S0990405K', 'Paypal', '2023-01-25 18:47:30', '2023-01-25 21:56:32', '2023-01-25 21:56:32'),
(49, '4804894', 5, 14, 1, 19.99, NULL, 19.99, NULL, NULL, NULL, NULL, NULL, 1, 4, '0RH21577T3285640D', 'Paypal', '2023-01-25 18:56:35', '2023-01-25 21:56:29', '2023-01-25 21:56:29'),
(50, '4804895', 5, 14, 1, 19.99, NULL, 19.99, NULL, NULL, NULL, NULL, NULL, 1, 4, '17T371067P092814B', 'Paypal', '2023-01-25 18:58:18', '2023-01-25 21:56:27', '2023-01-25 21:56:27'),
(51, '4804896', 5, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '25J028496E765822W', 'Paypal', '2023-01-25 18:59:28', '2023-01-25 21:56:25', '2023-01-25 21:56:25'),
(52, '4804897', 5, 14, 1, 19.99, NULL, 19.99, 3, 3, 594, 'test', 1621, 1, 3, '2VJ72827WP188534Y', 'Paypal', '2023-01-25 19:00:23', '2023-01-25 21:56:23', '2023-01-25 21:56:23'),
(53, '5303319', 2, 14, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '3WM19008JF699711B', 'Paypal', '2023-01-25 21:59:07', '2023-01-25 21:59:07', NULL),
(54, '5303320', 1, 8, 1, 9.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, 3, 2, '5M6962875N3606059', 'Paypal', '2023-01-31 18:13:59', '2023-02-02 13:43:09', '2023-02-02 13:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_codes`
--

DROP TABLE IF EXISTS `password_reset_codes`;
CREATE TABLE IF NOT EXISTS `password_reset_codes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_codes`
--

INSERT INTO `password_reset_codes` (`id`, `user_id`, `code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'EVZcJekY-3', 1, '2023-01-05 17:26:14', '2023-01-05 17:26:36', NULL),
(2, 3, 'TvuQRC7V-3', 0, '2023-01-05 17:26:36', '2023-01-05 17:26:36', NULL),
(3, 8, '5hQvmOWf-8', 1, '2023-01-09 21:27:12', '2023-01-09 21:28:48', NULL),
(4, 8, '1nxTzD2y-8', 1, '2023-01-09 21:28:48', '2023-01-09 21:29:21', NULL),
(5, 8, 'VasimQvP-8', 1, '2023-01-09 21:29:21', '2023-01-09 21:29:59', NULL),
(6, 8, 'HjaeiyZY-8', 1, '2023-01-09 21:29:59', '2023-01-09 21:33:27', NULL),
(7, 8, 'cXZ5b45c-8', 1, '2023-01-09 21:33:27', '2023-01-09 21:47:29', NULL),
(8, 8, 'g2iU5PyZ-8', 1, '2023-01-09 21:47:29', '2023-01-09 22:48:02', NULL),
(9, 8, 'xSvK69Ur-8', 1, '2023-01-09 22:48:02', '2023-01-09 22:50:20', NULL),
(10, 8, 'fIvPo3j8-8', 1, '2023-01-09 22:50:20', '2023-01-09 22:55:20', NULL),
(11, 8, '74zB11mR-8', 1, '2023-01-09 22:55:20', '2023-01-09 23:32:22', NULL),
(12, 8, 'jZZV0chg-8', 1, '2023-01-09 23:32:22', '2023-01-09 23:33:40', NULL),
(13, 8, '1DeQzPxC-8', 1, '2023-01-09 23:37:58', '2023-01-09 23:38:25', NULL),
(14, 8, 'DRUlI05Z-8', 1, '2023-01-10 00:16:15', '2023-01-10 00:17:47', NULL),
(15, 8, '3XPuJJlw-8', 1, '2023-01-10 00:21:25', '2023-01-10 00:21:58', NULL),
(16, 8, 'CN5WIeKP-8', 1, '2023-01-16 18:42:29', '2023-01-16 18:45:00', NULL),
(17, 8, 'VBQxZj5P-8', 1, '2023-01-16 18:45:00', '2023-01-16 18:49:09', NULL),
(18, 8, '4cmEAnm3-8', 1, '2023-01-16 18:49:09', '2023-01-16 18:49:36', NULL),
(19, 8, '1CnjJlct-8', 1, '2023-01-18 18:54:38', '2023-01-18 18:56:03', NULL),
(20, 8, 'G5wyULbd-8', 1, '2023-01-26 18:12:35', '2023-01-26 18:12:41', NULL),
(21, 8, 'sYUTzNwy-8', 0, '2023-01-26 18:12:41', '2023-01-26 18:12:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'role-list', 'web', NULL, '2022-11-15 16:32:20', '2022-11-15 16:32:20'),
(10, 'role-create', 'web', NULL, '2022-11-15 16:32:20', '2022-11-15 16:32:20'),
(11, 'role-edit', 'web', NULL, '2022-11-15 16:32:20', '2022-11-15 16:32:20'),
(12, 'role-delete', 'web', NULL, '2022-11-15 16:32:21', '2022-11-15 16:32:21'),
(13, 'permission-list', 'web', NULL, '2022-11-15 16:32:21', '2022-11-15 16:32:21'),
(14, 'permission-create', 'web', NULL, '2022-11-15 16:32:21', '2022-11-15 16:32:21'),
(15, 'permission-edit', 'web', NULL, '2022-11-15 16:32:21', '2022-11-15 16:32:21'),
(16, 'permission-delete', 'web', NULL, '2022-11-15 16:32:21', '2022-11-15 16:32:21'),
(21, 'setting-list', 'web', NULL, '2022-11-16 15:28:57', '2022-11-16 15:28:57'),
(22, 'setting-create', 'web', NULL, '2022-11-16 15:28:57', '2022-11-16 15:28:57'),
(23, 'setting-edit', 'web', NULL, '2022-11-16 15:28:57', '2022-11-16 15:28:57'),
(24, 'setting-delete', 'web', NULL, '2022-11-16 15:28:57', '2022-11-16 15:28:57'),
(25, 'emailconfig-list', 'web', NULL, '2022-11-16 15:29:14', '2022-11-16 15:29:14'),
(26, 'emailconfig-create', 'web', NULL, '2022-11-16 15:29:14', '2022-11-16 15:29:14'),
(27, 'emailconfig-edit', 'web', NULL, '2022-11-16 15:29:14', '2022-11-16 15:29:14'),
(28, 'emailconfig-delete', 'web', NULL, '2022-11-16 15:29:14', '2022-11-16 15:29:14'),
(29, 'logactivity-list', 'web', NULL, '2022-11-16 16:07:33', '2022-11-16 16:07:33'),
(30, 'logactivity-create', 'web', NULL, '2022-11-16 16:07:33', '2022-11-16 16:07:33'),
(31, 'logactivity-edit', 'web', NULL, '2022-11-16 16:07:33', '2022-11-16 16:07:33'),
(32, 'logactivity-delete', 'web', NULL, '2022-11-16 16:07:33', '2022-11-16 16:07:33'),
(33, 'user-list', 'web', NULL, '2022-11-17 11:18:07', '2022-11-17 11:18:07'),
(34, 'user-create', 'web', NULL, '2022-11-17 11:18:07', '2022-11-17 11:18:07'),
(35, 'user-edit', 'web', NULL, '2022-11-17 11:18:07', '2022-11-17 11:18:07'),
(36, 'user-delete', 'web', NULL, '2022-11-17 11:18:07', '2022-11-17 19:17:35'),
(37, 'companyprofile-list', 'web', NULL, '2022-11-18 12:23:23', '2022-11-18 12:23:23'),
(38, 'companyprofile-create', 'web', NULL, '2022-11-18 12:23:23', '2022-11-18 15:50:05'),
(39, 'companyprofile-edit', 'web', NULL, '2022-11-18 12:23:23', '2022-11-18 15:50:08'),
(40, 'companyprofile-delete', 'web', NULL, '2022-11-18 12:23:23', '2022-11-18 18:01:58'),
(41, 'menu-list', 'web', NULL, '2022-11-21 14:33:25', '2022-11-21 14:33:25'),
(42, 'menu-create', 'web', NULL, '2022-11-21 14:33:25', '2022-11-21 14:33:25'),
(43, 'menu-edit', 'web', NULL, '2022-11-21 14:33:25', '2022-11-21 14:33:25'),
(44, 'menu-delete', 'web', NULL, '2022-11-21 14:33:25', '2022-11-21 14:33:25'),
(45, 'category-list', 'web', NULL, '2022-11-21 18:27:09', '2022-11-21 18:27:09'),
(46, 'category-create', 'web', NULL, '2022-11-21 18:27:09', '2022-11-21 18:27:09'),
(47, 'category-edit', 'web', NULL, '2022-11-21 18:27:09', '2022-11-21 18:27:09'),
(48, 'category-delete', 'web', NULL, '2022-11-21 18:27:09', '2022-11-21 18:27:09'),
(49, 'computer-list', 'web', '2022-11-24 22:31:45', '2022-11-22 17:13:37', '2022-11-24 17:31:45'),
(50, 'computer-create', 'web', '2022-11-24 22:31:38', '2022-11-22 17:13:37', '2022-11-24 17:31:38'),
(51, 'computer-edit', 'web', '2022-11-24 22:31:35', '2022-11-22 17:13:37', '2022-11-24 17:31:35'),
(52, 'computer-delete', 'web', '2022-11-24 22:31:33', '2022-11-22 17:13:37', '2022-11-24 17:31:33'),
(53, 'medical-list', 'web', '2022-11-24 18:15:21', '2022-11-22 17:20:06', '2022-11-24 13:15:21'),
(54, 'medical-create', 'web', '2022-11-24 18:15:18', '2022-11-22 17:20:06', '2022-11-24 13:15:18'),
(55, 'medical-edit', 'web', '2022-11-24 18:15:15', '2022-11-22 17:20:06', '2022-11-24 13:15:15'),
(56, 'medical-delete', 'web', '2022-11-24 18:15:12', '2022-11-22 17:20:06', '2022-11-24 13:15:12'),
(57, 'product-list', 'web', '2022-11-24 22:31:29', '2022-11-24 13:15:31', '2022-11-24 17:31:29'),
(58, 'product-create', 'web', '2022-11-24 22:31:27', '2022-11-24 13:15:31', '2022-11-24 17:31:27'),
(59, 'product-edit', 'web', '2022-11-24 22:31:20', '2022-11-24 13:15:31', '2022-11-24 17:31:20'),
(60, 'product-delete', 'web', '2022-11-24 22:31:17', '2022-11-24 13:15:31', '2022-11-24 17:31:17'),
(61, 'slider-list', 'web', '2022-11-24 22:31:14', '2022-11-24 13:43:22', '2022-11-24 17:31:14'),
(62, 'slider-create', 'web', '2022-11-24 22:31:11', '2022-11-24 13:43:22', '2022-11-24 17:31:11'),
(63, 'slider-edit', 'web', '2022-11-24 22:31:09', '2022-11-24 13:43:22', '2022-11-24 17:31:09'),
(64, 'slider-delete', 'web', '2022-11-24 22:30:56', '2022-11-24 13:43:22', '2022-11-24 17:30:56'),
(65, 'mobile-list', 'web', '2022-11-24 22:30:53', '2022-11-24 15:11:29', '2022-11-24 17:30:53'),
(66, 'mobile-create', 'web', '2022-11-24 22:30:51', '2022-11-24 15:11:29', '2022-11-24 17:30:51'),
(67, 'mobile-edit', 'web', '2022-11-24 22:30:48', '2022-11-24 15:11:29', '2022-11-24 17:30:48'),
(68, 'mobile-delete', 'web', '2022-11-24 22:30:45', '2022-11-24 15:11:29', '2022-11-24 17:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 8, 'MyApp', 'c04d1e756fc0ebf008468df8e6ea32a0a55d7c87f3933f570f167deabffef2b6', '[\"*\"]', NULL, NULL, '2023-02-09 17:27:26', '2023-02-09 17:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `player_ids`
--

DROP TABLE IF EXISTS `player_ids`;
CREATE TABLE IF NOT EXISTS `player_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', 1, NULL, '2022-11-15 16:32:20', '2022-11-15 16:32:20'),
(8, 'User', 'web', 1, NULL, '2022-11-17 12:46:07', '2022-11-18 15:42:30'),
(10, 'Test', 'web', 1, '2022-11-18 20:29:01', '2022-11-17 19:20:04', '2022-11-18 15:29:01'),
(11, 'Manger', 'web', 1, NULL, '2022-11-18 16:47:10', '2022-11-18 16:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(34, 8),
(35, 8),
(9, 10),
(13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `web_title`, `web_link`, `currency_symbol`, `primary_color`, `secondary_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'logo_1674683560.png', 'icon_1674683560.png', 'Peter Paulsen', 'http://peter-paulsen.rubosa.com/', '$', '#c29638', '#97a531', '2023-01-25 21:22:56', '2023-01-25 21:52:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_page_record` int(11) NOT NULL DEFAULT '10',
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `per_page_record`, `language`, `timezone`, `currency`, `created_at`, `updated_at`) VALUES
(1, 5, 'en', 'Pacific Time (US & Canada) update', 'USD', '2022-11-18 12:54:39', '2022-11-18 13:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `status`, `is_email_verified`, `avatar`, `password_otp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Admin', NULL, 'admin@gmail.com', 0, NULL, '$2y$10$dzg9MT2lVqAqhez1sWUY0ehAyuheck6aEdhlYaQKFVVg4UUqpuoU2', 'hLpajw5IMWlhV3Z2bUybpkkEtvzbHDdIvK47gVhaHX45wp19oon7V23dBggt', 1, 0, NULL, NULL, '2023-01-04 18:48:20', '2023-02-02 19:52:50', NULL),
(2, 'Nostrum est incidunt', NULL, 'nodeviv@mailinator.com', 66, NULL, '$2y$10$rRs1DbrL8hDecNbYFmJ/neb13OnR0I0EZiHHs9iRxvl0FFsK0gGcu', 'bZc3xto0ueJPzrxJtKPEodnVtYUULbH85RL14KmAy4euHeuJFe', 1, 0, NULL, NULL, '2023-01-04 18:50:52', '2023-01-19 01:08:35', '2023-01-19 01:08:35'),
(3, 'anon', NULL, 'none@gmail.com', 5656565, NULL, '$2y$10$E.cxEoZbi74jKY.IWAR8F./tcWxuRUXovs7SJeFs08K1n3iz413Xi', '4oqFW5cxxAzG4n1Y6QECWY9TH84fyBPE1Mk8vBSwqvIL5G4ECy', 1, 0, NULL, NULL, '2023-01-04 20:47:51', '2023-01-19 01:08:37', '2023-01-19 01:08:37'),
(5, 'Ex labore necessitat', NULL, 'nurodid@mailinator.com', 93, NULL, '$2y$10$hWv2PnktbFci8SUUxMwpAOlNj9OeeGcnyoyCIPOOb2qy0JF5789e2', 'j9rgs2VeDDsta1ikPvyGfdrFolhOTBofjEA2FMV59gsG5j6h83', 1, 0, NULL, NULL, '2023-01-09 17:35:25', '2023-01-09 18:21:00', '2023-01-09 18:21:00'),
(6, 'Ut sed blanditiis ab', NULL, 'muwyqogi@mailinator.com', 42, NULL, '$2y$10$q2DRfuwPw.vmgRAtiK.zB.Y3.WUvpht19jtg0ENkoLfAqMqs5jAeS', 'vMBa9CAyS3uaLRANgHhlzQWDbFNORL2jrAJzXzuSNzCYxELOez', 1, 0, NULL, NULL, '2023-01-09 18:40:27', '2023-01-19 01:08:40', '2023-01-19 01:08:40'),
(7, 'jakeshort300', NULL, 'jakeshort300', 78945612300, NULL, '$2y$10$YP55yhFu/OK5DGVLnYehMe00L51IG26pTsXZB64CwAWxzP6mToDXu', 'P2hg9nx7p9TPFVITqoVNFbJvvqn8i20sjFPXLNG8zgD2eUetQt', 1, 0, NULL, NULL, '2023-01-09 18:45:51', '2023-01-24 18:28:39', '2023-01-24 18:28:39'),
(8, 'Jake Short', NULL, 'jakeshort300@gmail.com', 78965412300, NULL, '$2y$10$zhbjJx8onkehfSYQhcjpHOu1mxFRHAV9fNCsDNm/4RB7.4vZ5/5Mq', 'HYyDjXzVZXQQoMqXWTzLMMlVgfKVgZrdkk7zrCOY0d6O6X4ZbL', 1, 0, NULL, 22786, '2023-01-09 21:26:13', '2023-02-10 14:49:15', NULL),
(9, 'anon', NULL, 'nonetest@gmail.com', 5656565, NULL, '$2y$10$z7h6KK85q5FNQ3mqs8yXnOZ.qy8xflQr.Ut1VsJ11IDa1mSj7M8S6', 'g0A9f72ogalTv5S9Auw5vZdhc8uEaUXuYdQ8oi0dWmhre1l991', 1, 0, NULL, NULL, '2023-01-12 23:30:38', '2023-01-19 01:08:43', '2023-01-19 01:08:43'),
(10, 'anon', NULL, 'user@gmail.com', 5656565, NULL, '$2y$10$2lKqj.fLgB5RZwRY4A7sCOTWmr.wWn3kB8qMPLUl2ry2xZl/gi8gi', 'lbe9Pobu14LfeaZVFw9TrTn7rheuI17NGJ7O0DzXeVEo0YZDBS', 1, 0, NULL, NULL, '2023-01-13 00:52:55', '2023-01-19 01:08:46', '2023-01-19 01:08:46'),
(11, 'asd21d353253adsasd111 asjdhasdjdssddsddassdasda1d13r1t11111', 'asdsda2ddd22ddd2111', 'asdasddsda@gmail.com11111', 0, NULL, '$2y$10$xUbJVNVe4ZRx2VG.GvSg..TtdNTKC6PikfcAXJ9U/wfBVp7KlOGOG', '8VN7WCzAFsODbdpQ99wNilOmscvxrPe005LHXwo7oITULy6g2D', 1, 0, NULL, NULL, '2023-01-13 01:41:38', '2023-01-19 01:08:31', '2023-01-19 01:08:31'),
(12, 'david', NULL, 'david@gmail.com', 12322323, NULL, '$2y$10$RB3XdrirAmrwShXJD0ya2egJV1a8BYehNYMQMsfDFDk9sxjV2Ud.G', 'TCN4TKjV8CjGjOaPASDVARSjm7PkYVqyEioLDpIWhVZo46v8ZN', 1, 0, NULL, NULL, '2023-01-16 19:00:03', '2023-01-24 18:28:36', '2023-01-24 18:28:36'),
(13, 'Test', NULL, 'test@gmail.com', 123456789, NULL, '$2y$10$LuxzQduUAocttsHTb.UVNuloJpLsuaU74BIO6/bcMmhPUlrNwPKOC', '6m64VZ3gpA8vejL9GY2p9c7BCLGpUKeyizu7AqwDkY5ayULSdT', 1, 0, NULL, 90407, '2023-01-18 21:58:44', '2023-02-10 14:18:45', NULL),
(14, 'Moon', 'moon', 'moon@gmail.com', 98765432100, NULL, '$2y$10$Bn/gaZd5KKfiETHH1s/pA.HJFY0Nuh30J4jiHPdbJzLf7oc2u7NI2', 'dkLXCVdHUnQFuDxYrgPs1CzUIigGomA1EgqdXfZDCHOvSl1R6E', 1, 0, NULL, NULL, '2023-01-19 00:08:25', '2023-02-03 12:41:21', '2023-02-03 12:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

DROP TABLE IF EXISTS `users_verify`;
CREATE TABLE IF NOT EXISTS `users_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(4, 18, '0esEzrCkBMZfvaABygkUi77jyGK8Z9F1L0llzXfSOMkn1IiLvTIIaXSR0gGi16lC', '2022-11-17 19:06:09', '2022-11-17 19:06:09'),
(5, 19, 'GsqZ2SxIwLjKjs92QOSr2XttNvd9klZ9h51H2DuIurKs4PQmKSFUtQHgAcnGfV5t', '2022-11-17 19:09:28', '2022-11-17 19:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `avatar`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 'Lila', 'Carney', '1668641821.jpg', '+1 (478) 457-9295', 'Voluptatum fugiat o', '2022-11-16 18:32:41', '2022-11-16 18:50:57'),
(2, 4, 'Iris', 'Iris', NULL, '+1 (375) 249-2199', 'Delectus obcaecati', '2022-11-17 12:48:16', '2022-11-17 13:19:46'),
(3, 5, 'Patricia', 'Patricia', '1668709330.jpg', '+1 (892) 568-9765', 'Vero consequat Nost', '2022-11-17 13:22:10', '2022-11-17 13:24:57'),
(4, 6, 'Cynthia', 'Cynthia', NULL, '+1 (139) 545-3048', 'Est dolor enim volup', '2022-11-17 18:05:30', '2022-11-17 18:05:30'),
(5, 7, 'Jarrod', 'Jarrod', NULL, NULL, NULL, '2022-11-17 18:41:43', '2022-11-17 18:41:43'),
(6, 8, 'Sophia', 'Sophia', NULL, NULL, NULL, '2022-11-17 18:44:49', '2022-11-17 18:44:49'),
(16, 18, 'Melinda', 'Melinda', NULL, NULL, NULL, '2022-11-17 19:06:09', '2022-11-17 19:06:09'),
(17, 19, 'Kenyon', 'Kenyon', NULL, NULL, NULL, '2022-11-17 19:09:28', '2022-11-17 19:09:28'),
(18, 20, 'Cole', 'Cole', NULL, '+1 (504) 695-4571', 'Accusantium in et no', '2022-11-18 16:39:15', '2022-11-18 16:39:15'),
(19, 21, 'Daphne - new', 'Daphne - new', NULL, '+1 (588) 601-4671', 'Consequatur Asperna', '2022-11-18 16:43:19', '2022-11-18 16:43:19'),
(20, 22, 'Brenna', 'Brenna', NULL, '+1 (964) 494-8884', 'Ipsum proident eaqu', '2022-11-18 16:47:27', '2022-11-18 16:47:27'),
(21, 1, 'Admin', 'Admin', NULL, '123456', 'abc address', '2023-02-02 19:51:42', '2023-02-02 19:52:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
