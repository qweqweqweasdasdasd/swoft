<?php


namespace App\Task\Task;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Task\Annotation\Mapping\Task;
use Swoft\Task\Annotation\Mapping\TaskMapping;
use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\Annotaion\Mapping\Scheduled;


/**
 * @Bean()
 * @Task(name="Sunny")
 * @Scheduled()
 */
class TimeTask
{
    /**
     * 表示每秒执行一次。
     *  @Cron("* * * * * *")
     */
    public function time()
    {
        echo time() . PHP_EOL;
    }
}
