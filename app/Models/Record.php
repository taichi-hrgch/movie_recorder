<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    // Recordが持つFilmのリレーション
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}