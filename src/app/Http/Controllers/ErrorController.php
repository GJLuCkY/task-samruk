<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ErrorController extends Controller
{
    public function notFound(): void
    {
        throw new NotFoundHttpException();
    }
}
