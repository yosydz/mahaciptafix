<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1><?php echo $title ?></h1>
              <hr>
            </div>
            <div class="col-md-12">
              <p class="text-right">
                <a href="{{ asset('cetak/'.$pemesanan->token_transaksi) }}" class="btn btn-danger btn-sm" target="_blank">
                  <i class="fa fa-file-pdf"></i> Cetak Bukti Pemesanan
                </a>
              </p>

              <p>Hai <strong><?php echo $pemesanan->nama_pemesan ?></strong>, berikut adalah data pesanan Anda. Kami akan segera memproses data pesanan tersebut.</p>

              <table class="table">
                <thead>
                  <tr>
                    <th width="25%">Kode Order</th>
                    <th width="1%">:</th>
                    <th width="74%"><?php echo $pemesanan->kode_transaksi ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td><?php echo $pemesanan->nama_produk ?></td>
                  </tr>
                  <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td><?php echo $pemesanan->jumlah_produk ?> Pcs</td>
                  </tr>
                  <tr>
                    <td>Harga Produk</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($pemesanan->harga_produk) ?></td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($pemesanan->total_harga) ?></td>
                  </tr>
                  <tr>
                    <td>Nama Penerima</td>
                    <td>:</td>
                    <td><?php echo $pemesanan->nama_pemesan ?></td>
                  </tr>
                  <tr>
                    <td>Telepon/Whatapps</td>
                    <td>:</td>
                    <td><?php echo $pemesanan->telepon_pemesan ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $pemesanan->email_pemesan ?></td>
                  </tr>

                </tbody>
              </table>
              <hr>
              <p class="text-center"><button class="btn btn-success" id="proses">Proses Pembayaran</button>
                <a class="btn btn-primary" role="button" href="{{ asset('produk') }}">Melihat Produk Lainnya</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
      var payButton = document.getElementById('proses');
      // For example trigger on button clicked, or any time you need
      payButton.addEventListener('click', function () {
          $.ajax({
                url: "{{asset('konfirmasi/'.$pemesanan->token_transaksi.'')}}",
                type: 'POST', //THIS NEEDS TO BE GET
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    order: "Confirm order"
                },
                success: function (data) {
                    snap.pay(data); // Replace it with your transaction token
                },
                error: function() {
                    console.log(data);
                }
            });
      });
    </script>
