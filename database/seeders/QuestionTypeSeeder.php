<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['text', 'radio', 'checkbox'];

        foreach ($types as $type) {
            $questionType = new QuestionType();
            $questionType->title = $type;
            $questionType->save();
        }
    }
}
