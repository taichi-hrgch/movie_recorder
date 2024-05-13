<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
<body>
    <h1>映画の本棚</h1>
    <p>【テストアカウント】<br>Mail: guestuser@mail.com<br>Password: guestuser2024</p>
    <a href="https://movierecorder-b29889e3d233.herokuapp.com/login" target="_blank" rel="noopener noreferrer" class="button-link">アプリはこちらから</a>
    <div class="section">
        <h2>アプリ概要</h2>
        <p>このアプリはあなたが視聴した映画を記録するためのものです。記録を追加するには「記録を追加」ボタンから操作します。タイトルを検索すると、関連する候補が表示されます。その中から、探していた映画を選んでください。</p>
        <p>記録された映画は「映画一覧」に表示され、クリックすると詳細情報が閲覧できます。また、「統計」セクションでは、記録した映画に基づいた統計情報を参照できます。</p>
        <img src="fig/view.png">
        <img src="fig/static.png">
        <img src="fig/home-theater.svg" alt="home-theater" class="image">
   </div>
    <div class="section">
        <h2>制作背景</h2>
        <p>以下の理由からこのアプリケーションを制作しました。</p>
        <ul>
            <li>開発者自身が映画好きで、視聴した映画を記録したいと考えたから。</li>
            <li>映画を評価しコメントを残す既存のアプリケーションに加え、統計情報を提供する機能を加えたかった。</li>
        </ul>
        <p>このアプリケーションは、過去に視聴した映画を振り返ることで当時を思い出したり、自分の映画の嗜好を把握し新たなジャンルを探求する手助けをすることを目的としています。</p>
    </div>
    <div class="section">
        <h2>機能一覧</h2>
        <ul>
            <li>ユーザー認証：ログイン、新規登録。</li>
            <li>映画一覧：記録した映画をすべて表示します。</li>
            <li>並び替え：記録を並び替えます。</li>
            <li>記録：映画を記録します。</li>
            <li>検索：タイトルの一部を検索にかけることで、正しい映画のタイトルを出力します。</li>
            <li>詳細表示：記録した映画をクリックすると、映画の詳細を表示できます。</li>
            <li>編集：記録の編集をします。</li>
            <li>削除：記録を削除します。</li>
            <li>統計：ジャンル別割合、視聴本数を表示します。</li>
        </ul>
    </div>
    <div class="section">
        <h2>開発環境</h2>
        <ul>
            <li>言語：PHP, HTML, CSS, JavaScript</li>
            <li>環境：Laravel(ver.8), AWS(EC2, Cloud9), MySQL(MariaDB), Github</li>
            <li>デプロイ：Heroku</li>
            <li>その他ツール：TMDB API</li>
        </ul>
    </div>
    <div class="section">
        <h2>工夫点</h2>
        <ul>
            <li>外部APIを用いることで、ユーザーの入力を最小限にしました。以下のようなメリットがあります：
                <ul>
                    <li>ユーザーが入力したタイトルから外部API上の映画を検索し、適切な映画についてジャンル、キャスト、リリース日を取得できるようにしました。</li>
                    <li>これにより、ユーザーはジャンル、キャスト、リリース日について記入する必要がなく、詳細表示においてこれらの情報を参照することができます。</li>
                    <li>外部APIを利用し各映画のポスターを表示できるようにしました。これにより、視覚的に映画を識別できるようにしました。</li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>
