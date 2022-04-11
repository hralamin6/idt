<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'hralamin',
            'email'=>'hralamin2020@gmail.com',
//            'type'=> 'admin',
            'email_verified_at' => now(),
            'password'=>Hash::make('0')
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
