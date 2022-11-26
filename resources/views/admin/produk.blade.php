<x-layout.default>
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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>jumlah</th>
                    <th>harga</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data )
                <td>{{$data-> name}}</td>   
                <td>{{$data-> kategori->name}}</td>
                <td>{{$data-> jumlah}}</td>
                <td>{{$data-> harga}}</td>
                <td><img src={{ $data->image->path} } alt="ini gambar"></td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</x-layout.default>