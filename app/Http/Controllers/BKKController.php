<?php

namespace App\Http\Controllers;

use App\Exports\PencakerExport;
use App\Models\BKK;
use App\Models\Pencaker;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Excel;
use PDF;

class BKKController extends Controller
{
    public function index()
    {
        $data = array(
            'pencaker' => Pencaker::where('bkk_id', Auth::user()->bkk_id)->get(),
        );
        return view('bkk.dashboard', $data);
    }

    public function pencaker(Request $request, $action = null)
    {
        $bkk = BKK::find(Auth::user()->bkk_id);
        if ($action == null) {
            $provinsi = Province::where('name', 'SUMATERA BARAT')->first();
            $data = array(
                'daerah' => $provinsi->regencies,
                'pencaker' => Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
                                        ->where('pencakers.bkk_id', $bkk->bkk_id)->get(),
            );
            return view('bkk.pencaker', $data);
        } else if ($action == 'add') {
            Pencaker::create([
                'nama' => $request['nama_pencaker'],
                'user_id' => $request['user_id'],
                'daerah' => $bkk->bkk_daerah,
                'bkk_id' => $bkk->bkk_id,
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

            $bkk->pencaker = $bkk->pencaker + 1;
            $bkk->save();

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
            $user->nama = $request['nama'];
            if ($user->username != $request['username']) {
                $user->username = $request['username'];
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('status', 'Silahkan Login Kembali');
            }
            $user->save();

            return redirect()->route('bkk.profile')->with('message', 'Profil berhasil diubah!');
        } else if ($action == 'photo') {
            $file = $request->file('photo');
            $user = User::find(Auth::user()->user_id);

            // Generate a file name with extension
            $fileName = $user->nama.'.'.$file->getClientOriginalExtension();

            Storage::disk('images')->put($fileName, File::get($file));
            // $path = $file->storeAs('public/images', $fileName);

            $user->photo = $fileName;
            $user->save();

            return redirect()->route('bkk.profile')->with('message', 'Change Photo Successful!');
        }
    }

    public function bkk(Request $request, $action = null)
    {
        if ($action == null) {
            $data = array(
                'bkk' => BKK::find(Auth::user()->bkk_id),
            );
            return view('bkk.bkk', $data);
        } else if ($action == 'edit') {
            $bkk = BKK::find(Auth::user()->bkk_id);
            $bkk->bkk_nama = $request['nama'];
            $bkk->bkk_alamat = $request['alamat'];
            $bkk->bkk_telepon = $request['telepon'];
            $bkk->save();

            return redirect()->route('bkk.bkk')->with('message', 'BKK berhasil diubah!');
        } else if ($action == 'photo') {
            $file = $request->file('photo');
            $bkk = BKK::find(Auth::user()->bkk_id);

            // Generate a file name with extension
            $fileName = $bkk->nama.'.'.$file->getClientOriginalExtension();

            Storage::disk('bkk')->put($fileName, File::get($file));
            // $path = $file->storeAs('public/images', $fileName);

            $bkk->bkk_photo = $fileName;
            $bkk->save();

            return redirect()->route('bkk.bkk')->with('message', 'Change Photo Successful!');
        }
    }

    public function security(Request $request, $action = null)
    {
        if ($action == null) {
            return view('bkk.security');
        } else if ($action == 'pass') {
            $validated = $request->validate([
                'password_current' => ['required', 'min:8'],
                'password' => ['required', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'min:8', 'same:password'],
            ]);

            $user = User::find(Auth::user()->user_id);
            if (!Hash::check($request['password_current'], $user['password'])) {
                return redirect()->route('bkk.security')->with('message', 'Wrong current password!');
            }

            $user->password = Hash::make($request['password']);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('status', 'Silahkan Login Kembali!');
        }
    }

    public function print(Request $request)
    {
        $a =  explode(" ", $request['tanggal']);
        $awal = date("Y-m-d", strtotime($a[0]));
        $akhir = date("Y-m-d", strtotime($a[2]));
        if ($request['type'] == 'excel') {
            return Excel::download(new PencakerExport($awal, $akhir, Auth::user()->bkk_id), 'daftar_pencaker.xlsx');
        } else {
            $data = array(
                'pencaker' => Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
                ->whereBetween('pencakers.created_at', [$awal, $akhir])
                ->where('pencakers.bkk_id', Auth::user()->bkk_id)
                ->get(),
                'bkk' => BKK::find(Auth::user()->bkk_id),
                'no' => 1,
            );

            $pdf = PDF::loadView('bkk.print', $data)->setPaper('legal', 'landscape');
            return $pdf->stream('invoice.pdf');
        }
    }
}
