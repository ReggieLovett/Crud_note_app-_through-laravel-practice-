<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('notes.index');
});
Route::get('/login',             [AuthController::class, 'showLogin'])->name('login');
Route::get('/register',          [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',         [AuthController::class, 'register']);
Route::post('/logout',         [AuthController::class, 'logout'])->name('logout');

Route::get('/notes',             [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create',      [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes',            [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}',      [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}',   [NoteController::class, 'destroy'])->name('notes.destroy');