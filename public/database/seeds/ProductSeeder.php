<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 20; $i++) {
            array_push($data, [
                'name' => $faker->name,
                'details' => $faker->paragraph,
                'category_id' => \App\Category::all()->random()->id,
                'client_id' => \App\Client::all()->random()->id,
                'is_advertise' => $faker->boolean,
            ]);
        }
        \App\Product::insert($data);
    }
}
