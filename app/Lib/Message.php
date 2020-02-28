<?php


namespace App\Lib;


class Message
{
    const CODE_SUCCESS = 100;
    const CODE_ERORR =101;

    public static function success($msg = 'success',$code = self::CODE_SUCCESS,$data = [])
    {
        return ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }

    public static function error($msg = 'error',$code = self::CODE_ERORR,$data = [])
    {
        return ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }
}
