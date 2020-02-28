<?php


namespace App\Models\Service;

use App\Exception\ValidateException;
use App\Models\Dao\UserDao;
use App\Models\Data\UserData;
use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
/**
 * Class UserService
 * @Bean()
 * @package App\Models\Service
 */
class UserService
{
    /**
     * @Inject()
     * @var UserDao
     */
    private $userDao;

    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;

    /**
     * @Inject()
     * @var UserData
     */
    private $userData;

    /**
     * 创建用户
     * @param array $data
     * @return \App\Models\Entity\SunnyUser|bool
     * @throws ValidateException
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function create(array $data)
    {
        $data['create'] = date('Y-m-d H:i:s',time());
        $user = $this->getUserByMobile($data['mobile_char']);
        $this->codeService->checkCode($data['mobile'],$data['code']);
        if($user){
            throw new ValidateException('该用户已经存在！');
        }
        return $this->userDao->create($data);
    }

    /**
     * @param string $mobile
     * @return object|\Swoft\Db\Eloquent\Builder|\Swoft\Db\Eloquent\Model|null
     */
    public function getUserByMobile(string $mobile)
    {
        return $this->userDao->getUserByMobile($mobile);
    }

    /**
     * @param int $id
     * @return bool|\Closure|mixed
     * @throws \Swoft\Db\Exception\DbException
     */
    public function getUserInfo(int $id)
    {
        return $this->userData->getUserInfo($id);
    }


    /**
     * @param string $mobile
     * @param string $passwd
     * @return string
     * @throws ValidateException
     */
    public function login(string $mobile,string $passwd)
    {
        $user = $this->getUserByMobile($mobile);
        if(!$user){
            throw new ValidateException('该用户不存在');
        }
        if($passwd != $user->getPasswdChar()){
            throw new ValidateException("密码不正确");
        }
        return $this->getTokenByUserId($user->getId());
    }

    /**
     * @param int $userId
     * @return string
     */
    public function getTokenByUserId(int $userId)
    {
        $private = \config("jwt.privateKey");
        $exp = \config("jwt.exp");
        $type = \config("jwt.type");

        $tokenParam = [
            'user' => $userId,
            'iat' => time(),
            'exp' => time() + $exp,
        ];

        $token = JWT::encode($tokenParam,$private,$type);
        return $token;
    }
}
