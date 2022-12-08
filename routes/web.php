<?php

use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
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
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php'; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/playground', function () {
    event(new App\Events\PlayGroundEvent());
});

Route::get('/friends', [App\Http\Controllers\ChatController::class, 'getFriends'])->middleware('auth');

Route::get('/chat/{user}', [App\Http\Controllers\ChatController::class, 'chatFriend'])->name('chat.friend')->middleware('auth');

Route::post('/chat-message', function (Request $request) {
    
    // event(new App\Events\ChatMessageEvent($request->message, auth()->user()->name, Carbon::now()));
    ChatMessageEvent::dispatch($request->message, auth()->user()->name, Carbon::now(), $request->receiver_id);
});
