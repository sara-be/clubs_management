<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResponsableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [ClubController::class, 'index2'])->name('userFront.index');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard'); 


#the routes everyone can acces to it 

Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/responsables', [ResponsableController::class, 'index'])->name('responsables.index');
Route::get('/clubs/show/{id}', [ClubController::class, 'show'])->name('userFront.show');
Route::get('/events/show/{id}', [EventController::class, 'show'])->name('userFront.showEvent');

#thi route  can acces to it onlythe admin and the responsable 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'admin']);

#the routes only the admin can acces to it  
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/clubs/{club}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');
    Route::get('/responsables/create', [ResponsableController::class, 'create'])->name('responsables.create');
    Route::post('/responsables', [ResponsableController::class, 'store'])->name('responsables.store');
    Route::get('/responsables/{responsable}/edit', [ResponsableController::class, 'edit'])->name('responsables.edit');
    Route::patch('/responsables/{responsable}', [ResponsableController::class, 'update'])->name('responsables.update');
    Route::delete('/responsables/{responsable}', [ResponsableController::class, 'destroy'])->name('responsables.destroy');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::put('/messages/{id}', [MessageController::class, 'seen'])->name('messages.seen');
Route::put('/messages/{id}/hidden', [MessageController::class, 'hidden'])->name('messages.hidden');


// Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');
// Route::get('/messages', function(){
//     return view('messages.index');
// });



Route::resource('members',MemberController::class);
require __DIR__ . '/auth.php';
