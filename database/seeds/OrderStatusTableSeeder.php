<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            [
                'description' => 'Đang xử lý',
            ],
            [
                'description' => 'Đang giao hàng',
            ],
            [
                'description' => 'Đã nhận hàng',
            ],
        ]);
    }
}
