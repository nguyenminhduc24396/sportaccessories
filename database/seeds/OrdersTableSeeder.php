<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 3,
                'shipping_id' => 1,
                'payment_method_id' => 1,
                'order_status_id' => 1,
                'name' => 'Phạm Minh Hải',
                'email' => 'shenkai24396@gmail.com',
                'address' => 'Hà Nội',
                'phone' => '0915892077',
                'note' => null,
                'total_price' => 135000,
                'ship_date' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'user_id' => 4,
                'shipping_id' => 1,
                'payment_method_id' => 1,
                'order_status_id' => 1,
                'name' => 'Phạm Thanh Phương',
                'email' => 'ngminhduc24396@gmail.com',
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'note' => 'gọi trước khi giao hàng',
                'total_price' => 215000,
                'ship_date' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'user_id' => 3,
                'shipping_id' => 1,
                'payment_method_id' => 1,
                'order_status_id' => 1,
                'name' => 'Vũ Tuấn',
                'email' => 'shenkai24396@gmail.com',
                'address' => 'Hà Đông',
                'phone' => '0915892077',
                'note' => null,
                'total_price' => 295000,
                'ship_date' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
