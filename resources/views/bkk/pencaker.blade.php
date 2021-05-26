@extends('bkk.layouts.app')

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="filter"></i></div>
                        Pencari Kerja
                    </h1>
                </div>
            </div>
            <ol class="breadcrumb mb-0 mt-4">
                <li class="breadcrumb-item"><a href="{{ url('/'.Auth::user()->role) }}">Dashboard</a></li>
                <li class="breadcrumb-item">Data</li>
                <li class="breadcrumb-item">Pencari Kerja</li>
            </ol>
        </div>
        @if (session('message'))
            <div class="alert alert-success p-3" role="alert">
                {{session('message')}}
            </div>
        @endif
    </div>
</header>
<!-- Main page content-->
<div class="container mt-n10">
    <div class="card mb-4">
        <div class="card-header">
            Daftar Pencari Kerja
            <a href="#" class="btn btn-success btn-icon btn-sm rounded-circle" data-toggle="modal" data-target="#addPencaker"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>Foto</th> --}}
                            <th>Nama</th>
                            <th>Tempat/Tgl. Lahir</th>
                            <th>Telepon</th>
                            <th>Daerah</th>
                            <th>BKK</th>
                            <th>Masuk</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            {{-- <th>Foto</th> --}}
                            <th>Nama</th>
                            <th>Tempat/Tgl. Lahir</th>
                            <th>Telepon</th>
                            <th>Daerah</th>
                            <th>BKK</th>
                            <th>Masuk</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pencaker as $p)
                            <tr>
                                {{-- <td><img src="{{ asset('images/'.$p['photo']) }}" height="80" alt=""></td> --}}
                                <td>{{ $p['nama'] }}</td>
                                <td>{{ $p['tempat_lahir'].'/'.date("d M Y", strtotime($p['tanggal_lahir'])) }}</td>
                                <td>{{ $p['telepon'] }}</td>
                                <td>{{ $p['daerah'] }}</td>
                                <td>{{ $p['bkk_nama'] }}</td>
                                <td>{{ date('M Y', strtotime($p['masuk'])) }}</td>
                                <td class="m-0 p-0">
                                    <div class="col m-1 p-0">
                                        <a href="{{ route('bkk.status', ['id' => $p['pencaker_id'], 'stats' => 'Menunggu']) }}" class="btn btn-xs {{ ($p['status_kerja'] == 'Menunggu') ? 'badge badge-primary' : 'btn-outline-primary' }}">Menunggu</a>
                                    </div>
                                    <div class="col m-1 p-0">
                                        <a href="{{ route('bkk.status', ['id' => $p['pencaker_id'], 'stats' => 'Ditempatkan']) }}" class="btn btn-xs {{ ($p['status_kerja'] == 'Ditempatkan') ? 'badge badge-success' : 'btn-outline-success' }}">Ditempatkan</a>
                                    </div>
                                    <div class="col m-1 p-0">
                                        <a href="{{ route('bkk.status', ['id' => $p['pencaker_id'], 'stats' => 'Dihapuskan']) }}" class="btn btn-xs {{ ($p['status_kerja'] == 'Dihapuskan') ? 'badge badge-secondary' : 'btn-outline-secondary' }}">Dihapuskan</a>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="modal" data-target="#editPencaker-{{ $p['pencaker_id'] }}"><i data-feather="edit"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark" data-toggle="modal" data-target="#deletePencaker-{{ $p['pencaker_id'] }}"><i data-feather="trash-2"></i></button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deletePencaker-{{ $p['pencaker_id'] }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deletePencakerLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Pencari Kerja</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah yakin ingin menghapus {{ $p['nama'] }} dari daftar pencari kerja?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="deleteForm" action="{{ route('bkk.pencaker', 'delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="pencaker_id" value="{{ $p['pencaker_id'] }}">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit" >Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editPencaker-{{ $p['pencaker_id'] }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deletePencakerLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Pencari Kerja</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#!" method="post" id="editForm">
                                                        @csrf
                                                        <input type="hidden" name="pencaker_id" value="{{$p['pencaker_id']}}">
                                                        <!-- Form Group (nik)-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="nik" name="nik" type="text" placeholder="NIK*" value="{{ $p['nik'] }}" />
                                                        </div>

                                                        <!-- Form Group (nama)-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="nama_pencaker" name="nama_pencaker" type="text" placeholder="Nama*" value="{{ $p['nama'] }}" />
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <!-- Form Group (first name)-->
                                                                <div class="form-group">
                                                                    <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" placeholder="Tempat Lahir*" value="{{ $p['tempat_lahir'] }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Form Group (last name)-->
                                                                <div class="form-group">
                                                                    <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ $p['tanggal_lahir'] }}"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <textarea name="alamat_pencaker" class="form-control" id="alamat_pencaker" cols="30" rows="2" placeholder="Alamat*" >{{ $p['alamat'] }}</textarea>
                                                        </div>

                                                        <!-- Form Row    -->
                                                        <div class="form-row">
                                                            <div class="form-group">
                                                                <label class="small" for="">Jenis Kelamin</label>
                                                                <div class="row ml-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki" {{($p['jk'] == 'Laki-laki') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan"  {{($p['jk'] == 'Perempuan') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Form Row    -->
                                                        <div class="form-row">
                                                            <div class="form-group">
                                                                <label class="small" for="">Agama</label>
                                                                <div class="row ml-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="Islam" {{($p['agama'] == 'Islam') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio1">Islam</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Kristen" {{($p['agama'] == 'Kristen') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Kristen</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="Hindu" {{($p['agama'] == 'Hindu') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio1">Hindu</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Budha" {{($p['agama'] == 'Budha') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Budha</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Konghuchu" {{($p['agama'] == 'Konghuchu') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Konghuchu</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Form Row    -->
                                                        <div class="form-row">
                                                            <div class="form-group">
                                                                <label class="small" for="">Status Menikah</label>
                                                                <div class="row ml-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="Lajang" {{($p['status_nikah'] == 'Lajang') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="Sudah menikah" {{($p['status_nikah'] == 'Sudah menikah') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Sudah Menikah</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="Janda" {{($p['status_nikah'] == 'Janda') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio1">Janda</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="Duda" {{($p['status_nikah'] == 'Duda') ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="inlineRadio2">Duda</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="pekerjaan" name="pekerjaan" type="text" placeholder="Pekerjaan*" value="{{$p['pekerjaan']}}"/>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="tinggi" name="tinggi" type="number" placeholder="Tinggi Badan*" value="{{$p['tinggi_badan']}}" />
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="telepon_pencaker" name="telepon_pencaker" type="text" placeholder="No Telepon/HP*" value="{{$p['telepon']}}"/>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="sekolah" name="sekolah" type="text" placeholder="Asal Sekolah*" value="{{$p['sekolah']}}"/>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="jurusan" name="jurusan" type="text" placeholder="Jurusan*" value="{{$p['jurusan']}}"/>
                                                        </div>

                                                        <!-- Form Row-->
                                                        <div class="form-group">
                                                            <input class="form-control" id="pelatihan" name="pelatihan" type="text" placeholder="Pelatihan yang pernah diambil di BLK(opsional)" value="{{$p['pelatihan']}}"/>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                    <button href="javascript:void(0);" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('editForm').submit();">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addPencaker" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPencakerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPencakerLabel">Tambah Pencari Kerja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bkk.pencaker', 'add') }}" method="POST" id="pencakerForm">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                    <h5>Identitas Pencaker</h5>
                    <!-- Form Group (nik)-->
                    <div class="form-group">
                        <input class="form-control" id="nik" name="nik" type="text" placeholder="NIK*" />
                    </div>

                    <!-- Form Group (nama)-->
                    <div class="form-group">
                        <input class="form-control" id="nama_pencaker" name="nama_pencaker" type="text" placeholder="Nama Pencaker*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-row">
                        <div class="col-md-6">
                            <!-- Form Group (first name)-->
                            <div class="form-group">
                                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" placeholder="Tempat lahir*" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Form Group (last name)-->
                            <div class="form-group">
                                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" />
                            </div>
                        </div>
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <textarea name="alamat_pencaker" class="form-control" id="alamat_pencaker" cols="30" rows="2" placeholder="Alamat*" ></textarea>
                    </div>

                    <!-- Form Row    -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="small" for="">Jenis Kelamin</label>
                            <div class="row ml-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki" checked>
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Row    -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="small" for="">Agama</label>
                            <div class="row ml-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="Islam" checked>
                                    <label class="form-check-label" for="inlineRadio1">Islam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Kristen">
                                    <label class="form-check-label" for="inlineRadio2">Kristen</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="Hindu">
                                    <label class="form-check-label" for="inlineRadio1">Hindu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Budha">
                                    <label class="form-check-label" for="inlineRadio2">Budha</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Konghuchu">
                                    <label class="form-check-label" for="inlineRadio2">Konghuchu</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Row    -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="small" for="">Status Menikah</label>
                            <div class="row ml-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="Lajang" checked>
                                    <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="Sudah menikah">
                                    <label class="form-check-label" for="inlineRadio2">Sudah Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="Janda">
                                    <label class="form-check-label" for="inlineRadio1">Janda</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="Duda">
                                    <label class="form-check-label" for="inlineRadio2">Duda</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="pekerjaan" name="pekerjaan" type="text" placeholder="Pekerjaan*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="tinggi" name="tinggi" type="number" placeholder="Tinggi Badan*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="telepon_pencaker" name="telepon_pencaker" type="text" placeholder="No Telepon/HP*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="sekolah" name="sekolah" type="text" placeholder="Asal Sekolah*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="jurusan" name="jurusan" type="text" placeholder="Jurusan*" />
                    </div>

                    <!-- Form Row-->
                    <div class="form-group">
                        <input class="form-control" id="pelatihan" name="pelatihan" type="text" placeholder="Pelatihan yang pernah diambil di BLK(opsional)" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="{{ route('register', 'add') }}" onclick="event.preventDefault();document.getElementById('pencakerForm').submit();">Register</a>
            </div>
        </div>
    </div>
</div>

@endsection
