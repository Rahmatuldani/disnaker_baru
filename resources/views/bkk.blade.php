@extends('layouts.master')

@section('content')

<!-- Page Header-->
<header class="page-header page-header-dark bg-img-cover overlay overlay-primary overlay-90" style="background-image: url('https://source.unsplash.com/6dW3xyQvcYE/1600x1200')">
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Cari Tempat Bursa Kerja Khusus</h1>
                    <p class="page-header-text mb-5">Tempat pelayanan pencarian kerja untuk pencari kerja</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 text-center">
                    <form class="form-inline justify-content-center" action="{{ route('bkk') }}" method="POST">
                        @csrf
                        <div class="form-group flex-fill mb-2 mr-2">
                            <label class="sr-only" for="inputSearch">Masukan nama Daerah</label>
                            <input type="hidden" name="type" value="search">
                            <input class="form-control form-control-solid w-100" id="inputSearch" type="search" name="daerah" list="daerahList" placeholder="Masukan nama daerah" />
                            <datalist id="daerahList">
                                <option value="SEMUA"></option>
                                @foreach ($daerah as $d)
                                    <option value="{{$d->name}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <button class="btn btn-teal font-weight-500 mb-2" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" /></svg>
    </div>
</header>

<section class="bg-white py-10">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Bursa Kerja Khusus</h2>
            @if ($see)
                <a class="btn btn-sm btn-primary d-inline-flex align-items-center" href="{{ route('bkk') }}">See more<i class="ml-1" data-feather="arrow-right"></i></a>
            @endif
        </div>
        <div class="row">
            @foreach ($bkk as $b)
                <div class="col-lg-4 mb-5 mb-lg-5">
                    <a class="card lift h-100" href="#!">
                        <div class="card-flag card-flag-dark card-flag-top-right">Listed {{ date('M Y', strtotime($b['created_at'])) }}</div>
                        <img class="card-img-top" src="{{ asset('bkk/'.$b['bkk_photo']) }}" alt="..." />
                        <div class="card-body">
                            <h3 class="text-primary mb-0">{{ $b['bkk_nama'] }}</h3>
                            <div class="small text-gray-800 font-weight-500">{{ $b['bkk_daerah'] }}</div>
                            <div class="small text-gray-500">{{ $b['bkk_alamat'] }}</div>
                            <div class="small text-gray-500">{{ $b['bkk_telepon'] }}</div>
                        </div>
                        {{-- <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">
                            <div class="small text-gray-500">View listing</div>
                            <div class="small text-gray-500"><i data-feather="arrow-right"></i></div>
                        </div> --}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<hr class="my-0" />

@endsection
