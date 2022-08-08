<?php

use App\Http\Livewire\Article\Form;
use App\Http\Livewire\Article\Show;
use App\Http\Livewire\Articles;
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

# From Articles
Route::get('/', Articles::class)->name('articles.index');

# From Article
Route::get('/articulo/crear', Form::class)
    ->name('article.create')
    ->middleware('auth:sanctum');

Route::get('/articulo/{article}', Show::class)
    ->name('article.show');

Route::get('/articulo/{article}/edit', Form::class)
    ->name('article.edit')
    ->middleware('auth:sanctum');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
