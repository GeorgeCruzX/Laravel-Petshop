<?php

use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth', 'verified']);

Route::resource('/especie', EspecieController::class)->middleware(['auth', 'verified']);
Route::resource('/raca', RacaController::class)->middleware(['auth', 'verified']);
Route::resource('/cliente', ClienteController::class)->middleware(['auth', 'verified']);
Route::resource('/pet', PetController::class)->middleware(['auth', 'verified']);
Route::resource('/servico', ServicoController::class)->middleware(['auth', 'verified']);
Route::resource('/agendamento', AgendamentoController::class)->middleware(['auth', 'verified']);

Route::get('/audit/especie/{id}', [EspecieController::class, 'audit'])->name('especie.audit')->middleware(['auth', 'verified']);
Route::get('/audit/raca/{id}', [RacaController::class, 'audit'])->name('raca.audit')->middleware(['auth', 'verified']);
Route::get('/audit/cliente/{id}', [ClienteController::class, 'audit'])->name('cliente.audit')->middleware(['auth', 'verified']);
Route::get('/audit/pet/{id}', [PetController::class, 'audit'])->name('pet.audit')->middleware(['auth', 'verified']);
Route::get('/audit/servico/{id}', [ServicoController::class, 'audit'])->name('servico.audit')->middleware(['auth', 'verified']);
Route::get('/audit/agendamento/{id}', [AgendamentoController::class, 'audit'])->name('agendamento.audit')->middleware(['auth', 'verified']);
