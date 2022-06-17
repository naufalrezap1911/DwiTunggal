@extends('layouts.main')

@section('sidebar_title')
<h1 class="mb-2">Grafik</h1>
@endsection

@section('konten_title')
<h1 class="text-slate-50 text-xl mt-4 ml-4">Grafik Keuangan</h1>
@endsection

@section('konten')
<div class="w-[90%] h-[80%] bg-[#6c82b2] absolute left-1/2 -translate-x-1/2 overflow-y-scroll">
    <link rel="stylesheet" href="css/grafik.css">
    <div class="row-form">
        <div class="col-lg-12">
            <div class="card-body">
                <div id="grafik"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pendapatan = <?php echo json_encode($total_pendapatan) ?>;
    var pengeluaran = <?php echo json_encode($total_pengeluaran) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik', {
        title: {
            text: 'Grafik Keuangan'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Pendapatan Keuangan perBulan'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Nominal Pendapatan',
            data: pendapatan
        }, {
            name: 'Nominal Pengeluaran',
            data: pengeluaran
        }]
    });
</script>
@endsection