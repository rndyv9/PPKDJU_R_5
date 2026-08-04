<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name' => 'Rendy',
            'birthday' => '2000-08-29',
            'email' => 'rendyzz999@gmail.com',
            'address' => 'Jl. Muara Bahari',
            'postal_code' => '14350',
            'description' => 'Yes',
            'telp' => '085714509894',
            'file' => '',
            'is_active' => true,
            'linkedin' => '',
            'porto' => '',
            'github' => '',
        ]);
    }
}
