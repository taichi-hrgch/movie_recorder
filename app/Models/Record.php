<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    // Recordが持つFilmのリレーション
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
    
    protected $fillable = [
        'title',
        'release_date',
        'genre',
        'poster_path',
        'recommendations',
        'cast',
        // その他の属性...
    ];

    // JSON形式で保存される属性については、$castsで指定
    protected $casts = [
        'recommendations' => 'array',
        'cast' => 'array',
        // その他の属性...
    ];
}