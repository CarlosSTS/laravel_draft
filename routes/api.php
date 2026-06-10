<?php

use Illuminate\Support\Facades\Route;

# http://localhost:8000/api/status

Route::get('/status', function () {
    return response()->json([
        'status' => 'API is up and running',
    ]);
});

# Chama o tipo da rota, o caminho e a função do controlador
Route::get('/welcome', [App\Http\Controllers\MainController::class, 'welcome']);
Route::get('/current-time', [App\Http\Controllers\MainController::class, 'currentTime']);
Route::get('/current-date', [App\Http\Controllers\MainController::class, 'currentDate']);
