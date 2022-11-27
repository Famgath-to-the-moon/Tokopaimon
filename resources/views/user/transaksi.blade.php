<x-layout.default>
<div class="d-flex flex-column justify-content-center" style="min-height:100vh">
<div class="card shadow" style="text-decoration:none" >
    <div class="card-header d-flex align-items-center">
        <h1 style="font-weight:bolder">transaksi</h1>
    </div>   
    <div class="card-body border-top">
        <H1>BANTU SLACING</H1>
        <H1>ini get datanya, methodnya dah di kodingan nanti tinggal diterapin di slacingan</H1>
        nama barang {{$dataProduk->name}}
        <br>
        total pembayaran {{$dataTrans->total_pembayaran}}
        <br>
        silahkan bayar di rekening bri 2193u1298
    </div>
</div>
</div>

</x-layout.default>