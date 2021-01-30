<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->createOne([
            'email' => 'admin@mail.ru'
        ]);

        $admin->assign('admin');

        $student = User::factory()->createOne([
            'email' => 'student@mail.ru'
        ]);
        $student->assign('student');
    }
}
