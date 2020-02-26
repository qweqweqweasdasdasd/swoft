<?php


namespace App\Listener;

use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Event\Annotation\Mapping\Listener;

/**

 * @Listener("sunny")
 */
class SunnyListener implements EventHandlerInterface
{

    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        // TODO: Implement handle() method.
        print_r($event->getParams());
    }
}
