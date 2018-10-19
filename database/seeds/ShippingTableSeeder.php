<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping')->insert([
            [
                'type' => 'Giao hàng nhanh, nhận hàng trong 1-2 ngày',
                'cost' => 35000,
            ],
            [
                'type' => 'Giao hàng tiết kiệm',
                'cost' => 12000,
            ],
        ]);
    }
}
