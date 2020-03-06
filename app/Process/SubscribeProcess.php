<?php


namespace App\Process;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class SubscribeProcess extends UserProcess
{

    /**
     * @inheritDoc
     */
    public function run(Process $process): void
    {
        // TODO: Implement run() method.
        echo "发布和订阅模式".PHP_EOL;
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();

        $channel->exchange_declare('logs', 'fanout', false, false, false);
        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);
        $channel->queue_bind($queue_name, 'logs');

        $callback = function ($msg) {
            //echo ' [x] ', $msg->body, "\n";
            echo "发布广播模式-接受数据：".$msg->body . PHP_EOL;
        };
        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
