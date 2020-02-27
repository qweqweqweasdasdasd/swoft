<?php


namespace App\Http\MyValidator;

use Swoft\Validator\Annotation\Mapping\Validator;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Email;
use Swoft\Validator\Annotation\Mapping\Max;
use Swoft\Validator\Annotation\Mapping\Min;
use Swoft\Validator\Annotation\Mapping\IsInt;

/**
 * Class Index1Validator
 * @Validator(name="index1Validator")
 * @package App\Http\MyValidator
 */
class Index1Validator
{
    /**
     * @IsString(message="邮箱不得为空")
     * @Email(message="邮箱格式不对")
     * @var string
     */
    protected $email;

    /**
     * @IsString(message="昵称不得为空")
     * @var string
     */
    protected $nikename;

    /**
     * @IsInt(message="密码不得为空")
     * @Min(value=2,message="密码不正确min")
     * @var int
     */
    protected $password;
}
