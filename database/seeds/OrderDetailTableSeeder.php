<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail')->insert([
            [
                'order_id' => 1,
                'namepd' => 'Túi xách đựng giày',
                'image' => '1.png',
                'price' => 100000,
                'qty' => 1,
            ],
            [
                'order_id' => 2,
                'namepd' => 'Túi đựng đồ bơi',
                'image' => '1.png',
                'price' => 150000,
                'qty' => 1,
            ],
            [
                'order_id' => 2,
                'namepd' => 'Băng đô đầu',
                'image' => '1.png',
                'price' => 30000,
                'qty' => 1,
            ],
            [
                'order_id' => 3,
                'namepd' => 'Mũ bơi',
                'image' => '1.png',
                'price' => 100000,
                'qty' => 1,
            ],
            [
                'order_id' => 3,
                'namepd' => 'Túi tập Gym',
                'image' => '1.png',
                'price' => 120000,
                'qty' => 1,
            ],
            [
                'order_id' => 3,
                'namepd' => 'Băng cổ tay',
                'image' => '1.png',
                'price' => 30000,
                'qty' => 2,
            ],
        ]);
    }
}
