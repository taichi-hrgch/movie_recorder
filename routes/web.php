<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecordController::class, 'index'])->name('index');

// ダッシュボードページ（認証とEメール検証が必要）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// プロファイル関連のルーティング（認証が必要）
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 映画記録管理のルーティング
Route::middleware('auth')->group(function () {
    Route::get('/records', [RecordController::class, 'index'])->name('records.index');
    Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
    Route::post('/records', [RecordController::class, 'store'])->name('records.store');
    Route::get('/records/{record}/edit', [RecordController::class, 'edit'])->name('records.edit');
    Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');
    Route::get('/records/{record}', [RecordController::class, 'show'])->name('records.show');
    Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');
});

// 認証ルート
require __DIR__.'/auth.php';

// // ソート機能
//  Route::get('/records', [RecordController::class, 'sort'])->name('records.sort');

