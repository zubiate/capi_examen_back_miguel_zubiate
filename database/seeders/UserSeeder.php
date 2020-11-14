<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDomicilio;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->times(100)
            ->has(UserDomicilio::factory()->times(1), 'domicilio')
            ->create();
    }
}
