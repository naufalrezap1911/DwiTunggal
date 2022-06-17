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
    <div class="fixed w-1/2 h-full top-0 left-0 bg-slate-50">
        <img src="{{asset('logo.png')}}" alt="Logo" class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2" width="80%">
    </div>
    <div class="fixed w-1/2 h-full top-0 right-0 bg-[#3b5998]">
        <form action="/post_login" method="post" class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-[60%]">
            @csrf
            <input type="text" placeholder="Email" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998] placeholder:text-slate-50 mb-4" name="email" required>
            <input type="password" placeholder="Password" class="bg-[#91a1c5] w-full px-4 py-2 rounded-lg border border-slate-50 font-bold text-[#3b5998] placeholder:text-slate-50 mb-12" name="password" required>
            <br>
            <button type="submit" class="w-full bg-slate-50 px-4 py-2 text-[#3b5998] font-bold rounded-lg shadow-lg">Masuk</button>
        </form>
    </div>
    @include('sweetalert::alert')
</body>
</html>