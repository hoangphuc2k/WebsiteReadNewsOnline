<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['RoleName'=>'Quản Trị']
        ]);
        DB::table('roles')->insert([
            ['RoleName'=>'Thành Viên']
        ]);
        DB::table('users')->insert([
            ['Username'=>'Thành Viên',
            'email'=>'HoangPhuc@gmail.com',
            'FullName'=>'PhamHoangPhuc',
            'password'=>Hash::make('12345678'),
            'RoleCode_FK'=>1,
            ]
        ]);
    }
}
