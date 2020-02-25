<?php


namespace App\Http\MyValidator;

use Swoft\Validator\Annotation\Mapping\Validator;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\IsInt;
use Swoft\Validator\Annotation\Mapping\Min;
use Swoft\Validator\Annotation\Mapping\Max;
use Swoft\Validator\Annotation\Mapping\IsFloat;
use Swoft\Validator\Annotation\Mapping\IsArray;
use App\Http\MyValidator\MyRules\OrderDetail;

/**
 * Class OrdersValidator
 * @Validator(name="orders")
 * @package App\Http\MyValidator
 */
class OrdersValidator
{
    /**
     * @IsInt(message="用户ID不得为空")
     * @Min(value=1,message="用户id不正确")
     * @var int
     */
    protected $order_id;

    /**
     * @IsInt(message="订单状态不得为空")
     * @Max(value=5,message="订单状态不正确max")
     * @Min(value=0,message="订单状态不正确min")
     * @var int
     */
    protected $order_status;

    /**
     * @IsFloat(message="订单金额不得为空")
     * @Min(value=1,message="订单金额不正确")
     * @var int
     */
    protected $order_money;

    /**
     * OrderDetail(message="订单明细不正确")
     */
    protected $order_item;      // 自定义验证其
}
