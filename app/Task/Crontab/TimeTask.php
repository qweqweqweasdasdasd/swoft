<?php


namespace App\Task\Crontab;
use Exception;
use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\Annotaion\Mapping\Scheduled;
use Swoft\Log\Helper\CLog;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class CronTask
 *
 * @since 2.0
 *
 * @Scheduled()
 */
class TimeTask
{
    /**
     * @Cron("* * * * * *")
     *
     * @throws Exception
     */
    public function secondTask(): void
    {
        CLog::info('自定义： second task run: %s ', date('Y-m-d H:i:s'));
    }
}
