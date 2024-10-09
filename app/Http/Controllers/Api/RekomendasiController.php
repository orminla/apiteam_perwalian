<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Api\MahasiswaCollection;
use Response;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Rekomendasi;

class RekomendasiController extends BaseController
{
    public function index()
    {
        $data       = Rekomendasi::all();
        foreach ($data as $rek) {
            $rek -> mahasiswa;
            $rek -> kelas;

            $data = $data->except(['tanggal','topik_pertemuan']);
            return $this->sendResponse($data, 'Sukses mengambil data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {

            $update = Rekomendasi::where('nim', $request->nim)->update([
                'topik_pertemuan' => $request->nama,
                /// others
            ]);
        } catch (\Exception $e) {
            return 'error';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function delete(Request $request)
    {
        try {

            $getId = Rekomendasi::findOrFail($request->id)->delete();
            return 'success';
        } catch (\Exception $e) {

            return 'error';
        }
    }
}