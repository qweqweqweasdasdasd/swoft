<?php


namespace App\Http\Controller;

use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

use Swoft\Http\Server\Annotation\Mapping\Middleware;
use App\Http\Middleware\AuthMiddleware;

/**
 * @Controller(prefix="/test")
 */
class TestController
{
    /**
     * @RequestMapping(route="index",method={RequestMethod::GET,RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function index(Request $request,Response $response)
    {
        var_dump($request->user);

        //$name = $request->input('name');
        //echo $name . PHP_EOL;

        //$request->withAddedHeader();
        //$name = $request->get('name');
        //$name = $request->post('name');
        //$name= $request->input('name');
        //return $request->header();
        //return $request->server();
        //return $name;
        //echo time();

        //return $response->redirect("http://www.baidu.com");
        //return $response->withData(['name'=>'sunny']);
        //return $response->withAddedHeader('sunny','my name is sunny');

    }

    /**
     * @RequestMapping(route="sunny")
     * @Middleware(AuthMiddleware::class)
     */
    public function sunny()
    {
        echo time() . PHP_EOL;
    }

}
