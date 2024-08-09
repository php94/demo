<?php

use App\Php94\Demo\Http\Home\Common;
use App\Php94\Demo\Http\Home\Index;
use App\Php94\Demo\Middleware\TestMiddleware;
use PHP94\Cache\LocalCache;
use PHP94\Container\Container;
use PHP94\Handler\Handler;
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
];
