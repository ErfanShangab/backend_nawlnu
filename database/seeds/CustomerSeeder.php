<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
                'user_id' =>\App\User::inRandomOrder()->first()->id,
            ]);
        }
        \App\Customer::insert($data);
    }
}
