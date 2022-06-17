@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Bahan Baku</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Detail Bahan Baku</h1>
@endsection

@section('konten')
<a href="/bahan_baku" class="absolute top-4 left-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
<br><br><br>
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        <div class="bg-slate-50 rounded-lg grid grid-cols-1 p-4 gap-1">
            <p class="font-bold text-[#3b5998]">Nama Bahan Baku :</p>
            <p>{{$item->nama_bahanbaku}}</p>
            <p class="font-bold text-[#3b5998]">Total Persediaan :</p>
            <p>{{$persediaan}} kilogram</p>
        </div>
    </div>
    <div class="grid grid-rows-1 grid-flow-col w-[50%] h-[40%] bg-[#6c82b2] ">
        @foreach($data as $dt)
        <div class="grid grid-cols-1 p-4 gap-2 w-72">
            <div class="bg-slate-50 rounded-lg grid grid-cols-1 p-4 gap-2">
                <div class="bg-[#eff1f6] rounded-lg p-2 relative">
                    <p><span class="font-bold text-[#3b5998]">Tanggal</span> {{$dt->tanggal}}</p>
                    <p><span class="font-bold text-[#3b5998]">Jumlah</span> {{$dt->jumlah_bahanbaku}} kilogram</p>
                    <p><span class="font-bold text-[#3b5998]">Harga</span> Rp. {{number_format($dt->harga_bahanbaku)}}</p>
                    <p><span class="font-bold text-[#3b5998]">Total</span> Rp. {{number_format($dt->harga_bahanbaku*$dt->jumlah_bahanbaku)}}</p>
                    @if(Auth::user()->role_id == 2)
                    <a href="/bahanbaku/{{$dt->nama_bahanbaku}}/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full px-2 py-1 absolute top-1 right-1"><i class="fa-solid fa-pen-to-square"></i></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection