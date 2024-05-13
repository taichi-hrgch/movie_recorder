<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GenreChartController extends Controller
{
    public function getGenreData()
    {
        $userId = Auth::id();

        $genres = Record::where('user_id', $userId)->pluck('genre')->toArray();
        $genreList = array_map(function($item) {
            return array_map('trim', explode(',', strtolower($item))); // 小文字化とトリムを実行
        }, $genres);
        $genreList = array_merge(...$genreList);
    
        $genreCounts = array_count_values($genreList);
        $total = array_sum($genreCounts);
    
        $genrePercentages = array_map(function($count) use ($total) {
            return ($count / $total) * 100;
        }, $genreCounts);
    
        arsort($genrePercentages);
    
        $colors =['#1E3E89', '#2FACAA', '#F7D20E', '#BE1CA3', '#6A22A4', '#DD296E', '#FFC55A', '#623A0B', '#476A12', '#C5D8DC', '#C86A27', '#338266', '#EAE4EE', '#930108', '#0D0606', '#3C3B6E', '#B22234'];

        $genreColors = array_slice($colors, 0, count($genrePercentages));
    
        // Return array with necessary data
        return [
            'percentages' => $genrePercentages,
            'colors' => $genreColors
        ];
    }

    
    public function getSumData()
    {
        $userId = Auth::id();

        // Count the total number of movies based on the date_watched field
        $totalMovies = Record::where('user_id', $userId)->whereNotNull('date_watched')->count();
    
        // Count the number of movies watched this month based on the date_watched field
        $moviesThisMonth = Record::where('user_id', $userId)
                                 ->whereMonth('date_watched', date('m'))
                                 ->whereYear('date_watched', date('Y'))
                                 ->count();
    
        // Count the number of movies watched this year based on the date_watched field
        $moviesThisYear = Record::where('user_id', $userId)
                                ->whereYear('date_watched', date('Y'))
                                ->count();
    
        // Retrieve genre data
        $genreData = $this->getGenreData(); // Ensure this method returns an array with 'percentages' and 'colors'
    
        // Return the view with the appropriate data
        return view('charts.genre_chart', [
            'genrePercentages' => $genreData['percentages'],
            'genreColors' => $genreData['colors'],
            'totalMovies' => $totalMovies,
            'moviesThisMonth' => $moviesThisMonth,
            'moviesThisYear' => $moviesThisYear
        ]);
    }



}

