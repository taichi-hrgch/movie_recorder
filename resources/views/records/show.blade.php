<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>映画詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            body { font-family: 'Nunito', sans-serif; }
            .header {
                top: 100px;
                font-size: 28px;
                font-weight: bold;
                text-align: center;
                /*background-color: white;  背景色 */
                color: black; /* テキストカラー */
                padding: 20px; /* 上下左右のパディング */
                /*margin-bottom: 10px;  下のマージン */
            }
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                height: auto; /* 高さを自動に設定 */
                margin-top: 20px; /* 上部に100pxのマージンを設定 */
                padding: 10px; /* 必要に応じて内側のパディングを設定 */
                box-sizing: border-box;
                font-size:18px;
            }
            .details-container {
                display: flex;
                align-items: center;
                padding: 20px;
            }
            .poster {
                width: 200px;
                height: auto;
                margin-right: 20px;
            }
            .info {
                flex-grow: 1;
            }
            .button-container {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }
            .button, .delete-button {
                display: inline-block;
                margin: 0 10px;
                padding: 8px 15px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                text-decoration: none;
                color: #fff;
                background-color: #555;
                border: none;
                border-radius: 5px;
                box-shadow: 0 9px #999;
            }
            .button:hover, .delete-button:hover {
                background-color:#a9a9a9;
            }
            .button:active, .delete-button:active {
                background-color: #696969;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .edit-button { background-color: #4CAF50; } /* Green */
            .back-button { background-color: #008CBA; } /* Blue */
            .delete-button { background-color: #f44336; } /* Red */
        </style>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        </head>
        <x-app-layout>
            <body>
                <div class="container">
                    <h1 class="header">
                        {{ $record->title }}
                    </h1>
                    <div class="details-container">
                        <img src="{{ $record->poster_path ? 'https://image.tmdb.org/t/p/w500' . $record->poster_path : 'default_poster.jpg' }}" alt="{{ $record->title }}" class="poster">
                        <div class="info">
                            <p>ジャンル： {{ $record->genre }}</p>
                            <p>キャスト： {{ $record->cast  }}</p>
                            <p>リリース日： {{ $record->release_date }}</p>
                            <p>あなたの評価： {{ $record->evaluation }}</p>
                            <p>視聴日： {{ date('Y-m-d' ,strtotime($record->date_watched)) }}</p>
                            @if($record->comment)
                              <p class="comment">コメント：{{ $record->comment }}</p>
                            @else
                              <p class="comment">コメント：コメントはありません．</p>
                            @endif
                        </div>
                    </div>
                    <div class="button-container">
                        <a href="{{ route('records.edit', $record) }}" class="button edit-button">編集</a>
                        <form action="{{ route('records.destroy', $record) }}" id="form_{{ $record->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-button" onclick="deletePost({{ $record->id }})">削除</button> 
                        </form>
                        <a href="{{ route('records.index') }}" class="button back-button">戻る</a>
                    </div>
                </div>
            </body>
        </x-app-layout>
</html>