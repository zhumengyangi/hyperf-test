CREATE TABLE `message` (
`id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
`content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容',
`created_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
`updated_at` datetime NOT NULL DEFAULT '2020-01-01 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='留言表';