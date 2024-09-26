@extends('admin.master')

@section('title', 'Data Mahasiswa')

@section('content')
    @if(Auth::check())
        {{Auth::user()->id}}
    @endif

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>NO HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $mhs)
                <tr>
                    <td>{{$mhs->nim}}</td>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mhs->no_hp}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('tambah-data-mahasiswa')}}">Tambah Akun Mahasiswa</a>
@endsection
