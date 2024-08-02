<?php

use PHP94\Help\Package;

return [
    'install' => function () { //安装的时候需要的操作，通常是创建表
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
    },
    'unInstall' => function () { //卸载的时候需要的操作，通常是删除表
        $sql = <<<'str'
DROP TABLE IF EXISTS `prefix_php94_demo_content`;
str;
        Package::execSql($sql);
    },
    'update' => function (string $oldversion) { //更新的时候需要的操作，通常是更新字段
        $updates = [];
        foreach ($updates as $version => $fn) {
            if (version_compare($oldversion, $version, '<')) {
                $fn();
            }
        }
    },
];
