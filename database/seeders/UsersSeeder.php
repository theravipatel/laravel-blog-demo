<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "company_id"    => rand(1,2),
            "username"      => Str::random(5),
            "first_name"    => Str::random(5),
            "last_name"     => Str::random(5),
            "email"         => Str::random(5)."@gmail.com",
            "phone"         => rand(1000000000,9999999999),
            "city"          => Str::random(8),
            "password"      => md5(Str::random(6))
        ]);
    }
}
