@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Banner</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">Banner</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{url('/admin/banner/add')}}" class="btn btn-sm btn-neutral">Add Banner</a>
            <a href="{{url('/')}}" class="btn btn-sm btn-neutral">Refresh</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
<form style="width: 60%; margin:auto;padding:17px; box-shadow:0 0 2rem 0 rgb(136 152 170 / 15%); position:relative; margin-top:-88px; background-color:#fff;" method="POST" action="{{url('/admin/banner/submit')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">Banner Title</label>
      <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" placeholder="Add Banner Title" required>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="img" required>
            <label class="custom-file-label" for="customFileLang">Select file</label>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" required></textarea>
    </div>
    <div class="form-group">
        <p class="text-center"><button type="submit" class="btn btn-primary">Submit</button></p>

    </div>
  </form>
</div>
    @endsection
