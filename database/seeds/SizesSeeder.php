<?php

use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            ['size' => '小型犬'],
            ['size' => '中型犬'],
            ['size' => '大型犬'],
            ['size' => '超大型犬'],
        ]);
    }
}
