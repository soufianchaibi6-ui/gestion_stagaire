<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{Encadrement, GoogleController, LoginController, SingupController, inscriptionController};
use Faker\Guesser\Name;

Route::get("/" ,[LoginController::class, 'index'] )->name('stagair.login');
Route::post("/singup" ,[LoginController::class , 'logine'])->name('stagair.singup');
Route::post("/stagair" ,[LoginController::class, 'store'] )->name('stagair.store');

//Route::get("/home" ,[LoginController::class, 'homme'] )->name('homme');



Route::get('/en_cadrement' , [Encadrement::class , 'En_index'])->name('login_en');
Route::post('/en_log' ,[Encadrement::class , 'login_en'])->name('encadrement_en');
Route::get('/en_homme' ,[Encadrement::class ,'hadi'])->name('en_home')->middleware('Authenticate');


Route::get('/home', [inscriptionController::class, 'create'])->name('home');
Route::post('/home', [InscriptionController::class, 'store'])->name('home.store');

Route::get('/stagiaire/{id}', [Encadrement::class, 'show'])->name('stagiaire.details');
Route::post('/stagiaire/{id}/accepter', [Encadrement::class, 'accepter'])->name('stagiaire.accepter');
Route::post('/stagiaire/{id}/refuser', [Encadrement::class, 'refuser'])->name('stagiaire.refuser');



Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);