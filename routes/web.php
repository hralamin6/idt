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

//Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
//});
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');
Route::middleware('auth')->group(function () {Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('/tasks', \App\Http\Livewire\Task\IndexComponent::class)->name('task.index');
    Route::get('/monthly-task', \App\Http\Livewire\Task\MonthlyTask::class)->name('task.monthly');
    Route::get('/task-manage', \App\Http\Livewire\Task\TaskManage::class)->name('task.manage');

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});
Route::prefix('practise')->name('practise.')->group(function () {
    Route::get('/', \App\Http\Livewire\Practise\IndexComponent::class)->name('index');
    Route::get('/symbol-to', \App\Http\Livewire\Practise\SymbolTo::class)->name('symbol.to');
    Route::get('/symbol-from', \App\Http\Livewire\Practise\SymbolFrom::class)->name('symbol.from');
});

    Route::get('/', \App\Http\Livewire\Admin\HomeComponent::class)->name('home');
    Route::get('/atoms', \App\Http\Livewire\Admin\AtomComponent::class)->name('atom');
    Route::get('/alpine', \App\Http\Livewire\Admin\AlpineComponent::class)->name('alpine');

Route::middleware('auth')->prefix('quiz')->name('admin.')->group(function () {
    Route::get('/', \App\Http\Livewire\Admin\QuizComponent::class)->name('quiz');
    Route::get('/{quiz}/create', \App\Http\Livewire\Admin\QuestionOption::class)->name('question.option.create');
    Route::get('/{quiz}/edit', \App\Http\Livewire\Admin\QuestionOptionEdit::class)->name('question.option.edit');
    Route::get('/{quiz}/exam', \App\Http\Livewire\Admin\ExamComponent::class)->name('question.option.exam');
    Route::get('/{quiz}/result', \App\Http\Livewire\Admin\ResultComponent::class)->name('question.option.result');
});

Route::middleware('auth')->prefix('admin/hadith')->name('admin.hadith.')->group(function () {
    Route::get('/books', \App\Http\Livewire\Admin\Hadith\HadithBook::class)->name('book');
    Route::get('/{book:book_key}/chapters', \App\Http\Livewire\Admin\Hadith\HadithChapter::class)->name('chapter');
    Route::get('/{book:book_key}/{chapter:id}', \App\Http\Livewire\Admin\Hadith\HadithHadith::class)->name('hadith');
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
