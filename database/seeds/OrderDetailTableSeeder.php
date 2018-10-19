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
                'product_id' => 1,
                'order_id' => 1,
                'price' => 100000,
                'qty' => 1,
            ],
            [
                'product_id' => 6,
                'order_id' => 2,
                'price' => 150000,
                'qty' => 1,
            ],
            [
                'product_id' => 7,
                'order_id' => 2,
                'price' => 30000,
                'qty' => 1,
            ],
            [
                'product_id' => 9,
                'order_id' => 3,
                'price' => 100000,
                'qty' => 1,
            ],
            [
                'product_id' => 10,
                'order_id' => 3,
                'price' => 100000,
                'qty' => 1,
            ],
            [
                'product_id' => 8,
                'order_id' => 3,
                'price' => 30000,
                'qty' => 2,
            ],
        ]);
    }
}
