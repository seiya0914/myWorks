<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(FADTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(RateTableSeeder::class);
    }
}
