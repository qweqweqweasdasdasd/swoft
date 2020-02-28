<?php


namespace App\Http\Controller;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Task\Task;


/**
 * @Controller()
 */
class SunnyController
{
    /**
     * @RequestMapping(route="/sunny/task")
     * @throws \Swoft\Task\Exception\TaskException
     */
    public function task()
    {
        $data = [
            1,2,3
        ];
        Task::async('Sunny','count',$data);
        //Task::co('testTask', 'list', [12]);

        \Swoft::trigger("Sunny",null,1000);
        return 1000;
    }
}
