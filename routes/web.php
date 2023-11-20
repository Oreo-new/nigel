<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SurveyMonkeyController;
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
// Route::get('/survey', [PageController::class, 'survey'])->name('survey');
Route::get('/tbm-articles/{slug}', [PageController::class, 'article'])->name('tbm-article');
Route::get('/archived/{slug}', [PageController::class, 'archive'])->name('tbm-archive');

Route::get('/tbm-on-substack', [PageController::class, 'substack'])->name('substack');

Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{slug}', [PageController::class, 'news1'])->name('news1');
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Route::get('/survey-monkey', [SurveyMonkeyController::class, 'redirectToSurveyMonkey']);
// Route::get('/survey-monkey/callback', [SurveyMonkeyController::class, 'handleSurveyMonkeyCallback'])->name('survey-monkey-callback');
Route::get('/survey', [SurveyMonkeyController::class, 'getSurveys'])->name('surveys');

Route::post('/comment', [CommentController::class, 'store'])->name('comments');

Route::get('/introduction-video', [PageController::class, 'intro'])->name('intro');
Route::get('/{slug}', [PageController::class, 'page'])->name('subpage');

Route::post('/contact-us', [ MailController::class , 'submitForm' ] )->name('contact-us');
// Route::post('/send-survey', [ MailController::class , 'sendsurvey' ] )->name('send-survey');


