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
 * @Bean()
 * Class ApiMiddleware
 * @package App\Http\Middleware
 */
class ApiMiddleware implements MiddlewareInterface
{

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: Implement process() method.
        $request->user = 11;
        $response = $handler->handle($request);

        return $response->withAddedHeader('user-middleware','success');
    }
}
