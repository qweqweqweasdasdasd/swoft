<?php


namespace App\Exception\Handler;


use App\Exception\ValidateException;
use Swoft\Http\Message\Response;
use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Http\Server\Exception\Handler\AbstractHttpErrorHandler;
use Throwable;

/**
 * @ExceptionHandler(ValidateException::class)
 */
class ExceptionHandlers extends AbstractHttpErrorHandler
{

    /**
     * @inheritDoc
     */
    public function handle(Throwable $e, Response $response): Response
    {
        // TODO: Implement handle() method.
        return $response->withStatus(500)
            ->withData([
                'message' => $e->getMessage() . time(),
            ]);
    }
}
