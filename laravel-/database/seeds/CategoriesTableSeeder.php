<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['DND 3.5', 'DND 5', 'Sine Requie', 'Call of Cthulhu', 'Pathfinder'];

        foreach($categories as $category){
            $newCategory = New category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');

            $newCategory->save();
        }
    }
}
