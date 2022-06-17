@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Laporan</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Tambah Data Laporan</h1>
@endsection

@section('konten')
<form action="/laporan/update/{{$data->id}}" method="post">
    @csrf
    <div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
        <div class="grid grid-cols-1 p-4 gap-2">
            <div class="grid grid-cols-5 p-2 gap-2">
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Tanggal</p>
                </div>
                <div class="col-span-4">
                    <input type="date" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="tanggal" value="{{$data->tanggal}}" required>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-0">Jumlah Pemesanan Bahan Baku</p>
                </div>
                <div class="col-span-3">
                    @if($data->jumlah_pemesanan == null)
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_pemesanan" value="{{$data->jumlah_pemesanan}}" disabled>
                    @else
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_pemesanan" value="{{$data->jumlah_pemesanan}}" required>
                    @endif
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Kg</p>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-0">Jumlah Produk Yang Dibuat</p>
                </div>
                <div class="col-span-3">
                    @if($data->jumlah_produk_dibuat == null)
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_dibuat" value="{{$data->jumlah_produk_dibuat}}" disabled>
                    @else
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_dibuat" value="{{$data->jumlah_produk_dibuat}}" required>
                    @endif
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Bungkus</p>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-0">Jumlah Produk Yang Tersisa</p>
                </div>
                <div class="col-span-3">
                    @if($data->jumlah_produk_teriusa == null)
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_tersisa" value="{{$data->jumlah_produk_tersisa}}" disabled>
                    @else
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_tersisa" value="{{$data->jumlah_produk_tersisa}}" required>
                    @endif
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Bungkus</p>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-0">Jumlah Produk Yang Terjual</p>
                </div>
                <div class="col-span-3">
                    @if($data->jumlah_produk_terjual == null)
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_terjual" value="{{$data->jumlah_produk_terjual}}" disabled>
                    @else
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_produk_terjual" value="{{$data->jumlah_produk_terjual}}" required>
                    @endif
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Bungkus</p>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg">Simpan</button>
</form>
@endsection