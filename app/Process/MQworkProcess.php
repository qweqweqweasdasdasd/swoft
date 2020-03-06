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
class MQworkProcess extends UserProcess
{

    /**
     * @inheritDoc
     * ack 确认机制 false 手动提交
     */
    public function run(Process $process): void
    {
        echo "工作模式启动".PHP_EOL;
        // TODO: Implement run() method.
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();
        $channel->queue_declare("work",false,false,false,false);

        $callback = function ($msg){
            //sleep(substr_count($msg->body, '.'));
            sleep(3);
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
            echo "工作模式-接受数据-second：".$msg->body . PHP_EOL;
        };
        $channel->basic_qos(null, 1, null);

        $channel->basic_consume("work","",false,false,false,false,$callback);
        while (count($channel->callbacks)){
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
}
