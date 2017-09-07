-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-07 10:28:27
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(5, 'erew r', 2, 8, 1502588651),
(13, '你是不是傻', 2, 8, 1502590407),
(14, '你是不是有点傻', 2, 8, 1502592997),
(16, '逆势大幅', 2, 28, 1502593233),
(17, '你是不是有点傻啊', 2, 28, 1502593292),
(18, '都是他佛陀说', 13, 8, 1502593379),
(19, '你是不是傻', 17, 28, 1502595734),
(20, '你是不是啊', 17, 28, 1502596408),
(21, '你是不是有点傻', 17, 8, 1502606347),
(22, '你是不是啊', 17, 8, 1502609366),
(23, '哇，好可怜\r\n', 18, 29, 1502611240),
(24, '呵呵', 17, 8, 1502611318),
(25, '哈撒比', 17, 29, 1502611446),
(26, '你好', 17, 33, 1502612199),
(27, '哈哈', 17, 33, 1502612217),
(28, '你是不是傻', 17, 30, 1504751146),
(29, '多少岁', 2, 39, 1504772212),
(30, '你是谁', 2, 39, 1504772235),
(31, '你是', 2, 39, 1504772274),
(32, '你是谁', 2, 35, 1504772429);

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
(6, 8, 21, 17, 0),
(7, 8, 18, 17, 0),
(8, 8, 13, 17, 0),
(12, 8, 5, 17, 0),
(13, 33, 26, 17, 0),
(14, 33, 27, 17, 0),
(16, 30, 28, 17, 0);

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
(1, '今天为啥这么冷啊啊', '今天为啥这么冷啊啊', 2, 20, 1501399497, 0, 0, 1, 0, 0),
(29, '一个80老爷子的微博', '老汪日常敲起来他的代码，从没有见过外面世界的他，都不知道什么是人。', 18, 100, 1502610481, 13, 2, 1, 0, 0),
(30, '哈哈', '说的', 17, 5, 1502610484, 31, 1, 1, 28, 0),
(31, '哈哈', '23', 17, 5, 1502611734, 1, 0, 1, 0, 0),
(32, '哈哈', '33 ', 17, 5, 1502611749, 1, 0, 1, 0, 0),
(33, '很是无奈啊', '2', 17, 5, 1502611782, 19, 2, 2, 26, 0),
(34, '诶我去二', '诶我去二', 17, 20, 1504771655, 2, 0, 2, 0, 0),
(35, '卫栖梧', '我去', 17, 20, 1504771676, 6, 1, 2, 0, 0),
(36, '我去诶我去二', '请问', 2, 20, 1504771729, 1, 0, 2, 0, 0),
(37, '今天天气的还是很不错的啊', '今天天气的还是很不错的啊', 2, 20, 1504771790, 1, 0, 1, 0, 0),
(38, '感觉今天好像要下雨啊', '感觉今天好像要下雨啊', 2, 50, 1504771890, 1, 0, 3, 0, 0),
(39, '马上就可能下雨了', '马上就可能下雨了', 2, 50, 1504772108, 10, 3, 2, 0, 0);

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
(1, '青铜'),
(2, '白银'),
(3, '黄金');

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
  `user_reg_time` int(10) UNSIGNED NOT NULL COMMENT '用户注册时间',
  `user_motto` varchar(300) NOT NULL DEFAULT '主人比较随意，没有什么座右铭！！！' COMMENT '用户座右铭'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `user_name`, `user_pwd`, `user_email`, `user_image`, `user_coins`, `user_rank`, `user_status`, `user_reg_time`, `user_motto`) VALUES
(1, 'niyinlong', 'e10adc3949ba59abbe56e057f20f883e', 'niyinlong@126.com', '/Public/images/avatar/1.jpg', 0, 0, 1, 1500793917, '主人比较随意，没有什么座右铭！！！'),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@126.com', '/Public/images/avatar/0.jpg', 0, 0, 1, 1500793917, '主人比较随意，没有什么座右铭！！！'),
(16, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user@qq.com', '/Public/images/avatar/0.jpg', 0, 0, 0, 0, '主人比较随意，没有什么座右铭！！！'),
(17, 'winner', 'e10adc3949ba59abbe56e057f20f883e', 'winner@qq.com', '/Public/images/avatar/1.jpg', 0, 0, 0, 1502595562, '主人比较随意，没有什么座右铭！！！'),
(18, '闪开', 'f19907d7fd74c56fe3d9bae9759eddf7', 'i@you.com', '/Public/images/avatar/2.jpg', 0, 0, 0, 1502609828, '主人比较随意，没有什么座右铭！！！'),
(29, '发顺丰', 'e10adc3949ba59abbe56e057f20f883e', 'niyinlong@126.com', '/Public/images/avatar/1.jpg', 0, 0, 1, 1500793917, '主人比较随意，没有什么座右铭！！！'),
(30, '发多少', 'e10adc3949ba59abbe56e057f20f883e', 'admin@126.com', '/Public/images/avatar/0.jpg', 0, 0, 1, 1500793917, '主人比较随意，没有什么座右铭！！！'),
(31, '发多少', 'e10adc3949ba59abbe56e057f20f883e', 'user@qq.com', '/Public/images/avatar/0.jpg', 0, 0, 0, 0, '主人比较随意，没有什么座右铭！！！'),
(32, '阿凡达是', 'e10adc3949ba59abbe56e057f20f883e', 'winner@qq.com', '/Public/images/avatar/1.jpg', 0, 0, 0, 1502595562, '主人比较随意，没有什么座右铭！！！'),
(33, '大师傅', 'f19907d7fd74c56fe3d9bae9759eddf7', 'i@you.com', '/Public/images/avatar/2.jpg', 0, 0, 0, 1502609828, '主人比较随意，没有什么座右铭！！！'),
(34, '阿什顿发', 'e10adc3949ba59abbe56e057f20f883e', 'user@qq.com', '/Public/images/avatar/0.jpg', 0, 0, 0, 0, '主人比较随意，没有什么座右铭！！！'),
(35, '发的说法', 'f19907d7fd74c56fe3d9bae9759eddf7', 'i@you.com', '/Public/images/avatar/2.jpg', 0, 0, 0, 1502609828, '主人比较随意，没有什么座右铭！！！'),
(36, '发生的', 'e10adc3949ba59abbe56e057f20f883e', 'winner@qq.com', '/Public/images/avatar/1.jpg', 0, 0, 0, 1502595562, '主人比较随意，没有什么座右铭！！！'),
(37, '电风扇', 'f19907d7fd74c56fe3d9bae9759eddf7', 'i@you.com', '/Public/images/avatar/2.jpg', 0, 0, 0, 1502609828, '主人比较随意，没有什么座右铭！！！');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=33;
--
-- 使用表AUTO_INCREMENT `think_answer_like`
--
ALTER TABLE `think_answer_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `think_question`
--
ALTER TABLE `think_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=40;
--
-- 使用表AUTO_INCREMENT `think_question_type`
--
ALTER TABLE `think_question_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
