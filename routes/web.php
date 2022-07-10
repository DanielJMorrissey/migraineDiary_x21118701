<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorisationController;
use App\Http\Controllers\EntryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('diary', [AuthorisationController::class, 'diary'])->name('diary');

Route::get('loginpage', [AuthorisationController::class, 'loginPage'])->name('loggingin');

Route::post('computeLogin', [AuthorisationController::class, 'completeLogin'])->name('login.custom');

Route::get('register', [AuthorisationController::class, 'registerPage'])->name('registerUser');

Route::post('computeRegister', [AuthorisationController::class, 'computeRegistration'])->name('register.compute');

Route::get('signout', [AuthorisationController::class, 'logOut'])->name('logout');

Route::get('/addDiary', [AuthorisationController::class, 'addDiary'])->name('addDiary');

Route::post('/addDiary/entry', [EntryController::class, 'addDiaryEntry'])->name('addDiaryEntry');

Route::get('/updateDiary/{id}', [AuthorisationController::class, 'edit'])->name('updateDiaryEntry');

Route::put('/completeUpdateDiary/{id}', [EntryController::class, 'update'])->name('updateComplete');

Route::get('/deleteDiaryEntry/{id}', [EntryController::class, 'delete'])->name('deleteDiaryEntry');

Route::get('/gpTracker', [AuthorisationController::class, 'gpTracker'])->name('gpTracker');

Route::get('/addGPVisit', [AuthorisationController::class, 'addGPVisit'])->name('addGPVisit');

Route::post('/addGPVisit/entry', [EntryController::class, 'addGPVisitEntry'])->name('addedGPVisit');

Route::get('/updateGPVisit/{id}', [AuthorisationController::class, 'editGPVisit'])->name('updateGPVisit');

Route::put('/completeGPVisitUpdate/{id}', [EntryController::class, 'updateGPVisit'])->name('updateGPVisitComplete');

Route::get('/deleteGPVisit/{id}', [EntryController::class, 'deleteGPVisit'])->name('deleteGPVisit');
