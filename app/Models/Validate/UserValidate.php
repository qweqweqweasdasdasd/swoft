<?php


namespace App\Models\Validate;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Validator\Annotation\Mapping\Validator;
use Swoft\Validator\Annotation\Mapping\IsInt;
use Swoft\Validator\Annotation\Mapping\Mobile;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Date;

/**
 * @Bean()
 * @Validator(name="userValidator")
 */
class UserValidate
{
    /**
     * @IsInt(message="手机号不得为空")
     * @var int
     */
    protected $mobile_char;

    /**
     * @IsString(message="密码不得为空")
     * @var string
     */
    protected $passwd_char;


}
