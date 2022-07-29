<div class="alert alert-info">
    Hai <strong>{{ Session()->get('nama') }}</strong>, Selamat datang di Halaman Dashboard Administrator
</div>
<hr>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order (Menunggu)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($menunggu); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Order (Konfirmasi)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($Konfirmasi); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-upload fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>
<hr>
<h4>Berikut data order produk Anda</h4>
<hr>
@include('admin/pemesanan/index')
