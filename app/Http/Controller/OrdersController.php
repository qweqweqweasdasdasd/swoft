<?php declare(strict_types=1);


namespace App\Http\Controller;

use App\Exception\ApiException;
use App\Models\OrdersMian;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;

/**
 * Class OrdersController
 * @Controller(prefix="/orders")
 * @package App\Http\Controller
 */
class OrdersController
{
    /**
     * @Validate(validator="orders")
     * @RequestMapping(route="new",method={RequestMethod::POST})
     * @param Request $request
     * @return \Swoft\Http\Message\Response|\Swoft\Rpc\Server\Response|\Swoft\Task\Response
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function createOrder(Request $request)
    {
        $data = $request->post();
        var_dump($data['order_item']);die();

        if($data){
            $order = OrdersMian::new($data);
            $order->setCreateTime(date('Y-m-d H:i:s'));
        }

        if($order->save()){
            return OrderCreateSuccess('123456789');
        };

        return OrderCreateFail();
        //throw new ApiException('api of ExceptionController');
    }
}
