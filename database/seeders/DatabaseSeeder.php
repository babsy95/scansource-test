<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // groups data
         DB::table('groups')->insert([
            ['id'=>1,
            'name' => 'Admin',
            'description' => 'For Admin',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 

            ['id'=>2,
            'name' => 'Manager',
            'description' => 'For Manager',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 

            ['id'=>3,
            'name' => 'Associate',
            'description' => 'For Associate',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 

            ['id'=>4,
            'name' => 'Supervior',
            'description' => 'For Supervior',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 
        ]);

        // users data
        DB::table('users')->insert([
            ['id'=>1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '865400000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 

            ['id'=>2,
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'phone' => '861111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()],

            ['id'=>3,
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'phone' => '861111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()],

            ['id'=>4,
            'name' => 'Matt',
            'email' => 'matt@gmail.com',
            'phone' => '7881111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 

            ['id'=>5,
            'name' => 'Billy',
            'email' => 'bill@gmail.com',
            'phone' => '444111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()],

            ['id'=>6,
            'name' => 'Lary',
            'email' => 'lary1@gmail.com',
            'phone' => '7661111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()],

            ['id'=>7,
            'name' => 'Lary',
            'email' => 'lary@gmail.com',
            'phone' => '7661111000',
            'password' => Hash::make('1234'),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()],
        ]);

        // users_group data
        DB::table('user_groups')->insert([
            ['id'=>1,
            'user_id' => 1,
            'group_id' => 1,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 
    
            ['id'=>2,
            'user_id' => 2,
            'group_id' => 3,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()], 
        ]);
    }
}
