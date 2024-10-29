<?php
// 安装脚本文件
use PHP94\Package;

$sql = <<<'str'
DROP TABLE IF EXISTS `prefix_php94_demo_content`;
CREATE TABLE `prefix_php94_demo_content` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
    `body` text COMMENT '内容',
    PRIMARY KEY (`id`) USING BTREE
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='内容表';
str;

Package::execSql($sql);
