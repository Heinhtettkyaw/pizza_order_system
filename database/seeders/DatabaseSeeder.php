<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create(
            [
            'name' =>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'09123456778',
            'address'=>'YGN',
            'role'=>'admin',
            'password'=>Hash::make('admin123')
            ]);
    }
}
