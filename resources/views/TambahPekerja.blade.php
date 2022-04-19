@extends('Index')

@section('Title')
    Data Pekerja
@endsection

@section('Main')
<form action="{{ route('AuthTambahPekerja') }}" method="POST">
    <div class="static-list">
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Nama</div>
            <div class="col-span-4"><input type="text" name="nama" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">No. Telp</div>
            <div class="col-span-4"><input type="text" name="noTelp" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Email</div>
            <div class="col-span-4"><input type="text" name="email" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Alamat</div>
            <div class="col-span-4"><input type="text" name="alamat" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Kata Sandi</div>
            <div class="col-span-4"><input type="text" name="password" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
    </div>
    <div class="absolute right-10 bottom-10">
        <button type="submit" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    </div>
</form>
@endsection