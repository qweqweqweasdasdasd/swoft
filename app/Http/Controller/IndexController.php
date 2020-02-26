<?php


namespace App\Http\Controller;

use App\Bean\sunny;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class IndexController
 * @Controller()
 * @package App\Http\Controller
 */
class IndexController
{
    /**
     * @RequestMapping(route="/bean",method={RequestMethod::GET})
     */
    public function bean()
    {
        $sunny = \Swoft::getBean(sunny::class);
        $sunny->setName('this is bean');
        var_dump($sunny);
        return $sunny->getName();
    }

    /**
     * @Inject();
     * @var sunny
     */
    private $bean;

    /**
     * @RequestMapping(route="/bean1")
     */
    public function getBean()
    {
        $bean = \Swoft::getBean(sunny::class);

        var_dump($bean === $this->bean);
    }

    /**
     * @Inject()
     * @var sunny
     */
    private $sunny;

    /**
     * @RequestMapping(route="/index/{age}",params={"age"="\d+"})
     * @param int $age
     * @return string
     */
    public function index(int $age)
    {
        $this->sunny->setName('bean');
        return 'my name is ' . $this->sunny->getName() . 'age' .$age;
    }

    /**
     * @RequestMapping(route="/listener")
     */
    public function listener()
    {
        \Swoft::trigger('sunny',null,'sunny','age');
    }
}
