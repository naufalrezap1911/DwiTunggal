@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Produk</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Produk</h1>
@endsection

@section('konten')
<div class="grid  w-[90%] h-[40%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <a href="/produk/dibuat" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Produk Dibuat</a>
    <a href="/produk/terjual" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>Produk Terjual</a>
</div>
@endsection