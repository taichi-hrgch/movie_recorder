<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

// 映画記録の一覧ページへのルート定義
Route::get('/records', [RecordController::class, 'index'])->name('records.index');

// 特定の映画記録の詳細ページへのルート定義
Route::get('/records/{record}', [RecordController::class, 'show'])->name('records.show');