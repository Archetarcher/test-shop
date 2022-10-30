<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                [
                    'title'=>'Asu',
                    'description'=>'still water',
                    'slug'=> Str::slug('Asu'),
                    'category_id'=> 8,
                    'cost'=> 150,
                ],
               [
                    'title'=>'Banana',
                    'description'=>'fruit',
                    'slug'=> Str::slug('Banana'),
                    'category_id'=> 4,
                    'cost'=> 250,
                ],
                [
                    'title'=>'Apple',
                    'description'=>'fruit',
                    'slug'=> Str::slug('Apple'),
                    'category_id'=> 4,
                    'cost'=> 1250,
                ],
               [
                    'title'=>'Whiskas',
                    'description'=>'for cats',
                    'slug'=> Str::slug('Whiskas'),
                    'category_id'=> 7,
                    'cost'=> 550,
                ],
            ]
        );
    }
}
