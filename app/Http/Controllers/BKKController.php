<?php

namespace App\Http\Controllers;

use App\Exports\IPK1Export;
use App\Exports\PencakerExport;
use App\Models\BKK;
use App\Models\IPK1;
use App\Models\IPK1Names;
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
            'bkk' => BKK::find(Auth::user()->bkk_id),
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
            $diff = date_diff(date_create($request['tanggal_lahir']), date_create(date('Y-m-d')));

            Pencaker::create([
                'nama' => $request['nama_pencaker'],
                'user_id' => $request['user_id'],
                'daerah' => $bkk->bkk_daerah,
                'bkk_id' => $bkk->bkk_id,
                'nik' => $request['nik'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'umur' => $diff->format('%y'),
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
                'masuk' => date('Y-m'),
                'status_kerja' => 'Menunggu',
                'is_actived' => 1,
            ]);

            $bkk->pencaker = $bkk->pencaker + 1;
            $bkk->save();

            return redirect()->route('bkk.pencaker')->with('message', 'Pencari kerja berhasil ditambah!');
        } else if ($action == 'delete') {
            $user = Pencaker::find($request['pencaker_id']);
            $bkk = BKK::find($user->bkk_id);
            $bkk->pencaker = $bkk->pencaker - 1;
            $bkk->save();
            $user->delete();
            return redirect()->route('bkk.pencaker')->with('message', 'Pencari kerja berhasil dihapus!');
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
            $fileName = $bkk->bkk_nama.'.'.$file->getClientOriginalExtension();

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
            return Excel::download(new PencakerExport($awal, $akhir, Auth::user()->bkk_id, $request['jk']), 'daftar_pencaker.xlsx');
        } else {
            $data = array(
                'bkk' => BKK::find(Auth::user()->bkk_id),
                'no' => 1,
            );
            if ($request['jk'] == 'all') {
                $data['pencaker'] = Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
                ->whereBetween('pencakers.created_at', [$awal, $akhir])
                ->where('pencakers.bkk_id', Auth::user()->bkk_id)
                ->get();
            } else {
                $data['pencaker'] = Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
                ->whereBetween('pencakers.created_at', [$awal, $akhir])
                ->where('pencakers.bkk_id', Auth::user()->bkk_id)
                ->where('pencakers.jk', $request['jk'])
                ->get();
            }

            $pdf = PDF::loadView('bkk.print', $data)->setPaper('legal', 'landscape');
            return $pdf->stream('daftar_pencari_kerja.pdf');
        }
    }

    public function printIPK1(Request $request)
    {
        $month = $request['month'];

        if ($request['type'] == 'excel') {
            return Excel::download(new IPK1Export($month, Auth::user()->bkk_id), 'laporan_ipk1_'.$month.'.xlsx');
        } else {
            $data = array(
                'ipk' => IPK1::join('ipk1_names', 'ipk1_names.ipk1_name_id', '=', 'ipk1s.ipk1_name_id')
                            ->where('bkk_id', Auth::user()->bkk_id)
                            ->where('ipk1_month', $month)->get(),
                'bkk' => BKK::find(Auth::user()->bkk_id),
                'no' => 1,
            );

            $pdf = PDF::loadView('bkk.laporan.ipk1Print', $data)->setPaper('legal', 'landscape');
            return $pdf->download('laporan_ipk1_'.$month.'.pdf');
        }
    }

    public function status($id, $stats)
    {
        $pencaker = Pencaker::find($id);
        $pencaker->status_kerja = $stats;
        $pencaker->save();
        return redirect()->route('bkk.pencaker');
    }

    public function ipk1(Request $request, $action = null)
    {
        if ($action == null) {
            if ($request['month'] == null) {
                $request['month'] = date('Y-m');
            }
            $data = array(
                'bkk' => BKK::find(Auth::user()->bkk_id),
                'ipk' => IPK1::join('ipk1_names', 'ipk1_names.ipk1_name_id', '=', 'ipk1s.ipk1_name_id')
                                ->where('ipk1_month', $request['month'])
                                ->where('bkk_id', Auth::user()->bkk_id)
                                ->get(),
                'month' => date('F', strtotime($request['month'])),
            );
            return view('bkk.laporan.ipk1', $data);
        } else if ($action == 'add') {
            $check = IPK1::where('ipk1_month', $request['month'])
                        ->where('bkk_id', Auth::user()->bkk_id)->first();

            if ($check != null) {
                IPK1::where('bkk_id', Auth::user()->bkk_id)
                ->where('ipk1_month', $request['month'])->delete();

            }

            $this->add($request);

            return redirect()->route('bkk.ipk1');
        }
    }

    private function add($request)
    {
        $each = IPK1Names::all();
        $pencaker = Pencaker::where('bkk_id', Auth::user()->bkk_id)->get();
        foreach ($each as $e) {
            $ipk = new IPK1;
            $ipk['ipk1_name_id'] = $e['ipk1_name_id'];
            $ipk['ipk1_month'] = $request['month'];
            $ipk['bkk_id'] = Auth::user()->bkk_id;
            $ipk->save();
        }

        $ipk1 = IPK1::where('bkk_id', Auth::user()->bkk_id)
        ->where('ipk1_name_id', 1)
        ->where('ipk1_month', $request['month'])
        ->first();

        $ipk2 = IPK1::where('bkk_id', Auth::user()->bkk_id)
        ->where('ipk1_name_id', 2)
        ->where('ipk1_month', $request['month'])
        ->first();

        $ipk3 = IPK1::where('bkk_id', Auth::user()->bkk_id)
        ->where('ipk1_month', $request['month'])
        ->where('ipk1_name_id', 3)
        ->first();

        $ipk4 = IPK1::where('bkk_id', Auth::user()->bkk_id)
        ->where('ipk1_month', $request['month'])
        ->where('ipk1_name_id', 4)
        ->first();

        $ipk5 = IPK1::where('bkk_id', Auth::user()->bkk_id)
        ->where('ipk1_name_id', 5)
        ->where('ipk1_month', $request['month'])
        ->first();

        foreach ($pencaker as $p) {

            if ($p['created_at'] < $request['month'] and $p['status_kerja'] == 'Menunggu') {

                if ($p['umur'] >= 15 and $p['umur'] <= 19) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk1['15-19l'] = $ipk1['15-19l'] + 1;
                    } else {
                        $ipk1['15-19p'] = $ipk1['15-19p'] + 1;
                    }
                }

                if ($p['umur'] >= 20 and $p['umur'] <= 29) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk1['20-29l'] = $ipk1['20-29l'] + 1;
                    } else {
                        $ipk1['20-29p'] = $ipk1['20-29p'] + 1;
                    }
                }

                if ($p['umur'] >= 30 and $p['umur'] <= 44) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk1['30-44l'] = $ipk1['30-44l'] + 1;
                    } else {
                        $ipk1['30-44p'] = $ipk1['30-44p'] + 1;
                    }
                }

                if ($p['umur'] >= 45 and $p['umur'] <= 54) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk1['45-54l'] = $ipk1['45-54l'] + 1;
                    } else {
                        $ipk1['45-54p'] = $ipk1['45-54p'] + 1;
                    }
                }

                if ($p['umur'] >= 55) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk1['55l'] = $ipk1['55l'] + 1;
                    } else {
                        $ipk1['55p'] = $ipk1['55p'] + 1;
                    }
                }

                if ($p['jk'] == 'Laki-laki') {
                    $ipk1['jmll'] = $ipk1['jmll'] + 1;
                } else {
                    $ipk1['jmlp'] = $ipk1['jmlp'] + 1;
                }
                $ipk1['jml'] = $ipk1['jml'] + 1;
                $ipk1->save();
            }

            if ($p['masuk'] == $request['month']) {
                if ($p['umur'] >= 15 and $p['umur'] <= 19) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk2['15-19l'] = $ipk2['15-19l'] + 1;
                    } else {
                        $ipk2['15-19p'] = $ipk2['15-19p'] + 1;
                    }
                }

                if ($p['umur'] >= 20 and $p['umur'] <= 29) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk2['20-29l'] = $ipk2['20-29l'] + 1;
                    } else {
                        $ipk2['20-29p'] = $ipk2['20-29p'] + 1;
                    }
                }

                if ($p['umur'] >= 30 and $p['umur'] <= 44) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk2['30-44l'] = $ipk2['30-44l'] + 1;
                    } else {
                        $ipk2['30-44p'] = $ipk2['30-44p'] + 1;
                    }
                }

                if ($p['umur'] >= 45 and $p['umur'] <= 54) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk2['45-54l'] = $ipk2['45-54l'] + 1;
                    } else {
                        $ipk2['45-54p'] = $ipk2['45-54p'] + 1;
                    }
                }

                if ($p['umur'] >= 55) {
                    if ($p['jk'] == 'Laki-laki') {
                        $ipk2['55l'] = $ipk2['55l'] + 1;
                    } else {
                        $ipk2['55p'] = $ipk2['55p'] + 1;
                    }
                }

                if ($p['jk'] == 'Laki-laki') {
                    $ipk2['jmll'] = $ipk2['jmll'] + 1;
                } else {
                    $ipk2['jmlp'] = $ipk2['jmlp'] + 1;
                }
                $ipk2['jml'] = $ipk2['jml'] + 1;
                $ipk2->save();

                if ($p['status_kerja'] == 'Dihapuskan') {
                    if ($p['umur'] >= 15 and $p['umur'] <= 19) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk4['15-19l'] = $ipk4['15-19l'] + 1;
                        } else {
                            $ipk4['15-19p'] = $ipk4['15-19p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 20 and $p['umur'] <= 29) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk4['20-29l'] = $ipk4['20-29l'] + 1;
                        } else {
                            $ipk4['20-29p'] = $ipk4['20-29p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 30 and $p['umur'] <= 44) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk4['30-44l'] = $ipk4['30-44l'] + 1;
                        } else {
                            $ipk4['30-44p'] = $ipk4['30-44p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 45 and $p['umur'] <= 54) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk4['45-54l'] = $ipk4['45-54l'] + 1;
                        } else {
                            $ipk4['45-54p'] = $ipk4['45-54p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 55) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk4['55l'] = $ipk4['55l'] + 1;
                        } else {
                            $ipk4['55p'] = $ipk4['55p'] + 1;
                        }
                    }

                    if ($p['jk'] == 'Laki-laki') {
                        $ipk4['jmll'] = $ipk4['jmll'] + 1;
                    } else {
                        $ipk4['jmlp'] = $ipk4['jmlp'] + 1;
                    }
                    $ipk4['jml'] = $ipk4['jml'] + 1;
                    $ipk4->save();
                }

                if ($p['status_kerja'] == 'Ditempatkan') {
                    if ($p['umur'] >= 15 and $p['umur'] <= 19) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk3['15-19l'] = $ipk3['15-19l'] + 1;
                        } else {
                            $ipk3['15-19p'] = $ipk3['15-19p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 20 and $p['umur'] <= 29) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk3['20-29l'] = $ipk3['20-29l'] + 1;
                        } else {
                            $ipk3['20-29p'] = $ipk3['20-29p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 30 and $p['umur'] <= 44) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk3['30-44l'] = $ipk3['30-44l'] + 1;
                        } else {
                            $ipk3['30-44p'] = $ipk3['30-44p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 45 and $p['umur'] <= 54) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk3['45-54l'] = $ipk3['45-54l'] + 1;
                        } else {
                            $ipk3['45-54p'] = $ipk3['45-54p'] + 1;
                        }
                    }

                    if ($p['umur'] >= 55) {
                        if ($p['jk'] == 'Laki-laki') {
                            $ipk3['55l'] = $ipk3['55l'] + 1;
                        } else {
                            $ipk3['55p'] = $ipk3['55p'] + 1;
                        }
                    }

                    if ($p['jk'] == 'Laki-laki') {
                        $ipk3['jmll'] = $ipk3['jmll'] + 1;
                    } else {
                        $ipk3['jmlp'] = $ipk3['jmlp'] + 1;
                    }
                    $ipk3['jml'] = $ipk3['jml'] + 1;
                    $ipk3->save();
                }
            }

            $ipk5['15-19l'] = ($ipk1['15-19l']+$ipk2['15-19l']) - ($ipk3['15-19l']+$ipk4['15-19l']);
            $ipk5['15-19p'] = ($ipk1['15-19p']+$ipk2['15-19p']) - ($ipk3['15-19p']+$ipk4['15-19p']);
            $ipk5['20-29l'] = ($ipk1['20-29l']+$ipk2['20-29l']) - ($ipk3['20-29l']+$ipk4['20-29l']);
            $ipk5['20-29p'] = ($ipk1['20-29p']+$ipk2['20-29p']) - ($ipk3['20-29p']+$ipk4['20-29p']);
            $ipk5['30-44l'] = ($ipk1['30-44l']+$ipk2['30-44l']) - ($ipk3['30-44l']+$ipk4['30-44l']);
            $ipk5['30-44p'] = ($ipk1['30-44p']+$ipk2['30-44p']) - ($ipk3['30-44p']+$ipk4['30-44p']);
            $ipk5['45-54l'] = ($ipk1['45-54l']+$ipk2['45-54l']) - ($ipk3['45-54l']+$ipk4['45-54l']);
            $ipk5['45-54p'] = ($ipk1['45-54p']+$ipk2['45-54p']) - ($ipk3['45-54p']+$ipk4['45-54p']);
            $ipk5['55l'] = ($ipk1['55l']+$ipk2['55l']) - ($ipk3['55l']+$ipk4['55l']);
            $ipk5['55p'] = ($ipk1['55p']+$ipk2['55p']) - ($ipk3['55p']+$ipk4['55p']);
            $ipk5['jmll'] = ($ipk1['jmll']+$ipk2['jmll']) - ($ipk3['jmll']+$ipk4['jmll']);
            $ipk5['jmlp'] = ($ipk1['jmlp']+$ipk2['jmlp']) - ($ipk3['jmlp']+$ipk4['jmlp']);
            $ipk5['jml'] = ($ipk1['jml']+$ipk2['jml']) - ($ipk3['jml']+$ipk4['jml']);
            $ipk5->save();
        }
    }
}
