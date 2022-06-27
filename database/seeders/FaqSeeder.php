<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question' => 'Bagaimana cara mendapatkan akun aplikasi?',
                'answer' => 'Hubungi operator aplikasi dengan syarat anda adalah penerima beasiswa aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'Apa itu penerima beasiswa aktif?',
                'answer' => 'Penerima beasiswa aktif adalah mahasiswa yang sedang menerima beasiswa sesuai dengan SK Rektor IAKN Palangka Raya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'Apa syarat menjadi penerima beasiswa',
                'answer' => 'Penerima beasiswa aktif adalah mahasiswa yang sedang menerima beasiswa sesuai dengan SK Rektor IAKN Palangka Raya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
