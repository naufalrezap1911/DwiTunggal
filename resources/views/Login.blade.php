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
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        * {
            cursor: url(https://cur.cursors-4u.net/cursors/cur-2/cur116.cur), auto !important;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
        #grid1 {
            @apply fixed w-[50%] h-full bg-slate-50 left-0;
        }
        #grid1 h1 {
            font-family: 'Roboto Slab', serif;
        }
        #grid2 {
            @apply fixed w-[50%] h-full bg-[#3b5998] right-0;
        }
    </style>
</head>
<body>
    <div id="grid1">
        <div class="grid grid-cols-1 place-content-center h-full mx-24">
            <div>
                <img src="{{ asset('Logo.png') }}" alt="">
            </div>
        </div>
    </div>
    <div id="grid2">
        <form action="{{ route('AuthLogin') }}" method="POST" class="h-full">
            <div class="grid grid-cols-1 place-content-center h-full mx-24">
                <div class="mb-8">
                    <input type="text" placeholder="Username" name="email" class="w-full px-5 py-3 rounded-xl bg-[#6c82b2] text-[#1f3e7e] font-medium outline outline-2 outline-[#91a1c6] placeholder:text-[#91a1c6]">
                </div>
                <div class="mb-16">
                    <input type="password" placeholder="Password" name="password" class="w-full px-5 py-3 rounded-xl bg-[#6c82b2] text-[#1f3e7e] font-medium outline outline-2 outline-[#91a1c6] placeholder:text-[#91a1c6]">
                </div>
                <div>
                    <button type="submit" class="w-full px-5 py-3 rounded-xl bg-slate-50 text-[#3b5998] font-bold">Masuk</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>