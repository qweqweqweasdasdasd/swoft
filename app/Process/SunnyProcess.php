<?php


namespace App\Process;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;

/**
 * @Bean()
 */
class SunnyProcess extends UserProcess
{

    /**
     * @inheritDoc
     */
    public function run(Process $process): void
    {
        // TODO: Implement run() method.
        echo "自定义进程" . PHP_EOL;
    }
}
