<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Api\MahasiswaCollection;
use Response;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Konsultasi;

class KonsultasiController extends BaseController
{
    public function konsul()
    {
        $data = Konsultasi::select([
            'nim',
            'tanggal',
            'materi',
        ])->with([
            'mahasiswa' => function ($q) {
            $q->select(['nim','nama', 'semester', 'id_kelas'])->with([
                'kelas' => function ($query) {
                    $query->select(['id_kelas', 'abjad_kelas']); // Pilih id_kelas dan abjad_kelas
                }
            ]);
            }
        ])->get();
        //$data->makeHidden(['jenis_rekomendasi', 'tanggal_persetujuan']);
        return $this->sendResponse($data, 'Sukses mengambil data');
    }

    //
    public function konsul_create(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required',
            'tanggal' => 'required',
            'materi' => 'required'
        ]);

        Konsultasi::create([
            'nim' => $request->nim,
            'tanggal' => $request->tanggal,
            'materi' => $request->materi
        ]);

        return $this->sendResponse($data, 'Sukses Membuat Data!');
    }
}
