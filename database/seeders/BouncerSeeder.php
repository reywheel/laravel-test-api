<?php

namespace Database\Seeders;

use App\Models\Result;
use App\Models\Test;
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

        $student = Bouncer::role()->firstOrCreate([
            'name' => 'student',
            'title' => 'Student'
        ]);

        Bouncer::allow($admin)->everything();

        Bouncer::allow($student)->toOwn(Result::class);
    }
}
