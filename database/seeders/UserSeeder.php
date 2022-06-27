<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'id' => 9999,
                'name' => 'Agri Apriliando',
                'username' => 'agri',
                'email' => 'agripriliando@gmail.com',
                'password' => bcrypt('agri'),
                'role' => 'adm',
                'check' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9998,
                'name' => 'Ika Agustina',
                'username' => 'ika',
                'email' => 'ika@gmail.com',
                'password' => bcrypt('ika'),
                'role' => 'adm',
                'check' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
