<?php


namespace App\Task\Task;

use Swoft\Task\Annotation\Mapping\Task;
use Swoft\Task\Annotation\Mapping\TaskMapping;

/**
 * @Task(name="Sunny")
 */
class SunnyTask
{
    /**
     * @TaskMapping(name="count")
     * @param $data1
     * @param $data2
     * @param $data3
     */
    public function count($data1,$data2,$data3)
    {
        sleep(6);
        echo $data1 + $data2 + $data3 . PHP_EOL;
    }
}
