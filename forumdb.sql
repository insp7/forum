-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 08:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_author_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_author_id`, `comment_content`, `created_at`, `updated_at`, `is_deleted`, `deleted_by`) VALUES
(65, 66, 'inspiration7', 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2018-10-13 19:42:00', '0000-00-00 00:00:00', b'0', 0),
(66, 66, 'inspiration7', 1, 'Yet another comment! <3 ', '2018-10-13 19:42:12', '0000-00-00 00:00:00', b'0', 1),
(67, 68, 'Sgt. Buckets', 2, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '2018-10-13 19:42:49', '0000-00-00 00:00:00', b'0', 0),
(68, 70, 'dp', 3, 'Really ?\n', '2018-10-13 19:44:29', '0000-00-00 00:00:00', b'1', 1),
(69, 70, 'dp', 3, 'Testing with yet another comment <3 ', '2018-10-13 19:44:39', '0000-00-00 00:00:00', b'1', 1),
(70, 70, 'sk', 4, 'lets see if absolute path is working ...', '2018-10-13 20:03:01', '0000-00-00 00:00:00', b'1', 1),
(71, 70, 'sk', 4, 'and boy-o-boy it sure is! ', '2018-10-13 20:03:15', '0000-00-00 00:00:00', b'1', 1),
(72, 71, 'inspiration7', 1, 'Testing this comment', '2018-10-14 10:20:43', '0000-00-00 00:00:00', b'1', 1),
(73, 71, 'inspiration7', 1, '', '2018-10-14 10:20:43', '0000-00-00 00:00:00', b'1', 1),
(74, 71, 'inspiration7', 1, 'Gonna delete the blank answers', '2018-10-14 10:20:56', '0000-00-00 00:00:00', b'1', 1),
(75, 69, 'inspiration7', 1, 'Some comment', '2018-10-14 10:37:42', '0000-00-00 00:00:00', b'1', 1),
(76, 71, 'inspiration7', 1, '1\n', '2018-10-14 10:54:16', '0000-00-00 00:00:00', b'1', 1),
(77, 71, 'inspiration7', 1, '2', '2018-10-14 10:54:18', '0000-00-00 00:00:00', b'1', 1),
(78, 71, 'inspiration7', 1, '3', '2018-10-14 10:54:19', '0000-00-00 00:00:00', b'1', 1),
(79, 71, 'inspiration7', 1, '4', '2018-10-14 10:54:21', '0000-00-00 00:00:00', b'1', 1),
(80, 71, 'inspiration7', 1, '5', '2018-10-14 10:54:23', '0000-00-00 00:00:00', b'1', 1),
(81, 71, 'inspiration7', 1, 'Testing again for for toastr', '2018-10-14 10:55:37', '0000-00-00 00:00:00', b'1', 1),
(82, 71, 'inspiration7', 1, 'TESTING ', '2018-10-14 10:55:47', '0000-00-00 00:00:00', b'1', 1),
(83, 71, 'inspiration7', 1, 'toastr.options = {\n                \"closeButton\": true,\n                \"debug\": false,\n                \"newestOnTop\": true,\n                \"progressBar\": false,\n                \"preventDuplicates\": true,\n                \"positionClass\": \"toast-bottom-right\",\n                \"onclick\": null,\n                \"showDuration\": \"300\",\n                \"hideDuration\": \"1000\",\n                \"timeOut\": \"3000\",\n                \"extendedTimeOut\": \"1000\",\n                \"showEasing\": \"swing\",\n                \"hideEasing\": \"linear\",\n                \"showMethod\": \"fadeIn\",\n              ', '2018-10-14 10:55:54', '0000-00-00 00:00:00', b'0', 1),
(84, 71, 'inspiration7', 1, 'lets see', '2018-10-14 10:56:05', '0000-00-00 00:00:00', b'1', 1),
(85, 71, 'inspiration7', 1, 'function loadDoc() { \n	var xhttp = new XMLHttpRequest(); \n  	xhttp.onreadystatechange = function() {\n    	if (this.readyState == 4 ', '2018-10-14 10:56:21', '0000-00-00 00:00:00', b'1', 1),
(86, 71, 'inspiration7', 1, 'TESTING 123', '2018-10-14 10:59:23', '0000-00-00 00:00:00', b'1', 1),
(87, 71, 'inspiration7', 1, 'YO', '2018-10-14 11:01:25', '0000-00-00 00:00:00', b'1', 1),
(88, 71, 'inspiration7', 1, 'how\'s it goin ?', '2018-10-14 11:01:32', '0000-00-00 00:00:00', b'1', 1),
(89, 71, 'inspiration7', 1, '', '2018-10-14 11:02:10', '0000-00-00 00:00:00', b'1', 1),
(90, 71, 'inspiration7', 1, '', '2018-10-14 11:02:24', '0000-00-00 00:00:00', b'1', 1),
(91, 71, 'inspiration7', 1, '', '2018-10-14 11:02:25', '0000-00-00 00:00:00', b'1', 1),
(92, 71, 'inspiration7', 1, '', '2018-10-14 11:02:26', '0000-00-00 00:00:00', b'1', 1),
(93, 71, 'inspiration7', 1, '', '2018-10-14 11:02:27', '0000-00-00 00:00:00', b'1', 1),
(94, 71, 'inspiration7', 1, '', '2018-10-14 11:02:28', '0000-00-00 00:00:00', b'1', 1),
(95, 71, 'inspiration7', 1, '123', '2018-10-14 11:02:51', '0000-00-00 00:00:00', b'1', 1),
(96, 71, 'inspiration7', 1, '222', '2018-10-14 11:02:52', '0000-00-00 00:00:00', b'1', 1),
(97, 71, 'inspiration7', 1, 'Phasellus pellentesque accumsan turpis. Quisque non ipsum eget turpis laoreet iaculis eget eu sapien. Vivamus at faucibus neque.\nCurabitur in leo nulla. Ut egestas condimentum ipsum, eget scelerisque mauris auctor in. Aenean facilisis lobortis risus sed hendrerit. Nullam quis justo et massa scelerisque sagittis at nec ante. Morbi ac egestas dui. Vivamus fermentum ex ante, vitae ornare dolor lobortis sit amet. Vestibulum nec aliquet mi.', '2018-10-14 11:03:16', '0000-00-00 00:00:00', b'0', 0),
(98, 71, 'inspiration7', 1, 'Proin congue nunc odio, at maximus augue egestas a. Nam pulvinar magna a nibh convallis accumsan. Integer congue sed odio vel pharetra. Vivamus ullamcorper vestibulum molestie. Proin efficitur sodales lorem ut tempus. Pellentesque consequat tincidunt dui eu posuere. Vivamus semper viverra nulla eu mattis. Pellentesque luctus urna urna, sodales egestas leo sagittis facilisis.', '2018-10-14 11:03:22', '0000-00-00 00:00:00', b'0', 0),
(99, 71, 'inspiration7', 1, 'I dont think it means what you think it means', '2018-10-14 11:05:26', '0000-00-00 00:00:00', b'1', 1),
(100, 71, 'inspiration7', 1, 'eyy yo how\'s is goin', '2018-10-14 11:06:16', '0000-00-00 00:00:00', b'1', 1),
(101, 69, 'inspiration7', 1, 'Boy o boy', '2018-10-14 11:10:29', '0000-00-00 00:00:00', b'1', 1),
(102, 69, 'inspiration7', 1, 'Pretty cool', '2018-10-14 11:11:25', '0000-00-00 00:00:00', b'1', 1),
(103, 69, 'inspiration7', 1, 'pretty cool2 ', '2018-10-14 11:11:48', '0000-00-00 00:00:00', b'1', 1),
(104, 69, 'inspiration7', 1, 'retty cool2', '2018-10-14 11:12:15', '0000-00-00 00:00:00', b'1', 1),
(105, 64, 'inspiration7', 1, 'lmao', '2018-10-16 10:04:51', '0000-00-00 00:00:00', b'1', 1),
(106, 64, 'inspiration7', 1, '', '2018-10-17 19:49:09', '0000-00-00 00:00:00', b'1', 1),
(107, 64, 'inspiration7', 1, 'LOL', '2018-10-17 20:18:00', '0000-00-00 00:00:00', b'0', 0),
(108, 66, 'inspiration7', 1, 'Level ehuh ', '2018-10-21 17:46:00', '0000-00-00 00:00:00', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `notification_content` varchar(255) NOT NULL,
  `notified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='To send notifications to&from users if notified == false';

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `from_user_id`, `to_user_id`, `notification_content`, `notified`) VALUES
(1, 1, 2, 'Hello, there testing the notifications', 'true'),
(2, 2, 3, 'Welp, this one has not been yet notified!', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `post_image` text NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_tags` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `deleted_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `post_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_image`, `post_user_id`, `post_tags`, `created_at`, `deleted_at`, `is_deleted`, `deleted_by`, `updated_at`, `updated_by`, `post_points`) VALUES
(66, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.</div><div><br></div><div>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem. JAYT LSLOSA df</div>', '', 3, 'SweetAlert working 2', '2018-10-13 18:45:15', '0000-00-00 00:00:00', b'0', 0, '2018-10-21 18:23:35', 6, 3),
(67, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.</div><div><br></div><div>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem.</div>', '', 3, 'SweetAlert working', '2018-10-13 18:45:21', '0000-00-00 00:00:00', b'0', 0, '2018-10-16 09:08:20', 1, 2),
(68, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.</div><div><br></div><div>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem.</div>', '', 3, 'SweetAlert working', '2018-10-13 18:45:35', '0000-00-00 00:00:00', b'0', 0, '2018-10-16 06:55:55', 1, 0),
(69, '<div>Proin congue nunc odio, at maximus augue egestas a. Nam pulvinar magna a nibh convallis accumsan. Integer congue sed odio vel pharetra. Vivamus ullamcorper vestibulum molestie. Proin efficitur sodales lorem ut tempus. Pellentesque consequat tincidunt dui eu posuere. Vivamus semper viverra nulla eu mattis. Pellentesque luctus urna urna, sodales egestas leo sagittis facilisis. Aliquam sollicitudin commodo sem ac consectetur. Praesent sagittis nulla eget felis ornare rhoncus a et ipsum. Quisque ac consectetur metus.</div><div>Nullam at sapien eget ipsum elementum efficitur at vitae velit. Morbi auctor lorem ex, sit amet aliquam purus cursus varius. Ut volutpat dolor sed condimentum cursus. Praesent nec felis ac felis dignissim aliquam. Morbi volutpat id libero non convallis. Cras feugiat imperdiet purus nec vestibulum. Phasellus pellentesque accumsan turpis. Quisque non ipsum eget turpis laoreet iaculis eget eu sapien. Vivamus at faucibus neque.</div>', '', 3, '34', '2018-10-13 18:51:37', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(70, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.</div><div><br></div><div>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem.</div>', '', 1, 'SweetAlert working', '2018-10-13 19:33:03', '0000-00-00 00:00:00', b'0', 0, '2018-10-17 19:47:23', 1, 0),
(71, '<div>pro ui Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.</div><div><br></div><div>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem.</div>', '', 4, 'SweetAlert workingleytd s er', '2018-10-13 20:18:04', '0000-00-00 00:00:00', b'0', 0, '2018-10-21 17:39:56', 1, 1),
(72, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat nunc ut tincidunt. Sed libero nisi, fringilla et laoreet eget, vestibulum rutrum sapien. In a tellus nulla. Proin commodo elit ipsum, id ultricies velit tristique vel. Suspendisse porta mauris justo, in posuere neque fringilla a. Suspendisse at imperdiet risus, quis elementum mauris. Phasellus maximus lorem ut felis fermentum, at ullamcorper nibh ultricies.<br><br>Vivamus tellus purus, iaculis non tincidunt at, pretium in enim. Integer volutpat tortor eu turpis eleifend, id dignissim mauris finibus. Pellentesque scelerisque facilisis libero quis pharetra. Quisque ac molestie ipsum. Aliquam rhoncus luctus facilisis. Donec vitae dolor nec odio maximus rutrum et eget tellus. Aenean sodales felis in ante porttitor auctor. Nam eget varius turpis. Donec suscipit nisl nec imperdiet commodo. Morbi magna justo, tristique ac felis malesuada, laoreet semper urna. Mauris viverra imperdiet augue. Donec vitae eros ut enim pharetra finibus vehicula ut diam. Quisque eu metus sollicitudin felis ornare pellentesque sed et sem.</div><div>Proin congue nunc odio, at maximus augue egestas a. Nam pulvinar magna a nibh convallis accumsan. Integer congue sed odio vel pharetra. Vivamus ullamcorper vestibulum molestie. Proin efficitur sodales lorem ut tempus. Pellentesque consequat tincidunt dui eu posuere. Vivamus semper viverra nulla eu mattis. Pellentesque luctus urna urna, sodales egestas leo sagittis facilisis. Aliquam sollicitudin commodo sem ac consectetur. Praesent sagittis nulla eget felis ornare rhoncus a et ipsum. Quisque ac consectetur metus.<br>Nullam at sapien eget ipsum elementum efficitur at vitae velit. Morbi auctor lorem ex, sit amet aliquam purus cursus varius. Ut volutpat dolor sed condimentum cursus. Praesent nec felis ac felis dignissim aliquam. Morbi volutpat id libero non convallis. Cras feugiat imperdiet purus nec vestibulum. Phasellus pellentesque accumsan turpis. Quisque non ipsum eget turpis laoreet iaculis eget eu sapien. Vivamus at faucibus neque.<br><br></div>', '', 1, 'Lets see if this stillworks', '2018-10-14 11:41:27', '2018-10-16 10:30:07', b'1', 1, '0000-00-00 00:00:00', 0, 0),
(73, '<div>something</div>', '', 1, 'sample', '2018-10-14 11:51:01', '2018-10-16 10:30:40', b'1', 1, '0000-00-00 00:00:00', 0, 0),
(74, '<div>lol</div>', '', 1, 'yet, ns', '2018-10-14 11:51:24', '2018-10-14 11:51:31', b'1', 1, '0000-00-00 00:00:00', 0, 0),
(75, '<div>see toastr dureaton</div>', '', 1, 'as', '2018-10-14 11:52:01', '2018-10-14 11:52:05', b'1', 1, '0000-00-00 00:00:00', 0, 0),
(76, '<div> simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', '', 1, 'LOL', '2018-10-21 08:15:41', '2018-10-21 17:39:40', b'1', 1, '0000-00-00 00:00:00', 0, 3),
(77, '<div>XdASDASDASDASASD</div>', '', 1, 'Testing if this gets incremented', '2018-10-21 19:39:48', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(78, '<div>as</div>', '', 1, 'as', '2018-10-21 19:40:48', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(79, '<div>should weork now</div>', '', 1, 'asdasas', '2018-10-21 19:43:30', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(86, '<div>My Jay Ashra Done!!!!!!!!!!!!!!!!!!!1</div>', '', 1, 'New Post', '2018-10-21 19:57:36', '2018-10-21 20:02:12', b'1', 1, '0000-00-00 00:00:00', 0, 0),
(87, '<div>sdasd</div>', '', 1, 'jhgj', '2018-10-21 19:59:33', '2018-10-21 20:01:08', b'1', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_votes`
--

CREATE TABLE `post_votes` (
  `post_votes_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Specifies which user has up-voted/down-voted which post';

--
-- Dumping data for table `post_votes`
--

INSERT INTO `post_votes` (`post_votes_id`, `post_id`, `user_id`, `vote`) VALUES
(84, 76, 6, 'upvote'),
(86, 76, 2, 'upvote'),
(87, 66, 2, 'upvote'),
(89, 67, 1, 'upvote'),
(90, 66, 1, 'upvote'),
(92, 76, 1, 'upvote'),
(97, 66, 4, 'upvote'),
(98, 67, 4, 'upvote'),
(99, 71, 6, 'upvote');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains the unique number of roles(which can be assigned)';

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_branch` varchar(255) NOT NULL,
  `user_posts` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_profile_img` text NOT NULL,
  `user_created_at` datetime NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `deleted_by` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_password`, `user_email`, `user_dob`, `user_branch`, `user_posts`, `user_role`, `user_profile_img`, `user_created_at`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'Aniket', 'Konkar', 'inspiration7', 'aniket123', 'ak@gmail.com', '1998-11-16', 'Information Technology', 4, 'admin', '', '2018-10-06 15:45:25', b'0', 0, '0000-00-00 00:00:00'),
(2, 'Tirth', 'Shah', 'Sgt. Buckets', 'tirth123', 'ts@gmail.com', '1999-03-05', 'Computer Engineering', 0, 'user', '', '2018-10-06 15:47:00', b'0', 0, '0000-00-00 00:00:00'),
(3, 'Deepak', 'Paradkar', 'dp', 'deepak123', 'dp@gmail.com', '2018-10-28', 'InformationTechnology', 4, 'user', '', '2018-10-07 10:33:15', b'1', 1, '2018-10-21 17:31:40'),
(4, 'Soham', 'Konkar', 'sk', 'soham123', 'sk@gmail.com', '2018-10-07', 'Science', 1, 'user', '', '2018-10-13 07:59:04', b'0', 0, '0000-00-00 00:00:00'),
(5, 'troll', 'troll', 'troll', 'lol', 'troll@cnasd', '2018-10-08', 'asd', 0, 'user', '', '2018-09-10 19:28:07', b'1', 1, '2018-10-16 10:37:46'),
(6, 'Jay', 'Ashra', 'CoolShadow', 'jashra123', 'coolshadow@gmail.com', '1998-11-25', 'Computer Engineering', 0, 'admin', '', '2018-10-14 23:30:08', b'0', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_votes`
--
ALTER TABLE `post_votes`
  ADD PRIMARY KEY (`post_votes_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `post_votes`
--
ALTER TABLE `post_votes`
  MODIFY `post_votes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
