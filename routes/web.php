<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

// 映画記録の一覧ページへのルート定義
Route::get('/records', [RecordController::class, 'index'])->name('records.index');

// 記録するページへのルート定義
Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');

// 新しい記録を保存するためのルート定義
Route::post('/records', [RecordController::class, 'store'])->name('records.store');

// 映画記録の編集フォームへのルート
Route::get('/records/{record}/edit', [RecordController::class, 'edit'])->name('records.edit');

// 編集した記録を更新
Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');

// 特定の映画記録の詳細ページへのルート定義
Route::get('/records/{record}', [RecordController::class, 'show'])->name('records.show');

// 投稿を削除する
Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');
