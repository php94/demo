<?php

declare(strict_types=1);

namespace App\Php94\Demo\Middleware;

use PHP94\Factory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TestMiddleware implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        // 前置中间件拦截
        if (time() % 2) { // 随机拦截
            $response = Factory::createResponse(200);
            $response->getBody()->write('<div style="color:red;">这是前置中间件拦截，后面不再执行</div>');
            return $response;
        }

        // 得到响应
        $response = $handler->handle($request);

        // 后置变更响应
        $response->getBody()->write('<div style="color:red;">这是后置中间件，追加内容</div>');
        return $response;
    }
}
