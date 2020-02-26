<?php


namespace App\Bean;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class sunny
{
    private $name;

    public function __construct()
    {
        echo "sunny".PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name . time();
    }

    /**
     * @param mixed $name
     * @return sunny
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
