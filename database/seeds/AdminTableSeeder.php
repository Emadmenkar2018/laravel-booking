<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admin')->delete();
        $admin = array(
            array(
                'firstname' => 'System',
                'lastname' => 'Admin',
                'email' => 'laravelbooking@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'remember_token' => str_random(50),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )
        );

        DB::table('admin')->insert($admin);
    }
}
