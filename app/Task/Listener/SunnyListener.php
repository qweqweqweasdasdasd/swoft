<?php


namespace App\Task\Listener;

use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Task\TaskEvent;
use Swoft\Log\Helper\CLog;

/**
 * @Listener("Sunny")
 */
class SunnyListener implements EventHandlerInterface
{

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event): void
    {
        // TODO: Implement handle() method.
        echo "sunnylistener" .PHP_EOL;
        //CLog::info(\context()->getTaskUniqid());
    }
}
