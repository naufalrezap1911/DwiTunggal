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
    <h4>Data Tabel Keuangan</h4>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pengeluaran</th>
            <th>Pendapatan</th>
            <th>Keuntungan</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($data as $dt)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$dt->tanggal}}</td>
            <td>Rp. {{number_format($dt->pengeluaran)}}</td>
            <td>Rp. {{number_format($dt->pendapatan)}}</td>
            <td>Rp. {{number_format($dt->pendapatan - $dt->pengeluaran)}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2"><b>Total</b></td>
            <td>Rp. {{number_format($pengeluaran)}}</td>
            <td>Rp. {{number_format($pendapatan)}}</td>
            <td><p style="font-size:18px;"><b>Rp. {{number_format($total)}}</b></p></td>
        </tr>
    </table>

</body>

</html>