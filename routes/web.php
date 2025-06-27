<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

// Health check endpoint for deployment services
Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'timestamp' => now()], 200);
})->name('health');

Route::get('/ping', function () {
    return response('pong', 200);
})->name('ping');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('task_statuses', TaskStatusController::class);
    Route::resource('labels', LabelController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
