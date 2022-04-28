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

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');
Route::middleware('auth')->group(function () {Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Task\IndexComponent::class)->name('home');
    Route::get('/users', \App\Http\Livewire\Task\UserComponent::class)->name('users');
    Route::get('/profile', \App\Http\Livewire\Task\DashboardComponent::class)->name('profile');
    Route::get('/taskwise/{id}', \App\Http\Livewire\Task\TaskwiseComponent::class)->name('taskwise');
    Route::get('/monthly-task', \App\Http\Livewire\Task\MonthlyTask::class)->name('task.monthly');
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/tasks', \App\Http\Livewire\Task\TaskManage::class)->name('task.index');
    Route::get('/setup', \App\Http\Livewire\Admin\SetupComponent::class)->name('setup');
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
