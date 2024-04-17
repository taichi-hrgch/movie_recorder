<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    // Filmが関連しているRecordのリレーション
    public function records()
    {
        return $this->belongsToMany(Record::class);
    }
}
