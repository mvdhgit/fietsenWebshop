<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake('nl_NL');

        for($i=0; $i<10; $i++){
            Category::create([
                'name' => $faker->word(),
            ]);
        }
    }
}
