<!-- ======= Hero Section ======= -->
@php
// dd($pemesanan);
@endphp
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <div class="kotak">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1><?php echo $title; ?></h1>
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="bg-blue">
                                        <th width="15%">STATUS</th>
                                        <th width="20%">PEMESAN</th>
                                        <th width="15%">PRODUK</th>
                                        <th width="15%">PEMBAYARAN</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                    // Looping data user dg foreach
                    $i=1;
                    foreach($pemesanan as $pemesanan) {
                        $id_pemesanan = $pemesanan->id_pemesanan;
                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($pemesanan->status_pemesanan == 'Menunggu') {
                                                $class = 'badge-warning';
                                                $icon = 'fa-hourglass';
                                            } elseif ($pemesanan->status_pemesanan == 'Dibatalkan') {
                                                $class = 'badge-danger';
                                                $icon = 'fa-times';
                                            } elseif ($pemesanan->status_pemesanan == 'Konfirmasi') {
                                                $class = 'badge-primary';
                                                $icon = 'fa-upload';
                                            } elseif ($pemesanan->status_pemesanan == 'Dikirim') {
                                                $class = 'badge-info';
                                                $icon = 'fa-truck';
                                            } elseif ($pemesanan->status_pemesanan == 'Selesai') {
                                                $class = 'badge-success';
                                                $icon = 'fa-check-circle';
                                            } elseif ($pemesanan->status_pemesanan == 'Dibuat') {
                                                $class = 'badge-info';
                                                $icon = 'fa-hourglass';
                                            }
                                            ?>
                                            <span href="#" class="badge {{ $class }}">
                                                <i class="fa  {{ $icon }}"></i> <?php echo $pemesanan->status_pemesanan; ?>
                                            </span><br>
                                            @if ($pemesanan->status_pemesanan == 'Dibuat')
                                                <a class="badge badge-success"
                                                    href="{{ asset('berhasil/' . $pemesanan->token_transaksi) }}">Bayar</a>
                                            @endif
                                            <br>
                                            <small>
                                                <i class="fas fa-key"></i> No
                                                Order:<br><strong><?php echo $pemesanan->kode_transaksi; ?></strong>
                                                <br><i class="fas fa-calendar"></i> Tgl
                                                Order:<br><strong><?php echo date('d-m-Y', strtotime($pemesanan->tanggal_order)); ?></strong>
                                                <br><i class="fa fa-calendar"></i> Tgl Update
                                                Status:<br><strong><?php echo date('d-m-Y H:i:s', strtotime($pemesanan->tanggal_update)); ?></strong>
                                                <br><i class="fa fa-key"></i> Token: <br>
                                                <?php echo $pemesanan->token_transaksi; ?>
                                            </small>
                                        </td>
                                        <td>
                                            <?php echo $pemesanan->nama_pemesan; ?>
                                            <br>
                                            <small>
                                                <i class="fas fa-mobile"></i> HP/WA: <?php echo $pemesanan->telepon_pemesan; ?>
                                                <br><i class="fa fa-envelope"></i> Email: <?php echo $pemesanan->email_pemesan; ?>
                                            </small>
                                        </td>
                                        <td><?php if($pemesanan->nama_produk=="") { echo '<div class="alert alert-warning text-center"><i class="fa fa-times"></i><br>Produk tidak tersedia</div>'; }else{ ?>
                                            <?php echo $pemesanan->nama_produk; ?>
                                            <small>
                                                {{-- <br><i class="fas fa-tags"></i> Kat: <?php echo $pemesanan->nama_kategori_produk; ?> --}}
                                                <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_jual); ?>
                                                <br><i class="fas fa-image"></i> Gambar:
                                                <br><img
                                                    src="{{ asset('public/upload/image/thumbs/' . $pemesanan->gambar) }}"
                                                    class="img img-responsive img-thumbnail">
                                            </small>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <small>
                                                <i class="fas fa-shopping-cart"></i> Qty: <?php echo $pemesanan->jumlah_produk; ?>
                                                <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_produk); ?>
                                                <br><i class="fas fa-plus"></i> Sub Total: Rp <?php echo number_format($pemesanan->total_harga); ?>
                                            </small>
                                        </td>
                                    </tr>

                                    <?php $i++; } //End looping ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
