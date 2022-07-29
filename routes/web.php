<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END */
// Home
Route::get('/', 'Home@index');
Route::get('home', 'Home@index');
Route::get('kontak', 'Home@kontak');
Route::get('pemesanan', 'Home@pemesanan');
Route::post('konfirmasi/{par1}', 'Home@konfirmasi');
Route::get('pembayaran', 'Home@pembayaran');
Route::post('notification', 'payment@notification');
Route::get('completed', 'payment@completed');
Route::post('proses_pemesanan', 'Home@proses_pemesanan');
Route::get('berhasil/{par1}', 'Home@berhasil');
Route::get('cetak/{par1}', 'Home@cetak');
// Login
Route::get('login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('login/register', 'Login@register');
Route::post('login/proses_register', 'Login@proses_register');
Route::get('login/lupa', 'Login@lupa');
Route::get('login/logout', 'Login@logout');
// Blog
Route::get('blog', 'Berita@index');
Route::get('blog/read/{par1}', 'Berita@read');
// galeri
Route::get('galeri', 'Galeri@index');
Route::get('galeri/detail/{par1}', 'Galeri@detail');
// video
Route::get('video', 'Video@index');
Route::get('video/detail/{par1}', 'Video@detail');
// Produk
Route::get('produk', 'Produk@index');
Route::get('produk/kategori/{par1}', 'Produk@kategori');
Route::get('produk/detail/{par1}', 'Produk@detail');
Route::get('produk/cetak/{par1}', 'Produk@cetak');
Route::get('pemesanan_user', 'Home@pemesanan_user');

/* END FRONT END */
/* BACK END */
Route::group(['namespace' => 'Admin', 'middleware' => 'checkRole:Admin, Owner', 'auth'], function () {

    // dasbor
    Route::get('admin/dasbor', 'Dasbor@index');
    Route::get('admin/dasbor/konfigurasi', 'Dasbor@konfigurasi');
    // pemesanan
    Route::get('admin/pemesanan', 'Pemesanan@index');
    Route::get('admin/pemesanan/tambah', 'Pemesanan@tambah');
    Route::get('admin/pemesanan/detail/{par1}', 'Pemesanan@detail');
    Route::get('admin/pemesanan/status_pemesanan/{par1}', 'Pemesanan@status_pemesanan');
    Route::get('admin/pemesanan/cetak/{par1}', 'Pemesanan@cetak');
    Route::get('admin/pemesanan/edit/{par1}', 'Pemesanan@edit');
    Route::get('admin/pemesanan/filter/{par1}/{par2}/{par3}', 'Pemesanan@filter');
    Route::get('admin/pemesanan/cari', 'Pemesanan@cari');
    Route::post('admin/pemesanan/proses', 'Pemesanan@proses');
    Route::post('admin/pemesanan/tambah_proses', 'Pemesanan@tambah_proses');
    Route::post('admin/pemesanan/edit_proses', 'Pemesanan@edit_proses');
    Route::get('admin/pemesanan/delete/{par1}', 'Pemesanan@delete');

    // user
    Route::get('admin/user', 'User@index');
    Route::post('admin/user/tambah', 'User@tambah');
    Route::get('admin/user/edit/{par1}', 'User@edit');
    Route::post('admin/user/proses_edit', 'User@proses_edit');
    Route::get('admin/user/delete/{par1}', 'User@delete');
    Route::post('admin/user/proses', 'User@proses');

    // konfigurasi
    Route::get('admin/konfigurasi', 'Konfigurasi@index');
    Route::get('admin/konfigurasi/logo', 'Konfigurasi@logo');
    Route::get('admin/konfigurasi/icon', 'Konfigurasi@icon');
    Route::get('admin/konfigurasi/email', 'Konfigurasi@email');
    Route::get('admin/konfigurasi/gambar', 'Konfigurasi@gambar');
    Route::get('admin/konfigurasi/pembayaran', 'Konfigurasi@pembayaran');
    Route::post('admin/konfigurasi/proses', 'Konfigurasi@proses');
    Route::post('admin/konfigurasi/proses_logo', 'Konfigurasi@proses_logo');
    Route::post('admin/konfigurasi/proses_icon', 'Konfigurasi@proses_icon');
    Route::post('admin/konfigurasi/proses_email', 'Konfigurasi@proses_email');
    Route::post('admin/konfigurasi/proses_gambar', 'Konfigurasi@proses_gambar');
    Route::post('admin/konfigurasi/proses_pembayaran', 'Konfigurasi@proses_pembayaran');

    // berita
    Route::get('admin/berita', 'Berita@index');
    Route::get('admin/berita/cari', 'Berita@cari');
    Route::get('admin/berita/status_berita/{par1}', 'Berita@status_berita');
    Route::get('admin/berita/kategori/{par1}', 'Berita@kategori');
    Route::get('admin/berita/jenis_berita/{par1}', 'Berita@jenis_berita');
    Route::get('admin/berita/author/{par1}', 'Berita@author');
    Route::get('admin/berita/tambah', 'Berita@tambah');
    Route::get('admin/berita/edit/{par1}', 'Berita@edit');
    Route::get('admin/berita/delete/{par1}', 'Berita@delete');
    Route::post('admin/berita/tambah_proses', 'Berita@tambah_proses');
    Route::post('admin/berita/edit_proses', 'Berita@edit_proses');
    Route::post('admin/berita/proses', 'Berita@proses');
    // kategori
    Route::get('admin/kategori', 'Kategori@index');
    Route::post('admin/kategori/tambah', 'Kategori@tambah');
    Route::post('admin/kategori/edit', 'Kategori@edit');
    Route::get('admin/kategori/delete/{par1}', 'Kategori@delete');
    // video
    Route::get('admin/video', 'Video@index');
    Route::get('admin/video/edit/{par1}', 'Video@edit');
    Route::post('admin/video/tambah', 'Video@tambah');
    Route::post('admin/video/proses_edit', 'Video@proses_edit');
    Route::get('admin/video/delete/{par1}', 'Video@delete');
    Route::post('admin/video/proses', 'Video@proses');
    // kategori_produk
    Route::get('admin/kategori_produk', 'Kategori_produk@index');
    Route::post('admin/kategori_produk/tambah', 'Kategori_produk@tambah');
    Route::post('admin/kategori_produk/edit', 'Kategori_produk@edit');
    Route::get('admin/kategori_produk/delete/{par1}', 'Kategori_produk@delete');
    // kategori_galeri
    Route::get('admin/kategori_galeri', 'Kategori_galeri@index');
    Route::post('admin/kategori_galeri/tambah', 'Kategori_galeri@tambah');
    Route::post('admin/kategori_galeri/edit', 'Kategori_galeri@edit');
    Route::get('admin/kategori_galeri/delete/{par1}', 'Kategori_galeri@delete');
    // produk
    Route::get('admin/produk', 'Produk@index');
    Route::get('admin/produk/cari', 'Produk@cari');
    Route::get('admin/produk/status_produk/{par1}', 'Produk@status_produk');
    Route::get('admin/produk/kategori/{par1}', 'Produk@kategori');
    Route::get('admin/produk/tambah', 'Produk@tambah');
    Route::get('admin/produk/edit/{par1}', 'Produk@edit');
    Route::get('admin/produk/delete/{par1}', 'Produk@delete');
    Route::get('admin/produk/gambar_produk/{par1}', 'Produk@gambar_produk');
    Route::get('admin/produk/gambar_produk_edit/{par1}', 'Produk@gambar_produk_edit');
    Route::get('admin/produk/delete_gambar_produk/{par1}/{par2}', 'Produk@delete_gambar_produk');
    Route::post('admin/produk/edit_gambar_produk', 'Produk@edit_gambar_produk');
    Route::post('admin/produk/tambah_gambar_produk', 'Produk@tambah_gambar_produk');
    Route::post('admin/produk/tambah_proses', 'Produk@tambah_proses');
    Route::post('admin/produk/edit_proses', 'Produk@edit_proses');
    Route::post('admin/produk/proses', 'Produk@proses');
    // galeri
    Route::get('admin/galeri', 'Galeri@index');
    Route::get('admin/galeri/cari', 'Galeri@cari');
    Route::get('admin/galeri/status_galeri/{par1}', 'Galeri@status_galeri');
    Route::get('admin/galeri/kategori/{par1}', 'Galeri@kategori');
    Route::get('admin/galeri/tambah', 'Galeri@tambah');
    Route::get('admin/galeri/edit/{par1}', 'Galeri@edit');
    Route::get('admin/galeri/delete/{par1}', 'Galeri@delete');
    Route::post('admin/galeri/tambah_proses', 'Galeri@tambah_proses');
    Route::post('admin/galeri/edit_proses', 'Galeri@edit_proses');
    Route::post('admin/galeri/proses', 'Galeri@proses');
});
/* END BACK END*/
