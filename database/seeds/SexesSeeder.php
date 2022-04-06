<?php

use Illuminate\Database\Seeder;

class SexesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->insert([
            ['sex' => '男性'],
            ['sex' => '女性'],
        ]);
    }
}
