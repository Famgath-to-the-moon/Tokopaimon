<x-layout.admin>
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">DATA PRODUK</h6>
    <a href="#" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Barang</span>
    </a>
</div>
<div class="card-body mx-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>jumlah</th>
                    <th>harga</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data )
                <tr>
                <td>{{$data-> name}}</td>   
                <td>{{$data-> kategori->name}}</td>
                <td>{{$data-> jumlah}}</td>
                <td>{{$data-> harga}}</td>
                <td><img src="{{ asset($data->image->path) }}" alt="ini gambar" width="50" height="70"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</x-layout.admin>