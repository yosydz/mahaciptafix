<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan_model extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = false;
    public const CREATED = 'created';
	public const CONFIRMED = 'confirmed';
	public const DELIVERED = 'delivered';
	public const COMPLETED = 'completed';
	public const CANCELLED = 'cancelled';

	public const ORDERCODE = 'INV';

	public const PAID = 'paid';
	public const UNPAID = 'unpaid';

    public const CHALLENGE = 'Menunggu';
	public const SUCCESS = 'Konfirmasi';
	public const SETTLEMENT = 'Konfirmasi';
	public const PENDING = 'Menunggu';
	public const DENY = 'Dibatalkan';
	public const EXPIRE = 'Dibatalkan';
	public const CANCEL = 'Dibatalkan';

    public function isPaid()
	{
		return $this->payment_status == self::PAID;
	}
    // kode_transaksi
    public function semua($token_transaksi)
    {
        $query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->orderBy('id_produk','DESC')
            ->get();
        return $query;
    }

    public function pesanan_user($id)
    {
        $query = DB::table('pemesanan')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->where('pemesanan.id_user','=', $id)
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->get();
        return $query;
    }

     // kode_transaksi
    public function status_pemesanan($status_pemesanan)
    {
        $query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->where('pemesanan.status_pemesanan',$status_pemesanan)
            ->orderBy('id_produk','DESC')
            ->get();
        return $query;
    }

    // nomor_akhir
    public function nomor_akhir()
    {
    	$query = DB::table('pemesanan')
            ->select('*')
            ->orderBy('id_pemesanan','DESC')
            ->first();
        return $query;
    }

    // nomor_akhir
    public function nomor_akhir_tanggal($tanggal_order)
    {
        $query = DB::table('pemesanan')
            ->select('*')
            ->where('tanggal_order',$tanggal_order)
            ->orderBy('id_pemesanan','DESC')
            ->first();
        return $query;
    }

    // kode_transaksi
    public function token_transaksi($token_transaksi)
    {
    	$query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->where('pemesanan.token_transaksi',$token_transaksi)
            ->orderBy('id_produk','DESC')
            ->first();
        return $query;
    }
}
