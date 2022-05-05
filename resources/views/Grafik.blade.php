@extends('Index')

@section('Title')
Grafik
@endsection

<?php
define("HOST", "localhost"); //alamat/host database
define("USER", "root"); // username dari data base
define("PASS", ""); // password database
define("DB", "coba"); //nama database

$conn = new mysqli(HOST, USER, PASS, DB); //konektor


?>

@section('Main')
<div class="static-list">
    <?php
    $a = "a";
    $b = "b";
    $c = "c";
    $d = "d";
    if ($a == "a") {
        $selectdatasc = mysqli_query($conn, "SELECT * FROM bahanbaku ORDER BY tanggal ASC");

        $jumlah_baku = array();
        $tanggal_baku = array();

        while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
            $jumlah_baku[] = $getdatasc['jumlah'];
            $tanggal_baku[] = intval(date('d-m-Y', $getdatasc['tanggal']));
        }
        $ncode = json_encode($jumlah_baku);
        $ncode_tgl = json_encode($tanggal_baku);
        echo "
            <ul style='background-color: #2a5470;'>
                <li>
                    <script src='https://code.highcharts.com/highcharts.js'></script>
                    <script src='https://code.highcharts.com/modules/series-label.js'></script>
                    <script src='https://code.highcharts.com/modules/exporting.js'></script>
                    <script src='https://code.highcharts.com/modules/export-data.js'></script>
                    <script src='https://code.highcharts.com/modules/accessibility.js'></script>

                    <figure class='highcharts-figure'>
                        <div id='container'></div>
                    </figure>

                    <script type='text/javascript'>
                        Highcharts.chart('container', {

                            title: {
                                text: 'Data bahan Baku'
                            },

                            subtitle: {
                                text: 'Dwi Tunggal'
                            },

                            yAxis: {
                                title: {
                                    text: 'Grafik Bahan Baku'
                                }
                            },

                            xAxis: {
                                categories: $ncode

                            },

                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },

                                }
                            },

                            series: [{
                                name: 'Tanggal',
                                data: $ncode_tgl
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });
                    </script>
                </li>
            </ul>
        ";
    }
    if ($b == "b") {
        $selectdatasc = mysqli_query($conn, "SELECT * FROM produkdibuat ORDER BY tanggal ASC");

        $jumlah_butuh = array();
        $tanggal_butuh = array();

        while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
            $jumlah_butuh[] = $getdatasc['jumlah_dibutuhkan'];
            $tanggal_butuh[] = intval(date('d-m-Y', $getdatasc['tanggal']));
        }
        $ncode = json_encode($jumlah_butuh);
        $ncode_tgl = json_encode($tanggal_butuh);
        echo "
            <ul style='background-color: #2a5470;'>
                <li>
                    <script src='https://code.highcharts.com/highcharts.js'></script>
                    <script src='https://code.highcharts.com/modules/series-label.js'></script>
                    <script src='https://code.highcharts.com/modules/exporting.js'></script>
                    <script src='https://code.highcharts.com/modules/export-data.js'></script>
                    <script src='https://code.highcharts.com/modules/accessibility.js'></script>

                    <figure class='highcharts-figure'>
                        <div id='containerb'></div>
                    </figure>


                    <script type='text/javascript'>
                        Highcharts.chart('containerb', {

                            title: {
                                text: 'Data Produk Dibuat'
                            },

                            subtitle: {
                                text: 'Dwi Tunggal'
                            },

                            yAxis: {
                                title: {
                                    text: 'Grafik Produk Dibuat'
                                }
                            },

                            xAxis: {
                                categories: $ncode

                            },

                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },

                                }
                            },

                            series: [{
                                name: 'Tanggal',
                                data: $ncode_tgl
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });
                    </script>
                </li>
            </ul>
        ";
    }

    if ($c == "c") {
        $selectdatasc = mysqli_query($conn, "SELECT * FROM produkterjual ORDER BY tanggal ASC");

        $jumlah_jual = array();
        $tanggal_jual = array();

        while ($getdatasc = mysqli_fetch_array($selectdatasc)) {
            $jumlah_jual[] = $getdatasc['jumlah_terjual'];
            $tanggal_jual[] = intval(date('d-m-Y', $getdatasc['tanggal']));
        }
        $ncode = json_encode($jumlah_jual);
        $ncode_tgl = json_encode($tanggal_jual);
        echo "
            <ul style='background-color: #2a5470;'>
                <li>
                    <script src='https://code.highcharts.com/highcharts.js'></script>
                    <script src='https://code.highcharts.com/modules/series-label.js'></script>
                    <script src='https://code.highcharts.com/modules/exporting.js'></script>
                    <script src='https://code.highcharts.com/modules/export-data.js'></script>
                    <script src='https://code.highcharts.com/modules/accessibility.js'></script>

                    <figure class='highcharts-figure'>
                        <div id='containerc'></div>
                    </figure>

                    <script type='text/javascript'>
                        Highcharts.chart('containerc', {

                            title: {
                                text: 'Data Produk Terjual'
                            },

                            subtitle: {
                                text: 'Dwi Tunggal'
                            },

                            yAxis: {
                                title: {
                                    text: 'Grafik Produk Terjual'
                                }
                            },

                            xAxis: {
                                categories: $ncode

                            },

                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },

                                }
                            },

                            series: [{
                                name: 'Tanggal',
                                data: $ncode_tgl
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });
                    </script>
                </li>
            </ul>
        ";
    }
    ?>

</div>
@endsection