<?php

use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
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
                'balance' => $faker->numberBetween(0,2000),
                'vehicle_id'=>$faker->buildingNumber,
                'is_available'=>$faker->boolean,

                'user_id' =>\App\User::inRandomOrder()->first()->id,
            ]);
        }
        \App\Driver::insert($data);
    }
}
