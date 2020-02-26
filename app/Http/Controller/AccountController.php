<?php


namespace App\Http\Controller;

use Firebase\JWT\JWT;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class AccountController
 * @Controller(prefix="/account")
 * @package App\Http\Controller
 */
class AccountController
{
    /**
     * 使用jwt进行认证
     * @RequestMapping(route="login",method = {RequestMethod::POST})
     * @param Response $response
     * @return string
     */
    public function login(Response $response)
    {
        $private = \config('jwt.privateKey');
        $exp = \config("jwt.exp");
        $type = \config("jwt.type");

        $tokenParam = [
            'user' => 1,
            'iat' => time(),
            'exp' => time() + $exp,
        ];

        $token = JWT::encode($tokenParam,$private,$type);
        echo $token . PHP_EOL;
        
        return $response->withData(['token'=>$token]);
        //var_dump($private);die();

        //echo "login".PHP_EOL;
    }
}
