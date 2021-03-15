<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($x = 0; $x <= 50; $x++) {
        DB::table('users')->insert([
          'name' => Str::random(10),
          'email' => Str::random(10).'@mail.com',
          'designation' => Str::random(10),
          'mobile_no' => Str::random(10),
          'salary' => '85000',
          'joining_date' => now(),
          'password' => Hash::make('password'),
        ]);
      }
    }
}
