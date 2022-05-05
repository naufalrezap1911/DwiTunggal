@extends('Index')

@section('Title')
Produk
@endsection


@section('Main')
<div class="static-list">
    <div class="row">
        <div class="left-1">

            <a href="{{ route('ProdukDibuat') }}" class="px-5 py-4 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50">Produk Dibuat</a>

        </div>
    </div>
    <div class="row" style="margin-top: 5vh;">
        <div class="left-1">

            <a href="{{ route('ProdukTerjual') }}" class="px-5 py-4 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50">Produk Terjual</a>

        </div>
    </div>

</div>

@endsection