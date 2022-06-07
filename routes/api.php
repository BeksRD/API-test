<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectAPIController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Public routes
//Route::resource('subjects',SubjectAPIController::class);
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/subjects', [SubjectAPIController::class,'index']);
Route::get('subjects/search/{name}',[SubjectAPIController::class,'search']);

//Protected routes
Route::group(['middleware'=>['auth:api']], function () {
    Route::post('/subjects', [SubjectAPIController::class,'store']);
    Route::put('/subjects/{subject_id}',[SubjectAPIController::class,'update'])->where(['subject_id'=>'[0-9+]']);;
    Route::delete('/subjects/{subject_id}',[SubjectAPIController::class,'destroy'])->where(['subject_id'=>'[0-9+]']);
    Route::post('/logout', [AuthController::class,'logout']);
});
//Route::prefix('/subjects')->group(function (){
//    Route::get('/', [SubjectAPIController::class,'index']);
//    Route::post('/', [SubjectAPIController::class,'store']);
//    Route::put('/{subject_id}',[SubjectAPIController::class,'update'])->where(['subject_id'=>'[0-9+]']);;
//    Route::delete('//{subject_id}',[SubjectAPIController::class,'destroy'])->where(['subject_id'=>'[0-9+]']);
//});

