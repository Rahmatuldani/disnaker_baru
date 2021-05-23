<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BKK;
use App\Models\Pencaker;
use App\Models\Perusahaan;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->role == 'pencaker') {
            # code...
        } else if (Auth::user()->role == 'perusahaan'){
            # code...
        } else if (Auth::user()->role == 'bkk'){
            return RouteServiceProvider::BKK;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['jenis_user'] == 'pencaker') {
            return Validator::make($data, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'username' => ['required', 'string', 'max:50', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        } else if ($data['jenis_user'] == 'perusahaan') {
            return Validator::make($data, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'username' => ['required', 'string', 'max:50', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        } else if ($data['jenis_user'] == 'bkk') {
            return Validator::make($data, [
                'nama_bkk' => ['required', 'string', 'max:100', 'min:3'],
                'daerah_bkk' => ['required'],
                'alamat_bkk' => ['required'],
                'telepon_bkk' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'username' => ['required', 'string', 'max:50', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['jenis_user'] == 'pencaker') {
            dd($data);
            // User::create([
            //     'nama' => $data['nama_pencaker'],
            //     'email' => $data['email'],
            //     'username' => $data['username'],
            //     'password' => Hash::make($data['password']),
            //     'role' => $data['jenis_user'],
            // ]);

            // Pencaker::create([
            //     'username' => $data['username'],
            //     'daerah' => $data['daerah_pencaker'],
            //     'bkk' => $data['bkk_pencaker'],
            //     'nik' => $data['nik'],
            //     'tempat_lahir' => $data['tempat_lahir'],
            //     'tanggal_lahir' => $data['tanggal_lahir'],
            //     'alamat' => $data['alamat_pencaker'],
            //     'jk' => $data['jenis_kelamin'],
            //     'agama' => $data['agama'],
            //     'status_nikah' => $data['bkk'],
            //     'pekerjaan' => $data['pekerjaan'],
            //     'tinggi_badan' => $data['tinggi'],
            //     'telepon' => $data['telepon_pencaker'],
            //     'sekolah' => $data['sekolah'],
            //     'pelatihan' => $data['pelatihan'],
            // ]);

        } else if ($data['jenis_user'] == 'perusahaan') {
            dd($data);
            // User::create([
            //     'nama' => $data['nama_hrd'],
            //     'email' => $data['email'],
            //     'username' => $data['username'],
            //     'password' => Hash::make($data['password']),
            //     'role' => $data['jenis_user'],
            // ]);

            // Perusahaan::create([
            //     'username' => $data['username'],
            //     'perusahaan_nama' => $data['nama_perusahaan'],
            //     'perusahaan_email' => $data['email_perusahaan'],
            //     'perusahaan_alamat' => $data['alamat_perusahaan'],
            //     'perusahaan_telepon' => $data['telepon_perusahaan'],
            //     'perusahaan_daerah' => $data['daerah_perusahaan'],
            //     'perusahaan_jenis' => $data['tipe_perusahaan'],
            //     'is_actived' => 1,
            // ]);

        } else if ($data['jenis_user'] == 'bkk') {
            $user = new User;
                $user->nama = $data['nama_bkk'];
                $user->email = $data['email'];
                $user->username = $data['username'];
                $user->password = Hash::make($data['password']);
                $user->role = $data['jenis_user'];
                $user->save();

            BKK::create([
                'username' => $data['username'],
                'bkk_nama' => $data['nama_bkk'],
                'bkk_alamat' => $data['alamat_bkk'],
                'bkk_telepon' => $data['telepon_bkk'],
                'bkk_daerah' => $data['daerah_bkk'],
                'pencaker' => 0,
                'is_actived' => 1,
            ]);
        }
        return $user;
    }

    public function getBKK($kota)
    {
        //
    }
}
