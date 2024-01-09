<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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
// ! ROTTA HOME
Route::get('/', [PublicController::class, 'home'])->name('home');

// !ROTTA ANNUNCI:
// ? index, create, show, showCategory
Route::get('/annunci', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'announcements'])->name('announcements.create');
Route::get('/annunci/detail/{announcement}',[AnnouncementController::class,'show'])->name('announcements.show');
Route::get('/annunci/categoria/{category}', [PublicController::class,'showCategory'])->name('category.show');

// ! ROTTA PER RISULTATI RICERCA
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search'); 
Route::patch('/annulla/annuncio/{announcement}',[RevisorController::class,'abortAnnouncement'])->middleware('isRevisor')->name('revisor.abort_announcement');

// ! ROTTA LINGUA
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// ! SEZIONE MEMBRI:
// ? UTENTI, REVISORI
// ! SEZIONE AREA UTENTI
Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('users.dashboard');

Route::delete('/announcement/delete/{announcement}', [UserController::class, 'destroy'])->name('users.destroy');

// ! SEZIONE REVISORE
// ? Area annunci da revisionare
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');
// ? Accetta Annuncio
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
// ? Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
// ? Richiedi di diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// ? Rendi un utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
// ? Rotta per form di richiesta di lavorare come revisore
Route::get('/lavora-con-noi', [RevisorController::class, 'form'])->name('form.lavoraconnoi');
Route::post('/lavora-con-noi', [RevisorController::class, 'sendEmail'])->name('send.email');

