<?php

use Illuminate\Support\Facades\Route;
use Noor\Api\Http\Controllers\PostController;

Route::prefix('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
});