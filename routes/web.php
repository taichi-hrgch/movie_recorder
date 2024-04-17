<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\FilmController;

// 映画記録の一覧ページへのルート定義
Route::get('/records', [RecordController::class, 'index'])->name('records.index');