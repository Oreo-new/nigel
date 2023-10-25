<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
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


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/more-videos', [PageController::class, 'more'])->name('more-videos');
Route::get('/documents', [PageController::class, 'documents'])->name('documents');
Route::get('/about-the-author', [PageController::class, 'about'])->name('about');
Route::get('/book-ordering', [PageController::class, 'ordering'])->name('ordering');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/tbm-articles', [PageController::class, 'articles'])->name('tbm-articles');
Route::get('/survey', [PageController::class, 'survey'])->name('survey');
Route::get('/tbm-articles/{slug}', [PageController::class, 'article'])->name('tbm-article');
Route::get('/archived/{slug}', [PageController::class, 'archive'])->name('tbm-archive');

Route::post('/comment', [CommentController::class, 'store'])->name('comments');

Route::get('/{slug}', [PageController::class, 'page'])->name('subpage');

Route::post('/contact-us', [ MailController::class , 'submitForm' ] )->name('contact-us');