@extends('Index')

<?php
function Tanggal($Tanggal) {
    return date('d/M/Y', $Tanggal);
}
function Berat($Angka) {
    $Angka = floatval($Angka);
    if (fmod($Angka, 1) == 0) {
        return number_format($Angka,0,',','.').' Kg';
    } else {
        return number_format($Angka,1,',','.').' Kg';
    }
}
function Rupiah($Angka) {
    $Angka = floatval($Angka);
    if (fmod($Angka, 1) == 0) {
        return 'Rp. '.number_format($Angka,0,',','.').',-';
    } else {
        return 'Rp. '.number_format($Angka,1,',','.').',-';
    }
}
?>

@section('Title')
    Data Bahan Baku
@endsection

@section('Main')
<div class="static-list">
    @foreach ($BahanBaku as $dt)    
    <ul>
        <li>
            <div class="grid grid-cols-5 gap-4">
                <div class="bg-[#eff1f6]"><span>Tanggal</span><br>{{ Tanggal($dt->tanggal) }}</div>
                <div class="bg-[#eff1f6]"><span>Nama</span><br>{{ $dt->nama }}</div>
                <div class="bg-[#eff1f6]"><span>Jumlah</span><br>{{ Berat($dt->jumlah) }}</div>
                <div class="bg-[#eff1f6]"><span>Harga</span><br>{{ Rupiah($dt->harga) }}</div>
                <div class="bg-[#eff1f6]">
                    <span>Total</span><br>{{ Rupiah($dt->jumlah*$dt->harga) }}
                    @if (Session::get('Level') == 'Pekerja')
                    <a href="{{ url('EditBahanBaku/'.$dt->id_bahanbaku) }}" class="float-right"><i class="fa-solid fa-pencil"></i></a>
                    @endif
                </div>
            </div>
        </li>
    </ul>
    @endforeach
</div>
<div class="absolute right-10 bottom-10">
    @if (Session::get('Level') == 'Pekerja')
    <a href="{{ route('TambahBahanBaku') }}" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-plus"></i> Bahan Baku</a>
    @endif
</div>
@endsection