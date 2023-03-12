<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['auth:sanctum']], function(){
    /**
     * Create a new job posting.
     */
    Route::post('/jobs', [JobController::class, 'store']);

    /**
     * Retrieve specific job postings.
     */

    Route::put('/jobs/{id}', [JobController::class, 'update']);

    /**
     * Retrieve specific job postings.
     */
    Route::delete('/jobs/{id}',  [JobController::class, 'destroy']);
});

Route::get('/search', [JobController::class, 'search']);

Route::get('/filtering', [JobController::class, 'filter']);
/**
 * Retrieve all job postings.
 */
Route::get('/jobs', [JobController::class, 'index']);

// /**
//  * Create a new job posting.
//  */
// Route::post('/jobs', [JobController::class, 'store']);

/**
 * Retrieve specific job postings.
 */
 Route::get('/jobs/{id}', [JobController::class, 'show']);

 Route::post('/register', [AuthController::class, 'register']);

 Route::post('/login', [AuthController::class, 'login']);

// /**
//  * Retrieve specific job postings.
//  */
// Route::put('/jobs/{id}', [JobController::class, 'update']);


// Route::delete('/jobs/{id}',  [JobController::class, 'destroy']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
