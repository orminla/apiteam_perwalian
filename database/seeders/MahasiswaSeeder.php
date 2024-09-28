<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'kode_jurusan' => 'TIF',
            'nama_jurusan' => 'D3 Teknik Informatika'
        ]);

        Mahasiswa::create([
            'nim' => 3202216074,
            'nama' => 'Oliver Dillon',
            'kode_jurusan' => 'TIF',
            'semester'=> 5,
            'id_kelas'=> 3,
            'no_hp'=> '0895411898900',
        ]);
    }
}
