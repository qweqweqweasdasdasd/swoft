<?php


namespace App\Http\Controller;

use App\Lib\Message;
use App\Models\Service\UserService;
use Firebase\JWT\JWT;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * @Controller(prefix="/v1/user")
 */
class UserController
{

    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * @param Request $request
     * @RequestMapping(route="info")
     * @return array
     * @throws \Swoft\Db\Exception\DbException
     */
    public function getUserInfo(Request $request)
    {
        $userId = $request->get('id');
        $data = $this->userService->getUserInfo($userId);
        return Message::success('success',Message::CODE_SUCCESS,$data);
    }

    /**
     * @RequestMapping(route="login")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ValidateException
     */
    public function login(Request $request)
    {
        $post = $request->post();
        $token = $this->userService->login($post['moblie'],$post['passwd']);
        return Message::success('success',Message::CODE_SUCCESS,$token);
    }

}
