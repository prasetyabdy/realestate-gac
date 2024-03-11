<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Abdi',
            'email' => 'abdi@gmail.com',
            'password' => \bcrypt('abdi123')
        ];

        User::insert($user);
    }
}
