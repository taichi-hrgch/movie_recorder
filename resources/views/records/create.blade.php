{{-- create.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <title>映画記録作成</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
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
        .button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
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
        .button:hover { background-color: #a9a9a9; }
        .button:active {
            background-color: #696969;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .search-button {writing-mode: horizontal-tb;
                        min-width : 100px;
        }
        .record-button{ background-color: #4CAF50; } 
        .back-button { background-color: #008CBA; } 
        .results-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 10px;
        }
        .result-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 5px;
            cursor: pointer;
            border: 1px solid #ccc;
            padding: 5px;
            flex: 0 0 200px; /* 各アイテムの幅を160pxに設定 */
            text-align: center; /* 中央寄せ */
        }
        .poster {
                width: 180px;
                height: auto;
                margin-bottom: 10px; /* タイトルとの間隔 */
        }
        .search-row {
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            width: 700px;
            max-width: 100%; /* 入力フィールドの最大幅と合わせる */
        }
        .title-container{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .evaluation{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .date_watched{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .comment{
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .input-field {
            width: 700px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            max-width: 100%;
            margin-right: 10px; /* ボタンとの間に隙間を設ける */
            writing-mode: horizontal-tb;
        }
        .form-label {
            flex-basis: 10px; /* ラベルの基本幅 */
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<x-app-layout>
    <body>
        <h1 class="header">映画の記録を作成</h1>
        <form action="{{ route('records.store') }}" method="POST">
            @csrf
            <div class="title-container">
                <label class="form-label" for="title-search">タイトル</label>
                <div class="search-row">
                    <input class="input-field" type="text" id="title-search" name="title" value="" placeholder="タイトルを検索">
                    <button type="button" id="search-button" class="button search-button">検索</button>
                </div>
            </div>
            <div id="results-container" class="results-container"></div>
            <div class="evaluation">
                <label class="form-label" for="evaluation">評価 (1〜10)</label>
                <input class="input-field" type="number" id="evaluation" name="evaluation" required min="1" max="10">
            </div>
            <div class="date_watched">
                <label class="form-label" for="date-watched">視聴日</label>
                <input class="input-field" type="date" id="date-watched" name="date_watched" required>
            </div>
            <div class="comment">
                <label class="form-label" for="comment">コメント</label>
                <textarea class="input-field" id="comment" name="comment"></textarea>
            </div>
            <div class="button-container">
                <input type="submit" value="記録" class="button record-button">
                <a href="{{ route('records.index') }}" class="button back-button" onclick="return confirm('まだ記録できていません．映画一覧に戻りますか？');">戻る</a>
            </div>
        </form>
        <script>
            const searchButton = document.getElementById('search-button');
            const searchInput = document.getElementById('title-search');
            const resultsContainer = document.getElementById('results-container');
            
            searchButton.addEventListener('click', function () {
                const title = searchInput.value;
                if (title) { // Ensure there is a title to search for
                    fetch(`https://api.themoviedb.org/3/search/movie?api_key=b2303044ed7e9674b7ee57347a9f72c1&language=ja-JP&query=${encodeURIComponent(title)}`)
                        .then(response => response.json())
                        .then(data => {
                            resultsContainer.innerHTML = ''; // Clear previous results
                            data.results.slice(0, 5).forEach(movie => {
                                const movieElem = document.createElement('div');
                                movieElem.classList.add('result-item');
                                movieElem.innerHTML = `
                                    <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}" class="poster">
                                    <p class="real-title">${movie.title}</p>
                                `;
                                movieElem.addEventListener('click', () => {
                                    searchInput.value = movie.title; // Update the search field with the selected movie title
                                    updateHiddenInputs(movie); // Update hidden inputs with selected movie data
                                });
                                resultsContainer.appendChild(movieElem);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
            
            function updateHiddenInputs(movie) {
                // APIから追加情報を取得
                fetch(`https://api.themoviedb.org/3/movie/${movie.id}?api_key=b2303044ed7e9674b7ee57347a9f72c1&language=ja-JP&append_to_response=credits`)
                .then(response => response.json())
                .then(data => {
                    // 必要なデータを取得
                    const genre = data.genres.map(genre => genre.name).join(', ');
                    const releaseDate = data.release_date;
                    const cast = data.credits.cast.slice(0, 5).map(actor => actor.name).join(', ');
            
                    // Hidden input でフォームに追加
                    createHiddenInput('genre', genre);
                    createHiddenInput('release_date', releaseDate);
                    createHiddenInput('cast', cast);
                    createHiddenInput('poster_path', `https://image.tmdb.org/t/p/w500${movie.poster_path}`);
                })
                .catch(error => console.error('Error fetching movie details:', error));
            
                // 既存のポスターパスの設定
                
            }
            
            function createHiddenInput(name, value) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = value;
                input.classList.add('hidden-input');
                document.querySelector('form').appendChild(input);
            }
        </script>
    </body>
</x-app-layout>
</html>