@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Download</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Download Data</h1>
@endsection

@section('konten')
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                <p class="font-bold text-[#3b5998]">Bahan Baku</p>
                <a href="/download/bahanbaku" class="px-2 py-1 rounded-full text-slate-50 bg-[#37ae59] absolute right-4 top-1"><i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                <p class="font-bold text-[#3b5998]">Produk Dibuat</p>
                <a href="/download/produk_dibuat" class="px-2 py-1 rounded-full text-slate-50 bg-[#37ae59] absolute right-4 top-1"><i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                <p class="font-bold text-[#3b5998]">Produk Terjual</p>
                <a href="/download/produk_terjual" class="px-2 py-1 rounded-full text-slate-50 bg-[#37ae59] absolute right-4 top-1"><i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        @if(Auth::user()->role_id == 1)
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                <p class="font-bold text-[#3b5998]">Keuangan</p>
                <a href="/download/keuangan" class="px-2 py-1 rounded-full text-slate-50 bg-[#37ae59] absolute right-4 top-1"><i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        @endif
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                <p class="font-bold text-[#3b5998]">Laporan</p>
                <a href="/download/laporan" class="px-2 py-1 rounded-full text-slate-50 bg-[#37ae59] absolute right-4 top-1"><i class="fa-solid fa-download"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection