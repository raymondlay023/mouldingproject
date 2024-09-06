<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\FormBahanBakuLangsungController;
use App\Http\Controllers\FormBahanBakuLainnyaController;
use App\Http\Controllers\FormTenagaKerjaLangsungController;
use App\Http\Controllers\FormTenagaKerjaLangsungLainnyaController;
use App\Http\Controllers\FormTenagaKerjaTidakLangsungController;
use App\Http\Controllers\FormMesinDimilikiController;
use App\Http\Controllers\FormMesinSewaController;
use App\Http\Controllers\FormBiayaTidakLangsungController;



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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('index', [HeaderController::class, 'index'])->name('header.index');

Route::post('/header/store', [HeaderController::class, 'store'])->name('header.store');

Route::get('/headers/{id}', [HeaderController::class, 'show'])->name('header.show');

Route::get('/formBahanBakuLangsung/{id}', [FormBahanBakuLangsungController::class, 'index'])->name('form.bahanbakulangsung');
Route::post('/formBahanBakuLangsung/store/{id}', [FormBahanBakuLangsungController::class, 'store'])->name('form.1.store');


Route::get('/formBahanBakuLainnya/{id}', [FormBahanBakuLainnyaController::class, 'index'])->name('form.bahanbakulainnya');
Route::post('/formBahanBakuLainnya/store/{id}', [FormBahanBakuLainnyaController::class, 'store'])->name('form.2.store');

Route::get('/formTenagaKerjaLangsung/{id}', [FormTenagaKerjaLangsungController::class, 'index'])->name('form.tenagakerjalangsung');
Route::post('/formTenagaKerjaLansgung/store/{id}', [FormTenagaKerjaLangsungController::class, 'store'])->name('form.3.store');

Route::get('/formTenagaKerjaLangsunglainnya/{id}', [FormTenagaKerjaLangsungLainnyaController::class, 'index'])->name('form.tenagakerjalangsunglainnya');
Route::post('/formTenagaKerjaLansgunglainnya/store/{id}', [FormTenagaKerjaLangsungLainnyaController::class, 'store'])->name('form.4.store');


Route::get('/formTenagaKerjaTidakLangsung/{id}', [FormTenagaKerjaTidakLangsungController::class, 'index'])->name('form.tenagakerjatidaklangsung');
Route::post('/formTenagaKerjaTidakLansgung/store/{id}', [FormTenagaKerjaTidakLangsungController::class, 'store'])->name('form.5.store');


Route::get('/formMesinDimiliki/{id}', [FormMesinDimilikiController::class, 'index'])->name('form.mesindimiliki');
Route::post('/formMesinDimiliki/store/{id}', [FormMesinDimilikiController::class, 'store'])->name('form.6.store');


Route::get('/formMesinSewa/{id}', [FormMesinSewaController::class, 'index'])->name('form.mesinsewa');
Route::post('/formMesinSewa/store/{id}', [FormMesinSewaController::class, 'store'])->name('form.7.store');

Route::get('/formBiayaTidakLangsung/{id}', [FormBiayaTidakLangsungController::class, 'index'])->name('form.biayatidaklangsung');
Route::post('/formBiayaTidakLangsung/store/{id}', [FormBiayaTidakLangsungController::class, 'store'])->name('form.8.store');

Route::get('/summary/{id}', [HeaderController::class, 'summary'])->name('tkdn.summary');


Route::get('/form2/{id}', function ($id) {
    return view('forms.form2', ['id' => $id]);
})->name('form.2');

Route::get('/form3/{id}', function ($id) {
    return view('forms.form3', ['id' => $id]);
})->name('form.3');

Route::get('/form4/{id}', function ($id) {
    return view('forms.form4', ['id' => $id]);
})->name('form.4');

Route::get('/form5/{id}', function ($id) {
    return view('forms.form5', ['id' => $id]);
})->name('form.5');

Route::get('/form6/{id}', function ($id) {
    return view('forms.form6', ['id' => $id]);
})->name('form.6');

Route::get('/form7/{id}', function ($id) {
    return view('forms.form7', ['id' => $id]);
})->name('form.7');

Route::get('/form8/{id}', function ($id) {
    return view('forms.form8', ['id' => $id]);
})->name('form.8');

Route::get('/form9/{id}', function ($id) {
    return view('forms.form9', ['id' => $id]);
})->name('form.9');

require __DIR__.'/auth.php';
