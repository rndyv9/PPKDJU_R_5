<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student::insert([
        //     [
        //         'name' => 'Ada',
        //         'email' => 'ada@gmail.com',
        //         'phone' => '085213924399',
        //         'address' => 'jakarta'
        //     ],
        //     [
        //         'name' => 'Bada',
        //         'email' => 'bada@gmail.com',
        //         'phone' => '085213924398',
        //         'address' => 'jakarta'
        //     ],
        // ]);

        Student::factory(50)->create();
    }
}
