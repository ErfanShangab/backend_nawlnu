<?php

use App\User;
use App\Client;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for ($i = 1; $i <= 100; ++$i) {
            if ($i == 1) {
                $email = 'admin@admin.com';
                $userRole = 'super_admin';
                $password = bcrypt('admin123');
            } elseif ($i == 2) {
                $email = 'employee@employee.com';
                $userRole = 'employee';
                $password = bcrypt('employee123');
            } elseif ($i == 3) {
                $email = 'client@client.com';
                $userRole = 'client';
                $password = bcrypt('client123');
            } else {
                $email = $faker->email;
                $userRole = 'customer';
                $password = bcrypt('password');
            }
            $user = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $email,
                'password' => $password,
                'role' => $userRole ,
            ];
            $createdUser = User::create($user);
            if ($i <= 3) {
                $createdUser->assignRole($userRole);
                if ($i == 3) {
                    $client = new Client([
                        'type' =>   $faker->randomElement(["pharmacy","resturant","merchant"]),
                        'details' =>   $faker->paragraph,
                        'user_id' => $createdUser->id,
                    ]);
                }
            }
        }
    }
}
