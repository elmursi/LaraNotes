<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedNoteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//notes routes make it available to the user only if they are logged in
Route::resource('/notes', NoteController::class)->middleware(['auth']);


Route::get('/trashed', [TrashedNoteController::class, 'index'])->name('trashed.index')->middleware(['auth']);

require __DIR__.'/auth.php';
