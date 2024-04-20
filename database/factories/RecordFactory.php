<?php

// database/factories/RecordFactory.php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    protected $model = Record::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'comment' => $this->faker->paragraph,
            'evaluation' => $this->faker->numberBetween(1, 5),
            'date_watched' => $this->faker->date(),
            'genre' => $this->faker->sentence,
            // その他の必要なフィールドも同様に追加
        ];
    }
}

