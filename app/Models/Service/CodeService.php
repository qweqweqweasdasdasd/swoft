<?php


namespace App\Models\Service;

use App\Exception\ValidateException;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Redis\Redis;

/**
 * @Bean()
 */
class CodeService
{
    /**
     * @var Redis
     */
    private $redis;

    /**
     * 获取到验证码
     * @param string $mobile
     */
    public function getCode(string $mobile)
    {
        $key = "code:{$mobile}";
        $ttl = 120;
        $this->checkMobile($mobile);
        $code = randNum();

        $second = Redis::ttl($key);
        if($second > 0){
            throw new ValidateException("请在秒{$second}之后获取验证码");
        }
        Redis::set($key,$second,$ttl);

        // 发送验证码,,使用异步发送

        return $ttl;
    }

    /**
     * @param string $mobile
     * @param string $code
     * @return bool
     * @throws ValidateException
     */
    public function checkCode(string $mobile,string $code)
    {
        $key = "code:{$mobile}";
        $val = Redis::get($key);
        if($val != $code){
            throw new ValidateException("验证码核对不正确");
        }
        return true;
    }

    /**
     * @param string $mobile
     * @return bool
     */
    public function checkMobile(string $mobile)
    {
        return true;
    }

}
