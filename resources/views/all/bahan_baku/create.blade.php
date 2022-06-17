@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Bahan Baku</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Tambah Bahan Baku</h1>
@endsection

@section('konten')
<form action="/bahan_baku/insert" method="post">
    @csrf
    <div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
        <div class="grid grid-cols-1 p-4 gap-2">
            <div class="grid grid-cols-5 p-2 gap-2">
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Tanggal</p>
                </div>
                <div class="col-span-4">
                    <input type="date" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="tanggal" value="{{ old('tanggal') }}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Nama</p>
                </div>
                <div class="col-span-4">
                    <select value="" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="nama_bahanbaku">
                        <option value="">---Silahkan pilih bahan baku---</option>
                        <option value="Singkong">Singkong</option>
                        <option value="Sukun">Sukun</option>
                        <option value="Pisang">Pisang</option>
                        <option value="Ketela">Ketela</option>
                        <option value="Talas">Talas</option>
                    </select>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Jumlah</p>
                </div>
                <div class="col-span-3">
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="jumlah_bahanbaku" value="{{ old('jumlah_bahanbaku') }}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Kg</p>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Harga</p>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Rp.</p>
                </div>
                <div class="col-span-2">
                    <input type="number" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="harga_bahanbaku" value="{{ old('harga_bahanbaku') }}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">/ Kg</p>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg">Simpan</button>
</form>
@endsection