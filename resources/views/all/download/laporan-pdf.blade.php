<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div align="center">
        <h1>DwiTunggal</h1>
    </div>
    <h4>Data Tabel Laporan</h4>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Bahan Baku</th>
            <th>Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Bahan</th>
            <th>Jumlah Produksi</th>
            <th>Jumlah Penjualan</th>
            <th>Sisa Produk</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($data as $dt)
        <tr>
            <td>{{$no++}}</td>
            @if(isset($dt->nama_bahanbaku))
            <td>{{$dt->nama_bahanbaku}}</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Bahan Baku yang tersedia---</i></p></td>
            @endif
            @if(isset($dt->nama_produk))
            <td>{{$dt->nama_produk}}</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Produk yang tersedia---</i></p></td>
            @endif
            <td>{{$dt->tanggal}}</td>
            @if(isset($dt->jumlah_pemesanan))
            <td>{{$dt->jumlah_pemesanan}} kg</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Pemesanan Bahan yang tersedia---</i></p></td>
            @endif
            @if(isset($dt->jumlah_produk_dibuat))
            <td>{{$dt->jumlah_produk_dibuat}} bks</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Produksi yang tersedia---</i></p></td>
            @endif
            @if(isset($dt->jumlah_produk_terjual))
            <td>{{$dt->jumlah_produk_terjual}} bks</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Penjualan yang tersedia---</i></p></td>
            @endif
            @if(isset($dt->jumlah_produk_tersisa))
            <td>{{$dt->jumlah_produk_tersisa}} bks</td>
            @else
            <td class="text-center"><p style="font-size:10px;"><i>---Tidak ada data Sisa Produk yang tersedia---</i></p></td>
            @endif
        </tr>
        @endforeach
    </table>

</body>

</html>