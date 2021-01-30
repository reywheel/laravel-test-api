<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $teacher = Bouncer::role()->firstOrCreate([
            'name' => 'teacher',
            'title' => 'Teacher'
        ]);

        $student = Bouncer::role()->firstOrCreate([
            'name' => 'student',
            'title' => 'Student'
        ]);

        Bouncer::allow($admin)->everything();
        Bouncer::allow($student)->toOwn(Result::class);
    }
}
