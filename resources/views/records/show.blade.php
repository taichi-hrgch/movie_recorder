<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>映画詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            .container {
                display: flex;           /* Flexbox レイアウトを使用 */
                justify-content: center; /* 水平方向の中心に配置 */
                align-items: center;     /* 垂直方向の中心に配置 */
                height: 100vh;           /* ビューポートの高さを100%に設定 */
                flex-direction: column;  /* 要素を縦方向に並べる */
            }
            .details-container {
                display: flex; /* Flexbox layout to align items side by side */
                align-items: flex-start; /* Align items from the top */
                padding: 20px; /* Padding around the container */
            }
            .poster {
                width: 200px; /* Adjusted width */
                height: auto;
                margin-right: 20px; /* Space between poster and details */
            }
            .info {
                flex-grow: 1; /* Takes remaining space */
            }
            body { font-family: 'Nunito', sans-serif; }
            .button-container {
                display: flex; /* Flexboxを使用し、要素を水平に配置 */
                justify-content: flex-start; /* ボタンを左端から始める */
                margin-bottom: 20px; /* ボタンの下にマージンを設定 */
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
            .button:hover { background-color: #3e8e41; }
            .button:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .edit-button { background-color: #4CAF50; } /* Green */
            .back-button { background-color: #008CBA; } /* Blue */
            .delete-button { background-color: #f44336; } /* Red */
            img.poster {
                width: 200px;
                height: auto;
            }
        </style>
        </head>
    <body>
        <div class="container">
            <h1 class="title">
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
                <a href="{{ route('records.destroy', $record) }}" class="button delete-button" onclick="return confirm('この記録を削除してもよろしいですか？');">削除</a>
                <a href="{{ route('records.index') }}" class="button back-button">戻る</a>
            </div>
        </div>
    </body>
</html>