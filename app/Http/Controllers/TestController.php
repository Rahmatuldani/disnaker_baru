<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(Request $request, $act = null)
    {
        if ($act == null) {
            return view('test');
        } else {
            $photo = $request->file('photo');
            Storage::disk('images')->put($photo->getClientOriginalName(), File::get($photo));

            echo 'oke';
        }
    }
}
