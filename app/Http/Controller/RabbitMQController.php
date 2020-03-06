<?php


namespace App\Http\Controller;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * @Controller(prefix="/rabbit")
 */
class RabbitMQController
{
    /**
     * @RequestMapping(route="hello")
     * @throws \Exception
     */
    public function hello()
    {
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();
        $channel->queue_declare("hello",false,false,false,false);
        $msg = new AMQPMessage("hello".time());
        $channel->basic_publish($msg, '', 'hello');
        $channel->close();
        $connection->close();
    }

    /**
     * @RequestMapping(route="work")
     */
    public function work()
    {
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();
        $channel->queue_declare("work",false,false,false,false);
        $data = [
            'h1'.time(),
            'h2'.time(),
            'h3'.time(),
            'h4'.time(),
            'h5'.time(),
            'h6'.time(),
            'h7'.time(),
            'h8'.time(),
            'h9'.time(),
            'h10'.time(),
            'h11'.time(),
            'h12'.time()
        ];
        for ($i = 0; $i < count($data); $i++) {
            $msg = new AMQPMessage($data[$i]);
            $channel->basic_publish($msg, '', 'work');
        }
        $channel->close();
        $connection->close();
    }

    /**
     * @RequestMapping(route="subscribe")
     */
    public function subscribe()
    {
        $connection = new AMQPStreamConnection("localhost",5672,"wy","wy");
        $channel = $connection->channel();

        $channel->exchange_declare('logs', 'fanout', false, false, false);
        $data = "hello this is exchange!";

        $msg = new AMQPMessage($data);
        $channel->basic_publish($msg, 'logs');

        $channel->close();
        $connection->close();
    }

}
