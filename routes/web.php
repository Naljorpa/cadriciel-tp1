<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController ;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RepertoireController;

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

use App\Http\Controllers\EtudiantController;

Route::get('etudiant', [EtudiantController::class
, 'index'])->name('etudiant.index');

Route::get('etudiant/{etudiant}', [EtudiantController::class
, 'show'])->name('etudiant.show');

Route::get('etudiant-create', [EtudiantController::class
, 'create'])->name('etudiant.create');

Route::post('etudiant-create', [EtudiantController::class
, 'store']);

Route::get('etudiant-edit/{etudiant}', [EtudiantController::class
, 'edit'])->name('etudiant.edit');

Route::put('etudiant-edit/{etudiant}', [EtudiantController::class
, 'update']);

Route::delete('etudiant-edit/{etudiant}', [EtudiantController::class
, 'destroy']);

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');

// name ajouter mais pas obligatoire
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name(
    'user.auth');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

//Forum routes

Route::get('forum', [ForumController::class
, 'index'])->name('forum.index')->middleware('auth');

Route::get('forum/{forum}', [ForumController::class
, 'show'])->name('forum.show')->middleware('auth');

Route::get('forum-create', [ForumController::class
, 'create'])->name('forum.create')->middleware('auth');

Route::post('forum-create', [ForumController::class
, 'store'])->middleware('auth');//on peut effacer le name blog.store

Route::get('forum-edit/{forum}', [ForumController::class
, 'edit'])->name('forum.edit')->middleware('auth');

Route::put('forum-edit/{forum}', [ForumController::class
, 'update'])->middleware('auth');

Route::delete('forum-edit/{forum}', [ForumController::class
, 'destroy'])->middleware('auth');

//Langue

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// Repertoire

Route::get('repertoire', [RepertoireController::class
, 'index'])->name('repertoire.index')->middleware('auth');

Route::get('repertoire-create', [RepertoireController::class
, 'create'])->name('repertoire.create')->middleware('auth');

Route::post('repertoire-create', [RepertoireController::class
, 'store'])->middleware('auth');//on peut effacer le name blog.store

Route::get('repertoire/{repertoire}', [RepertoireController::class
, 'show'])->name('repertoire.show')->middleware('auth');

Route::get('repertoire/{id}/download',  [RepertoireController::class
, 'download'])->name('repertoire.download');

Route::get('repertoire-edit/{repertoire}', [RepertoireController::class
, 'edit'])->name('repertoire.edit')->middleware('auth');

Route::put('repertoire-edit/{repertoire}', [RepertoireController::class
, 'update'])->middleware('auth');

Route::delete('repertoire-edit/{repertoire}', [RepertoireController::class
, 'destroy'])->middleware('auth');
