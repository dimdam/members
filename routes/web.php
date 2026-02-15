<?php

use App\Http\Livewire\Candidatepick;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Elections;
use App\Http\Livewire\Scrutineerpick;
use App\Http\Controllers\MemberController;
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
    Route::get('/members/create', [MemberController::class, 'create']);
    Route::get('/elections-first-step', Scrutineerpick::class);
    Route::get('/elections-second-step', Candidatepick::class);
    Route::get('/print', [MemberController::class, 'print']);
    Route::post('/elections/reset', [MemberController::class, 'resetElections'])->name('elections.reset');
    Route::get('/members', [MemberController::class, 'index']);
    Route::redirect('/sms', '/');
    Route::post('/sendsms', [MemberController::class, 'sendSMS']);
});

require __DIR__ . '/auth.php';
