@extends('Index')

@section('Title')
    Profil
@endsection

@section('Main')
<div class="static-list">
    <ul>
        <li>
            <div class="grid grid-cols-1">
                <div><span>Nama : </span></div>
                <div>{{ $Profil->nama }}</div>
            </div>
        </li>
    </ul>
    <ul>
        <li>
            <div class="grid grid-cols-5 gap-4">
                <div><span>Email : </span></div>
                <div class="col-span-4">{{ $Profil->email }}</div>
                <div><span>Alamat : </span></div>
                <div class="col-span-4">{{ $Profil->alamat }}</div>
                <div><span>No. Telp : </span></div>
                <div class="col-span-4">{{ $Profil->no_telp }}</div>
            </div>
        </li>
    </ul>
</div>
<div class="absolute right-10 bottom-10">
    <a href="{{ route('EditProfil') }}" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-pencil"></i> Edit</a>
</div>
@endsection