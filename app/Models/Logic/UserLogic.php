<?php


namespace App\Models\Logic;

use Swoft\Validator\Annotation\Mapping\Validator;
use App\Models\Validate\UserValidate;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class UserLogic
 * @Bean()
 * @package App\Models\Logic
 */
class UserLogic
{
    /**
     * 创建用户
     * @param array $data
     * @throws \Swoft\Validator\Exception\ValidatorException
     */
    public function create(array $data)
    {
        var_dump($data);
        $result = validate($data, UserValidate::class);

        var_dump($result);
    }
}
