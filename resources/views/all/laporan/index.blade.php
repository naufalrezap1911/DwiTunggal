@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Laporan</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Laporan</h1>
@endsection

@section('konten')
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        @foreach($data as $dt)
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Tanggal</p>
                <p>{{$dt->tanggal}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Pemesanan Bahan Baku</p>
                @if(isset($dt->jumlah_pemesanan))
                <p>{{$dt->jumlah_pemesanan}} kilogram</p>
                @else
                <p style="font-size:12px; color:grey;"><i>---Tidak ada data Pemesanan Bahan Baku---</i></p>
                @endif
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Produk Yang Dibuat</p>
                @if(isset($dt->jumlah_produk_dibuat))
                <p>{{$dt->jumlah_produk_dibuat}} Bks</p>
                @else
                <p style="font-size:12px; color:grey;"><i>---Tidak ada data Produk yang dibuat---</i></p>
                @endif
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Produk Yang Tersisa</p>
                @if(isset($dt->jumlah_produk_tersisa))
                <p>{{$dt->jumlah_produk_tersisa}} Bks</p>
                @else
                <p style="font-size:12px; color:grey;"><i>---Tidak ada data Produk yang tersisa---</i></p>
                @endif
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Jumlah Produk Yang Terjual</p>
                @if(isset($dt->jumlah_produk_terjual))
                <p>{{$dt->jumlah_produk_terjual}} Bks</p>
                @else
                <p style="font-size:12px; color:grey;"><i>---Tidak ada data Produk yang terjual---</i></p>
                @endif
            </div>
            <div>
                @if(Auth::user()->role_id == 2)
                <a href="/laporan/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full p-1"><i class="fa-solid fa-pen-to-square"></i></a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@if(Auth::user()->role_id == 2)
<a href="/laporan/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Laporan</a>
@endif
@endsection