<?php


namespace App\Http\Controller;

use App\Lib\Message;
use App\Models\Dao\UserDao;
use App\Models\Logic\UserLogic;
use App\Models\Service\UserService;
use Firebase\JWT\JWT;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;

/**
 * Class AccountController
 * @Controller(prefix="/v1/account")
 * @package App\Http\Controller
 */
class AccountController
{
    /**
     * Inject()
     * @var UserLogic
     */
    //private $userLogic;
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * @RequestMapping(route="create",method={RequestMethod::POST})
     * @Validate(validator="userValidator")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ValidateException
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function create(Request $request)
    {
        $post = $request->post();
        $this->userService->create($post);

        return Message::success();
    }

    /**
     * 使用jwt进行认证
     * RequestMapping(route="login",method = {RequestMethod::POST})
     * @param Response $response
     * @return string
     */
//    public function login(Response $response)
//    {
//        $private = \config('jwt.privateKey');
//        $exp = \config("jwt.exp");
//        $type = \config("jwt.type");
//
//        $tokenParam = [
//            'user' => 1,
//            'iat' => time(),
//            'exp' => time() + $exp,
//        ];
//
//        $token = JWT::encode($tokenParam,$private,$type);
//        echo $token . PHP_EOL;
//
//        return $response->withData(['token'=>$token]);
//        //var_dump($private);die();
//
//        //echo "login".PHP_EOL;
//    }
}
