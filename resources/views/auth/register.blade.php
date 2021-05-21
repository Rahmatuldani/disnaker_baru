@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create Account</h3></div>
                <div class="card-body">
                    <!-- Registration form-->
                    <form action="#" method="POST">

                        <div class="container">
                            <div class="row justify-content-between" style="margin: 0 100px 30px 100px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="inlineRadio1" value="pencaker" onclick="jenisUser('pencaker')" checked>
                                    <label class="form-check-label" for="inlineRadio1">Pencari Kerja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="inlineRadio2" value="perusahaan" onclick="jenisUser('perusahaan')">
                                    <label class="form-check-label" for="inlineRadio2">Perusahaan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_user" id="inlineRadio3" value="bkk" onclick="jenisUser('bkk')">
                                    <label class="form-check-label" for="inlineRadio3">BKK</label>
                                </div>
                            </div>
                          </div>

                          <!-- Form Group (email address)            -->
                        <div class="form-group">
                            <input class="form-control" id="daerah" list="daerahList" aria-describedby="emailHelp" onchange="getKota(this.value)" placeholder="Pilih Daerah Asal" required/>
                            <datalist id="daerahList">
                                @foreach ($daerah as $d)
                                    <option value="{{$d->name}}"></option>
                                @endforeach
                            </datalist>
                        </div>

                        <!-- Form Group (email address)            -->
                        <div class="form-group" id="bkk-row" hidden>
                            <label class="small mb-1" for="bkk">BKK</label>
                            <input class="form-control" id="bkk" list="bkkList" aria-describedby="emailHelp"  placeholder="Pilih BKK" required />
                            <datalist id="bkkList">
                                <option value="1"></option>
                                <option value="1"></option>
                                <option value="1"></option>
                                <option value="1"></option>
                            </datalist>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="nik" type="text" placeholder="NIK" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="nama" type="text" placeholder="Nama" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-row">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->
                                <div class="form-group">
                                    <input class="form-control" id="tempat_lahir" type="text" placeholder="Tempat lahir" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (last name)-->
                                <div class="form-group">
                                    <input class="form-control" id="tanggal_lahir" type="date" required/>
                                </div>
                            </div>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2" placeholder="Alamat" required></textarea>
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
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="lajang" checked>
                                        <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="sudah menikah">
                                        <label class="form-check-label" for="inlineRadio2">Sudah Menikah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="janda">
                                        <label class="form-check-label" for="inlineRadio1">Janda</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="duda">
                                        <label class="form-check-label" for="inlineRadio2">Duda</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="pekerjaan" type="text" placeholder="Pekerjaan" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="tinggi" type="text" placeholder="Tinggi Badan" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="telepon" type="text" placeholder="No Telepon/HP" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="sekolah" type="text" placeholder="Asal Sekolah" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="jurusan" type="text" placeholder="Jurusan" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="pelatihan" type="text" placeholder="Pelatihan yang pernah diambil di BLK(opsional)" required/>
                        </div>

                        <!-- Form Group (email address) -->
                        <div class="form-group">
                            <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required/>
                        </div>

                        <!-- Form Row-->
                        <div class="form-group">
                            <input class="form-control" id="username" type="text" placeholder="Username" required/>
                        </div>

                        <!-- Form Row    -->
                        <div class="form-row">
                            <div class="col-md-6">
                                <!-- Form Group (password)-->
                                <div class="form-group">
                                    <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (confirm password)-->
                                <div class="form-group">
                                    <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm password" required/>
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (create account submit)-->
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
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
    <script type="text/javascript">
        function getKota(params) {
            document.querySelector('#bkk-row').removeAttribute('hidden');
        }

        function jenisUser(params) {
            console.log(params);
        }
    </script>
@endpush
