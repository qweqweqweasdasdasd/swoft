<?php

use Swoft\Db\DB;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 * @param null $contentType
 * @return \Swoft\Http\Message\Response|\Swoft\Rpc\Server\Response|\Swoft\Task\Response
 */

function response($contentType = false)
{
    if($contentType){
        return Context()->getResponse()->withContentType($contentType);
    }
    return Context()->getResponse();
}

function request()
{
    return Context()->getRequest();
}

function isGet()
{
    return request()->getMethod() === RequestMethod::GET;
}

function isPost()
{
    return request()->getMethod() === RequestMethod::POST;
}

function NewProduct(int $pid,string $name)
{
    $p = new stdClass();

    {
        $p->pid = $pid;
        $p->name = $name . $p->pid;
    }

    return $p;
}

function tx(callable $func,&$res=null)
{
    DB::beginTransaction();
    try {
        $res = $func();
        DB::commit();
    }catch (\Exception $e){
        $res = OrderCreateFail($e->getMEssage());
        DB::rollBack();
    }
}


/**
 * 生成随机数据
 */
if(!function_exists('randNum')){
    function randNum($len = 4)
    {
        $chars = "1234567890";
        $string = '';
        for ($i = 0; $i < $len ;$i++){
            $rand = rand(0,strlen($chars)-1);
            $string .= substr($chars,$rand,1);
        }
        return $string;
    }
}
