@extends('bkk.layouts.app')

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="filter"></i></div>
                        Laporan Pencari Kerja
                    </h1>
                </div>
            </div>
            <ol class="breadcrumb mb-0 mt-4">
                <li class="breadcrumb-item"><a href="{{ url('/'.Auth::user()->role) }}">Dashboard</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item">Pencari Kerja</li>
            </ol>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container mt-n10">
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
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
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

@push('js')
<script>
    $(function() {
      $('input[name="tanggal"]').daterangepicker({
        opens: 'center',
      });
    });
    </script>
@endpush
