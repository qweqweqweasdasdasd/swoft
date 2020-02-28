<?php


namespace App\Http\Controller;

use App\Lib\Message;
use App\Models\Service\CodeService;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * @Controller(prefix="/v1/code")
 */
class CodeController
{
    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;

    /**
     * @RequestMapping(route="getCode",method={RequestMethod::POST})
     * @param Request $request
     * @return array
     * @throws \App\Exception\ValidateException
     */
    public function getCode(Request $request)
    {
        $mobile = $request->post('mobile','');
        $time = $this->codeService->getCode($mobile);

        return Message::success('success',Message::CODE_SUCCESS,['time'=>$time]);
    }
}
