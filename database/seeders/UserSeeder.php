<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id' => 2,
            'first_name' => 'admin 22',
            'last_name' => 'Admin 22',
            'email' => 'admin2@gmail.com',
            'birth_date' => '1990-01-01',
            'gender' => 'Laki-laki',
            'password' => bcrypt('admin123'),
        ]);
    }
}
