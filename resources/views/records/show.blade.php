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
    </body>
</html>