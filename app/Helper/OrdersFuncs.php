<?php


function OrderCreateSuccess($orderNo)
{
    return ['status'=>'success','orderNo'=>$orderNo];
}


function OrderCreateFail($meg = 'fail')
{
    return ['status'=>$meg,'orderNo'=>''];
}
