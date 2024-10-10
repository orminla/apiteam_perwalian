<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Api\MahasiswaCollection;
use Response;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Rekomendasi;

class RekomendasiController extends BaseController
{
    public function rekomendasi()
    {
        $data = Rekomendasi::select([
            'nim','keterangan','tanggal_pengajuan','status'
        ])->with([
            'mahasiswa' => function ($q) {
                $q->select(['nim', 'nama', 'semester']);
            }
        ])->get();
        //$data->makeHidden(['jenis_rekomendasi', 'tanggal_persetujuan']);
        return $this->sendResponse($data, 'Sukses mengambil data');
    }

    public function rekomendasi_create(Request $request) {
        $data = $request -> validate([
            'nim' => 'required',
            'jenis_rekomendasi' => 'required',
            'tanggal_pengajuan' => 'required',
            'tanggal_persetujuan' => 'required',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        Rekomendasi::create([
            'nim' => $request -> nim,
            'jenis_rekomendasi' => $request -> jenis_rekomendasi,
            'tanggal_pengajuan' => $request -> tanggal_pengajuan,
            'tanggal_persetujuan' => $request -> tanggal_persetujuan,
            'keterangan' => $request -> keterang,
            'status' => $request -> status
        ]);

        return $this->sendResponse($data, 'Sukses Membuat Data!');
    }    

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Request $request)
    // {
    //     try {

    //         $update = Rekomendasi::where('nim', $request->nim)->update([
    //             'topik_pertemuan' => $request->nama,
    //             /// others
    //         ]);
    //     } catch (\Exception $e) {
    //         return 'error';
    //     }
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function delete(Request $request)
    // {
    //     try {

    //         $getId = Rekomendasi::findOrFail($request->id)->delete();
    //         return 'success';
    //     } catch (\Exception $e) {

    //         return 'error';
    //     }
    // }
}