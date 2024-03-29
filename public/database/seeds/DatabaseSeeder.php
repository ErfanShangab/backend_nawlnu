<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(ClientSeeder::class);
        // $this->call(DriverSeeder::class);
        // $this->call(CustomerSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);

        $this->command->info('Role table seeded!');
    }


}

