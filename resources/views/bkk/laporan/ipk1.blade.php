@extends('bkk.layouts.app')

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="filter"></i></div>
                        Laporan IPK III/1
                    </h1>
                    <div class="page-header-subtitle">Ikhtisar Statistik Antar Kerja {{$bkk->bkk_nama}}</div>
                </div>
            </div>
            <ol class="breadcrumb mb-0 mt-4">
                <li class="breadcrumb-item"><a href="{{ url('/'.Auth::user()->role) }}">Dashboard</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item">IPK III/1</li>
            </ol>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container mt-n10">
    <div class="col-sm-4">
        <div class="card mb-4">
            <div class="card-header">Laporan Per Bulan</div>
            <div class="card-body">
                <form action="#!" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="month">Bulan</label>
                        <input class="form-control" id="month" type="month" name="month">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="card mb-4">
        <div class="card-header">Cetak laporan Pencari Kerja</div>
        <div class="card-body">
            <form action="{{ route('bkk.print') }}" method="post" id="lpencaker">
                @csrf
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jk">
                            <option value="all">Semua</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tanggal">Pilih Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" value="{{ date("m/d/Y")." - ".date("m/d/Y") }}" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Cetak</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer">
            <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();document.getElementById('lpencaker').submit();">
                Cetak Pencari Kerja
            </a>
        </div>
    </div>
</div>
@endsection
