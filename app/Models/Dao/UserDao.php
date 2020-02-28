<?php


namespace App\Models\Dao;

use App\Models\Entity\SunnyUser;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class UserDao
 * @Bean()
 * @package App\Models\Dao
 */
class UserDao
{
    /**
     * 创建用户
     * @param array $data
     * @return
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function create(array $data)
    {
        $user = new SunnyUser();
        $user = $user->fill($data)->save();
        return $user;
    }

    /**
     * @param string $mobile
     */
    public function getUserByMobile(string $mobile)
    {
        return SunnyUser::where('mobile_char',$mobile)->first();
    }
}
