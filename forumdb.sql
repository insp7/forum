-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 10:41 AM
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
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_author_id`, `comment_content`, `created_at`, `updated_at`, `is_deleted`) VALUES
(52, 3, 'Sgt. Buckets', 2, 'ts\'s comment ', '2018-10-07 09:52:36', '0000-00-00 00:00:00', b'0'),
(53, 3, 'inspiration7', 1, 'ak\'s comment', '2018-10-07 09:54:35', '0000-00-00 00:00:00', b'0'),
(54, 4, 'Sgt. Buckets', 2, 'Some answer', '2018-10-07 10:28:58', '0000-00-00 00:00:00', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `notification_content` text NOT NULL,
  `notified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` text NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_tags` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `updated_at` datetime NOT NULL,
  `post_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_image`, `post_user_id`, `post_tags`, `created_at`, `deleted_at`, `is_deleted`, `updated_at`, `post_points`) VALUES
(1, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac dui a nulla pellentesque convallis ut in metus. Morbi at sagittis enim. In id eros lectus. Suspendisse laoreet rutrum ante, ac viverra nunc ullamcorper quis. In nunc odio, tincidunt eu nisi ac, rhoncus tristique ante. Cras mattis eget purus at vestibulum. Nullam porttitor est lectus, lobortis pharetra nulla placerat vitae. Nulla tincidunt dui nec laoreet fringilla. Aenean nec augue ut lorem vehicula molestie. Aliquam erat volutpat. Fusce consequat nulla neque, et finibus odio ultricies vel. Cras vulputate nec lorem a suscipit. In hac habitasse platea dictumst. Sed sagittis, ligula non semper volutpat, nunc nisi iaculis ligula, eget fringilla erat ex sed tellus. </div>', '', 1, 'Sample Testing post', '2018-10-06 12:28:44', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0),
(2, '<div>Donec ornare erat et libero sagittis, sed suscipit purus ullamcorper. Fusce porta vehicula risus id venenatis. Donec lacus elit, vehicula vitae porta id, egestas et erat. Nam rhoncus vel nulla sed tincidunt. Vestibulum cursus ultrices augue bibendum ullamcorper. Suspendisse vitae malesuada elit, id pretium ligula. Duis tincidunt rhoncus lorem eu aliquet. Fusce accumsan accumsan quam vitae maximus. Aliquam in viverra odio, id convallis nisl. Ut et ultrices elit. In tristique porttitor congue. </div>', '', 1, 'sample2 ', '2018-10-06 12:28:55', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0),
(3, '<div>Morbi at tincidunt dui. Donec at justo quis urna posuere iaculis et at purus. Vestibulum consectetur, ante sed blandit tincidunt, augue massa gravida sem, et porta sem velit vitae libero. Curabitur venenatis nunc ut risus scelerisque aliquam. Nunc non nisl feugiat, tristique erat eget, commodo est. Sed sed felis dapibus, convallis ex a, posuere dolor. Suspendisse potenti. Vestibulum et congue mi, at ultrices eros. In vel feugiat tortor. Praesent elit ante, accumsan et mauris sit amet, sollicitudin blandit massa. Cras consectetur ornare placerat. </div>', '', 1, 'sample3', '2018-10-06 12:29:03', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0),
(4, '<div>Fusce sit amet purus elit. Maecenas porta leo mi, ut aliquam sem venenatis a. In imperdiet, purus eget efficitur viverra, mi diam vestibulum tortor, eget lacinia est elit eu tortor. Pellentesque porta elit enim, sagittis ullamcorper libero convallis in. Ut aliquam ultrices nunc, sit amet interdum est fermentum cursus. Maecenas malesuada augue et est sollicitudin consequat. Quisque sit amet viverra dolor. Donec pellentesque vitae nunc in malesuada. </div>', '', 1, 'sample4', '2018-10-06 12:29:10', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0),
(6, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac dui a nulla pellentesque convallis ut in metus. Morbi at sagittis enim. In id eros lectus. Suspendisse laoreet rutrum ante, ac viverra nunc ullamcorper quis. In nunc odio, tincidunt eu nisi ac, rhoncus tristique ante. Cras mattis eget purus at vestibulum. Nullam porttitor est lectus, lobortis pharetra nulla placerat vitae. Nulla tincidunt dui nec laoreet fringilla. Aenean nec augue ut lorem vehicula molestie. Aliquam erat volutpat. Fusce consequat nulla neque, et finibus odio ultricies vel. Cras vulputate nec lorem a suscipit. In hac habitasse platea dictumst. Sed sagittis, ligula non semper volutpat, nunc nisi iaculis ligula, eget fringilla erat ex sed tellus.</div><div><br></div><div>Donec ornare erat et libero sagittis, sed suscipit purus ullamcorper. Fusce porta vehicula risus id venenatis. Donec lacus elit, vehicula vitae porta id, egestas et erat. Nam rhoncus vel nulla sed tincidunt. Vestibulum cursus ultrices augue bibendum ullamcorper. Suspendisse vitae malesuada elit, id pretium ligula. Duis tincidunt rhoncus lorem eu aliquet. Fusce accumsan accumsan quam vitae maximus. Aliquam in viverra odio, id convallis nisl. Ut et ultrices elit. In tristique porttitor congue.</div><div><br></div><div>Morbi at tincidunt dui. Donec at justo quis urna posuere iaculis et at purus. Vestibulum consectetur, ante sed blandit tincidunt, augue massa gravida sem, et porta sem velit vitae libero. Curabitur venenatis nunc ut risus scelerisque aliquam. Nunc non nisl feugiat, tristique erat eget, commodo est. Sed sed felis dapibus, convallis ex a, posuere dolor. Suspendisse potenti. Vestibulum et congue mi, at ultrices eros. In vel feugiat tortor. Praesent elit ante, accumsan et mauris sit amet, sollicitudin blandit massa. Cras consectetur ornare placerat.</div><div><br></div><div>Fusce sit amet purus elit. Maecenas porta leo mi, ut aliquam sem venenatis a. In imperdiet, purus eget efficitur viverra, mi diam vestibulum tortor, eget lacinia est elit eu tortor. Pellentesque porta elit enim, sagittis ullamcorper libero convallis in. Ut aliquam ultrices nunc, sit amet interdum est fermentum cursus. Maecenas malesuada augue et est sollicitudin consequat. Quisque sit amet viverra dolor. Donec pellentesque vitae nunc in malesuada.</div><div>Ut nisl nisi, commodo nec viverra ac, dignissim ut orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce mauris lorem, accumsan id eleifend a, consequat a purus. Nullam nec consequat magna. Praesent pharetra dolor vestibulum enim dictum gravida. Suspendisse euismod magna accumsan erat luctus, eu accumsan purus aliquet.</div>', '', 1, 'sample52', '2018-10-06 12:32:22', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0),
(7, 'LOL', '', 1, 'loll', '2018-10-05 00:00:00', '2018-10-06 00:00:00', b'1', '0000-00-00 00:00:00', 0),
(8, '<div>What is this ?</div>', '', 2, 'something', '2018-10-07 09:08:38', '0000-00-00 00:00:00', b'0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_votes`
--

CREATE TABLE `post_votes` (
  `post_votes_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_password`, `user_email`, `user_dob`, `user_branch`, `user_posts`, `user_role`, `user_profile_img`, `user_created_at`, `is_deleted`) VALUES
(1, 'Aniket', 'Konkar', 'inspiration7', 'aniket123', 'ak@gmail.com', '1998-11-16', 'Information Technology', 1, 'admin', '', '2018-10-06 15:45:25', b'0'),
(2, 'Tirth', 'Shah', 'Sgt. Buckets', 'tirth123', 'ts@gmail.com', '1999-03-05', 'Computer Engineering', 0, 'user', '', '2018-10-06 15:47:00', b'0'),
(3, 'Deepak', 'Paradkar', 'dp', 'deepak123', 'dp@gmail.com', '2018-10-28', 'InformationTechnology', 3, 'user', '', '2018-10-07 10:33:15', b'0');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
