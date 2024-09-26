<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index() {
        $data = Mahasiswa::all();
        return view("admin.mahasiswa.index", compact('data'));
    }
}
