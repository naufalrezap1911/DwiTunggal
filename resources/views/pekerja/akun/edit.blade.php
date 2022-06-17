@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Edit Akun</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Profil</h1>
@endsection

@section('konten')

<form action="/pekerja/akun/update/{{$data->user_id}}" method="post">
    @csrf
    <div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
        <div class="grid grid-cols-1 p-4 gap-2">
            <div class="grid grid-cols-5 p-2 gap-2">
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Nama</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="name" value="{{$data->nama_pekerja}}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">No Telp</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="no_telp" value="{{$data->no_telp}}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Email</p>
                </div>
                <div class="col-span-4">
                    <input type="text" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="email" value="{{$data->email}}">
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Alamat</p>
                </div>
                <div class="col-span-4">
                    <textarea class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="alamat" rows="5">{{$data->alamat}}</textarea>
                </div>
                <div>
                    <p class="font-bold text-[#3b5998] my-2">Password</p>
                </div>
                <div class="col-span-4">
                    <input type="password" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998]" name="password">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg">Simpan</button>
</form>
@endsection