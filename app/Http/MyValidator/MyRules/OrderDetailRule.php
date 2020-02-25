<?php

namespace App\Http\MyValidator\MyRules;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Validator\Contract\RuleInterface;
use Swoft\Validator\Exception\ValidatorException;

/**
 * Class OrderDetailRule
 * @Bean(OrderDetail::class)
 */
class OrderDetailRule implements RuleInterface {

    /**
     * @param array $data
     * @param string $propertyName
     * @param object $item
     * @param mixed $default
     *
     * @param bool $strict
     * @return array
     * @throws ValidatorException
     */
    public function validate(array $data, string $propertyName, $item, $default = null, $strict = false): array
    {
        $getData = $data[$propertyName];
        if(!$getData || !is_array($getData) || count($getData) == 0){
            throw new ValidatorException($item->getMessage());
        }

        foreach ($getData as $data) {
            validate($data, "order_detail");
        }

        return $data;
    }
}
