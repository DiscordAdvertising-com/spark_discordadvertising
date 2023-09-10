<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\Pages\Public\Home;
use App\Http\Livewire\Pages\Public\BotSearch;
use App\Http\Livewire\Pages\Public\ServerSearch;
use App\Http\Livewire\Pages\AdminDashboard;
use App\Http\Livewire\Pages\Public\BotInfo;
use App\Http\Livewire\Pages\Public\ServerInfo;
use App\Http\Controllers\DiscordLoginContoller;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Livewire\Pages\Public\privacy;
use App\Http\Livewire\Pages\Public\tos;
use App\Http\Livewire\Pages\Public\contact;

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
Route::get('/bot-search', BotSearch::class)->name('botSearch');
Route::get('/server-search', ServerSearch::class)->name('serverSearch');
Route::get('/bot/{botID}', BotInfo::class)->name('botInfo');
Route::get('/server/{serverID}', ServerInfo::class)->name('serverInfo');
Route::get('/logout',  [DiscordLoginContoller::class, 'logout'])->name('logout');
Route::get('/login',  [DiscordLoginContoller::class, 'redirectToProvider'])->name('login');
Route::get('/discordinfo', [DiscordLoginContoller::class, 'handleProviderCallback']);
Route::get('/tos', tos::class)->name('tos');
Route::get('/privacy', privacy::class)->name('privacy');
Route::get('/contact', contact::class)->name('contact');
Route::post('/webhooks/stripe', [StripeWebhookController::class, 'handleWebhook']);

Route::get('/email', function() {
    return view('emails.status');
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard/{page?}', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/serverList', Dashboard::class)->name('serverList');
    Route::get('/dashboard/serverUpload', Dashboard::class)->name('serverUpload');
    Route::get('/dashboard/botList', Dashboard::class)->name('botList');
    Route::get('/dashboard/botUpload', Dashboard::class)->name('botUpload');
    Route::get('/dashboard/{page?}/{botID}', Dashboard::class)->name('manage');

    Route::get('/admin-dashboard/{page?}', AdminDashboard::class)->name('admin-dashboard');
});

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache has been cleared';
});
