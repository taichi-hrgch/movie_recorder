<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Genre Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif; /* Use a more readable font */
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
    .h2 {
      font-size:20px;
      font-weight: bold;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: stretch;
      gap: 50px; /* Add space between the elements */
      padding: 20px;
    }
    .chart-container, .stats-container {
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add a subtle shadow for depth */
    }
    .chart-container {
      width: 500px; /* Increase width for the pie chart container */
    }
    .stats-container {
      width: 400px; /* Adjust the width for stats container */
    }
    .stats-container h2, .chart-container h2 {
      text-align: center; /* Center heading */
      color: #333;
      margin-bottom: 15px;
    }
    .stats-container p {
      font-size: 20px; /* Increase the font size for readability */
      text-align: center; /* Center the text */
    }
    .fig-container {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      flex-direction: column;
    }
    .image {
      width: 300px;
      margin-top:50px;
    }
  </style>
</head>
<x-app-layout>
<body>
  <h1 class="header">映画ジャンルと視聴統計</h1>
  <div class="container">
    <div class="chart-container">
      <h2 class="h2">ジャンル別映画割合(%)</h2>
      <canvas id="genreChart"></canvas>
    </div>
    <div class="fig-container">
      <div class="stats-container">
        <h2 class="h2">映画視聴統計(本)</h2>
        <p>合計視聴数：{{ $totalMovies }}</p>
        <p>「今月」の視聴数：{{ $moviesThisMonth }}</p>
        <p>「今年」の視聴数：{{ $moviesThisYear }}</p>
      </div>
      <img src="fig/home-theater.svg" alt="home-theater" class="image">
    </div>
  </div>
    <script>
      const ctx = document.getElementById('genreChart').getContext('2d');
      const genreChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: {!! json_encode(array_keys($genrePercentages)) !!},
          datasets: [{
            data: {!! json_encode(array_values($genrePercentages)) !!},
            backgroundColor: {!! json_encode($genreColors) !!},
          }]
        }
      });
    </script>
  </body>
</x-app-layout>
</html>
