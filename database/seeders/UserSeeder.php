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
        $adminData = [
            'first_name' => 'admin',
            'second_name' => 'admin',
            'last_name' => 'admin',
            'date_of_birth' => Carbon::now(),
            'school' => 'admin school',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('123456')
        ];

        $admin = new User();
        $admin->fill($adminData);
        $admin->save();
        $admin->assign('admin');

        $studentData = [
            'first_name' => 'student',
            'second_name' => 'student',
            'last_name' => 'student',
            'date_of_birth' => Carbon::now(),
            'school' => 'student school',
            'email' => 'student@mail.ru',
            'password' => Hash::make('123456')
        ];

        $student = new User();
        $student->fill($studentData);
        $student->save();
        $student->assign('student');
    }
}
