<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AssemblyController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    Route::get('/booths', [BoothController::class, 'index'])->name('booths');
    Route::get('/add-booth', [BoothController::class, 'create'])->name('booth.create');
    Route::post('/add-booth', [BoothController::class, 'store'])->name('booth.store');

    Route::post('translate-name', [BoothController::class, 'translateName'])->name('translate-name');
    Route::post('translate-center', [BoothController::class, 'translateCenter'])->name('translate-center');

    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/add-member/{id}', [MemberController::class, 'create'])->name('member.create');
    Route::post('/store-member/{id}', [MemberController::class, 'store'])->name('member.store');
    Route::get('/edit-member/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('/update-member/{id}', [MemberController::class, 'update'])->name('member.update');

    Route::get('/assembly', [AssemblyController::class, 'index'])->name('assembly');
    Route::post('/add-assembly', [AssemblyController::class, 'store'])->name('assembly.store');

    Route::get('/file-import',[ImportController::class, 'index'])->name('import-view');
    Route::post('/import',[ImportController::class, 'store'])->name('import');
    Route::get('/export-users',[ImportController::class, 'export'])->name('export-users');
});