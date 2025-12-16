<?php

use App\Livewire\Administrators\AdministratorTable;
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Logout;
use App\Livewire\CashTransactions\CashTransactionCurrentWeekTable;
use App\Livewire\CashTransactions\FilterCashTransaction;
use App\Livewire\Dashboard;
use App\Livewire\SchoolClasses\SchoolClassTable;
use App\Livewire\SchoolMajors\SchoolMajorTable;
use App\Livewire\Students\StudentTable;
use App\Livewire\UpdateProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
// Perhatikan, saya menghapus use App\Livewire\PaymentCategories\PaymentCategoryIndex;
// Karena sudah diperbaiki di baris rute di bawah.


Route::view('/', 'welcome')->name('welcome');

// Halaman login (hanya untuk tamu)
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', Logout::class)->name('logout');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/kelas', SchoolClassTable::class)->name('school-classes.index');
    Route::get('/jurusan', SchoolMajorTable::class)->name('school-majors.index');
    
    // BARIS YANG DIPERBAIKI (Ganti full path dengan class yang sudah di 'use' atau gunakan full path yang benar)
    // Karena PaymentCategoryIndex tidak di-use, saya biarkan full path, tapi pastikan pathnya benar
    // Jika PaymentCategoryIndex ada di folder App/Livewire/PaymentCategories, gunakan:
    Route::get('/kategori-program', App\Livewire\PaymentCategories\PaymentCategoryIndex::class)->name('payment-categories.index');
    
    Route::get('/pengguna', AdministratorTable::class)->name('administrators.index');
    Route::get('/profil', UpdateProfile::class)->name('update-profiles.index');
    Route::get('/pelajar', StudentTable::class)->name('students.index');
    
    Route::get('/kas', CashTransactionCurrentWeekTable::class)->name('cash-transactions.index');
    Route::get('/kas/filter', FilterCashTransaction::class)->name('cash-transactions.filter');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice');
    
});