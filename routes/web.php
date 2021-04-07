<?php

use App\Http\Livewire\Candidatepick;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Elections;
use App\Http\Livewire\Scrutineerpick;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware('auth');

// Route::get('/dashboard', function () {
//     $date = Carbon::now()->format('Y');
//     return view('dashboard', compact('date'));
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', Dashboard::class)->name('dashboard');


    Route::patch('/members/{id}', 'App\Http\Controllers\MemberController@renew');
    Route::get('/members/create', 'App\Http\Controllers\MemberController@create');
    Route::get('/elections-first-step', Scrutineerpick::class);
    Route::get('/elections-second-step', Candidatepick::class);
    Route::get('/print', 'App\Http\Controllers\MemberController@print');
    Route::get('/members', 'App\Http\Controllers\MemberController@index');
    Route::get('/sms', 'App\Http\Controllers\MemberController@sms');
    Route::post('/sendsms', 'App\Http\Controllers\MemberController@sendSMS');
});

require __DIR__ . '/auth.php';
