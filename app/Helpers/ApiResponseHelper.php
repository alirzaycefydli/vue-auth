<?php

namespace App\Helpers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

if (!function_exists('handleException')) {
    function handleException(Throwable $exception): JsonResponse
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'message' => 'Route not found',
                'errors' => null
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
                'errors' => null
            ], 401);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'errors' => null
        ], 500);
    }
}
