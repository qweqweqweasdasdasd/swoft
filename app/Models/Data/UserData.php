<?php


namespace App\Models\Data;

use App\Models\Entity\SunnyUser;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class UserData extends Repository
{
    /**
     * @param int $userId
     * @return bool|\Closure|mixed
     * @throws \Swoft\Db\Exception\DbException
     */
    public function getUserInfo(int $userId)
    {
        return $this->setModel(new SunnyUser())
                    ->setTag('sunny-user')
                    ->remember($this->getTag().":".$userId,function() use($userId){
                        return $this->getModel()::find($userId);
                    });
    }




}
