-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 02:44 PM
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
(1, 'Fusce in libero at felis blandit egestas condimentum nec enim. Aenean eget elit lacus. Cras aliquam, eros at volutpat sollicitudin, augue augue egestas enim, vel convallis nisi felis quis lacus. Quisque vitae urna quis metus lacinia interdum at at odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisi sem, eleifend id porttitor sollicitudin, sodales in leo. Morbi fermentum porttitor arcu lacinia dictum. Integer vel bibendum nulla. Sed vitae ligula quis dui mattis sollicitudin. Cras sagittis felis eget sapien tincidunt, nec euismod sem iaculis. Aenean sed augue in dui pretium rhoncus. Duis vel ultrices nunc. Donec gravida ornare viverra. Maecenas ex lectus, egestas varius massa ut, vulputate viverra massa. Proin id erat nibh.', '', 1, 'insp7\'s post', '2018-10-28 14:39:36', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 5),
(2, 'Vestibulum volutpat tempus arcu ut porta. Integer auctor cursus diam, non ultricies turpis tempor id. Sed sagittis ultricies neque, a consectetur nisi porta vitae. Morbi eget tortor pellentesque, imperdiet ligula eu, suscipit dui. Sed ac orci ac risus ultricies efficitur sed eu leo. Etiam et ex at nulla sagittis varius. Duis semper, ipsum nec mattis fringilla, magna enim fringilla felis, at rutrum sem dolor quis turpis. Sed luctus neque sapien, porttitor egestas eros blandit at.', '', 2, 'sgt bucket\'s post', '2018-10-28 14:40:25', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'Nullam ut aliquam dolor. Etiam interdum, velit vel consectetur molestie, massa nisl euismod ex, tempor volutpat nisi elit at arcu. Aenean vel iaculis libero. Suspendisse iaculis ipsum a aliquam lobortis. Nam vitae metus erat. Quisque nec pellentesque massa. Pellentesque dictum turpis vitae velit pretium lacinia. Praesent mollis non tortor sed lobortis.', '', 4, 'sk\'s post', '2018-10-28 14:40:57', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Aliquam varius tempus magna, quis cursus sapien porta vel. Sed ut suscipit leo. Vivamus scelerisque sem magna, ut tempus mi facilisis et. Fusce est odio, fermentum non maximus in, finibus id lorem. Morbi euismod gravida facilisis. Maecenas non mollis eros. Integer viverra ex felis, eget volutpat magna aliquam non. Vestibulum molestie in sem eget pellentesque.', '', 6, 'coolshadow\'s post', '2018-10-28 14:41:25', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 2),
(5, 'Nullam ut aliquam dolor. Etiam interdum, velit vel consectetur molestie, massa nisl euismod ex, tempor volutpat nisi elit at arcu. Aenean vel iaculis libero. Suspendisse iaculis ipsum a aliquam lobortis. Nam vitae metus erat. Quisque nec pellentesque massa. Pellentesque dictum turpis vitae velit pretium lacinia. Praesent mollis non tortor sed lobortis.\n\nAliquam varius tempus magna, quis cursus sapien porta vel. Sed ut suscipit leo. Vivamus scelerisque sem magna, ut tempus mi facilisis et. Fusce est odio, fermentum non maximus in, finibus id lorem. Morbi euismod gravida facilisis. Maecenas non mollis eros. Integer viverra ex felis, eget volutpat magna aliquam non. Vestibulum molestie in sem eget pellentesque.', '', 7, 'vj\'s post', '2018-10-28 14:42:17', '0000-00-00 00:00:00', b'0', 0, '0000-00-00 00:00:00', 0, 0);

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
(1, 1, 7, 'upvote'),
(2, 4, 7, 'upvote'),
(3, 1, 1, 'upvote'),
(4, 4, 1, 'upvote'),
(5, 1, 2, 'upvote'),
(6, 1, 4, 'upvote'),
(7, 1, 6, 'upvote');

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
(1, 'Aniket', 'Konkar', 'inspiration7', 'aniket123', 'ak@gmail.com', '1998-11-16', 'Information Technology', 3, 'admin', '', '2018-10-06 15:45:25', b'0', 0, '0000-00-00 00:00:00'),
(2, 'Tirth', 'Shah', 'Sgt. Buckets', 'tirth123', 'ts@gmail.com', '1999-03-05', 'Computer Engineering', 1, 'user', '', '2018-10-06 15:47:00', b'0', 0, '0000-00-00 00:00:00'),
(4, 'Soham', 'Konkar', 'sk', 'soham123', 'sk@gmail.com', '2018-10-07', 'Science', 3, 'user', '', '2018-10-13 07:59:04', b'0', 0, '0000-00-00 00:00:00'),
(6, 'Jay', 'Ashra', 'CoolShadow', 'jashra123', 'coolshadow@gmail.com', '1998-11-25', 'Computer Engineering', 1, 'admin', '', '2018-10-14 23:30:08', b'0', 0, '0000-00-00 00:00:00'),
(7, 'Varun', 'Joshi', 'varunj', 'varun123', 'vj@gmail.com', '2018-10-17', 'Computers', 1, 'user', '', '2018-10-22 04:58:37', b'0', 0, '0000-00-00 00:00:00');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_votes`
--
ALTER TABLE `post_votes`
  MODIFY `post_votes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
