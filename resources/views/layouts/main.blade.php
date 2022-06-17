<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DwiTunggal</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/01ab9e1577.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {
            font-family: 'Roboto', sans-serif;
        }
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
        ::-webkit-scrollbar {
            @apply w-3 h-3;
        }
        ::-webkit-scrollbar-track {     
            @apply bg-slate-50 rounded-full; 
        }
        ::-webkit-scrollbar-thumb {
            @apply bg-[#3b5998] rounded-full;
        }
    </style>
</head>

<body>
    <div id="grid1">
        <img src="{{asset('logo.png')}}" alt="Logo" width="50%" class="ml-2">
    </div>
    <div id="grid3">
        <div class="px-2">
            @yield('sidebar_title')
            <ul class="px-2">
                @if(Auth::user()->role_id == 1)
                <a href="/pemilik/dashboard">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Profile</li>
                </a>
                @endif
                @if(Auth::user()->role_id == 2)
                <a href="/pekerja/dashboard">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Profile</li>
                </a>
                @endif
                @if(Auth::user()->role_id == 1)
                <a href="/pekerja">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Pekerja</li>
                </a>
                @endif
                <a href="/bahan_baku">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Bahan Baku</li>
                </a>
                <a href="/produk">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Produk</li>
                </a>
                @if(Auth::user()->role_id == 1)
                <a href="/keuangan">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Keuangan</li>
                </a>
                @endif
                <a href="/laporan">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Laporan</li>
                </a>
                <a href="/grafik">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-3">Grafik</li>
                </a>
                <a href="/download">
                    <li class="bg-[#8b9dc3] px-4 py-1 font-bold rounded-lg mb-20">Download</li>
                </a>
                <a href="/logout">
                    <li class="bg-[#ef1919] text-white text-center px-4 py-1 font-bold rounded-lg mb-2">Logout</li>
                </a>
            </ul>
        </div>
    </div>
    <div id="grid2">
        @yield('konten_title')
    </div>
    <div id="grid4">
        @yield('konten')
    </div>
    @include('sweetalert::alert')
</body>

</html>