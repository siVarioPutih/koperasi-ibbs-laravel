<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\loginController;
use App\Http\Controllers\naraController;

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

Route::get('/', [loginController::class, 'index'])->middleware('guest')->name('loginIndex');
Route::post('/login', [loginController::class, 'login'])->middleware('guest')->name('login');

Route::middleware(['nara'])->group(function () {
    Route::prefix('nara')->group(function () {
        Route::get('/')->name('rootNaraRoute');
        Route::get('/daftar-santri', [naraController::class, 'daftarSantri'])->name('daftarSantri');
        Route::get('/topup/{kode}', [naraController::class, 'topup'])->name('topup');
        Route::post('/authTopup', [naraController::class, 'authTopup'])->name('authTopup');
        Route::get('/tarik/{kode}', [naraController::class, 'tarik'])->name('tarik');
        Route::post('/authTarik', [naraController::class, 'authTarik'])->name('authTarik');
        Route::get('/jajan/{kode}', [naraController::class, 'jajan'])->name('jajan');
        Route::post('/authJajan', [naraController::class, 'authJajan'])->name('authJajan');
        Route::get('/laporan/{kode}', [naraController::class, 'laporan'])->name('laporan');
        Route::get('/excel/', [naraController::class, 'excel'])->name('excel');
        Route::post('/unduh-excel/', [naraController::class, 'unduhExcel'])->name('unduhExcel');
//        Route::post('/unduh-excel/', [\App\Exports\exportExcel::class, 'view'])->name('unduhExcel');
    });
}
);
