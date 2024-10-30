<?php

use App\Php94\Admin\Model\Menu;
use App\Php94\Admin\Model\Widget;
use App\Php94\Demo\Http\Admin\Content\Index as ContentIndex;
use App\Php94\Demo\Http\Home\Common;
use App\Php94\Demo\Http\Home\Index;
use App\Php94\Demo\Middleware\TestMiddleware;
use PHP94\Cache\LocalCache;
use PHP94\Container\Container;
use PHP94\Handler;
use PHP94\Request;
use PHP94\Router\Router;
use Psr\SimpleCache\CacheInterface;

return [
    Container::class => function (
        Container $container
    ) {
        // 此处可以注册对象
        // $container->set(CacheInterface::class, function () {
        //     return new LocalCache();
        // });
    },
    Router::class => function (
        Router $router
    ) {
        // 注册路由
        $router->addRoute('[/]', Index::class);
    },
    Handler::class => function (
        Handler $handler
    ) {
        // 注册中间件
        if (is_a(Request::attr('handler', ''), Common::class, true)) { // 仅对前台控制器添加中间件
            $handler->pushMiddleware(TestMiddleware::class);
        }
    },
    Menu::class => function ( //注册后台菜单
        Menu $menu
    ) {
        $menu->addMenu('内容管理', ContentIndex::class);
    },
    Widget::class => function ( //注册后台挂件
        Widget $widget
    ) {
        $tpl = <<<'str'
<div>
    <span>现在的时间是：</span>
    <span id="time-display"></span>
    <span id="week-display"></span>
    <script>
        document.getElementById('time-display').textContent = (new Date).toLocaleString();
        document.getElementById('week-display').textContent = new Intl.DateTimeFormat('zh-CN', {
            weekday: 'long'
        }).formatToParts(new Date())[0].value;
        setInterval(function() {
            document.getElementById('time-display').textContent = (new Date).toLocaleString();
            document.getElementById('week-display').textContent = new Intl.DateTimeFormat('zh-CN', {
                weekday: 'long'
            }).formatToParts(new Date())[0].value;
        }, 1000);
    </script>
</div>
<div>
    服务器信息：<span>{$_SERVER['SERVER_SOFTWARE']}</span>
</div>
<div>
    操作系统：<span>{:php_uname()}</span>
</div>
str;
        $widget->addWidget('示例挂件', $tpl);
    }
];
