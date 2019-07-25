<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data')->insert([
            'data' => self::dataArray(),
            'access' => '1',
            ],
            [
            'data' => self::dataArray(),
            'access' => '0',
        ]);
    }

    public static function dataArray(){

        $data = [];

        $faker = Faker::create();
        foreach (range(1,50) as $i){
            $data[]=[
                'id'=>$i,
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>$faker->password,
                'city'=>$faker->city,
                'year'=>$faker->year,
                'domainName'=>$faker->domainName,
                'creditCardNumber'=>$faker->creditCardNumber,
                'word'=>$faker->word,
                'paragraph'=>$faker->paragraph,
            ];
        }

        return json_encode($data);
    }
}
