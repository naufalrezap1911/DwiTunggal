@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Grafik</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Grafik</h1>
@endsection

@section('konten')
<div class="grid  w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <a href="/grafik/keuangan" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Grafik Keuangan</a>
    <a href="/grafik/bahan_baku" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Grafik Bahan Baku</a>
    <a href="/grafik/produk_dibuat" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Grafik Produk Dibuat</a>
    <a href="/grafik/produk_dijual" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Grafik Produk Dijual</a>
</div>
@endsection