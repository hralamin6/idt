<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome')->name('home');
Route::middleware('guest')->group(function () {Route::get('login', Login::class)->name('login');Route::get('register', Register::class)->name('register');
});
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');
Route::middleware('auth')->group(function () {Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});
Route::middleware('auth')->prefix('practise')->name('practise.')->group(function () {
    Route::get('/', \App\Http\Livewire\Practise\IndexComponent::class)->name('index');
    Route::get('/symbol-name', \App\Http\Livewire\Practise\SymbolName::class)->name('symbol.name');
    Route::get('/symbol-number', \App\Http\Livewire\Practise\SymbolNumber::class)->name('symbol.number');
    Route::get('/symbol-mass', \App\Http\Livewire\Practise\SymbolMass::class)->name('symbol.mass');
    Route::get('/symbol-group', \App\Http\Livewire\Practise\SymbolGroup::class)->name('symbol.group');
    Route::get('/symbol-period', \App\Http\Livewire\Practise\SymbolPeriod::class)->name('symbol.period');
    Route::get('/symbol-phase', \App\Http\Livewire\Practise\SymbolPhase::class)->name('symbol.phase');
    Route::get('/symbol-category', \App\Http\Livewire\Practise\SymbolCategory::class)->name('symbol.category');

    Route::get('/name-symbol', \App\Http\Livewire\Practise\NameSymbol::class)->name('name.symbol');
    Route::get('/number-symbol', \App\Http\Livewire\Practise\NumberSymbol::class)->name('number.symbol');
    Route::get('/mass-symbol', \App\Http\Livewire\Practise\MassSymbol::class)->name('mass.symbol');
    Route::get('/group-symbol', \App\Http\Livewire\Practise\GroupSymbol::class)->name('group.symbol');
    Route::get('/period-symbol', \App\Http\Livewire\Practise\PeriodSymbol::class)->name('period.symbol');
    Route::get('/phase-symbol', \App\Http\Livewire\Practise\PhaseSymbol::class)->name('phase.symbol');
    Route::get('/category-symbol', \App\Http\Livewire\Practise\CategorySymbol::class)->name('category.symbol');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Http\Livewire\Admin\HomeComponent::class)->name('home');
    Route::get('/atoms', \App\Http\Livewire\Admin\AtomComponent::class)->name('atom');
    Route::get('/alpine', \App\Http\Livewire\Admin\AlpineComponent::class)->name('alpine');
});





Route::get('optimize', function () {Artisan::call('optimize');
    return "php artisan optimized successfully";
})->name('optimize');
Route::get('migrate', function () {Artisan::call('migrate');
    return "php artisan migrate successfully";
})->name('migrate');
Route::get('migrate-fresh', function () {Artisan::call('migrate:fresh --seed');
    return "php artisan migrate-fresh successfully";
})->name('migrate.fresh');
Route::get('migrate-rollback', function () {Artisan::call('migrate:rollback');
    return "php artisan migrate-rollback successfully";
})->name('migrate.rollback');
Route::get('db-seed', function () {Artisan::call('db:seed');
    return "php artisan db:seed successfully";
})->name('db.seed');
