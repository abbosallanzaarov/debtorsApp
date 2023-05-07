<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DebtorHistorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test' , function () {
return 'salom';
});

Route::post('/register' , [AuthController::class , 'register']);
Route::post('/login' , [AuthController::class , 'login']);
Route::post('/logout' , [AuthController::class , 'logout']);


Route::apiResources([
    'debtor'=> DebtorController::class,
]);
Route::get('debtor/history/{id} ' , [DebtorHistorController::class , 'index'] )->middleware('auth:sanctum');
Route::post('debtor/history' , [DebtorHistorController::class , 'store'] )->middleware('auth:sanctum');
Route::patch('debtor/history/{id}' , [DebtorHistorController::class , 'update'] )->middleware('auth:sanctum');
Route::delete('debtor/history/{id}' , [DebtorHistorController::class , 'delete'] )->middleware('auth:sanctum');



