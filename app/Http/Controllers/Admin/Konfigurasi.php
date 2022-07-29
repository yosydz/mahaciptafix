<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Konfigurasi_model;

class Konfigurasi extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykonfigurasi 	= new Konfigurasi_model();
		$site 			= $mykonfigurasi->listing();

		$data = array(  'title'        => 'Data Konfigurasi',
						'site'         => $site,
                        'content'      => 'admin/konfigurasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // logo
    public function logo()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Logo',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/logo'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // gambar
    public function gambar()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Gambar Banner',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/gambar'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // icon
    public function icon()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Icon',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/icon'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // email
    public function email()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Setting Email',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/email'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'namaweb'          => 'required'
                            ]);
       DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'namaweb'           => $request->namaweb,
            'nama_singkat'      => $request->nama_singkat,
            'singkatan'         => $request->singkatan,
            'tagline'           => $request->tagline,
            'tagline2'          => $request->tagline2,
            'tentang'           => $request->tentang,
            'website'           => $request->website,
            'email'             => $request->email,
            'email_cadangan'    => $request->email_cadangan,
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'hp'                => $request->hp,
            'fax'               => $request->fax,
            'deskripsi'         => $request->deskripsi,
            'keywords'          => $request->keywords,
            'metatext'          => $request->metatext,
            'facebook'          => $request->facebook,
            'twitter'           => $request->twitter,
            'instagram'         => $request->instagram,
            'nama_facebook'     => $request->nama_facebook,
            'nama_twitter'      => $request->nama_twitter,
            'nama_instagram'    => $request->nama_instagram,
            'google_map'        => $request->google_map,
            'text_bawah_peta'   => $request->text_bawah_peta,
            'link_bawah_peta'   => $request->link_bawah_peta,
            'id_user'           => Session()->get('id_user'),
        ]);
        return redirect('admin/konfigurasi')->with(['sukses' => 'Data telah diupdate']);
    }

    // Proses
    public function proses_email(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'protocol'          => 'required',
                            'smtp_host'          => 'required',
                            'smtp_port'          => 'required',
                            'smtp_timeout'       => 'required',
                            'smtp_user'          => 'required',
                            'smtp_pass'          => 'required'
                            ]);
       DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'protocol'          => $request->protocol,
            'smtp_host'         => $request->smtp_host,
            'smtp_port'         => $request->smtp_port,
            'smtp_timeout'      => $request->smtp_timeout,
            'smtp_user'         => $request->smtp_user,
            'smtp_pass'         => $request->smtp_pass,
            'id_user'           => Session()->get('id_user'),
        ]);
        return redirect('admin/konfigurasi/email')->with(['sukses' => 'Data setting email telah diupdate']);
    }

    // logo
    public function proses_logo(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'logo'        => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('logo');
        $filenamewithextension  = $request->file('logo')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = public_path('upload/image/thumbs/');
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = public_path('upload/image/');
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'logo'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/logo')->with(['sukses' => 'Logo telah diupdate']);
    }

    // icon
    public function proses_icon(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'icon'        => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('icon');
        $filenamewithextension  = $request->file('icon')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = public_path('upload/image/thumbs/');
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = public_path('upload/image/');
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'icon'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/icon')->with(['sukses' => 'Icon telah diupdate']);
    }

    // gambar
    public function proses_gambar(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = public_path('upload/image/thumbs/');
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = public_path('upload/image/');
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'gambar'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/gambar')->with(['sukses' => 'Gambar Banner telah diupdate']);
    }
}
