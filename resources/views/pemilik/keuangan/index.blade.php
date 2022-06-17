@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Keuangan</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Keuangan</h1>
@endsection

@section('konten')
<div class="grid grid-cols-1 p-1">
    <div class="rounded-lg grid grid-rows-1 grid-flow-col p-4">
        <div class="bg-[#eff1f6] rounded-lg p-2 text-right">
            <p class="font-bold text-[#3b5998]" style="font-size:24px;">Total Keuntungan</p>
            <p style="font-size:24px;"><b>Rp.{{number_format($keuntungan)}}</b></p>
        </div>
    </div>
</div>
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <div class="grid grid-cols-1 p-4 gap-2">
        @foreach($data as $dt)
        <div class="bg-slate-50 rounded-lg grid grid-rows-1 grid-flow-col p-4 gap-2">
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Tanggal</p>
                <p>{{$dt->tanggal}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Pengeluaran</p>
                <p>Rp. {{number_format($dt->pengeluaran)}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Pendapatan</p>
                <p>Rp. {{number_format($dt->pendapatan)}}</p>
            </div>
            <div class="bg-[#eff1f6] rounded-lg p-2">
                <p class="font-bold text-[#3b5998]">Keuntungan</p>
                <p>Rp. {{number_format($dt->pendapatan - $dt->pengeluaran)}}</p>
            </div>
            <div>
                <a href="/keuangan/edit/{{$dt->id}}" class="bg-[#ef1919] text-slate-50 rounded-full p-1"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<a href="/keuangan/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Keuangan</a>
@endsection