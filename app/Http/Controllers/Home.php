<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Produk_model;
use App\Rekening_model;
use App\Berita_model;
use App\Pemesanan_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
        $site     = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri', 'Homepage')->limit(5)->orderBy('id_galeri', 'DESC')->get();
        $model     = new Produk_model();
        $produks = $model->listing();
        $news   = new Berita_model();
        $berita = $news->home();
        // dd($produks);

        $data = array(
            'title'     => $site->namaweb . ' - ' . $site->tagline,
            'deskripsi' => $site->namaweb . ' - ' . $site->tagline,
            'keywords'  => $site->namaweb . ' - ' . $site->tagline,
            'slider'    => $slider,
            'site'        => $site,
            'produks'    => $produks,
            'berita'    => $berita,
            'content'   => 'home/index'
        );

        return view('layout/wrapper', $data);
    }

    // kontak
    public function kontak()
    {
        $site   = DB::table('konfigurasi')->first();
        $model  = new Produk_model();
        $produk = $model->listing();

        $data = array(
            'title'     => 'Kontak Kami: ' . $site->namaweb . ' - ' . $site->tagline,
            'deskripsi' => 'Kontak ' . $site->namaweb,
            'keywords'  => 'Kontak ' . $site->namaweb,
            'site'      => $site,
            'produk'    => $produk,
            'content'   => 'home/kontak'
        );
        return view('layout/wrapper', $data);
    }

    public function pemesanan_user()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $site   = DB::table('konfigurasi')->first();
        $id_user = session()->get('id_user');
        $model  = new Produk_model();
        $model_pemesanan  = new Pemesanan_model();

        $produk = $model->listing();
        $pemesanan = $pemesanan = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk', 'LEFT')
            ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk', 'LEFT')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual', 'produk.gambar', 'kategori_produk.nama_kategori_produk')
            ->where('pemesanan.id_user', '=', $id_user)
            ->orderBy('pemesanan.id_pemesanan', 'DESC')
            ->paginate(20);

        $data = array(
            'title'     => 'Pemesanan : ' . Session()->get('nama'),
            'deskripsi' => 'Pemesanan ' . Session()->get('nama'),
            'keywords'  => 'Pemesanan ' . Session()->get('nama'),
            'site'      => $site,
            'produk'    => $produk,
            'pemesanan' => $pemesanan,
            'content'   => 'home/pemesanan_user'
        );
        return view('layout/wrapper', $data);
    }

    // pemesanan
    public function pemesanan()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => ' Untuk melakukan pemesanan silahakan login terlebih dahulu']);
        }

        $site   = DB::table('konfigurasi')->first();
        $model  = new Produk_model();
        $produk = $model->listing();
        // dd($site);

        $data = array(
            'title'     => 'Formulir Pemesanan',
            'deskripsi' => 'Formulir Pemesanan',
            'keywords'  => 'Formulir Pemesanan',
            'site'      => $site,
            'produk'    => $produk,
            'content'   => 'home/pemesanan'
        );
        return view('layout/wrapper', $data);
    }

    // Proses
    public function proses_pemesanan(Request $request)
    {
        // dd($request->all());
        $dateRange = $request->tanggal_order;
        $dateArray = array_map('trim', explode('-', $dateRange));
        $startDate = date('Y-m-d', strtotime($dateArray[0]));
        $endDate = date('Y-m-d', strtotime($dateArray[1]));

        // dd($start.' + '. $end);

        // dd(date('Y-m-d', strtotime($request->tanggal_order)));
        $model  = new Produk_model();
        // insert data ke table pegawai
        $produk = $model->detail($request->id_produk);
// dd($produk->stok);
        $stok = $produk->stok;
        $pesan  = new Pemesanan_model();
        $check  = $pesan->nomor_akhir();
        if ($check) {
            $nomor_transaksi    = $check->nomor_transaksi + 1;
        } else {
            $nomor_transaksi    = 1;
        }

        if ($nomor_transaksi < 10) {
            $kode_transaksi = date('Ymd') . '000' . $nomor_transaksi;
        } elseif ($nomor_transaksi < 100) {
            $kode_transaksi = date('Ymd') . '00' . $nomor_transaksi;
        } elseif ($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd') . '0' . $nomor_transaksi;
        } elseif ($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd') . $nomor_transaksi;
        }
        $kd_tansaksi        = 'MHC' . rand(0, 1000) . '/' . $kode_transaksi;
        $token_transaksi    = Str::random(32);

        $penguranganStok = $stok - $request->jumlah_produk;



        $data = [
            'id_produk' => $request->id_produk,
            'id_user' => session()->get('id_user'),
            'kode_transaksi' => $kd_tansaksi,
            'token_transaksi' => $token_transaksi,
            'tanggal_order' => $startDate,
            'tanggal_akhir' => $endDate,
            'status_pemesanan' => 'Dibuat',
            'nomor_transaksi' => $nomor_transaksi,
            'nama_pemesan' => $request->nama_pemesan,
            'telepon_pemesan' => $request->telepon_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'jumlah_produk' => $request->jumlah_produk,
            'harga_produk' => $produk->harga_jual,
            'total_harga' => $request->jumlah_produk * $produk->harga_jual,
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'tanggal_post' => date('Y-m-d H:i:s')
        ];


        if($penguranganStok < 0){
            return redirect('pemesanan')->with(['warning' => ' Jumlah stok hanya tersisa '. $stok]);
        }else{
            DB::table('pemesanan')->insert($data);
            $result = DB::table('produk')
            ->where('id_produk', $request->id_produk)
            ->update(['stok' => $penguranganStok]);



            return redirect('berhasil/' . $token_transaksi);

        }
    }

    public function generatePaymentGateway($data)
    {
        $this->initPaymentGateway();
        // dd($data->nama_pemesan);
        $customerInfo = [
            'first_name' => $data->nama_pemesan,
            'email' => $data->email_pemesan,
            'phone' => $data->telepon_pemesan
        ];

        $params = [
            'transaction_details' => [
                'order_id' => $data->kode_transaksi,
                'gross_amount' => $data->total_harga
            ],
            'customer_details' => $customerInfo,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => 7
            ],
            'enabled_payments' => [
                'credit_card', 'cimb_clicks',
                'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
                'bca_va', 'bni_va', 'bri_va', 'other_va', 'gopay', 'indomaret',
                'danamon_online', 'akulaku', 'shopeepay'
            ],
        ];
        $snap = \Midtrans\Snap::createTransaction($params);
        return response()->json($snap->token);
    }

    // konfirmasi
    public function berhasil($token_transaksi)
    {
        // dd($token_transaksi);
        $site       = DB::table('konfigurasi')->first();
        $model      = new Pemesanan_model();
        $pemesanan  = $model->token_transaksi($token_transaksi);

        $data = array(
            'title'     => 'Pemesanan Berhasil',
            'deskripsi' => 'Pemesanan Berhasil',
            'keywords'  => 'Pemesanan Berhasil',
            'site'      => $site,
            'pemesanan' => $pemesanan,
            'content'   => 'home/berhasil'
        );

        // dd($data['pemesanan']);
        return view('layout/wrapper', $data);
    }

    // cetak
    public function cetak($token_transaksi)
    {
        $site       = DB::table('konfigurasi')->first();
        $model      = new Pemesanan_model();
        $pemesanan  = $model->token_transaksi($token_transaksi);

        $data = array(
            'title'     => 'Cetak Pemesanan',
            'deskripsi' => 'Cetak Pemesanan Berhasil',
            'keywords'  => 'Cetak Pemesanan Berhasil',
            'site'      => $site,
            'pemesanan' => $pemesanan
        );
        $config = [
            'format' => 'A4-P', // Landscape
            // 'margin_top' => 0
        ];
        $pdf = PDF::loadview('home/cetak', $data, [], $config);
        // OR :: $pdf = PDF::loadview('pdf_data_member',$data,[],['format' => 'A4-L']);
        $nama_file = $pemesanan->kode_transaksi . '.pdf';
        return $pdf->stream($nama_file, 'I');
    }

    // konfirmasi
    public function konfirmasi($token_transaksi)
    {
        // dd($token_transaksi);
        $site       = DB::table('konfigurasi')->first();

        // if (isset($_GET['token_transaksi'])) {
        // $token_transaksi = $_GET['token_transaksi'];
        $model          = new Pemesanan_model();
        $pemesanan      = $model->token_transaksi($token_transaksi);
        $token = $this->generatePaymentGateway($pemesanan);
        // dd($pemesanan);

        // } else {
        //     $pemesanan = '';
        // }

        $data = array(
            'title'     => 'Pemesanan Berhasil',
            'deskripsi' => 'Pemesanan Berhasil',
            'keywords'  => 'Pemesanan Berhasil',
            'site'      => $site,
            'pemesanan' => $pemesanan,
            'content'   => 'home/berhasil'
        );

        // return view('layout/wrapper', $data);
        // print($token);
        return $token;
    }

    // pembayaran
    // public function pembayaran()
    // {
    //   $site       = DB::table('konfigurasi')->first();
    // $model      = new Rekening_model();
    //   $rekening   = $model->listing();

    // $data = array(
    //   'title'     => 'Metode Pembayaran',
    // 'deskripsi' => 'Metode Pembayaran',
    // 'keywords'  => 'Metode Pembayaran',
    // 'site'      => $site,
    //'rekening'  => $rekening,
    // 'content'   => 'home/pembayaran'
    // );
    //  return view('layout/wrapper', $data);
    // }
}
