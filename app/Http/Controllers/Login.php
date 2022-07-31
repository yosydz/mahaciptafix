<?php
namespace App\Http\Controllers;
use App\User_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class Login extends Controller
{
    // Homepage
    public function index(Request $request)
    {
        // dd($request->session()->has('id_user'));
        if ($request->session()->has('id_user')) {
            return redirect('admin/dasbor')->with(['sukses' => 'Anda telah login']);
        }

        $data = array(  'title'     => 'Login - Mahacipta');
        return view('login/index',$data);
    }

    public function register(Request $request)
    {
        $data = array(  'title'     => 'Registrasi - Mahacipta');
        return view('login/register', $data);
    }

    public function proses_register(Request $request)
    {

      $profile = request()->all();
// dd($profile->()id);
        $rules    = [
                'username'                       => 'required|unique:users,username',
                'email'                      => 'required|email|unique:users,email'
        ];

        $validator = \Validator::make($profile, $rules);
        if ($validator->fails()) {
            return redirect('login/register')->with(['warning' => 'Username / email telah digunakan']);

        } else {
           $tambah = DB::table('users')->insert([
            'nama'              => $request->nama,
            'email'             => $request->email,
            'username'          => $request->username,
            'password'          => sha1($request->password),
            'akses_level'       => 'Customer',
            'gambar'            => 'testimonials-1.jpg',
            'tanggal'           => date('Y-m-d H:i:s')
        ]);
        }




        return redirect('/login')->with(['sukses' => 'Data telah ditambah']);
    }

    // Cek
    public function cek(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $model      = new User_model();
        $user       = $model->login($username,$password);
        if($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('nama', $user->nama);
            $request->session()->put('email', $user->email);
            $request->session()->put('username', $user->username);
            $request->session()->put('akses_level', $user->akses_level);
            return redirect('admin/dasbor')->with(['sukses' => 'Anda berhasil login']);
        }else{
            return redirect('login')->with(['warning' => 'Mohon maaf, Username atau password salah']);
        }
    }

    // Homepage
    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('username');
        Session()->forget('akses_level');
        return redirect('login')->with(['sukses' => 'Anda berhasil logout']);
    }

    // Homepage
    public function lupa()
    {
        $data = array(  'title'     => 'Login - Mahacipta');
        return view('login/lupa',$data);
    }
}
