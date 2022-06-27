<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stats')->insert([
            [
                'name' => 'Aktif',
                'note' => 'Mahasiswa sedang menerima Beasiswa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Non Aktif',
                'note' => 'Mahasiswa tidak lagi menerima Beasiswa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Aktif - Mutasi',
                'note' => 'Mahasiswa melanjutkan Beasiswa dari Mahasiswa yang Non Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
