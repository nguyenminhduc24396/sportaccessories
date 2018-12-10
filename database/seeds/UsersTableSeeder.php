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
                'email_verified_at' => date('Y-m-d H:i:s'),
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
                'email_verified_at' => date('Y-m-d H:i:s'),
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
                'email_verified_at' => date('Y-m-d H:i:s'),
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
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'abcdef@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Mai Đình Hùng',
                'dob' => '1997-04-24',
                'phone' => '0387791536',
                'address' => 'Đà Lạt',
                'role' => 1,
                'status' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'tuanvu@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Vũ Anh Tuấn',
                'dob' => '1994-03-15',
                'phone' => '0289966633',
                'address' => 'Trần Hưng Đạo, Hà Nội',
                'role' => 1,
                'status' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'maitriey@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Triệu Thanh Mai',
                'dob' => '1998-03-25',
                'phone' => '0181443622',
                'address' => 'Hải Dương',
                'role' => 1,
                'status' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'canhnd@gmail.com',
                'password' => bcrypt('123456789'),
                'name' => 'Nguyễn Đức Cảnh',
                'dob' => '1998-01-01',
                'phone' => '0813654470',
                'address' => 'Hạ Long, Quảng Ninh',
                'role' => 1,
                'status' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
