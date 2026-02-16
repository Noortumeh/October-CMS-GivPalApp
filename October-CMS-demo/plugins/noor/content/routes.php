<?php

use Illuminate\Support\Facades\Route;
use Noor\Content\Controllers\SectionController;

Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        Route::get('home-contents', [SectionController::class, 'homeContents']);
    });
