<?php declare(strict_types=1);


namespace App\Http\MyValidator;

use Swoft\Validator\Annotation\Mapping\Validator;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\IsFloat;
use Swoft\Validator\Annotation\Mapping\Length;
use Swoft\Validator\Annotation\Mapping\Max;
use Swoft\Validator\Annotation\Mapping\Min;

/**
 * 商品验证
 * @Validator(name="product")
 * @package App\Http\MyValidator
 */
class ProductValidator
{
    /**
     * @IsString()
     * @Length(min=5,max=20,message="商品名称在5个字符到20个字符之间")
     * @var string
     */
    protected $prod_name;

    /**
     * @Min(value=20,message="价格不得低于20")
     * @Max(value=1000,message="价格不得大于1000")
     * @IsFloat(message="商品价格不能为空")
     * @var float
     */
    protected $prod_price=0;

}
