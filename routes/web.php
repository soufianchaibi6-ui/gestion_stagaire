<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    Chatcontroller,
    Encadrement,
    GoogleController,
    LoginController,
    inscriptionController
};

// Authentication routes

Route::get('/login', [LoginController::class, 'index'])
    ->name('stagair.login');

Route::post('/singup', [LoginController::class, 'logine'])
    ->name('stagair.singup');

Route::post('/register', [LoginController::class, 'store'])
    ->name('stagair.store');


// Stagiaire routes

Route::get('/', [inscriptionController::class, 'create'])
    ->name('home')
    ->middleware('checkuser');

Route::post('/home', [inscriptionController::class, 'store'])
    ->name('home.store')
    ->middleware('checkuser');



Route::get('/attente/{id}', [inscriptionController::class, 'attente'])
    ->name('attente')
    ->middleware('checkuser');



// Encadrement routes
Route::get('/en_cadrement', [Encadrement::class, 'En_index'])
    ->name('login_en');

Route::post('/en_log', [Encadrement::class, 'login_en'])
    ->name('encadrement_en');

Route::get('/en_home', [Encadrement::class, 'hadi'])
    ->name('en_home')
    ->middleware('checkauth');


Route::get('/stagiaire/{id}', [Encadrement::class, 'show'])
    ->name('stagiaire.details')
    ->middleware('checkauth');

Route::post('/stagiaire/{id}/accepter', [Encadrement::class, 'accepter'])
    ->name('stagiaire.accepter');

Route::post('/stagiaire/{id}/refuser', [Encadrement::class, 'refuser'])
    ->name('stagiaire.refuser');
// chat routes
Route::get('/chat', [Chatcontroller::class, 'Chat'])
    ->name('chat')
    ->middleware('checkauth');

Route::get('/chat/{id}', [Chatcontroller::class, 'show'])
    ->name('chat.show')
    ->middleware('checkauth');

// Google OAuth routes

Route::get('/auth/google', [GoogleController::class, 'redirect']);

Route::get('/auth/google/callback', [GoogleController::class, 'callback']);


Route::get('/cv/{id}', [Encadrement::class, 'showCV'])->name('cv.show');