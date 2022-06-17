@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Pekerja</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Pekerja</h1>
@endsection

@section('konten')
<form action="/pekerja" method="get">
        <input type="search" placeholder="Search...." class="bg-[#91a1c5] px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998] absolute top-4 right-4" name="search">
    </form><br><br><br>
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    @foreach($data as $dt)
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Username</p>
                <p>2000{{$dt->id}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Nama</p>
                <p>{{$dt->nama_pekerja}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Alamat</p>
                <p>{{$dt->alamat}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">No. Telp</p>
                <p>{{$dt->no_telp}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Email</p>
                <p>{{$dt->email}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Password</p>
                <p>{{$dt->password}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <a href="/pekerja/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full p-1"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<a href="/pekerja/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Pekerja</a>
@endsection