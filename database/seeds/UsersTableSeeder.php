<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'nguyenminhduc24396@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Nguyễn Minh Đức',
                'dob' => '1996-03-24',
                'phone' => '01297768889',
                'address' => 'Hà Nội',
                'role' => -1,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'email' => 'thaosone150399@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Admin',
                'dob' => '1999-03-15',
                'phone' => '01688169999',
                'address' => 'Hà Nội',
                'role' => 0,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'email' => 'shenkai24396@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Phạm Minh Hải',
                'dob' => '1994-08-15',
                'phone' => '0915892077',
                'address' => 'Hải Phòng',
                'role' => 1,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'email' => 'ngminhduc24396@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Lê Minh Tuấn',
                'dob' => '1996-10-11',
                'phone' => '0123456789',
                'address' => 'TPHCM',
                'role' => 1,
                'status' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
