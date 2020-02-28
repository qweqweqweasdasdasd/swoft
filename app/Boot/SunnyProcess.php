<?php


namespace App\Boot;

use Swoft\Process\Annotation\Mapping\Process;
use Swoft\Process\Contract\ProcessInterface;
use Swoole\Process\Pool;

class SunnyProcess implements ProcessInterface
{

    /**
     * @Process()
     * @inheritDoc
     */
    public function run(Pool $pool, int $workerId): void
    {
        // TODO: Implement run() method.

        echo "前置进程".PHP_EOL;
    }
}
