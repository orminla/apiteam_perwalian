<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'kode_jurusan',
        'semester',
        'id_kelas',
        'no_hp',
    ];

    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
