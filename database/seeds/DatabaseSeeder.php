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
        $this->call(SexesSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(BreedsSeeder::class);
        $this->call(JobsSeeder::class);
    }
}
