@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Pekerja</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Tambah Data Pekerja</h1>
@endsection

@section('konten')
<form action="/pekerja/insert" method="post">
    @csrf
    <div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
        <div class="grid grid-cols-1 p-4 gap-2">
            <div class="grid grid-cols-5 p-2 gap-2">
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Nama</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="name" value="{{ old('name') }}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">No Telp</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="no_telp" value="{{ old('no_telp') }}">
                    <small class="form-text text-muted">No Telp minimal terdiri dari 9-13 karakter.</small>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Alamat</p>
                </div>
                <div class="col-span-4">
                    <textarea name="alamat" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" rows="5">{{ old('alamat') }}</textarea>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Email</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="email" value="{{ old('email') }}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Password</p>
                </div>
                <div class="col-span-4">
                    <input type="password" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="password">
                    <small class="form-text text-muted">Password minimal terdiri dari 8 karakter.</small>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg button">Simpan</button>
</form>
@endsection
