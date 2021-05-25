<?php

namespace App\Http\Controllers;

use App\Models\BKK;
use App\Models\Pencaker;
use App\Models\Province;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function bkk(Request $request, $limit = null)
    {
        $provinsi = Province::where('name', 'SUMATERA BARAT')->first();
        if ($request['type'] == 'search' && $request['daerah'] != 'SEMUA') {
            $data = array(
                'daerah' => $provinsi->regencies,
                'bkk' => BKK::where('bkk_daerah', $request['daerah'])->get(),
                'see' => false,
            );
            return view('bkk', $data);
        }

        $data = array(
            'daerah' => $provinsi->regencies,
            'bkk' => $limit == null ? BKK::all() : BKK::limit($limit)->get(),
            'see' =>true,
        );

        return view('bkk', $data);
    }

    public function news(Request $request)
    {
        return view('news');
    }

    public function landing()
    {
        $data = array(
            'bkk' => BKK::all(),
            'pencaker' => Pencaker::all(),
        );
        return view('landing', $data);
    }
}
