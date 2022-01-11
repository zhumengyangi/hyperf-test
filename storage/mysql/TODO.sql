CREATE TABLE `message` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='留言表';

CREATE TABLE `text` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='文本表';

CREATE TABLE `tag` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tag表';

CREATE TABLE `demo` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='demo表';

CREATE TABLE `potato` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='potato表';

CREATE TABLE `tomato` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tomato';

CREATE TABLE `chili` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2021-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='chili';

CREATE TABLE `book` (
`id` int unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
`title` varchar(50) NOT NULL DEFAULT '' COMMENT '简介',
`code` varchar(30) NOT NULL DEFAULT '' COMMENT '商品编码',
`price` int NOT NULL DEFAULT '0' COMMENT '定价',
`author` varchar(50) NOT NULL DEFAULT '' COMMENT '原著',
`translate` varchar(50) NOT NULL DEFAULT '' COMMENT '翻译',
`press` varchar(30) NOT NULL DEFAULT '' COMMENT '出版社',
`status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '1正常 2删除',
`created_at` timestamp NOT NULL DEFAULT '2022-01-01 00:00:00',
`updated_at` timestamp NOT NULL DEFAULT '2022-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='图书表';

CREATE TABLE `user_book` (
 `id` int unsigned NOT NULL AUTO_INCREMENT,
 `user_id` int unsigned NOT NULL,
 `book_id` int unsigned NOT NULL,
 `begin_time` int unsigned NOT NULL,
 `end_time` int unsigned NOT NULL,
 `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '1已借出 2已归还',
 `created_at` timestamp NOT NULL DEFAULT '2022-01-01 00:00:00',
 `updated_at` timestamp NOT NULL DEFAULT '2022-01-01 00:00:00',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='用户借书表';