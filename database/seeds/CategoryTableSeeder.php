<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'title' => 'conférences'
        ]);
        
        \App\Category::create([
            'title' => 'nouveautés'
        ]);
    }
}
