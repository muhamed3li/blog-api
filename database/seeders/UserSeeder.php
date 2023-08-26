<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 2; $i++) {
            $number = $i + 1;
            User::create([
                'name' => "User$number Demo",
                'email' => "user$number@demo.com",
                'password' => Hash::make('user123'),
            ]);
        }
    }
}
