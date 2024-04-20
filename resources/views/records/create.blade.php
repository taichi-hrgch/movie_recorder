{{-- create.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>映画記録作成</title>
    <!-- 省略 -->
</head>
<body>
    <h1>映画の記録を作成</h1>
    <form action="{{ route('records.store') }}" method="POST">
        @csrf
        <div>
            <label for="title-search">タイトル</label>
            <input type="text" id="title-search" name="title" placeholder="タイトルを検索">
        </div>
        <div id="poster-container"></div>
        <div>
            <label for="evaluation">評価 (1〜10)</label>
            <input type="number" id="evaluation" name="evaluation" required min="1" max="10">
        </div>
        <div>
            <label for="date-watched">視聴日</label>
            <input type="date" id="date-watched" name="date_watched">
        </div>
        <div>
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <input type="submit" value="記録">
    </form>
    <script>
        const searchInput = document.getElementById('title-search');
        const posterContainer = document.getElementById('poster-container');

        searchInput.addEventListener('change', function() {
            const title = this.value;
            fetch(`https:api.themoviedb.org/3/search/movie?api_key=b2303044ed7e9674b7ee57347a9f72c1&query=${title}`)
                .then(response => response.json())
                .then(data => {
                    const movie = data.results[0];
                    if (movie && movie.poster_path) {
                        const posterImage = document.createElement('img');
                        posterImage.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
                        posterContainer.innerHTML = ''; // Clear previous posters
                        posterContainer.appendChild(posterImage);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
