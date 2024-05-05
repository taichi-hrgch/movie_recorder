<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>映画一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
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
            .header {
                font-size: 28px;
                font-weight: bold;
                text-align: center;
                /*background-color: white;  背景色 */
                color: black; /* テキストカラー */
                padding: 20px; /* 上下左右のパディング */
                /*margin-bottom: 10px;  下のマージン */
            }
            .movie { margin-bottom: 20px; }
            .title { font-size: 20px; }
            .create-record-button {
                position: absolute;
                top: 90px;
                right: 20px;
                padding: 10px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .records-container {
                display: flex;
                flex-wrap: wrap;
                justify-content:center;
                padding: 20px;
            }
            .record {
                flex: 0 0 250px;
                margin-bottom: 20px;
                text-align: center;
                border: 1px solid #ccc;
                padding: 10px;
                display: flex;
                flex-direction: column;
                align-items: center; /* 横方向の中央揃え */
            }
            .poster {
                width: 200px;
                height: auto;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <x-app-layout>
        <body>
            <h1 class="header">映画一覧</h1>
            <div>
                <a href="{{ route('records.create') }}" class="create-record-button">記録を追加</a>
            </div>
            <div class="records-container">
                @forelse ($records as $record)
                    <div class="record">
                        <a href="{{ route('records.show', $record) }}">
                            <img src="{{ $record->poster_path }}" alt="{{ $record->title }}" class="poster"/>
                        </a>
                        <a href="{{ route('records.show', $record) }}">
                            <h2 class="title">
                                {{ $record->title }}
                            </h2>
                        </a>
                    </div>
                @empty
                    <p>記録はありません。</p>
                @endforelse
            </div>
        </body>
    </x-app-layout>
</html>