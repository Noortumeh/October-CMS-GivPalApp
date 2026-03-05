<?php

use Flynsarmy\Menu\Components\Menu;
use Flynsarmy\Menu\Controllers\ApiMenusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'setLocale'])
    ->prefix('api')
    ->group(function () {
        Route::get('links', [ApiMenusController::class, 'getLinks']);
    });
