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

/*
    two controllers will be used
    AuthorisationController to deal with log in and registration
    EntryController to deal with anything not requiring authorisation to be processed
*/

// home page
Route::get('/', function () {
    return view('index');
})->name('home');

// migraine diary page
Route::get('diary', [AuthorisationController::class, 'diary'])->name('diary');

// log in page
Route::get('loginpage', [AuthorisationController::class, 'loginPage'])->name('loggingin');

// log in submission
Route::post('computeLogin', [AuthorisationController::class, 'completeLogin'])->name('customLogin');

// register page
Route::get('register', [AuthorisationController::class, 'registerPage'])->name('registerUser');

// register submission
Route::post('computeRegister', [AuthorisationController::class, 'computeRegistration'])->name('register.compute');

// log out
Route::get('signout', [AuthorisationController::class, 'logOut'])->name('logout');

// add diary entry page/web form
Route::get('/addDiary', [AuthorisationController::class, 'addDiary'])->name('addDiary');

// add diary entry submission
Route::post('/addDiary/entry', [EntryController::class, 'addDiaryEntry'])->name('addDiaryEntry');

// update diary entry page, id in url is diary entry primary key and can only be an unsigned integer
Route::get('/updateDiary/{id}', [AuthorisationController::class, 'edit'])->name('updateDiaryEntry')->where('id', '[0-9]+');

// update diary entry page submission
Route::put('/completeUpdateDiary/{id}', [EntryController::class, 'update'])->name('updateComplete')->where('id', '[0-9]+');

// delete diary entry
Route::get('/deleteDiaryEntry/{id}', [EntryController::class, 'delete'])->name('deleteDiaryEntry')->where('id', '[0-9]+');

// GP tracker page
Route::get('/gpTracker', [AuthorisationController::class, 'gpTracker'])->name('gpTracker');

// add GP visit page
Route::get('/addGPVisit', [AuthorisationController::class, 'addGPVisit'])->name('addGPVisit');

// GP visit submission
Route::post('/addGPVisit/entry', [EntryController::class, 'addGPVisitEntry'])->name('addedGPVisit');

// update GP visit entry, id is GP visit entry primary key and can only be an unsigned integer
Route::get('/updateGPVisit/{id}', [AuthorisationController::class, 'editGPVisit'])->name('updateGPVisit')->where('id', '[0-9]+');

// update GP visit entry submission
Route::put('/completeGPVisitUpdate/{id}', [EntryController::class, 'updateGPVisit'])->name('updateGPVisitComplete')->where('id', '[0-9]+');

// delete GP visit entry
Route::get('/deleteGPVisit/{id}', [EntryController::class, 'deleteGPVisit'])->name('deleteGPVisit')->where('id', '[0-9]+');

// analysis page
Route::get('/analysis', [AuthorisationController::class, 'analysis'])->name('analysisPage');

// 404 page, if no url matches above, home page will be displayed, has to be last
Route::fallback(function (){
    return view('index');
});
