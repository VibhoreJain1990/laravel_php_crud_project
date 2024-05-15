<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IncidentController;
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
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
//Incident Management System related Routes for Rapifuzz
Route::get('/',[IncidentController::class,'index'])->name('incidents.index')->middleware('auth');
Route::get('/incidents/search',[IncidentController::class,'search'])->name('incidents.search')->middleware('auth');
Route::post('/incidents/search2',[IncidentController::class,'search2'])->name('incidents.search2')->middleware('auth');
Route::get('/incidents/create', IncidentController::class . '@create')->name('incidents.create')->middleware('auth');
Route::get('/incidents/{id}',[IncidentController::class,'show'])->name('incidents.show')->middleware('auth');
Route::get('/incidents/{id}/edit', IncidentController::class .'@edit')->name('incidents.edit')->middleware('auth');
Route::post('/incidents',[IncidentController::class,'store'])->name('incidents.store')->middleware('auth');
Route::put('/incidents/{id}',[IncidentController::class,'update'])->name('incidents.update')->middleware('auth');
Route::delete('/incidents/{id}',[IncidentController::class,'destroy'])->name('incidents.destroy')->middleware('auth');


/*
//Route::get('/incidents',[IncidentController::class,'index']);  //->middleware('auth');

// returns the home page with all posts
Route::get('/', PostController::class .'@index')->name('posts.index')->middleware('auth');
// returns the form for adding a post
Route::get('/posts/create', PostController::class . '@create')->name('posts.create')->middleware('auth');
// adds a post to the database
Route::middleware(['auth'])->group(function () {
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');
});
*/


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

