{{-- resources/views/records/edit.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>映画記録編集</title>
    <style>
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
            .button:hover { background-color: #3e8e41; }
            .button:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .update-button{ background-color: #4CAF50; } 
            .back-button { background-color: #008CBA; } 
            .button-container {
                display: flex; /* Flexboxを使用し、要素を水平に配置 */
                justify-content: flex-start; /* ボタンを左端から始める */
                margin-bottom: 20px; /* ボタンの下にマージンを設定 */
            }
            .title{
                font-size: 20px;
            }
            .evaluation{
                font-size: 20px;
            }
            .comment{
                font-size: 20px;
            }
    </style>
</head>
<body>
    <h1>映画の記録を編集</h1>
    <form action="{{ route('records.update', $record) }}" method="POST">
        @csrf
        @method('PUT') <!-- HTMLフォームがPUTメソッドを直接サポートしていないために必要 -->
        <div class="title">
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ $record->title }}" required>
        </div>
        <!-- 他のフィールドも同様に、現在の値をvalue属性に設定 -->
        <div class="evaluation">
            <label for="evaluation">評価 (1〜10)</label>
            <input type="number" id="evaluation" name="evaluation" value="{{ $record->evaluation }}" required>
        </div>
        <div class="comment">
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment">{{ $record->comment }}</textarea>
        </div>
        <div class="button-container">
            <input type="submit" value="更新" class="button update-button">
            <a href="{{ route('records.index') }}" class="button back-button" onclick="return confirm('まだ更新できていません．映画一覧に戻りますか？');">戻る</a>
        </div>
    </form>
</body>
</html>