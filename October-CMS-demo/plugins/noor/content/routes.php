<?php

use Illuminate\Support\Facades\Route;
use Noor\Content\Controllers\SectionController;


Route::get('api/home-contents', [SectionController::class, 'homeContents']);
