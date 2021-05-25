@extends('bkk.layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Account Settings - Security
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link ml-0" href="{{route('bkk.profile')}}">Profile</a>
        <a class="nav-link ml-0" href="{{ route('bkk.bkk') }}">BKK</a>
        <a class="nav-link active" href="{{route('bkk.security')}}">Security</a>
    </nav>
    <hr class="mt-0 mb-4" />
    @if ( Session::has('message') )
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form action="{{ route('bkk.security', 'pass') }}" method="POST" id="securityForm">
                        @csrf
                        <!-- Form Group (current password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="currentPassword">Current Password</label>
                            <input class="form-control @error('password_current') is-invalid @enderror" id="currentPassword" name="password_current" type="password" placeholder="Enter current password" />
                            @error('password_current')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="newPassword">New Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="newPassword" name="password" type="password" placeholder="Enter new password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword" name="password_confirmation" type="password" placeholder="Confirm new password" />
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>
                        <button class="btn btn-primary" type="button" onclick="event.preventDefault();document.getElementById('securityForm').submit();">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
