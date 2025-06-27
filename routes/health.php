<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Health Check Routes
|--------------------------------------------------------------------------
|
| Simple health check endpoint for deployment monitoring
|
*/

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
        'app' => config('app.name'),
        'env' => config('app.env')
    ], 200);
});

Route::get('/ping', function () {
    return response('pong', 200)
        ->header('Content-Type', 'text/plain');
});
