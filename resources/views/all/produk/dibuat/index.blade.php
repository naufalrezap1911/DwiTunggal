@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Produk</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Produk Dibuat</h1>
@endsection

@section('konten')
<form action="/produk/dibuat" method="get">
    <input type="search" class="bg-[#91a1c5] px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998] absolute top-4 right-4" name="search" placeholder="Pencarian Data...">
</form>
<a href="/produk" class="absolute top-4 left-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-arrow-left"></i> Kembali</a><br><br><br>
<div class="grid grid-cols-1 p-4 gap-2">
    <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
        <div class="bg-[#eff1f6] rounded-lg p-2">
            <p class="font-bold text-[#3b5998]">Total Singkong</p>
            <p>{{$singkong}} Bks</p>
        </div>
        <div class="bg-[#eff1f6] rounded-lg p-2">
            <p class="font-bold text-[#3b5998]">Total Sukun</p>
            <p>{{$sukun}} Bks</p>
        </div>
        <div class="bg-[#eff1f6] rounded-lg p-2">
            <p class="font-bold text-[#3b5998]">Total Pisang</p>
            <p>{{$pisang}} Bks</p>
        </div>
        <div class="bg-[#eff1f6] rounded-lg p-2">
            <p class="font-bold text-[#3b5998]">Total Ketela</p>
            <p>{{$ketela}} Bks</p>
        </div>
        <div class="bg-[#eff1f6] rounded-lg p-2">
            <p class="font-bold text-[#3b5998]">Total Talas</p>
            <p>{{$talas}} Bks</p>
        </div>
    </div>
</div>
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    @foreach($data as $dt)
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Tanggal</p>
                <p>{{$dt->tanggal}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Nama Produk</p>
                <p>{{$dt->nama_produk}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Bahan Baku</p>
                <p>{{$dt->jumlah_bahanbaku}} Kg</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Produk</p>
                <p>{{$dt->jumlah_produk_dibuat}} Bks</p>
            </div>
            @if(Auth::user()->role_id == 2)
            <div>
                <a href="/produk/dibuat/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full p-1"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@if(Auth::user()->role_id == 2)
<a href="/produk/dibuat/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Produksi</a>
@endif
@endsection