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
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="container">
                            <datalist id="daerahList">
                                @foreach ($daerah as $d)
                                    <option value="{{$d->name}}"></option>
                                @endforeach
                            </datalist>

                            <h5>Identitas BKK</h5>
                            <!-- Form Group (nama)-->
                            <div class="form-group">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama" value="{{ old('nama') }}"/>
                            </div>
                            <!-- Form Group (select daerah)-->
                            <div class="form-group">
                                <input class="form-control" name="daerah" id="daerah" list="daerahList" aria-describedby="emailHelp" placeholder="Pilih Daerah" value="{{ old('daerah') }}"/>
                            </div>
                            <!-- Form Row-->
                            <div class="form-group">
                                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="2" placeholder="Alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <!-- Form Group (nama)-->
                            <div class="form-group">
                                <input class="form-control" id="telepon" name="telepon" type="text" placeholder="No Telp/HP" value="{{ old('telepon') }}"/>
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

