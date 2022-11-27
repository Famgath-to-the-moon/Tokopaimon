<x-layout.admin>
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">DATA PRODUK</h6>
    <button href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahProduk">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Barang</span>
    </button>
</div>
<div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="labelModalTambahProduk" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelModalTambahProduk">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="">
              @csrf
              <div class="form-group">
                <label for="namaBarang">Nama Barang</label>
                <input type="text" name="namaBarang" class="form-control" id="namaBarang" placeholder="Masukkan nama barang" required>
              </div>
              <div class="form-group">
                <label for="stokAwal">Stok Awal</label>
                <input type="number" name="stokAwal" min="1" class="form-control" id="stokAwal" required>
              </div>
              <div class="form-group">
                <label for="hargaBarang">Harga</label>
                <input type="number" name="hargaBarang" min="1" class="form-control" id="hargaBarang" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi Tambah Barang</button>
              </div>
          </form>
        </div>
      </div>
    </div>
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