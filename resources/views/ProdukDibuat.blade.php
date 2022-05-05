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
function Bungkus($Angka) {
    $Angka = floatval($Angka);
    if (fmod($Angka, 1) == 0) {
        return number_format($Angka,0,',','.').' Bks';
    } else {
        return number_format($Angka,1,',','.').' Bks';
    }
}
define("HOST", "localhost"); //alamat/host database
define("USER", "root"); // username dari data base
define("PASS", ""); // password database
define("DB", "coba"); //nama database

$conn = new mysqli(HOST, USER, PASS, DB); //konektor

?>

@section('Title')
    Produk Dibuat
@endsection

@section('Main')
<div class="static-list">
    <ul>
        <li>
            <div class="grid grid-cols-5 gap-4">
                <?php
                $b = "Talas";
                $c = "Pisang";
                $d = "Singkong";
                $e = "Ketela";
                $f = "Sukun";
                if ($b == "Talas") {
                    $selectdatasc = mysqli_query($conn, "SELECT SUM(jumlah_produk) AS total FROM produkdibuat WHERE nama='Talas'");
                    while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
                        echo "
                        
                        <div class='bg-[#eff1f6]'>
                            <span style = 'color : #0053FF'>Total Talas</span><br>
                            <p>$getdatasc[total] Bks</p>
                        </div>
                    
                    
                            
				";
                    }
                }
                if ($c == "Pisang") {
                    $selectdatasc = mysqli_query($conn, "SELECT SUM(jumlah_produk) AS total FROM produkdibuat WHERE nama='Pisang'");
                    while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
                        echo "
                        
                    
                        <div class='bg-[#eff1f6]'>
                            <span style = 'color : #0053FF'>Total Pisang</span><br>
                            <p>$getdatasc[total] Bks</p>
                        </div>
                    
                            
				";
                    }
                }
                if ($d == "Singkong") {
                    $selectdatasc = mysqli_query($conn, "SELECT SUM(jumlah_produk) AS total FROM produkdibuat WHERE nama='Singkong'");
                    while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
                        echo "
                        
                    
                        <div class='bg-[#eff1f6]'>
                            <span style = 'color : #0053FF'>Total Singkong</span><br>
                            <p>$getdatasc[total] Bks</p>
                        </div>
                    
                           
				";
                    }
                }
                if ($e == "Ketela") {
                    $selectdatasc = mysqli_query($conn, "SELECT SUM(jumlah_produk) AS total FROM produkdibuat WHERE nama='Ketela'");
                    while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
                        echo "
            
                
                        <div class='bg-[#eff1f6]'>
                            <span style = 'color : #0053FF'>Total Ketela</span><br>
                            <p>$getdatasc[total] Bks</p>
                        </div>
                   
                
                    
                            
				";
                    }
                }
                if ($f == "Sukun") {
                    $selectdatasc = mysqli_query($conn, "SELECT SUM(jumlah_produk) AS total FROM produkdibuat WHERE nama='Sukun'");
                    while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
                        echo "
                
                
                        <div class='bg-[#eff1f6]'>
                            <span style = 'color : #0053FF'>Total Sukun</span><br>
                            <p>$getdatasc[total] Bks</p>
                        </div>
                          
				";
                    }
                }
                ?>
            </div>
        </li>
    </ul>
</div>

<div class="static-list" style="margin-top: 17vh;">
    @foreach ($Dibuat as $dt)    
    <ul>
        <li>
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-[#eff1f6]"><span>Tanggal</span><br>{{ Tanggal($dt->tanggal) }}</div>
                <div class="bg-[#eff1f6]"><span>Nama</span><br>{{ $dt->nama }}</div>
                <div class="bg-[#eff1f6]"><span>Jumlah Bahan Baku</span><br>{{ Berat($dt->jumlah_dibutuhkan) }}</div>
                <div class="bg-[#eff1f6]"><span>Jumlah Produk</span><br>{{ Bungkus($dt->jumlah_produk) }}
                    @if (Session::get('Level') == 'Pekerja')
                    <a href="{{ url('EditProdukDibuat/'.$dt->id_produkdibuat) }}" class="float-right"><i class="fa-solid fa-pencil"></i></a>
                    @endif
                </div>
            </div>
        </li>
    </ul>
    @endforeach
</div>
<div class="absolute right-10 bottom-10">
    @if (Session::get('Level') == 'Pekerja')
    <a href="{{ route('TambahProdukDibuat') }}" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-plus"></i> Produksi</a>
    @endif
</div>
@endsection