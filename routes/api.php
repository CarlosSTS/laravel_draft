<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/status', function () {
    return response()->json(['status' => 'API is running!']);
});

Route::get('/welcome', [MainController::class, 'welcome']);
Route::get('/time', [MainController::class, 'currentTime']);
Route::get('/date', [MainController::class, 'currentDate']);
Route::get('/greet/{name}', [MainController::class, 'greetClient']);
Route::post('/sum', [MainController::class, 'sum']);

Route::post('/store-contact', [MainController::class, 'storeContact']);
Route::get('/get-contacts', [MainController::class, 'getContacts']);
Route::get('/clear-contacts', [MainController::class, 'clearContacts']);