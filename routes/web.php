<?php

use App\Http\Controllers\PollingUnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PollingUnitController::class, 'loadAllPollingUnits'])->name('loadallpollingunits');
Route::get('/pollingunit/{id}', [PollingUnitController::class, 'getPollingUnitByID'])->name('loadpollingunitbyid');
Route::get('/votesbylga', [PollingUnitController::class, 'getVoteSumByLga'])->name('getvotesumbylga');
Route::post('/getvotesforlga', [PollingUnitController::class, 'getVotesForLGA'])->name('getVotesForLGA');
Route::get('/storepollingunitresult/{id}', [PollingUnitController::class, 'PollingUnitResult'])->name('pollingunitresult');
Route::post('/storepollingunitresult/{id}', [PollingUnitController::class, 'storePollingUnitResult'])->name('storepollingunitresult');

// Route::get('/user', [UserController::class, 'index']);
