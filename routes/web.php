<?php

use Illuminate\Support\Facades\Route;

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
use App\Models\Image as ModelsImage;



// Route::get('/', function () {
//     // $images = ModelsImage::all();
//     // foreach($images as $image){
//     //     echo $image->description. '<hr/>';
//     //     echo $image->users->name. ' '. $image->users->surname;
//     //     echo '<hr/><strong>Comentarios</strong>';
//     //     foreach($image->comments as $comment){
//     //         echo $comment->content;
//     //     }
//     // }
//     //    die();
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('setting');
Route::post('/user/edit', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');