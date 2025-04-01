<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('admin')->group(function () {
    Route::get('/questions/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/questions', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/questions', [AdminController::class, 'index'])->name('admin.questions.index');
    Route::get('/questions/{question}/edit', [AdminController::class, 'edit'])->name('admin.questions.edit');
    Route::put('/questions/{question}', [AdminController::class, 'update'])->name('admin.questions.update');
    Route::delete('/questions/{question}', [AdminController::class, 'destroy'])->name('admin.questions.destroy');
    Route::get('/subjects/create', [AdminController::class, 'createSubject'])->name('admin.subjects.create');
    Route::post('/subjects', [AdminController::class, 'storeSubject'])->name('admin.subjects.store');
});

Route::prefix('quiz')->group(function () {
    Route::get('/subjects', [QuizController::class, 'selectSubject'])->name('quiz.select-subject');
    Route::get('/subjects/{subject}', [QuizController::class, 'start'])->name('quiz.start');
    Route::get('/question', [QuizController::class, 'showQuestion'])->name('quiz.question');
    Route::post('/answer', [QuizController::class, 'answer'])->name('quiz.answer');
    Route::get('/results', [QuizController::class, 'results'])->name('quiz.results');
});
