-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-20 10:40:57
-- 服务器版本： 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sns`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_answer`
--

CREATE TABLE `think_answer` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '自增id',
  `answer_content` text CHARACTER SET utf8 NOT NULL COMMENT '答案内容',
  `answe_uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `answer_qid` int(10) UNSIGNED NOT NULL COMMENT '问题id',
  `answer_time` int(11) NOT NULL DEFAULT '0' COMMENT '回答问题的时间'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `think_answer`
--

INSERT INTO `think_answer` (`id`, `answer_content`, `answe_uid`, `answer_qid`, `answer_time`) VALUES
(1, '个色鬼速度', 2, 21, 1502007557),
(2, '徒儿他而购房恶搞', 2, 21, 1502007566),
(3, '随便评论一句话进来', 2, 21, 1502008031),
(4, '随便评论一条数据来', 2, 21, 1502008265),
(5, '评论3', 2, 7, 1502587433),
(6, '评论3455', 2, 7, 1502587537),
(8, '评论为我惹我而额', 2, 8, 1502588452),
(10, '评论123456', 0, 20, 1502590696),
(11, 'frefef ', 2, 22, 1502590790),
(12, '问题吧', 2, 19, 1502591547),
(13, '今天为什么这么冷', 2, 1, 1502591570),
(14, '4321423432', 2, 1, 1502592265),
(15, '432423423', 2, 1, 1502592274),
(16, '最佳答案', 2, 24, 1502593325),
(17, '发达省份试点', 2, 8, 1502593347),
(18, 'ping;iu', 2, 1, 1502609113),
(19, 'pinglun yiwe r ', 2, 7, 1502609401),
(20, 'pinlung werewrewr wer awerwae ', 2, 7, 1502609418),
(21, 'gsagsd gsd', 2, 7, 1502609435),
(22, '评论一次', 2, 27, 1502611596),
(23, 'pinglunwerewrwe', 2, 1, 1503218092);

-- --------------------------------------------------------

--
-- 表的结构 `think_answer_like`
--

CREATE TABLE `think_answer_like` (
  `id` int(10) UNSIGNED NOT NULL,
  `like_qid` int(10) UNSIGNED NOT NULL,
  `like_cid` int(10) UNSIGNED NOT NULL,
  `like_uid` int(10) UNSIGNED NOT NULL,
  `like_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `think_answer_like`
--

INSERT INTO `think_answer_like` (`id`, `like_qid`, `like_cid`, `like_uid`, `like_time`) VALUES
(14, 8, 17, 1, 0),
(16, 8, 17, 2, 0),
(19, 8, 12, 2, 0),
(20, 8, 0, 2, 0),
(24, 4, 12, 2, 0),
(42, 1, 12, 2, 0),
(48, 1, 13, 2, 0),
(49, 7, 21, 2, 0),
(50, 7, 20, 2, 0),
(51, 7, 19, 2, 0),
(52, 7, 5, 2, 0),
(53, 1, 15, 12, 0),
(54, 1, 18, 12, 0),
(56, 1, 13, 12, 0),
(58, 1, 14, 12, 0),
(59, 1, 23, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_question`
--

CREATE TABLE `think_question` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '自增id',
  `question_title` varchar(120) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `question_content` text CHARACTER SET utf8 NOT NULL COMMENT '问题内容',
  `question_uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `question_award` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '奖励',
  `question_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '提问时间',
  `question_view` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览数量',
  `question_comment` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论数量',
  `question_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '问题分类',
  `question_beast` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最佳答案',
  `question_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0未解决  1解决  2加精'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `think_question`
--

INSERT INTO `think_question` (`id`, `question_title`, `question_content`, `question_uid`, `question_award`, `question_time`, `question_view`, `question_comment`, `question_type`, `question_beast`, `question_status`) VALUES
(1, '今天为啥这么冷啊啊', '今天为啥这么冷啊啊', 2, 20, 1501399497, 12, 5, 1, 15, 0),
(2, '5454', '545454', 2, 5, 1501402244, 0, 0, 2, 0, 0),
(3, '5454', '545454', 2, 5, 1501402247, 2, 0, 2, 0, 0),
(4, '今天的天气还是很不错的', '545454423432v3fscsd', 2, 5, 1501402257, 3, 0, 2, 0, 0),
(5, '534534', '5345435435', 2, 5, 1501402293, 2, 0, 1, 0, 0),
(6, '4343', '434343', 2, 5, 1501402333, 2, 0, 1, 0, 0),
(7, '43432', '432432432', 2, 5, 1501402364, 36, 5, 2, 6, 0),
(8, '问题题目', '问题主要内容', 2, 20, 1501982488, 6, 0, 1, 17, 0),
(9, '421321', '321312312', 100, 1, 0, 0, 0, 0, 0, 0),
(10, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 0),
(11, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 0),
(12, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 0),
(13, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 0),
(14, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 1),
(15, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 1),
(16, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 1),
(17, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 1),
(18, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 1),
(19, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 0),
(20, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 0),
(21, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 2),
(22, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 2),
(23, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 2),
(24, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 2),
(25, '432432', '423423', 0, 1, 0, 0, 0, 0, 0, 2),
(26, '3421342', '342342423423', 0, 1, 0, 0, 0, 0, 0, 0),
(27, '432432', '423423', 0, 1, 0, 12, 1, 0, 0, 0),
(28, '天气预报！', '342342423423', 0, 1, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_question_type`
--

CREATE TABLE `think_question_type` (
  `id` int(11) NOT NULL COMMENT '自增id',
  `type_name` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '分类名称'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `think_question_type`
--

INSERT INTO `think_question_type` (`id`, `type_name`) VALUES
(1, '分类1'),
(2, '未定义');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `user_name` varchar(20) NOT NULL COMMENT '用户名',
  `user_pwd` varchar(32) NOT NULL COMMENT '密码',
  `user_email` varchar(60) NOT NULL COMMENT '邮箱',
  `user_image` varchar(255) NOT NULL DEFAULT '/Public/images/avatar/default.png' COMMENT '头像',
  `user_coins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户等级',
  `user_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户状态',
  `user_reg_time` int(10) UNSIGNED NOT NULL COMMENT '用户注册时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `user_name`, `user_pwd`, `user_email`, `user_image`, `user_coins`, `user_rank`, `user_status`, `user_reg_time`) VALUES
(1, 'niyinlong', 'e10adc3949ba59abbe56e057f20f883e', 'niyinlong@126.com', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@126.com', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(3, 'adfasdas', 'dsadasd', '', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(4, 'dsadas', 'dasdasdas', '', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(5, 'rqwrwe', 'rewrew', '', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(6, 'rewrewr', 'ewrwerwere', '', '/Public/images/avatar/default.png', 0, 0, 1, 1500793917),
(10, 'rwrwerew', 'e10adc3949ba59abbe56e057f20f883e', '1232132131232@125.com', '/Public/images/avatar/9.jpg', 0, 0, 0, 1503211428),
(11, '1234343', 'e10adc3949ba59abbe56e057f20f883e', 'e2133421321@125.com', '/Public/images/avatar/2.jpg', 0, 0, 0, 1503211506),
(12, 'rwerewrwe', 'e10adc3949ba59abbe56e057f20f883e', 'rwepoifksapokfsd@123.com', '/Public/images/avatar/11.jpg', 0, 0, 0, 1503211562);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_answer`
--
ALTER TABLE `think_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_answer_like`
--
ALTER TABLE `think_answer_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_question`
--
ALTER TABLE `think_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_question_type`
--
ALTER TABLE `think_question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_answer`
--
ALTER TABLE `think_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `think_answer_like`
--
ALTER TABLE `think_answer_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 使用表AUTO_INCREMENT `think_question`
--
ALTER TABLE `think_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=29;
--
-- 使用表AUTO_INCREMENT `think_question_type`
--
ALTER TABLE `think_question_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
