<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Result;
use App\Models\Test;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            QuestionTypeSeeder::class
        ]);

        User::factory()->count(10)->create()->each(function ($user) {
            $tests = Test::factory()->count(2)->create()->each(function ($test) use($user) {
                $questions = Question::factory()->count(5)->create()->each(function ($question) use($user) {
                    $variants = Variant::factory()->count(3)->create();

                    $question->variants()->saveMany($variants);

                    Result::factory()->count(1)->for($user)->for($question)->create();

                });

                $test->questions()->saveMany($questions);
            });

            $user->tests()->saveMany($tests);
        });
    }
}
