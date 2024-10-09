<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Resources\Api\MahasiswaCollection;
use App\Models\Mahasiswa;

class IntegrationController extends BaseController
{
    public function mahasiswa() {
        $data = Mahasiswa::select([
            'nim','kode_prodi','nip','id_kelas','nama','nip','semester','no_hp'
        ])->with([
            'prodi' => function ($q) {
                $q->select(['kode_prodi','nama_prodi','kode_jurusan']);
            },
            'prodi.jurusan' => function ($q) {
                $q->select(['kode_jurusan','nama_jurusan']);
            }
        ])->with([
            'dosen_pembimbing' => function ($q) {
                $q->select(['nip','nama']);
            }
        ])->with([
            'kelas' => function ($q) {
                $q->select(['id_kelas','abjad_kelas']);
            }
        ])->get();
        $data->makeHidden(['kode_prodi','nip','id_kelas']);
        foreach ($data as $dat) {
            $dat->prodi->makeHidden(['kode_jurusan']);
            $dat->kelas->makeHidden(['id_kelas']);
        }
        return $this->sendResponse($data, 'Sukses mengambil data');
    }

    public function mahasiswa_create(Request $request) {
        $data = $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'kode_prodi' => 'required',
            'semester' => 'required',
            'id_kelas' => 'required',
            'nip' => 'required',
            'no_hp' => 'required'
        ]);

        User::create([
            'id' => $request->id,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Mahasiswa::create([
            'nim' => $request->id,
            'nama' => $request->nama,
            'kode_prodi' => $request->kode_prodi,
            'semester' => $request->semester,
            'id_kelas' => $request->id_kelas,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp
        ]);

        unset($data['password']);
        unset($data['c_password']);

        return $this->sendResponse($data, 'Sukses Membuat Data');
    }

    public function mahasiswa_update(Request $request) {
        // Nanti validasi
        $data = Mahasiswa::where('nim', $request->id)->get();
    }
}
