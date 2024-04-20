{{-- resources/views/records/edit.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>映画記録編集</title>
    <!-- 省略 -->
</head>
<body>
    <h1>映画の記録を編集</h1>
    <form action="{{ route('records.update', $record) }}" method="POST">
        @csrf
        @method('PUT') <!-- HTMLフォームがPUTメソッドを直接サポートしていないために必要 -->
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ $record->title }}" required>
        </div>
        <!-- 他のフィールドも同様に、現在の値をvalue属性に設定 -->
        <div>
            <label for="evaluation">評価 (1〜10)</label>
            <input type="number" id="evaluation" name="evaluation" value="{{ $record->evaluation }}" required>
        </div>
        <div>
            <label for="comment">コメント</label>
            <input type="text" id="comment" name="comment" value="{{ $record->comment }}" required>
        </div>
        <input type="submit" value="更新">
    </form>
</body>
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
</html>
