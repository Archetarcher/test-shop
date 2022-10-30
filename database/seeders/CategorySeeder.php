<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title'=>'Food',
                    'parent_id'=>0
                ],
                [
                    'title'=>'Domestic chemicals',
                    'parent_id'=>0
                ],
                [
                    'title'=>'For pets',
                    'parent_id'=>0
                ]
            ]);
       DB::table('categories')->insert(
            [
                [
                    'title'=>'Fruits',
                    'parent_id'=>1
                ],
                [
                    'title'=>'Vegetables',
                    'parent_id'=>1
                ],
                [
                    'title'=>'Drinks',
                    'parent_id'=>1
                ],
                [
                    'title'=>'Cat food',
                    'parent_id'=>3
                ],
            ]);

        DB::table('categories')->insert(
            [
                 [
                    'title'=>'Water',
                    'parent_id'=>6
                ],
                 [
                    'title'=>'Juices',
                    'parent_id'=>6
                ],
            ]

        );
    }
}
