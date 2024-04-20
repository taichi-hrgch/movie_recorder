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
        </style>
        </head>
    <body>
    <h1>映画の本棚</h1>
        @forelse ($records as $record)
            <div class="record">
                <h2 class="title">
                    <a href="/records/{{ $record->id }}">{{ $record->title }}</a>
                </h2>
                <p class="body">{{ $record->body }}</p>
                <p>評価: {{ $record->evaluation }}</p>
                <p>視聴日: {{ date('Y-m-d' ,strtotime($record->date_watched)) }}</p>
            </div>
            @empty
        @endforelse
        <div id="app"></div>
        <script></script>
    </body>
</html>