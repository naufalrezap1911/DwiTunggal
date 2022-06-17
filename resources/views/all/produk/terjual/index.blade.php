@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Produk</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Produk Terjual</h1>
@endsection

@section('konten')
<form action="/produk/terjual" method="get">
    <input type="search" class="bg-[#91a1c5] px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998] absolute top-4 right-4" name="search" placeholder="Pencarian Data...">
</form>
<a href="/produk" class="absolute top-4 left-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-arrow-left"></i> Kembali</a><br><br><br>
<div class="grid grid-cols-1 p-4 gap-2">
    <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
        <div class="bg-[#B5CFED] rounded-lg p-2">
            <p class="font-bold text-[#0074FF]">Singkong</p>
            <p><b>Terjual: {{$singkong}} Bks</b></p>
            <p><b>Total: Rp.{{number_format($uang_singkong)}},-</b></p>
        </div>
        <div class="bg-[#B5CFED] rounded-lg p-2">
            <p class="font-bold text-[#0074FF]">Sukun</p>
            <p><b>Terjual: {{$sukun}} Bks</b></p>
            <p><b>Total: Rp.{{number_format($uang_sukun)}},-</b></p>
        </div>
        <div class="bg-[#B5CFED] rounded-lg p-2">
            <p class="font-bold text-[#0074FF]">Pisang</p>
            <p><b>Terjual: {{$pisang}} Bks</b></p>
            <p><b>Total: Rp.{{number_format($uang_pisang)}},-</b></p>
        </div>
        <div class="bg-[#B5CFED] rounded-lg p-2">
            <p class="font-bold text-[#0074FF]">Ketela</p>
            <p><b>Terjual: {{$ketela}} Bks</b></p>
            <p><b>Total: Rp.{{number_format($uang_ketela)}},-</b></p>
        </div>
        <div class="bg-[#B5CFED] rounded-lg p-2">
            <p class="font-bold text-[#0074FF]">Talas</p>
            <p><b>Terjual: {{$talas}} Bks</b></p>
            <p><b>Total: Rp.{{number_format($uang_talas)}},-</b></p>
        </div>
    </div>
</div>
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        @foreach($data as $dt)
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Tanggal</p>
                <p>{{$dt->tanggal}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Nama</p>
                <p>{{$dt->nama_produk}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah</p>
                <p>{{$dt->jumlah_produk}} Bks</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Harga</p>
                <p>Rp. {{number_format($dt->harga_produk)}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Total</p>
                <p>Rp. {{number_format($dt->total)}}</p>
            </div>
            @if(Auth::user()->role_id == 2)
            <div>
                <a href="/produk/terjual/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full p-1"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@if(Auth::user()->role_id == 2)
<a href="/produk/terjual/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Terjual</a>
@endif
@endsection