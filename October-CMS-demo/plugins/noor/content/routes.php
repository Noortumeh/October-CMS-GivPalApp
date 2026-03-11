<?php

use Illuminate\Support\Facades\Route;
use Noor\Content\Controllers\SectionController;

Route::middleware(['api', 'setLocale'])
    ->prefix('api')
    ->group(function () {
        Route::get('home-contents', [SectionController::class, 'homeContents']);
        Route::get('search', [SectionController::class, 'searchContents']);
    });

