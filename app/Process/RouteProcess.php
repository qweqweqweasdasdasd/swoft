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
class RouteProcess extends UserProcess
{

    /**
     * @inheritDoc
     */
    public function run(Process $process): void
    {
        // TODO: Implement run() method.
        echo "路由队列01模式".PHP_EOL;
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();

        $channel->exchange_declare('direct_logs', 'direct', false, false, false);
        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);

        $channel->queue_bind($queue_name, 'direct_logs','info1');

        $callback = function ($msg) {
            echo ' first ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
        };

        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
