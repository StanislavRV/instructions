<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create(['name' => 'admin@admin.net', 'email' => 'admin@admin.net', 'password' => Hash::make('admin@admin.net'), 'admin' =>'1']);
        User::factory()->count(5)->create();
    }
}
