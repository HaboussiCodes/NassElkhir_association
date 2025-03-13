<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\MultiStepForm;
use App\Livewire\Citizens;

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
Route::view('/register','register')->name('register1');
Route::get('/dashboard', function () {
    return redirect()->route('home');
    //view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::view('/registerCitizen','registerCitizen')->name('register1')->middleware('auth');
Route::view('/registration-success','registerSuccess')->name('registration.success');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/home',Citizens::class)->middleware('auth')->name('home');

Auth::routes();
Route::get('/citizens/{id}/edit', [Citizens::class, 'show'])->name('citizens.show');
// Route::get('/edit-citizen/{$id}', [Citizens::class, 'show'])->name('edit')->middleware('auth');
// Route::put('/edit-citizen/{$id}', [Citizens::class, 'update'])->name('edit')->middleware('auth');
Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index']);
