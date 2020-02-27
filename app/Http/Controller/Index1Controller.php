<?php


namespace App\Http\Controller;

use App\Exception\ValidateException;
use App\Models\Entity\SunnyUser;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Redis\Redis;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class Index1Controller
 * @Controller()
 * @package App\Http\Controller
 */
class Index1Controller
{
    /**
     * @RequestMapping(route="/index1/index")
     * @Validate(validator="index1Validator")
     */
    public function index()
    {
        $user = new SunnyUser();
        $user->setMobileChar('15836020238');
        $user->setPasswdChar('123456');
        $user->setCreateTime(date("Y-m-d H:i:s",time()));

        $user->save();
        $userId = $user->getId();

        //$user->fill($data)->save();
        //$user->fill($data)->save();

        $user = SunnyUser::find(1);

        $user = SunnyUser::whereIn('id', [1, 2])->get();

        var_dump($user);
        //var_dump($userId);
        //throw new ValidateException('自定义错误');
    }


    /**
     * @RequestMapping(route="/index1/_redis")
     */
    public function _redis()
    {
        Redis::set("name",'sunny');

        Redis::get("name");

    }

}
