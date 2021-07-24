<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

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
Route::get('task-list', [CategorieController::class, 'index']);
Route::get('show-task/{taskId}', [CategorieController::class, 'show']);
Route::get('delete-task/{taskId}', [CategorieController::class, 'delete']);
Route::post('search-task', [CategorieController::class, 'search']);
Route::post('edit-task/{taskId}', [CategorieController::class, 'edit']);
Route::post('add-task', [CategorieController::class, 'store']);
