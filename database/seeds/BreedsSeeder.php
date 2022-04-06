<?php

use Illuminate\Database\Seeder;

class BreedsSeeder extends Seeder
{   
    private $breeds = [
            'アーフェン・ピンシャー',
            '秋田県',
            'アメリカン・ウォーター・スパニエル',
            'アメリカン・スタッフォードシャー・テリア',
            'イビザン・ハウンド',
            'イングリッシュ・セター',
            'ウエスト・ハイランド・ホワイト・テリア',
            'ウェルシュ・スプリンガー・スパニエル',
            'オーストラリアン・シルキー・テリア',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->breeds as $breed) {
            DB::table("breeds")->insert([
                "breed" => $breed
            ]);
    
        }
    }
}
