@extends('Index')

@section('Title')
    Data Pekerja
@endsection

@section('Main')
<div class="static-list">
    @foreach ($Pekerja as $dt)    
    <ul>
        <li>
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-[#eff1f6]"><span>Nama</span><br>{{ $dt->nama }}</div>
                <div class="bg-[#eff1f6]"><span>Alamat</span><br>{{ $dt->alamat }}</div>
                <div class="bg-[#eff1f6]"><span>No. Telp</span><br>{{ $dt->no_telp }}</div>
                <div class="bg-[#eff1f6]"><span>Email</span><br>{{ $dt->email }}</div>
            </div>
        </li>
    </ul>
    @endforeach
</div>
<div class="absolute right-10 bottom-10">
    <a href="{{ route('TambahPekerja') }}" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-plus"></i> Pekerja</a>
</div>
@endsection