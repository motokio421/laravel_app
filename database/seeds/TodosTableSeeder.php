<?php
// 初期データを入れるファイル

use Illuminate\Database\Seeder;
use Carbon\Carbon; // 追記

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ここから追記
        DB::table('todos')->truncate();  //テーブル内のデータを削除
        DB::table('todos')->insert([     //insertで初期値を設定 配列
            [
                'title'      => 'Laravel Lessonを終わらせる',
                'created_at' => Carbon::create(2018, 1, 1),  //日付を取ってくれる関数
                'updated_at' => Carbon::create(2018, 1, 4),
            ],
            [
                'title'      => 'レビューに向けて理解を深める',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
        ]);

        // ここまで追記
    }
}
