<?php

namespace App\Http\Controllers;

use App\Models\BKK;
use App\Models\Pencaker;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BKKController extends Controller
{
    public function index()
    {
        return view('bkk.dashboard');
    }

    public function pencaker(Request $request, $action = null)
    {
        $bkk = BKK::find(Auth::user()->bkk_id);
        if ($action == null) {
            $provinsi = Province::where('name', 'SUMATERA BARAT')->first();
            $data = array(
                'daerah' => $provinsi->regencies,
                'pencaker' => Pencaker::join('users', 'users.username', '=', 'pencakers.username')
                                        ->where('bkk', $bkk->bkk_nama)->get(),
            );
            return view('bkk.pencaker', $data);
        } else if ($action == 'add') {
            $bkk = BKK::where('username', Auth::user()->username)->first();

            User::create([
                'nama' => $request['nama_pencaker'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => Hash::make($request['nik']),
                'role' => 'pencaker',
            ]);

            Pencaker::create([
                'username' => $request['username'],
                'daerah' => $bkk->bkk_daerah,
                'bkk' => $bkk->bkk_nama,
                'nik' => $request['nik'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat_pencaker'],
                'jk' => $request['jenis_kelamin'],
                'agama' => $request['agama'],
                'status_nikah' => $request['status_nikah'],
                'pekerjaan' => $request['pekerjaan'],
                'tinggi_badan' => $request['tinggi'],
                'telepon' => $request['telepon_pencaker'],
                'sekolah' => $request['sekolah'],
                'jurusan' => $request['jurusan'],
                'pelatihan' => $request['pelatihan'],
                'is_actived' => 1,
            ]);

            return redirect()->route('bkk.pencaker')->with('message', 'Pencari kerja berhasil ditambah!');
        }
    }

    public function lowongan()
    {
        return view('bkk.lowongan');
    }

    public function lpencaker(Request $request, $action = null)
    {
        if ($action == null) {
            return view('bkk.lpencaker');
        } else {

        }
    }

    public function llowongan()
    {
        return view('bkk.llowongan');
    }

    public function profile(Request $request, $action = null)
    {
        if ($action == null) {
            $data = array(
                'akun' => User::join('bkks', 'bkks.bkk_id', '=', 'users.bkk_id')
                                ->where('user_id', Auth::user()->user_id)->first(),
            );
            return view('bkk.account', $data);
        } else if ($action == 'edit') {
            $user = User::find(Auth::user()->user_id);
            $user->username = $request['username'];
            $user->nama = $request['nama'];
            $user->alamat = $request['alamat'];
            $user->save();

            return redirect()->route('bkk.profile')->with('message', 'Profil berhasil diubah!');
        } else if ($action == 'photo') {
            $file = $request->file('photo');
            $user = User::find(Auth::user()->user_id);

            dd($file);

            // // Generate a file name with extension
            // $fileName = $user->nama.'.'.$file->getClientOriginalExtension();

            // // Save the file
            // $path = $file->storeAs('public/images', $fileName);

            // $user->photo = $path;
            // $user->save();

            // return redirect()->route('bkk.profile')->with('message', 'Change Photo Successful!');
        }
    }

    public function security(Request $request, $action = null)
    {
        if ($action == null) {
            return view('bkk.security');
        }
    }
}
