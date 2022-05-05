<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Data Dwi Tunggal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/01ab9e1577.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        * {
            cursor: url(https://cur.cursors-4u.net/cursors/cur-2/cur116.cur), auto !important;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
        /* #sidebar:checked ~ div#grid1 {
            @apply -translate-x-60;
        }
        #sidebar:checked ~ div#grid2 {
            @apply w-full -translate-x-60;
        }
        #sidebar:checked ~ div#grid3 {
            @apply -translate-x-60;
        }
        #sidebar:checked ~ div#grid4 {
            @apply w-full -translate-x-60;
        } */
        #grid1 {
            width: 15rem;
            height: 4rem;
            @apply fixed transition-all duration-1000 bg-slate-50;
        }
        #grid2 {
            width: calc(100% - 15rem);
            height: 4rem;
            left: 15rem;
            @apply fixed transition-all duration-1000 bg-[#3b5998];
        }
        #grid3 {
            width: 15rem;
            height: calc(100% - 4rem);
            top: 4rem;
            @apply fixed transition-all duration-1000 bg-slate-50;
        }
        #grid4 {
            width: calc(100% - 15rem);
            height: calc(100% - 4rem);
            left: 15rem;
            top: 4rem;
            @apply fixed transition-all duration-1000 bg-[#3b5998];
        }
        #grid2 .button-navbar {
            @apply px-3 py-2 rounded-md shadow-lg font-bold bg-[#8b9dc3] active:ring-4 active:ring-[#8b9dc3];
        }
        #grid3 .btn-blue {
            @apply mx-5 my-3 px-3 py-2 rounded-md shadow-lg font-bold bg-[#8b9dc3] active:ring-4 active:ring-[#8b9dc3];
        }
        #grid3 .btn-red {
            @apply mx-5 my-3 px-3 py-2 rounded-md shadow-lg font-bold text-slate-50 bg-[#ef1919] active:ring-4 active:ring-[#ef1919];
        }
        #grid4 h1 {
            @apply m-3 text-2xl text-slate-50;
        }
        #grid4 .static-list {
            @apply absolute left-4 top-16 max-h-[75%] w-[95%] bg-[#6c82b2] p-5 overflow-y-scroll;
        }
        #grid4 .static-list ul {
            @apply mb-3 py-3 w-full bg-slate-50 rounded-lg;
        }
        #grid4 .static-list li {
            @apply mx-3 my-1;
        }
        #grid4 .static-list li div div {
            @apply px-3 py-2 font-medium rounded-lg;
        }
        #grid4 .static-list li div div span {
            @apply text-[#214080];
        }
        ::-webkit-scrollbar {
            @apply w-3 h-3;
        }
        ::-webkit-scrollbar-track {     
            @apply bg-transparent; 
        }
        ::-webkit-scrollbar-thumb {
            @apply bg-[#3b5998];
        }
    </style>
</head>
@if (Session::has('alertSuccess'))
<body onpageshow="alertSuccess()">
@elseif (Session::has('alertInfo'))
<body onpageshow="alertInfo()">
@elseif (Session::has('alertError'))
<body onpageshow="alertError()">
@else
<body>
@endif
    {{-- <input type="checkbox" id="sidebar" class="hidden"> --}}
    <div id="grid1">
        <div>
            <img src="{{ asset('Logo.png') }}" alt="" class="h-[4rem] ml-2">
        </div>
    </div>
    <div id="grid2">
        {{-- <label for="sidebar" class="button-navbar float-left ml-4 mt-3"><i class="fa-solid fa-list"></i> Menu</label> --}}
    </div>
    <div id="grid3">
        <ul class="mt-5">
            <label class="ml-3">Dashboard</label>
            <a href="{{ route('Profil') }}"><li class="btn-blue">Profil</li></a>
            @if (Session::get('Level') == 'Pemilik')
            <a href="{{ route('DataPekerja') }}"><li class="btn-blue">Pekerja</li></a>
            @endif
            <a href="{{ route('DataBahanBaku') }}"><li class="btn-blue">Bahan Baku</li></a>
            <a href="{{ route('Produk') }}"><li class="btn-blue">Produk</li></a>
            <a href="{{ route('Grafik') }}"><li class="btn-blue">Grafik</li></a>
        </ul>
        <ul class="absolute bottom-0 w-full">
            <a href="{{ route('Logout') }}"><li class="btn-red text-center">Logout</li></a>
        </ul>
    </div>
    <div id="grid4">
        <h1>@yield('Title')</h1>
        @yield('Main')
    </div>
    @php
    echo "
    <script>
        function alertSuccess() {
            Swal.fire({
                width: 350,
                icon: 'success',
                title: 'Sukses',
                text: '".Session::get('alertSuccess')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertInfo() {
            Swal.fire({
                width: 350,
                icon: 'info',
                title: 'Info',
                text: '".Session::get('alertInfo')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertError() {
            Swal.fire({
                width: 350,
                icon: 'error',
                title: 'Gagal',
                text: '".Session::get('alertError')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
    </script>";
    @endphp
</body>
</html>