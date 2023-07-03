<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Dashboard;
use App\Http\Controllers\DiscordLoginContoller;
use App\Http\Livewire\Pages\Public\Home;
use App\Http\Livewire\Pages\Public\Search;

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

Route::get('/', Home::class)->name('home');
Route::get('/search', Search::class)->name('search');
Route::get('/login',  [DiscordLoginContoller::class, 'redirectToProvider'])->name('login');
Route::get('/discordinfo', [DiscordLoginContoller::class, 'handleProviderCallback']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard/{page?}', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/{page?}/{botID}', Dashboard::class)->name('manage');

});