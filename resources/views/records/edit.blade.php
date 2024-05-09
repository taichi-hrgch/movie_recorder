{{-- resources/views/records/edit.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>映画記録編集</title>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .header {
            font-size: 30px;
            text-align: center;
        }
        .poster {
                width: 200px;
                height: auto;
                margin: 0 auto; /* 中央揃えに */
            }
        .button {
                display: inline-block;
                margin-right: 10px;
                padding: 8px 15px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                text-decoration: none;
                outline: none;
                color: #fff;
                background-color: #555;
                border: none;
                border-radius: 5px;
                box-shadow: 0 9px #999;
        }
        .button:hover { background-color: #a9a9a9; }
        .button:active {
            background-color: #696969;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .update-button{ background-color: #4CAF50; } 
        .back-button { background-color: #008CBA; } 
        .button-container {
            display: flex; /* Flexboxを使用し、要素を水平に配置 */
            justify-content: center; /* ボタンを左端から始める */
            margin-bottom: 20px; /* ボタンの下にマージンを設定 */
        }
        .title{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .evaluation{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
         .date_watched{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .comment{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .form-label {
            flex-basis: 10px; /* ラベルの基本幅 */
            font-size: 18px;
            font-weight: bold;
        }
        .input-field {
            width: 700px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            max-width: 100%;
            margin-right: 10px; /* ボタンとの間に隙間を設ける */
            writing-mode: horizontal-tb;
        }
        .form-label {
    </style>
</head>
<x-app-layout>
    <body>
        <h1 class="header">映画の記録を編集</h1>
        <form action="{{ route('records.update', $record) }}" method="POST">
            @csrf
            @method('PUT') <!-- HTMLフォームがPUTメソッドを直接サポートしていないために必要 -->
            <img src="{{ $record->poster_path ? 'https://image.tmdb.org/t/p/w500' . $record->poster_path : 'default_poster.jpg' }}" alt="{{ $record->title }}" class="poster">
            <div class="title">
                <label class="form-label" for="title">タイトル</label>
                <input class="input-field" type="text" id="title" name="title" value="{{ $record->title }}" required readonly>
            </div>
            <!-- 他のフィールドも同様に、現在の値をvalue属性に設定 -->
            <div class="evaluation">
                <label class="form-label" for="evaluation">評価 (1〜10)</label>
                <input class="input-field" type="number" id="evaluation" name="evaluation" value="{{ $record->evaluation }}" required>
            </div>
            <div class="date_watched">
                <label class="form-label" for="date-watched">視聴日</label>
                <input class="input-field" type="date" id="date-watched" name="date_watched" value="{{ $record->date_watched }}" required>
            </div>
            <div class="comment">
                <label class="form-label" for="comment">コメント</label>
                <textarea class="input-field" id="comment" name="comment">{{ $record->comment }}</textarea>
            </div>
            <div class="button-container">
                <input type="submit" value="更新" class="button update-button">
                <a href="{{ route('records.index') }}" class="button back-button" onclick="return confirm('まだ更新できていません．映画一覧に戻りますか？');">戻る</a>
            </div>
        </form>
    </body>
</x-app-layout>
</html>