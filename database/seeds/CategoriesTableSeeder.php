<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name_cat' => 'Phụ kiện bóng đá',
                'parent_id' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'name_cat' => 'Phụ kiện bóng rổ',
                'parent_id' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'name_cat' => 'Phụ kiện cầu lông',
                'parent_id' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'name_cat' => 'Phụ kiện bơi lội',
                'parent_id' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'name_cat' => 'Phụ kiện tập Gym',
                'parent_id' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
        ]);
    }
}
