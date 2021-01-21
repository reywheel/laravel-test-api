<?php

namespace Database\Factories;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'is_unidirectional' => $this->faker->boolean(50),
            'time_start' => Carbon::now()->subHours($this->faker->numberBetween(1, 24)),
            'time_finish' => Carbon::now(),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
