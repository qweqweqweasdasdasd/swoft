<?php


namespace App\Http\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class AuthMiddleware
 * @Bean()
 * @package App\Http\Middleware
 */
class AuthMiddleware implements MiddlewareInterface
{

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: Implement process() method.
        //return response()->withData(['name'=>'sunny','msg'=>'没有登录']);
        //$response = $handler->handle($request);
        //return $response->withAddedHeader('user-middleware','success');


    }
}
