<?php

use Illuminate\Database\Seeder;

class RateTableSeeder extends Seeder
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
            $rates = array(
                'rate' => $faker->numberBetween(50,400),
                'effectiveDate' => $faker->date('d-m-Y')
            );
            DB::table('rate')->insert($rates);
        }
    }
}
