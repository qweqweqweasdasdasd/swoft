<?php


namespace App\Process;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;
use Swoft\Redis\Redis;
use Swoft\Timer;

/**
 * @Bean()
 */
class RedisProcess extends UserProcess
{

    /**
     * @inheritDoc
     */
    public function run(Process $process): void
    {
        // TODO: Implement run() method.
        //echo "队列进程启动". PHP_EOL;
        Timer::tick(1000,function (){
            Redis::rPush('message','qweqwe');
            $res = Redis::lPop('message');
            $content = Redis::lRange('message',0,-1);

            // 异步任务处理
            //var_dump($content);
            var_dump($res);
            if($res){
                echo $res . PHP_EOL;
            }
            //echo "心跳进程" . PHP_EOL;
        });
    }
}
