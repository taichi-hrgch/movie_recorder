<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Film;

class RecordController extends Controller
{
    /**
     * 映画記録の一覧を表示するメソッド
     */
    public function index()
    {
        $records = Record::all(); // 全ての映画記録を取得
        return view('records.index', compact('records')); // 一覧ビューにデータを渡す
    }
    
    public function show(Record $record)
    {
        // ルートモデルバインディングにより、Recordのインスタンスが自動的に注入される
        return view('records.show', compact('record'));
    }

}