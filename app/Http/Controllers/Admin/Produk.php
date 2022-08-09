<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Produk_model;

class Produk extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$produk = DB::table('produk')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('produk.*', 'kategori_produk.nama_kategori_produk', 'kategori_produk.slug_kategori_produk')
                    ->orderBy('produk.id_produk','DESC')
                    ->paginate(20);
		$kategori_produk 	= DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Produk',
						'produk'			=> $produk,
						'kategori_produk'	=> $kategori_produk,
                        'content'			=> 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $keywords           = $request->keywords;
        $produk             = $myproduk->cari($keywords);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->delete();
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_produk' => 'Draft'
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_produk' => 'Publish'
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_produk'    => $request->id_kategori_produk
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_produk($status_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->status_produk($status_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->all_kategori_produk($id_kategori_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Produk',
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->detail($id_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        // dd($request);
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_produk'   => 'required|unique:produk',
                            'kode_produk'   => 'required|unique:produk',
                            'isi'           => 'required',
                            'harga_jual'    => 'required',
                            ]);

        $slug_nama_produk = str_slug($request->nama_produk, '-');
        if ($request->mulai_diskon=='') {
            $mulai_diskon = null;
        } else {
            $mulai_diskon = date('Y-m-d', strtotime($request->mulai_diskon));
        }
        if ($request->selesai_diskon=='') {
            $selesai_diskon = null;
        } else {
            $selesai_diskon = date('Y-m-d', strtotime($request->selesai_diskon));
        }
        // $imageSingles            = $request->file('gambar');
        // $filenamewithextensions  = $imageSingles[0]->getClientOriginalName();
        // $filenames               = pathinfo($filenamewithextensions, PATHINFO_FILENAME);
        // $inputs['nama_file']     = str_slug($filenames, '-').'-'.time().'.'.$imageSingles[0]->getClientOriginalExtension();
        // $destinationPaths        = public_path('upload/image/thumbs/');
        // $imgs = Image::make($imageSingles[0]->getRealPath(), array(
        //     'width'     => 150,
        //     'height'    => 150,
        //     'grayscale' => false
        // ));
        // $imgs->save($destinationPaths.'/'.$inputs['nama_file']);
        // $destinationPaths = public_path('upload/image/');
        // $imageSingles[0]->move($destinationPaths, $inputs['nama_file']);
        // dd($images);

        $addData = DB::table('produk')->insertGetId([
            'id_user'                => Session()->get('id_user'),
            'id_kategori_produk'    => $request->id_kategori_produk,
            'slug_produk'           => $slug_nama_produk,
            'kode_produk'           => strtoupper(str_replace(' ', '', $request->kode_produk)),
            'nama_produk'           => $request->nama_produk,
            'status_produk'         => $request->status_produk,
            'satuan'                => $request->satuan,
            'urutan'                => $request->urutan,
            'deskripsi'             => $request->deskripsi,
            'isi'                   => $request->isi,
            // 'gambar'                => $input['nama_file'],
            'harga_jual'            => $request->harga_jual,
            'harga_beli'            => $request->harga_beli,
            'harga_terendah'        => $request->harga_terendah,
            'harga_tertinggi'       => $request->harga_tertinggi,
            'keywords'              => $request->keywords,
            'mulai_diskon'          => $mulai_diskon,
            'selesai_diskon'        => $selesai_diskon,
            'besar_diskon'          => $request->besar_diskon,
            'jenis_diskon'          => $request->jenis_diskon,
            'jumlah_order_min'      => $request->jumlah_order_min,
            'jumlah_order_max'      => $request->jumlah_order_max,
            'stok'                  => $request->stok,
            'berat'                 => $request->berat,
            'ukuran'                => $request->ukuran,
            'tanggal_post'          => date('Y-m-d H:i:s'),
            'tanggal'               => $request->tgl_mulai,
            'tanggal_end'           => $request->tgl_akhir,
        ]);
        // dd($addData);


        // UPLOAD START
        $image                  = $request->file('gambar');
        // dd($image);
        if (!empty($image)) {
            foreach ($image as $file) {
                $filenamewithextension  = $file->getClientOriginalName();
                $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath        = public_path('upload/image/thumbs/');
                $img = Image::make($file->getRealPath(), array(
                    'width'     => 150,
                    'height'    => 150,
                    'grayscale' => false
                ));
                $img->save($destinationPath.'/'.$input['nama_file']);
                $destinationPath = public_path('upload/image/');
                $file->move($destinationPath, $input['nama_file']);
                $addPhoto = DB::table('gambar_produk')->insert([
                    'id_user'            => Session()->get('id_user'),
                    'id_produk'          => $addData,
                    'nama_gambar_produk' =>  $filenamewithextension,
                    'gambar'             => $input['nama_file'],
                ]);
                if ($file == reset($image)) {
                    DB::table('produk')->where('id_produk',$addData)->update([
                        'gambar' => $input['nama_file']
                    ]);
                }

            }
        }
        // END UPLOAD

        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_produk'   => 'required',
                            'kode_produk'   => 'required',
                            'isi'           => 'required',
                            ]);
        // dd($request->file('gambar'));
        $image = $request->file('gambar');

        if(!empty($image)) {
                $filenamewithextension  = $image->getClientOriginalName();
                $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath        = public_path('upload/image/thumbs/');
                $img = Image::make($image->getRealPath(), array(
                    'width'     => 150,
                    'height'    => 150,
                    'grayscale' => false
                ));
                $img->save($destinationPath.'/'.$input['nama_file']);
                $destinationPath = public_path('upload/image/');
                $image->move($destinationPath, $input['nama_file']);


            // END UPLOAD
            $slug_nama_produk = str_slug($request->nama_produk, '-');
            if($request->mulai_diskon=='') {
                $mulai_diskon = NULL;
            }else{
                $mulai_diskon = date('Y-m-d',strtotime($request->mulai_diskon));
            }
            if($request->selesai_diskon=='') {
                $selesai_diskon = NULL;
            }else{
                $selesai_diskon = date('Y-m-d',strtotime($request->selesai_diskon));
            }
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'                => Session()->get('id_user'),
                'id_kategori_produk'    => $request->id_kategori_produk,
                'slug_produk'           => $slug_nama_produk,
                'kode_produk'           => strtoupper(str_replace(' ','',$request->kode_produk)),
                'nama_produk'           => $request->nama_produk,
                'status_produk'         => $request->status_produk,
                'satuan'                => $request->satuan,
                'urutan'                => $request->urutan,
                'deskripsi'             => $request->deskripsi,
                'isi'                   => $request->isi,
                'harga_jual'            => $request->harga_jual,
                'harga_beli'            => $request->harga_beli,
                'harga_terendah'        => $request->harga_terendah,
                'harga_tertinggi'       => $request->harga_tertinggi,
                'gambar'                => $input['nama_file'],
                'keywords'              => $request->keywords,
                'mulai_diskon'          => $mulai_diskon,
                'selesai_diskon'        => $selesai_diskon,
                'besar_diskon'          => $request->besar_diskon,
                'jenis_diskon'          => $request->jenis_diskon,
                'jumlah_order_min'      => $request->jumlah_order_min,
                'jumlah_order_max'      => $request->jumlah_order_max,
                'stok'                  => $request->stok,
                'berat'                 => $request->berat,
                'ukuran'                => $request->ukuran,
                'tanggal'               => $request->tgl_mulai,
                'tanggal_end'           => $request->tgl_akhir,
            ]);
        }else{
            $slug_nama_produk = str_slug($request->nama_produk, '-');
            if($request->mulai_diskon=='') {
                $mulai_diskon = NULL;
            }else{
                $mulai_diskon = date('Y-m-d',strtotime($request->mulai_diskon));
            }
            if($request->selesai_diskon=='') {
                $selesai_diskon = NULL;
            }else{
                $selesai_diskon = date('Y-m-d',strtotime($request->selesai_diskon));
            }
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'                => Session()->get('id_user'),
                'id_kategori_produk'    => $request->id_kategori_produk,
                'slug_produk'           => $slug_nama_produk,
                'kode_produk'           => strtoupper(str_replace(' ','',$request->kode_produk)),
                'nama_produk'           => $request->nama_produk,
                'status_produk'         => $request->status_produk,
                'satuan'                => $request->satuan,
                'urutan'                => $request->urutan,
                'deskripsi'             => $request->deskripsi,
                'isi'                   => $request->isi,
                'harga_jual'            => $request->harga_jual,
                'harga_beli'            => $request->harga_beli,
                'harga_terendah'        => $request->harga_terendah,
                'harga_tertinggi'       => $request->harga_tertinggi,
                'keywords'              => $request->keywords,
                'mulai_diskon'          => $mulai_diskon,
                'selesai_diskon'        => $selesai_diskon,
                'besar_diskon'          => $request->besar_diskon,
                'jenis_diskon'          => $request->jenis_diskon,
                'jumlah_order_min'      => $request->jumlah_order_min,
                'jumlah_order_max'      => $request->jumlah_order_max,
                'stok'                  => $request->stok,
                'berat'                 => $request->berat,
                'ukuran'                => $request->ukuran,
                'tanggal'               => $request->tgl_mulai,
                'tanggal_end'           => $request->tgl_akhir,
            ]);
        }
        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('produk')->where('id_produk',$id_produk)->delete();
        return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
    }

    public function delete_gambar_produk($id_gambar_produk, $id_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('gambar_produk')->where('id_gambar_produk',$id_gambar_produk)->delete();
        return redirect('admin/produk/gambar_produk/'.$id_produk)->with(['sukses' => 'Data gambar telah dihapus']);
    }

    public function gambar_produk($id_produk){
     if (Session()->get('username')=="") {
        return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
    }
        $myproduk           = new Produk_model();
        $produk             = $myproduk->detail($id_produk);
        $gambar_produk      = $myproduk->gambar($id_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan', 'ASC')->get();

        // dd($produk);

        $data = array(  'title'             => 'Gambar Produk',
                        'gambar'            => $gambar_produk,
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/gambar_produk/list'
                    );
        return view('admin/layout/wrapper', $data);
    }

    public function gambar_produk_edit($id_gambar_produk){
     if (Session()->get('username')=="") {
        return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
    }
        $myproduk           = new Produk_model();
        // $produk             = $myproduk->detail($id_gambar_produk);
        $gambar_produk      = $myproduk->gambarSingle($id_gambar_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan', 'ASC')->get();

        // dd($gambar_produk);

        $data = array(  'title'             => 'Gambar Produk',
                        'gambar'            => $gambar_produk,
                        // 'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/gambar_produk/edit'
                    );

        return view('admin/layout/wrapper', $data);
    }

    public function tambah_gambar_produk(Request $request){
        $file                  = $request->file('gambar');
        $id_produk             = $request->id_produk;
        $judul_gambar          = $request->nama_gambar_produk;
        $urutan                = $request->urutan;
        $keterangan            = $request->keterangan;

        // dd($image);
        if (!empty($file)) {
            // foreach ($image as $file) {
                $filenamewithextension  = $file->getClientOriginalName();
                $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath        = public_path('upload/image/thumbs/');
                $img = Image::make($file->getRealPath(), array(
                    'width'     => 150,
                    'height'    => 150,
                    'grayscale' => false
                ));
                $img->save($destinationPath.'/'.$input['nama_file']);
                $destinationPath = public_path('upload/image/');
                $file->move($destinationPath, $input['nama_file']);
                $addPhoto = DB::table('gambar_produk')->insert([
                    'id_user'            => Session()->get('id_user'),
                    'id_produk'          => $id_produk,
                    'nama_gambar_produk' => $judul_gambar,
                    'gambar'             => $input['nama_file'],
                    'urutan'             => $urutan,
                    'keterangan'         => $keterangan,
                    'tanggal'            => date('Y-m-d H:i:s')
                ]);
                // dd($addPhoto);
                // if ($file == reset($image)) {
                //     DB::table('produk')->where('id_produk', $addData)->update([
                //         'gambar' => $input['nama_file']
                //     ]);
                // }
            // }
        }
        // END UPLOAD
        return redirect('admin/produk/gambar_produk/'.$id_produk)->with(['sukses' => 'Data telah ditambah']);


    }

    public function edit_gambar_produk(Request $request){
        $file                  = $request->file('gambar');
        $id_produk             = $request->id_produk;
        $id_gambar_produk      = $request->id_gambar_produk;
        $judul_gambar          = $request->nama_gambar_produk;
        $urutan                = $request->urutan;
        $keterangan            = $request->keterangan;

        // dd($image);
        if (!empty($file)) {
            // foreach ($image as $file) {
                $filenamewithextension  = $file->getClientOriginalName();
                $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath        = public_path('upload/image/thumbs/');
                $img = Image::make($file->getRealPath(), array(
                    'width'     => 150,
                    'height'    => 150,
                    'grayscale' => false
                ));
                $img->save($destinationPath.'/'.$input['nama_file']);
                $destinationPath = public_path('upload/image/');
                $file->move($destinationPath, $input['nama_file']);
                DB::table('gambar_produk')->where('id_gambar_produk',$id_gambar_produk)->update([
                    'id_user'            => Session()->get('id_user'),
                    'id_produk'          => $id_produk,
                    'nama_gambar_produk' => $judul_gambar,
                    'gambar'             => $input['nama_file'],
                    'urutan'             => $urutan,
                    'keterangan'         => $keterangan,
                    'tanggal'            => date('Y-m-d H:i:s')
                ]);
                // dd($addPhoto);
                // if ($file == reset($image)) {
                //     DB::table('produk')->where('id_produk', $addData)->update([
                //         'gambar' => $input['nama_file']
                //     ]);
                // }
            // }
        }else{
            DB::table('gambar_produk')->where('id_gambar_produk',$id_gambar_produk)->update([
                    'id_user'            => Session()->get('id_user'),
                    'id_produk'          => $id_produk,
                    'nama_gambar_produk' => $judul_gambar,
                    // 'gambar'             => $input['nama_file'],
                    'urutan'             => $urutan,
                    'keterangan'         => $keterangan,
                    'tanggal'            => date('Y-m-d H:i:s')
                ]);
        }
        // END UPLOAD
        return redirect('admin/produk/gambar_produk/'.$id_produk)->with(['sukses' => 'Data telah ditambah']);


    }
}
