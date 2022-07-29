<p class="text-right">
    <a href="{{ asset('admin/pemesanan/edit/' . $pemesanan->id_pemesanan) }}" class="btn btn-warning btn-sm">
        <i class="fa fa-edit"></i> Update Status
    </a>
    <a href="{{ asset('admin/pemesanan/cetak/' . $pemesanan->id_pemesanan) }}" class="btn btn-info btn-sm">
        <i class="fa fa-print"></i> Cetak
    </a>
    <a href="{{ asset('admin/pemesanan') }}" class="btn btn-success btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
<hr>
<table class="table table-bordered">
    <thead>
        <tr class="bg-info">

            <th>PENGIRIM (TOKO)</th>
            <th width="50%">DETAIL CUSTOMER (KEPADA)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <strong><?php echo strtoupper($site->namaweb); ?></strong>
                <br>Email: <?php echo $site->email; ?>
                <br>Telepon: <?php echo $site->telepon; ?>
                <br>HP <i class="fab fa-whatsapp"></i>: <?php echo $site->hp; ?>
                <br>Website: <?php echo $site->website; ?>
            </td>
            <td>
                <strong><?php echo strtoupper($pemesanan->nama_pemesan); ?></strong>
                <br><i class="fas fa-mobile"></i> HP/WA: <?php echo $pemesanan->telepon_pemesan; ?>
                <br><i class="fa fa-envelope"></i> Email: <?php echo $pemesanan->email_pemesan; ?>
            </td>

        </tr>
    </tbody>
</table>
<h4>DATA PESANAN</h4>
<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th width="5%">NO</th>
            <th width="20%">NO ORDER</th>
            <th width="25%">NAMA BARANG</th>
            <th width="10%">HARGA</th>
            <th width="10%">QTY</th>
            <th width="10%">SUB TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">1</td>
            <td><strong><?php echo $pemesanan->kode_transaksi; ?></strong>
                <br>Tgl Order:<strong><?php echo date('d-m-Y', strtotime($pemesanan->tanggal_order)); ?></strong>
            </td>
            <td>
                <?php if($pemesanan->nama_produk=="") { echo '<div class="alert alert-warning text-center"><i class="fa fa-times"></i><br>Produk tidak tersedia</div>'; }else{ ?>
                <?php echo $pemesanan->nama_produk; ?>
                <small>
                    <br><i class="fas fa-tags"></i> Kat: <?php echo $pemesanan->nama_kategori_produk; ?>
                    <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_jual); ?>
                    <!-- <br><i class="fas fa-image"></i> Gambar:
  <br><img src="{{ asset('public/upload/image/thumbs/' . $pemesanan->gambar) }}" class="img img-responsive img-thumbnail"> -->
                </small>
                <?php } ?>
            </td>
            <td class="text-center">Rp <?php echo number_format($pemesanan->harga_produk); ?></td>
            <td class="text-center"><?php echo $pemesanan->jumlah_produk; ?> Pcs</td>
            <td class="text-center">Rp <?php echo number_format($pemesanan->total_harga); ?></td>
        </tr>
    </tbody>
</table>
