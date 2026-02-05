<?php

use App\Http\Controllers\LearnerProgressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



/**
 * DESIGN PATTERN: MVC Routing
 * Route maps URL → Controller → View
 * Public access. Requirement satisfied.
 */
Route::get(
    '/', 
    [LearnerProgressController::class, 'index']);
