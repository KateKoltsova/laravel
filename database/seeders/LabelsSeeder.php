<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('labels')->insert([
            'name' => 'bug',
            'color' => $faker->colorName(),
            'content' => $faker->text(50),
            'created_at' => now()
        ]);
        DB::table('labels')->insert([
            'name' => 'feature',
            'color' => $faker->colorName(),
            'content' => $faker->text(50),
            'created_at' => now()
        ]);
        DB::table('labels')->insert([
            'name' => 'urgent',
            'color' => $faker->colorName(),
            'content' => $faker->text(50),
            'created_at' => now()
        ]);
    }
}
