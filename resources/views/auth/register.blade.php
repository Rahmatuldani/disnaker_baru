@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create Account</h3></div>
                <div class="card-body">
                    <!-- Registration form-->
                    <form action="#" method="POST">
                        @csrf
                        <div class="container">
                            <datalist id="daerahList">
                                @foreach ($daerah as $d)
                                    <option value="{{$d->name}}"></option>
                                @endforeach
                            </datalist>
                            <div class="row justify-content-center m-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="pencaker" value="pencaker" onclick="jenisUser('pencaker')" checked {{ (old('jenis_user') == 'pencaker') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pencaker">Pencari Kerja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="perusahaan" value="perusahaan" onclick="jenisUser('perusahaan')" {{ (old('jenis_user') == 'perusahaan') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perusahaan">Perusahaan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="bkk" value="bkk" onclick="jenisUser('bkk')" {{ (old('jenis_user') == 'bkk') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bkk">BKK</label>
                                </div>
                            </div>

                            <div id="idpencaker" hidden>
                                <h5>Identitas Pencaker</h5>
                                <!-- Form Group (select daerah)-->
                                <div class="form-group">
                                    <input class="form-control" name="daerah_pencaker" id="daerah_pencaker" onchange="getBKK(this.value)" list="daerahList" placeholder="Pilih Daerah*" />
                                    <datalist id="daerahList">
                                        @foreach ($daerah as $d)
                                            <option value="{{$d->name}}"></option>
                                        @endforeach
                                    </datalist>
                                </div>

                                <!-- Form Group (list bkk) -->
                                <div class="form-group">
                                    <input class="form-control" id="bkk_pencaker" name="bkk_pencaker" list="bkkList"  placeholder="Pilih BKK*"  />
                                    <datalist id="bkkList">
                                    </datalist>
                                </div>

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
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="l" checked>
                                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="p">
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
                                                <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="islam" checked>
                                                <label class="form-check-label" for="inlineRadio1">Islam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="kristen">
                                                <label class="form-check-label" for="inlineRadio2">Kristen</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="hindu">
                                                <label class="form-check-label" for="inlineRadio1">Hindu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="budha">
                                                <label class="form-check-label" for="inlineRadio2">Budha</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="konghuchu">
                                                <label class="form-check-label" for="inlineRadio2">Honghuchu</label>
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
                                                <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="lajang" checked>
                                                <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="sudah menikah">
                                                <label class="form-check-label" for="inlineRadio2">Sudah Menikah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio1" value="janda">
                                                <label class="form-check-label" for="inlineRadio1">Janda</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_nikah" id="inlineRadio2" value="duda">
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
                                    <input class="form-control" id="tinggi" name="tinggi" type="text" placeholder="Tinggi Badan*" />
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
                            </div>
                            <div id="idperusahaan" hidden>
                                <h5>Identitas Perusahaan</h5>
                                <!-- Form Group (nama)-->
                                <div class="form-group">
                                    <input class="form-control" id="nama_perusahaan" name="nama_perusahaan" type="text" placeholder="Nama Perusahaan" />
                                </div>

                                <!-- Form Group (select daerah)-->
                                <div class="form-group">
                                    <input class="form-control" name="tipe_perusahaan" id="tipe_perusahaan" list="tipeList" placeholder="Pilih tipe perusahaan" />
                                    <datalist id="tipeList">
                                        <option value="1"></option>
                                        <option value="1"></option>
                                        <option value="1"></option>
                                        <option value="1"></option>
                                    </datalist>
                                </div>

                                <!-- Form Group (select daerah)-->
                                <div class="form-group">
                                    <input class="form-control" name="daerah_perusahaan" id="daerah_perusahaan" list="daerahList" aria-describedby="emailHelp" placeholder="Pilih Daerah" />
                                </div>

                                <!-- Form Row-->
                                <div class="form-group">
                                    <textarea name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" cols="30" rows="2" placeholder="Alamat Perusahaan" ></textarea>
                                </div>

                                <!-- Form Row-->
                                <div class="form-group">
                                    <input class="form-control" id="telepon_perusahaan" name="telepon_perusahaan" type="text" placeholder="No Telepon perusahaan" />
                                </div>

                                <!-- Form Group (email address) -->
                                <div class="form-group">
                                    <input class="form-control" id="inputEmailAddress" name="email_perusahaan" type="email" aria-describedby="emailHelp" placeholder="Email Perusahaan" />
                                </div>

                                <h5>Identitas HRD</h5>
                                <!-- Form Group (nama)-->
                                <div class="form-group">
                                    <input class="form-control" id="nama_hrd" name="nama_hrd" type="text" placeholder="Nama HRD" />
                                </div>
                                <!-- Form Group (nama)-->
                                <div class="form-group">
                                    <input class="form-control" id="telepon_hrd" name="telepon_hrd" type="text" placeholder="No Telp/HP HRD" />
                                </div>

                            </div>
                            <div id="idbkk" hidden>
                                <h5>Identitas BKK</h5>
                                <!-- Form Group (nama)-->
                                <div class="form-group">
                                    <input class="form-control" id="nama_bkk" name="nama_bkk" type="text" placeholder="Nama BKK" value="{{ old('nama_bkk') }}"/>
                                </div>
                                <!-- Form Group (select daerah)-->
                                <div class="form-group">
                                    <input class="form-control" name="daerah_bkk" id="daerah_bkk" list="daerahList" aria-describedby="emailHelp" placeholder="Pilih Daerah" value="{{ old('daerah_bkk') }}"/>
                                </div>
                                <!-- Form Row-->
                                <div class="form-group">
                                    <textarea name="alamat_bkk" class="form-control" id="alamat_bkk" cols="30" rows="2" placeholder="Alamat BKK">{{ old('alamat_bkk') }}</textarea>
                                </div>
                                <!-- Form Group (nama)-->
                                <div class="form-group">
                                    <input class="form-control" id="telepon_bkk" name="telepon_bkk" type="text" placeholder="No Telp/HP BKK" value="{{ old('telepon_bkk') }}"/>
                                </div>
                            </div>

                            <!-- Form Group (email address) -->
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Form Row-->
                            <div class="form-group">
                                <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Username" value="{{ old('username') }}"/>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Form Row    -->
                            <div class="form-row">
                                <div class="col-md-6">
                                    <!-- Form Group (password)-->
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Form Group (confirm password)-->
                                    <div class="form-group">
                                        <input class="form-control" id="inputConfirmPassword" name="password_confirmation" type="password" placeholder="Confirm password" />
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group (create account submit)-->
                            <div class="form-group mt-4 mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('js/daftar.js') }}"></script>
@endpush
