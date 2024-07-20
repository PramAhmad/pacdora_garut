<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(([
            'name' => 'Pram',
            'email' => 'pramudita@gmail.com',
            'password' => bcrypt('tasikmalaya'),
            'role' => 'admin',
        ]));
    }
}
