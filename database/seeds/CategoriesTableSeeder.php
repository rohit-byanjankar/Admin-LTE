<?php

use Illuminate\Database\Seeder;
use Modules\Article\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $categories =
                [
                    [
                        'name' => 'food',

                        'image' => 'uploads/food.jpg',

                    ],
                    [
                        'name' => 'travel',

                        'image' => '-',
                    ],
                    [
                        'name' => 'music',

                        'image' => 'uploads/music.png',
                    ],
                    [
                        'name' => 'sports',

                        'image' => '-',
                    ],
                ];
            DB::table('categories')->insert($categories);
        
    }
}
