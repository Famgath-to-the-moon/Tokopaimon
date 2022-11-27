<x-layout.default>
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height:100vh">
    <div style="width: 50%">
        <div class="card shadow" style="text-decoration:none">
        <div class="card-header d-flex align-items-center">
            <h1 style="font-weight:bolder" class="py-3 mb-0">Detail ransaksi</h1>
        </div>   
        <div class="card-body border-top">
            <p class="card-text" style="font-size: 18px">Nama barang : {{$dataProduk->name}}</p>
            <p class="card-text" style="font-size: 18px">Total pembayaran : {{$dataTrans->total_pembayaran}}</p>
            <p class="card-text" style="font-size: 18px">silahkan bayar menggunakan kode berikut : <span class="badge badge-primary">2193u1298 </span> </p>
        </div>
    </div>
</div>
</div>

</x-layout.default>