<?php

namespace App\Exceptions;

use App\Http\Controllers\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse
     */
    public function render($request, Throwable $e): JsonResponse
    {
        // Modify exception code if it is zero, because it should not happen that in case of exception error code is zero
        if ($e->getCode() === 0) {
            $errorCode = ErrorCodes::DEFAULT_ERROR;
        } else {
            $errorCode = $e->getCode();
        }
        /* @psalm-var int $errorCode */
        switch (true) {
            case $e instanceof ModelNotFoundException:
                return $this->response('Record not found', null, 404, 'error');
            case $e instanceof NotFoundHttpException:
                return $this->response('Not found', null, 404, 'error');

            // Validation exceptions
            case $e instanceof ValidationException:
                /** @var Validator $validator */
                $validator = $e->validator;

                $messageArray = collect($validator->messages()->all());

                return $this->response($messageArray->implode(', '), null, ErrorCodes::VALIDATION_ERROR, 'error');

            // Render Notice exceptions as they are
            case $e instanceof NoticeException:
                return $this->response($e->getMessage(), $e->getData(), $errorCode, 'error');

            // If exception occurs which is not handled above
            default:
                // In production just rewrite any exception to server error 500
                if (app()->isProduction()) {
                    return $this->response('Server error', null, 500, 'error');
                }
                // In any other environment render exception as it is
                return $this->response($e->getMessage(), null, $errorCode, 'error');
        }
    }
}
