<?php

use App\Php94\Demo\Http\Admin\Content\Index;

return [
    'menus' => [ // 配置后台菜单
        [
            'title' => '内容管理',
            'node' => Index::class,
        ]
    ],
    'widgets' => [ // 配置后台挂件
        [
            'file' => __DIR__ . '/../widget/system.php',
            'title' => '示例挂件',
        ]
    ],
];
