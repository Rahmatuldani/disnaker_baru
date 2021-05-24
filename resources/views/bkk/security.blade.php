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
        <a class="nav-link active" href="{{route('bkk.security')}}">Security</a>
    </nav>
    <hr class="mt-0 mb-4" />
    <div class="row">
        <div class="col-lg-8">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form action="#!" method="POST">
                        @csrf
                        <!-- Form Group (current password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="currentPassword">Current Password</label>
                            <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password" />
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="newPassword">New Password</label>
                            <input class="form-control" id="newPassword" type="password" placeholder="Enter new password" />
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" />
                        </div>
                        <button class="btn btn-primary" type="button">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
