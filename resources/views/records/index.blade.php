<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>映画一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            body { font-family: 'Nunito', sans-serif; }
            .movie { margin-bottom: 20px; }
            .title { font-size: 20px; }
            .create-record-button {
                position: absolute;
                top: 20px;
                right: 20px;
                padding: 10px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 20px;
            }
            .header-title {
                margin: 0;
            }
            .records-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start; /* アイテム間のスペースを均等に分散させる */
                padding: 20px; /* コンテナのパディング */
            }
            .record {
                flex: 0 0 250px; /* 5つずつ一行に並べる計算。10pxはアイテム間のマージン */
                margin-bottom: 20px; /* アイテム間の縦のマージン */
                text-align: center; /* テキストを中央揃え */
                border: 1px solid #ccc; /* 枠線の追加 */
                padding: 10px; /* コンテンツのパディング */
            }
            .poster {
                width: 200px;
                height: auto;
                margin-bottom: 10px; /* タイトルとの間隔 */
            }
        </style>
    </head>
    <body>
        <header>
            <h1 class="header-title">映画一覧</h1>
            <a href="{{ route('records.create') }}" class="create-record-button">記録を追加</a>
        </header>
        <div class="records-container">
            @forelse ($records as $record)
                <div class="record">
                    <a href="{{ route('records.show', $record) }}">
                        <h2 class="title">
                            {{ $record->title }}
                        </h2>
                    </a>
                    <img src="{{ $record->poster_path }}" alt="{{ $record->title }}" class="poster"/>
                </div>
            @empty
                <p>記録はありません。</p>
            @endforelse
        </div>
    </body>
</html>