<x-layout.default>
<div class="d-flex flex-column justify-content-center" style="min-height:100vh">
<div class="card shadow" style="text-decoration:none" >
    <div class="card-header d-flex align-items-center">
        <h1 style="font-weight:bolder"> Detail Produk</h1>
    </div>   
    <div class="card-body border-top">
        <div>
            <div class="d-flex justify-content-between pb-3 border-bottom">
                <img src="{{ asset($datas->image->path) }}" class="container flex-fill" alt="..." width="200" height="340">
                
                <div class="container flex-fill">
                    <h1 class="mb-0">{{$datas -> name}}</h1>
                    <p class="mt-1 mb-2" style="font-size:14px"><i class="fas fa-star"></i> 5</p>

                    <h3 class="border-bottom mb-3 pb-2">Rp {{$datas->harga}}</h3>
                    <h3 class="border-bottom mb-3 pb-2">STOK {{$datas->jumlah}}</h3>
                    <p>{{$datas->deskripsi}}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBeli">Beli</button>
                </div>
            </div>

            <div class="container mt-3 mb-2">
                <h3>Rekomendasi Produk</h3>
                <div class="row">
                    @foreach ($randomDatas as $rand )
                    <div class="col sm-5">
                        <a class="card shadow mb-4" href="{{ route('produk-detail',$rand->id) }}" style="text-decoration:none">
                            <div class="card-header py-3">
                                <img src="{{ asset($rand->image->path) }}"class="card-img-top" alt="...">
                            </div>    
                            <div class="card-body border-top">
                                <h5 class="card-title text-secondary" style="font-weight: bold">{{$rand->name}}</h5>
                                <div class="mt-1">
                                    <p class="card-text border-top pt-2 mb-3 text-secondary fw-normal"><i class="fas fa-star"></i> 5</p>
                                    <p class="text-secondary mb-0 fw-normal">Rp {{$rand->harga}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalBeli" tabindex="-1" aria-labelledby="labelModalBeli" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalBeli">Konfirmasi Pembelian Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('transaksi-client-add', $datas->id)}}">
            @csrf
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" min="1" class="form-control" id="jumlah" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

</x-layout.default>