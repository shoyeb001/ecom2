@extends('admin/layout.layout');

@section('content')

<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('storage/admin/'.$result[0]->photo)}}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello {{$result[0]->name}}</h1>
                <p class="text-white mt-0 mb-5">This is your profile page. You can manage your profile data from here. </p>
                <a href="{{url('/admin/change-password')}}" class="btn btn-neutral">Change Password</a>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{asset('storage/admin/'.$result[0]->photo)}}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset('storage/admin/'.$result[0]->photo)}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
    
                </div>
                <div class="card-body pt-5">
                    <div class="text-center">
                        <h5 class="h3">
                            {{$result[0]->name}}<span class="font-weight-light"></span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{$result[0]->email}}
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Admin
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('admin/profile/update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Name</label>
                                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{$result[0]->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email" class="form-control" name="email" value="{{$result[0]->email}}" placeholder="jesse@example.com">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="img">
                                            <label class="custom-file-label" for="customFileLang">Select file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection('content')
