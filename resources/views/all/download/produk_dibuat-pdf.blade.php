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
    <h4>Data Tabel Produk Dibuat</h4>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Bahan Baku</th>
            <th>Produk</th>
            <th>Jumlah Bahan</th>
            <th>Jumlah Produksi</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($data as $dt)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$dt->tanggal}}</td>
            <td>{{$dt->nama_bahanbaku}}</td>
            <td>{{$dt->nama_produk}}</td>
            <td>{{$dt->jumlah_bahanbaku}} kg</td>
            <td>{{$dt->jumlah_produk_dibuat}} bks</td>
        </tr>
        @endforeach
    </table>

</body>

</html>