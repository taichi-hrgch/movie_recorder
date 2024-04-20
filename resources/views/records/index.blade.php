<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            body { font-family: 'Nunito', sans-serif; }
            .movie { margin-bottom: 20px; }
            .poster { width: 100px; }
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
        </style>
    </head>
    <body>
        <header>
            <h1 class="header-title">映画の本棚</h1>
            <a href="{{ route('records.create') }}" class="create-record-button">記録を追加</a>
        </header>
        @forelse ($records as $record)
            <div class="record">
                <a href="{{ route('records.show', $record) }}">
                    <h2 class="title">
                        {{ $record->title }}
                    </h2>
                    <img src="{{ $record->poster }}" alt="{{ $record->title }}" class="poster"/>
                </a>
            </div>
        @empty
            <p>記録はありません。</p>
        @endforelse
    </body>
</html>