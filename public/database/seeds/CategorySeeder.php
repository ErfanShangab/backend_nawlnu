<?php

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
        $faker = Faker\Factory::create();
        $data=[];
        for ($i= 1;$i<=20;$i++){
            array_push($data,[
                'name' => $faker->name,
                'details' => $faker->paragraph,
            ]);
        }
        \App\Category::insert($data);
    }
}
