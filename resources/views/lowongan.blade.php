@extends('layouts.master')

@section('content')

<!-- Page Header-->
<header class="page-header page-header-dark bg-img-cover overlay overlay-primary overlay-90" style="background-image: url('https://source.unsplash.com/faEfWCdOKIg/1500x900')">
    <div class="page-header-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Cari Lowongan Pekerjaan</h1>
                    <p class="page-header-text mb-5">Opening your home to vacationers is a great way to earn some extra income, and this is a great way to get started!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 text-center">
                    <form class="form-inline justify-content-center">
                        <div class="form-group flex-fill mb-2 mr-2"><label class="sr-only" for="inputSearch">Enter and address, city, state, or ZIP</label><input class="form-control form-control-solid w-100" id="inputSearch" type="search" placeholder="Enter and address, city, state, or ZIP" /></div>
                        <button class="btn btn-teal font-weight-500 mb-2" type="submit">Search</button>
                    </form>
                    <p class="page-header-text small mb-0">By signing up, you agree to our <a href="#!">terms of service</a></p>
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
            <h2 class="mb-0">Lowongan Tersedia</h2>
            <a class="btn btn-sm btn-primary d-inline-flex align-items-center" href="#!">See more<i class="ml-1" data-feather="arrow-right"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <a class="card lift h-100" href="#!"
                    ><div class="card-flag card-flag-dark card-flag-top-right">Listed 1 month</div>
                    <img class="card-img-top" src="https://source.unsplash.com/2d4lAQAlbDA/800x500" alt="..." />
                    <div class="card-body">
                        <h3 class="text-primary mb-0">$678,999</h3>
                        <div class="small text-gray-800 font-weight-500">4 bd | 3 ba | 1,820 sqft</div>
                        <div class="small text-gray-500">Picsard, GA</div>
                    </div>
                    <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">
                        <div class="small text-gray-500">View listing</div>
                        <div class="small text-gray-500"><i data-feather="arrow-right"></i></div></div
                ></a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <a class="card lift h-100" href="#!"
                    ><div class="card-flag card-flag-dark card-flag-top-right">Listed 6 days</div>
                    <img class="card-img-top" src="https://source.unsplash.com/MP0bgaS_d1c/800x500" alt="..." />
                    <div class="card-body">
                        <h3 class="text-primary mb-0">$409,000</h3>
                        <div class="small text-gray-800 font-weight-500">3 bd | 2 ba | 1,350 sqft</div>
                        <div class="small text-gray-500">Sartalik, GA</div>
                    </div>
                    <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">
                        <div class="small text-gray-500">View listing</div>
                        <div class="small text-gray-500"><i data-feather="arrow-right"></i></div></div
                ></a>
            </div>
            <div class="col-lg-4">
                <a class="card lift h-100" href="#!"
                    ><div class="card-flag card-flag-dark card-flag-top-right">Listed 2 weeks</div>
                    <img class="card-img-top" src="https://source.unsplash.com/iAftdIcgpFc/800x500" alt="..." />
                    <div class="card-body">
                        <h3 class="text-primary mb-0">$1,299,999</h3>
                        <div class="small text-gray-800 font-weight-500">6 bd | 5.5 ba | 4,220 sqft</div>
                        <div class="small text-gray-500">Picsard, GA</div>
                    </div>
                    <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">
                        <div class="small text-gray-500">View listing</div>
                        <div class="small text-gray-500"><i data-feather="arrow-right"></i></div></div
                ></a>
            </div>
        </div>
    </div>
</section>
<hr class="my-0" />

@endsection
