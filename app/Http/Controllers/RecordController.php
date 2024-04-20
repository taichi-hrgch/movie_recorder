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
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'evaluation' => 'required|integer|min:1|max:10',
            'date_watched' => 'nullable|date',
            'comment' => 'nullable|string'
        ]);
    
        // Recordモデルを使用してデータを保存
        $record = new Record();
        $record->title = $validatedData['title'];
        $record->evaluation = $validatedData['evaluation'];
        $record->date_watched = $validatedData['date_watched'];
        $record->comment = $validatedData['comment'];
        $record->save();
    
        return redirect()->route('records.index')->with('success', '記録されました。');
    }
    
    private function fetchMovieData($title)
    {
        $apiKey = env('TMDB_API_KEY');
        $searchResponse = Http::get("https://api.themoviedb.org/3/search/movie", [
            'api_key' => $apiKey,
            'query' => $title,
        ]);

        $movieId = $searchResponse->json()['results'][0]['id'];
        
        // 映画の詳細情報を取得
        $movieResponse = Http::get("https://api.themoviedb.org/3/movie/{$movieId}", [
            'api_key' => $apiKey,
            'append_to_response' => 'credits,recommendations'
        ])->json();

        return [
            'title' => $movieResponse['title'],
            'release_date' => $movieResponse['release_date'],
            'genre' => collect($movieResponse['genres'])->pluck('name'),
            'poster_path' => "https://image.tmdb.org/t/p/w500{$movieResponse['poster_path']}",
            'recommendations' => collect($movieResponse['recommendations']['results'])->pluck('title'),
            'cast' => collect($movieResponse['credits']['cast'])->take(5)->pluck('name')->toArray(),
        ];
    }
    
    public function create()
    {
        return view('records.create', compact('record')); // 映画記録作成フォームのビューを表示
    }
    
    public function edit(Record $record)
    {
        // ルートモデルバインディングを使用して、編集するレコードを取得
        return view('records.edit', compact('record'));
    }
    
    public function update(Request $request, Record $record)
    {
        $validatedData = $request->validate([
            // バリデーションルール
        ]);
    
        $record->update($validatedData);
    
        return redirect()->route('records.index')->with('success', '記録が更新されました。');
    }
}