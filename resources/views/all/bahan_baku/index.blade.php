@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Bahan Baku</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Data Bahan Baku</h1>
@endsection

@section('konten')
<div class="grid  w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    @foreach($data as $dt)
    <a href="/bahan_baku/{{$dt->nama_bahanbaku}}" class="bg-[#8b9dc3] text-white text-center px-4 py-1 font-bold rounded-lg mb-2"><br>{{$dt->nama_bahanbaku}}</a>
    @endforeach
</div>
@if(Auth::user()->role_id == 2)
<a href="/bahan_baku/create" class="absolute bottom-4 right-4 bg-slate-50 text-[#3b5998] px-4 py-1 rounded-lg"><i class="fa-solid fa-plus"></i> Bahan Baku</a>
@endif
@endsection