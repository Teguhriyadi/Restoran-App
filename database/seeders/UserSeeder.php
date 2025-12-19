<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nama" => "Staff 1",
            "username" => "staff1",
            "password" => bcrypt("password1")
        ]);

        User::create([
            "nama" => "Staff 2",
            "username" => "staff2",
            "password" => bcrypt("password2")
        ]);
    }
}
