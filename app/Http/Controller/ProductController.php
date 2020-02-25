<?php declare(strict_types=1);


namespace App\Http\Controller;

use App\Http\Middleware\ControllerMiddleware;
use App\Lib\MyRequest;
use App\Models\Products;
use Swoft\Db\DB;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoole\Coroutine;
use Swoole\Http\Response;
/**
 * 商品模块
 * @Controller(prefix="/product")
 * @Middleware(ControllerMiddleware::class)
 * @package App\Http\Controller
 */

class ProductController
{
    /**
     * @RequestMapping(route="/product",method={RequestMethod::GET})
     */
    public function product_list()
    {
        $request  = Context()->getRequest();
        $response  = Context()->getResponse();

        return $response->withContentType("application/json")
                        ->withData([NewProduct(101,'测试商品'),
                            NewProduct(102,'java入门')]);
    }

    /**
     * Validate(validator="product")
     * @RequestMapping(route="{id}",params={"id"="\d+"},method={RequestMethod::GET,RequestMethod::POST})
     * @param int $id
     * @return \Swoft\Http\Message\Response|\Swoft\Rpc\Server\Response|\Swoft\Task\Response
     * @throws \ReflectionException
     * @throws \Swoft\Bean\Exception\ContainerException
     * @throws \Swoft\Db\Exception\DbException
     */
    public function product_detail(int $id)
    {
        //echo request()->get('key','type');
//        $data = [
//            'di' => 201,
//            'name' => '测试版本'
//        ];
        //$data = DB::db('swoft')->selectOne("select * from products where prod_id = ?",[$id]);
//        $data = DB::query('db3.pool')
//                ->getConnection()
//                ->selectOne("select * from products where prod_id = ?",[$id]);
//        $data = DB::table('products')->get();
//        $data = DB::table('products')
//                    ->where('prod_id','=',$id)
//                    ->first();

        //$data = Products::find($id);
//        if($data){
//            sgo(function () use($data){
//                Coroutine::sleep(5);
//                $data->increment('prod_click');
//                echo "click done".PHP_EOL;
//            });
//        }

        $my = new MyRequest();

        return $my->if(isGet())
                ->then(function () use($id){
                    //$data['type'] = "get";
                    $data = Products::find($id);
                    return $data;
                })
                ->go(function (MyRequest $self) {    // 添加点击量
                    $data = $self->getResult();
                    if($data){
                        Coroutine::sleep(5);
                        $data->increment('prod_click');
                        echo "click done".PHP_EOL;
                    }
                })
//                ->if(isPost())
//                ->then(function () use($data){
//                    $data = [
//                        'prod_name' => request()->post('prod_name'),
//                        'prod_price' => request()->post('prod_price'),
//                    ];
//                    \validate($data,"product");
//                    $data['type'] = 'post';
//                    $data['content'] = request()->post('title','');
//
//                    return $data;
//                })
                ->getResult();
        //var_dump($my);
//        if(isGet()){
//            $data['type'] = "get";
//            return response()->withData($data);
//        }else if(isPost()){
//            $data['type'] = "post";
//            return response()->withData($data);
//        };

        //return response()->withContentType("application/json")->withData($data);
        //return response("application/json")->withData($data);
        //return response(ContentType::JSON)->withData($data);
        //return response()->withData($data);
    }
}
