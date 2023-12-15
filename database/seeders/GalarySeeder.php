<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galaries')->insert([
            'image'=>'image1.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image2.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image3.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image4.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image5.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image6.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image7.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image8.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image9.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('galaries')->insert([
            'image'=>'image10.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
