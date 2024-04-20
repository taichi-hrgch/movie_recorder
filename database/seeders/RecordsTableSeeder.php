<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordsTableSeeder extends Seeder
{
    public function run()
    {
        // 10件のダミー映画記録を生成
        Record::factory()->count(10)->create();
    }
}


