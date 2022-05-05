@extends('Index')

@section('Title')
Produk Terjual
@endsection

@section('Main')
<form action="{{ route('AuthTambahProdukTerjual') }}" method="POST">
    <div class="static-list">
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Tanggal</div>
            <div class="col-span-4"><input type="date" name="tanggal" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Nama</div>
            <div class="col-span-4">
                <select name="nama" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required>
                    <option value="Talas">Talas</option>
                    <option value="Pisang">Pisang</option>
                    <option value="Singkong">Singkong</option>
                    <option value="Ketela">Ketela</option>
                    <option value="Sukun">Sukun</option>
                </select>

                <!-- <input type="text" name="nama" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required> -->
            </div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Jumlah</div>
            <div class="col-span-3"><input type="number" name="jumlah" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
            <div class="px-5 py-3 font-medium text-[#b2bcd5] text-right">Bks</div>
        </div>
        <div class="grid grid-cols-5 gap-4 mb-5">
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Harga</div>
            <div class="px-5 py-3 font-medium text-[#b2bcd5]">Rp.</div>
            <div class="col-span-2"><input type="number" name="harga" class="w-full px-5 py-3 rounded-xl bg-[#91a1c5] text-[#1f3e7e] font-medium outline outline-2 outline-[#a8b4d1]" required></div>
            <div class="px-5 py-3 font-medium text-[#b2bcd5] text-right">/ Bks</div>
        </div>
    </div>
    <div class="absolute right-10 bottom-10">
        <button type="submit" class="px-3 py-2 rounded-md shadow-lg font-bold text-[#2b4985] bg-slate-50 active:ring-4 active:ring-slate-50"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    </div>
</form>
@endsection