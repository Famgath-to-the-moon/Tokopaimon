<x-layout.admin>
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">DATA PRODUK</h6>
    <button href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahProduk">
        <!-- <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span> -->
        <i class="fas fa-plus"></i>
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
          <form method="post" enctype="multipart/form-data" action="{{route('add-produk-admin')}}">
              @csrf
              <div class="form-group">
                <label for="namaBarang">Nama Barang</label>
                <input type="text" name="name" class="form-control" id="namaBarang" placeholder="Masukkan nama barang" required>
              </div>
              <div class="form-group">
                <label for="desc">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="desc" placeholder="Masukkan deskripsi" required>
              </div>
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="path" class="input-form" id="gambar" required>
              </div>
              <div class="form-group">
                <label for="stokAwal">Stok Awal</label>
                <input type="number" name="jumlah" min="1" class="form-control" id="stokAwal" required>
              </div>
              <div class="input-group mb-3">
                <select name="kategori_id" class="custom-select" id="inputGroupSelect02">
                  <option selected>Choose...</option>
                  @foreach ($kategoris as $kategori )
                  <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
              </div>
              <div class="form-group">
                <label for="hargaBarang">Harga</label>
                <input type="number" name="harga" min="1" class="form-control" id="hargaBarang" required>
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
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data )
                <tr>
                <td>{{$data-> name}}</td>   
                <td>{{$data-> kategori->name}}</td>
                <td>{{$data-> jumlah}}</td>
                <td>Rp.{{$data-> harga}}</td>
                <td><img src="{{ asset($data->image->path) }}" alt="ini gambar" width="50" height="70"></td>
                <td>
                    <a href="#" class="btn btn-primary btn-circle p-2" >
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle p-2">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</x-layout.admin>
