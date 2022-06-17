@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Dashboard</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Profil</h1>
@endsection

@section('konten')
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-cols-1 p-4 gap-1">
            <p class="font-bold text-[#3b5998]">Nama Pekerja :</p>
            <p>{{$data->nama_pekerja}}</p>
            <p class="font-bold text-[#3b5998]">Username :</p>
            <p>1000{{$data->id}}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-cols-1 p-4 gap-1">
            <p><span class="font-bold text-[#3b5998]">Email : </span>{{$data->email}}</p>
            <p><span class="font-bold text-[#3b5998]">Alamat : </span>{{$data->alamat}}</p>
            <p><span class="font-bold text-[#3b5998]">Telepon : </span>{{$data->no_telp}}</p>
        </div>
    </div>
</div>
<a href="/pekerja/akun/edit/{{$data->id}}" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg">Edit</a>
@endsection