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
    return view('welcome');
});

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
