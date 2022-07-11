<?php

namespace Database\Seeders;
use App\Models\InstructionCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstructionCategory::factory()->count(5)->create();
    }
}
