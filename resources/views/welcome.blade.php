<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-layout.default>

<div class="container bg-primary text-light mb-3 d-flex rounded justify-content-around">
    @for ($i = 0; $i < 5; $i++)
    <a href="#" class="d-flex flex-column btn btn-primary btn-icon-split">
        <p class="text-center mt-3 mb-0"><i class="fas fa-star"></i></p>
        <p>Gaming</p>
    </a>
    @endfor
</div>

<div class="row">
    <?php
        $batas = 10;
        $halaman = 5;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

        $Previous = $halaman - 1;
        $next = $halaman + 1;

        $jumlah_data = 26;
        $total_halaman = ceil($jumlah_data / $batas);

        $nomor = $halaman_awal+1;
    ?>
    @for ($i = 0; $i < $batas; $i++)
        <div class="col-lg-3">
            <a class="card shadow mb-4" href="https://getbootstrap.com/docs/5.2/getting-started/introduction/" style="text-decoration:none">
                <div class="card-header py-3">
                    <img src="..." class="card-img-top" alt="...">
                </div>    
                <div class="card-body border-top">
                    <h5 class="card-title text-secondary" style="font-weight: bold">Judul Produk</h5>
                    <div class="mt-1">
                        <p class="card-text border-top pt-2 mb-3 text-secondary fw-normal"><i class="fas fa-star"></i> 5</p>
                        <p class="text-secondary mb-0 fw-normal">Rp 2500</p>
                    </div>
                </div>
            </a>
        </div>
    @endfor
</div>

<nav aria-label="...">
        <ul class="pagination">
            <li class="page-item">
				<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
			</li>
			<?php 
				for($x=1;$x<=$total_halaman;$x++){
			?> 
				<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
			}
			?>				
			<li class="page-item">
				<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
			</li>
        </ul>
    </nav>

<div>
    <h1>Detail Produk</h1>
    <div class="d-flex justify-content-between pb-3 border-bottom">
        <img src="..." class="container border flex-fill" alt="...">
        
        <div class="container flex-fill">
            <h1 class="mb-0">Ini nama Produk</h1>
            <p class="mt-1 mb-2" style="font-size:14px"><i class="fas fa-star"></i> 5</p>

            <h3 class="border-bottom mb-3 pb-2">Rp 95.000</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi quas veniam ducimus enim porro necessitatibus quidem amet quos sequi, adipisci, deserunt sint inventore, doloremque repellendus dolorum labore ab ut assumenda!</p>
            <button type="button" class="btn btn-primary" onclick="order()" >Primary</button>
        </div>
    </div>

    <div class="container mt-3 mb-2">
        <h3>Rekomendasi Produk</h3>
        <div class="row">
            @for ($i = 0; $i < 5; $i++)
            <div class="col sm-5">
                <a class="card shadow mb-4" href="https://getbootstrap.com/docs/5.2/getting-started/introduction/" style="text-decoration:none">
                    <div class="card-header py-3">
                        <img src="..." class="card-img-top" alt="...">
                    </div>    
                    <div class="card-body border-top">
                        <h5 class="card-title text-secondary" style="font-weight: bold">Judul Produk</h5>
                        <div class="mt-1">
                            <p class="card-text border-top pt-2 mb-3 text-secondary fw-normal"><i class="fas fa-star"></i> 5</p>
                            <p class="text-secondary mb-0 fw-normal">Rp 2500</p>
                        </div>
                    </div>
                </a>
            </div>
            @endfor
        </div>
    </div>
</div>
</x-layout.default>