<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Exports\EvaluacionExport;
use Maatwebsite\Excel\Facades\Excel;
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

/* Route::get('/', function () {
    return view('welcome');
}); */
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/store', [App\Http\Controllers\EvaluacionController::class, 'store'])->name('home.store');
Route::get('/reportes', [App\Http\Controllers\EvaluacionController::class, 'index'])->name('reportes');
Route::get('/excel', function () {return Excel::download(new EvaluacionExport, 'evaluaciones.xlsx');});
