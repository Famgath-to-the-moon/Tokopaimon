<x-layout.admin>
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">DATA TRANSAKSI</h6>
    <a href="#" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-print"></i>
        </span>
        <span class="text">Cetak Laporan</span>
    </a>
</div>
<div class="card-body mx-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <!-- <th>No</th> -->
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data )
                    
                <tr>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->produk->name}}</td>
                    <td>{{$data->produk->harga}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->total_pembayaran}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</x-layout.admin>
