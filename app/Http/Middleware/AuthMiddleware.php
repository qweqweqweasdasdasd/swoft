<?php


namespace App\Http\Middleware;


use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Context\Context;
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

        $token = $request->getHeaderLine("token");
        $type = \config('jwt.type');
        $public = \config('jwt.publicKey');
        try {
            $auth = JWT::decode($token, $public, ['type' => $type]);
            $request->user = $auth->user;
            //$response = Context::get()->getResponse();
            //var_dump($auth);
            //return $response->withData($auth);
        }catch (\Exception $e){
            $json = ['code'=>0,'msg'=>'授权失败'];
            //Context::get()->getResponse();
            $response = Context::mustGet()->getResponse();
            return $response->withData($json);
        }
        $response = $handler->handle($request);
        return $response;

    }
}
