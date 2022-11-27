<x-layout.default>

<div style="min-height :100vh">
<div class="container bg-primary text-light mb-3 d-flex rounded justify-content-around">
    @foreach ($kategoris as $kategori)
    <a href="{{route('produk-by-kategori',$kategori->id)}}" class="d-flex flex-column btn btn-primary btn-icon-split">
        <p class="text-center mt-3 mb-0"><i class="fas fa-star"></i></p>
        <p>{{$kategori-> name}}</p>
    </a>
    @endforeach
</div>

<div class="container">
<div class="row">
    @foreach ($datas as $data)
    <div class="col-lg-3">
            <a class="card shadow mb-4" href="{{route('produk-detail',$data->id)}}" style="text-decoration:none">
                <div class="card-header py-3">
                    <img src="{{ asset($data->image->path) }}" class="card-img-top" alt="...">
                </div>    
                <div class="card-body border-top">
                    <h1 class="card-title text-secondary" style="font-weight: bold">{{ $data->name }}</h1>
                    <div class="mt-1">
                        <p class="card-text border-top pt-4 mb-2 text-secondary fw-normal"><i class="fas fa-star"></i> 5</p>
                        <p class="text-secondary mb-0 fw-normal" style="font-size:14px">Rp {{$data->harga}}</p>
                        <p class="text-secondary mb-0 fw-normal" style="font-size:14px">{{$data->kategori->name}}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
</div>
</x-layout.default>