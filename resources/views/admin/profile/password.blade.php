@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Change Password</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>

              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <p style="color:#fff">{{session('msg')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
<form style="width: 60%; margin:auto;padding:17px; box-shadow:0 0 2rem 0 rgb(136 152 170 / 15%); position:relative; margin-top:-88px; background-color:#fff;" method="POST" action="{{url('/admin/profile/update-password')}}">
    @csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">Previous Password</label>
      <input type="text" class="form-control" id="exampleFormControlInput1"  name="pre_password" placeholder="Add Previous Password" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">New Password</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  name="new_password" placeholder="New Password" required>
    </div>


    <div class="form-group">
        <p class="text-center"><button type="submit" class="btn btn-primary">Submit</button></p>

    </div>
  </form>
</div>
    @endsection
