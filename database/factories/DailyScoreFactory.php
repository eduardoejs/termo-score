<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyScore>
 */
class DailyScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_id' => 81,
            'score'   => '1/6',
            'detail'  => 'joguei term.ooo #81 1/6 🔥 1' . PHP_EOL . PHP_EOL . '🟩🟩🟩🟩🟩',
            'word'    => $this->faker->text(5),
            'status'  => 'pending',
        ];
    }
}
