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
        if (Category::all()->count() < 1) {
            $categories =
                [
                    [
                        'name' => 'food',
                        'image' => '-',

                    ],
                    [
                        'name' => 'travel',
                        'image' => '-',
                    ],
                    [
                        'name' => 'music',
                        'image' => '-',
                    ],
                    [
                        'name' => 'sports',
                        'image' => '-',
                    ],
                ];
            DB::table('categories')->insert($categories);
        }
    }
}
