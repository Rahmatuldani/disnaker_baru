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
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-4">
                <div class="card-header">Laporan Per Bulan</div>
                <div class="card-body">
                    <form action="{{ route('bkk.ipk1') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="month">Bulan</label>
                            <input class="form-control" id="month" type="month" name="month">
                            <button type="submit" class="btn btn-primary mt-3">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row col-sm-4 m-2">
                <button class="btn btn-success m-1" data-toggle="modal" data-target="#addIpk">Laporan Baru</button>
                <button class="btn btn-success m-1" data-toggle="modal" data-target="#cetakIpk">Cetak Laporan</button>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Laporan IPK III/1 Bulan {{$month}}</div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="3">Pencari Kerja</th>
                            <th colspan="10">Kelompok Umur</th>
                            <th colspan="3" rowspan="2">Jumlah</th>
                        </tr>
                        <tr>
                            <th colspan="2">15-19</th>
                            <th colspan="2">20-29</th>
                            <th colspan="2">30-44</th>
                            <th colspan="2">45-54</th>
                            <th colspan="2">55+</th>
                        </tr>
                        <tr>
                            <th>L</th>
                            <th>P</th>
                            <th>L</th>
                            <th>P</th>
                            <th>L</th>
                            <th>P</th>
                            <th>L</th>
                            <th>P</th>
                            <th>L</th>
                            <th>P</th>
                            <th>L</th>
                            <th>P</th>
                            <th>JML</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ipk as $u)
                        <tr>
                            <td>{{ $u['ipk1_name'] }}</td>
                            <td>{{ $u['15-19l'] }}</td>
                            <td>{{ $u['15-19p'] }}</td>
                            <td>{{ $u['20-29l'] }}</td>
                            <td>{{ $u['20-29p'] }}</td>
                            <td>{{ $u['30-44l'] }}</td>
                            <td>{{ $u['30-44p'] }}</td>
                            <td>{{ $u['45-54l'] }}</td>
                            <td>{{ $u['45-54p'] }}</td>
                            <td>{{ $u['55l'] }}</td>
                            <td>{{ $u['55p'] }}</td>
                            <td>{{ $u['jmll'] }}</td>
                            <td>{{ $u['jmlp'] }}</td>
                            <td>{{ $u['jml'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Add Modal-->
    <div class="modal fade" id="addIpk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('bkk.ipk1', 'add')}}" method="POST">
                    @csrf
                    <div class="modal-body m-2">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="row m-3">
                            <label for="month" class="col-sm-4 col-form-label">Bulan</label>
                            <input type="month" class="form-control col-sm-6 m-0" name="month" id="month" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cetak Modal-->
    <div class="modal fade" id="cetakIpk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('bkk.printipk1')}}" method="POST">
                    @csrf
                    <div class="modal-body m-2">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <input type="month" class="form-control col-sm-5" name="month" id="month" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Jenis Cetak</label>
                                <select class="form-control col-sm-5" id="exampleFormControlSelect1" name="type">
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
