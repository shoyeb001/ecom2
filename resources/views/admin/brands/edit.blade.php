@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Brands</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brands</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
<form style="width: 60%; margin:auto;padding:17px; box-shadow:0 0 2rem 0 rgb(136 152 170 / 15%); position:relative; margin-top:-88px; background-color:#fff;" method="POST" action="{{url('/admin/brands/update/'.$result[0]->id)}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleFormControlInput1">Brand Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" placeholder="Add Brand Title" value="{{$result[0]->title}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  name="slug" placeholder="Add Brand Slug" value="{{$result[0]->slug}}">
      </div>
      <div class="form-group">
          <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="img">
              <label class="custom-file-label" for="customFileLang">Select file</label>
          </div>
      </div>
      <div class="form-group">
          <p class="text-center"><button type="submit" class="btn btn-primary">Update</button></p>
  
      </div>
  </form>
</div>
    @endsection
