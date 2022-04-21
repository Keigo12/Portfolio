<?php

use Illuminate\Database\Seeder;

class BreedsSeeder extends Seeder
{   
    private $breeds = [
            'チワワ',
            'ポメラニアン',
            'パグ',
            'キャバリア',
            'トイ・プードル',
            '柴犬',
            'ミニチュアダックスフンド',
            'ミニチュアシュナウザー',
            'ヨークシャテリア',
            'フレンチブルドッグ',
            'シーズー',
            'コーギー',
            'ボストンテリア',
            'ボーダーコリー',
            'ビーグル',
            'ブルドッグ',
            'ラブラドールレトリバー',
            'ゴールデンレトリバー',
            'シベリアンハスキー',
            'バーニーズマウンテンドッグ',
            'ダルメシアン',
            '雑種（ミックス犬）',
            'その他',
            '不明',
            
            
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
