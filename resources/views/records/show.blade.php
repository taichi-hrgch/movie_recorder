<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>記録詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            body { font-family: 'Nunito', sans-serif; }
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
            .button:hover { background-color: #3e8e41 }
            .button:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .edit-button { background-color: #4CAF50; } /* Green */
            .back-button { background-color: #008CBA; } /* Blue */
        </style>
        </head>
    <body>
        <h1 class="title">
            {{ $record->title }}
        </h1>
        <div class="content">
            <div class="content_post">
                <p class="body">{{ $record->body }}</p>
                <p>評価: {{ $record->evaluation }}</p>
                <p>視聴日: {{ date('Y-m-d' ,strtotime($record->date_watched)) }}</p>
            </div>
        </div>
        <a href="{{ route('records.edit', $record) }}" class="button edit-button">編集</a>
        <a href="{{ route('records.index') }}" class="button back-button">戻る</a>
    </body>
</html>