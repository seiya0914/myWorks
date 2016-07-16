<?php

use Illuminate\Database\Seeder;

use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0;$i<20;$i++)
        {
            $customers = array(
                'name' => $faker->name,
                'mob' => $faker->phoneNumber,
                'license' => $faker->randomNumber('9',true),
                'email' => $faker->email,
                'address' => $faker->address
            );
            Customer::insert($customers);
        }

    }
}
