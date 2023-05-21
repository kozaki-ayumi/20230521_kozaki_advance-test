<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $param = [
            'fullname' => '田中 和夫',
            'gender' => '男性',
            'email' => 'bbb@yahoo.co.jp',
            'postcode' => '012-4567',
            'address' => '東京都千代田区',
            'building_name' => '１号ビル',
            'opinion' => 'お願いします',
        ];
        DB::table('contacts')->insert($param);


         $param = [
            'fullname' => '佐藤 佳奈',
            'gender' => '女性',
            'email' => 'ccc@yahoo.co.jp',
            'postcode' => '012-5678',
            'address' => '東京都新宿区',
            'building_name' => '２号ビル',
            'opinion' => 'お願いします',
        ];
        DB::table('contacts')->insert($param);

        Contact::factory()->count(30)->create();


    }
}
