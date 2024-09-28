<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\WorkingDayController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('attendances', AttendanceController::class);
Route::get('/advances/create', [AdvanceController::class, 'create'])->name('advances.create');
Route::post('/advances', [AdvanceController::class, 'store'])->name('advances.store');
Route::get('/advances/{advance}/edit', [AdvanceController::class, 'edit'])->name('advances.edit');
Route::put('/advances/{advance}', [AdvanceController::class, 'update'])->name('advances.update');
Route::delete('/advances/{advance}', [AdvanceController::class, 'destroy'])->name('advances.destroy');
Route::post('working_days', [WorkingDayController::class, 'store'])->name('working_days.store');
Route::get('/monthly-expenses', [FinanceController::class, 'monthlyExpenses'])->name('monthly.expenses');

Route::resource('expenses', ExpenseController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
