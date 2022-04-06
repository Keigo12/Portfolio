<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
        private $jobs = [
            '公務員',
            '経営者・役員',
            '会社員',
            '自営業',
            '自由業',
            '専業主婦',
            'パート・アルバイト',
            '学生',
            'その他',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->jobs as $job) {
            DB::table("jobs")->insert([
                "job" => $job
            ]);
        
        }
    }
}
