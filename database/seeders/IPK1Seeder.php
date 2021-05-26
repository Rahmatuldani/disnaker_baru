<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IPK1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ipk1_names')->insert([
            'ipk1_name' => 'PENCARI KERJA YANG BELUM DITEMPATKAN PADA AKHIR BULAN LALU',
            'created_at' => date("Y-m-d h:s:i"),
            'updated_at' => date("Y-m-d h:s:i"),
        ]);
        DB::table('ipk1_names')->insert([
            'ipk1_name' => 'PENCARI KERJA YANG TERDAFTAR DALAM BULAN INI',
            'created_at' => date("Y-m-d h:s:i"),
            'updated_at' => date("Y-m-d h:s:i"),
        ]);
        DB::table('ipk1_names')->insert([
            'ipk1_name' => 'PENCARI KERJA YANG DITEMPATKAN DALAM BULAN INI',
            'created_at' => date("Y-m-d h:s:i"),
            'updated_at' => date("Y-m-d h:s:i"),
        ]);
        DB::table('ipk1_names')->insert([
            'ipk1_name' => 'PENCARI KERJA YANG DIHAPUSKAN DALAM BULAN INI',
            'created_at' => date("Y-m-d h:s:i"),
            'updated_at' => date("Y-m-d h:s:i"),
        ]);
        DB::table('ipk1_names')->insert([
            'ipk1_name' => 'PENCARI KERJA YANG BELUM DITEMPATKAN PADA AKHIR BULAN INI',
            'created_at' => date("Y-m-d h:s:i"),
            'updated_at' => date("Y-m-d h:s:i"),
        ]);
    }
}
