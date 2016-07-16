<?php

use Illuminate\Database\Seeder;

use App\location;
class LocationTableSeeder extends Seeder
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
            $locations = array(
                'street' => $faker->streetAddress,
                'suburb' => $faker->city,
                'desc' => $faker->sentence(40,true),
                'zip' => $faker->postcode,
                'lon' => $faker->longitude,
                'lat' => $faker->latitude
            );
            location::insert($locations);
        }
    }
}
