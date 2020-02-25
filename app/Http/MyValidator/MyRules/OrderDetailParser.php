<?php

namespace App\Http\MyValidator\MyRules;

use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use Swoft\Validator\ValidatorRegister;

/**
 * Class OrderDetailParser
 * @AnnotationParser(annotation=OrderDetail::class)
 */
class OrderDetailParser extends Parser{

    /**
     * Parse object
     *
     * @param int $type Class or Method or Property
     * @param object $annotationObject Annotation object
     *
     * @return array
     * Return empty array is nothing to do!
     * When class type return [$beanName, $className, $scope, $alias] is to inject bean
     * When property type return [$propertyValue, $isRef] is to reference value
     * @throws \ReflectionException
     * @throws \Swoft\Validator\Exception\ValidatorException
     */
    public function parse(int $type, $annotationObject): array
    {
        if ($type != self::TYPE_PROPERTY) {
            return [];
        }
        //向验证器注册一个验证规则
        ValidatorRegister::registerValidatorItem($this->className, $this->propertyName, $annotationObject);
        return [];
    }
}
