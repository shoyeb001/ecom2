@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Categories</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit categories</li>
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
  <form style="width: 60%; margin:auto;padding:17px; box-shadow:0 0 2rem 0 rgb(136 152 170 / 15%); position:relative; margin-top:-88px; background-color:#fff;" method="POST" action="{{url('/admin/product/update/'.$result[0]->id)}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">Product Title</label>
      <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" placeholder="Add Product Title" value="{{$result[0]->title}}" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Slug</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  name="slug" placeholder="Add Slug" value={{$result[0]->slug}} required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Product Description</label>
        <div id="editor" type="text" class="form-control" id="exampleFormControlInput1"  placeholder="Add Product Description">{{$result[0]->description}}</div>
        <input type="hidden" id="hidden-input" name="desc">
      </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="img">
            <label class="custom-file-label" for="customFileLang">Select file</label>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Product Stock</label>
      <input type="number" class="form-control" id="exampleFormControlInput1"  name="stock" placeholder="Add Stock" value={{$result[0]->stock}} required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Price</label>
    <input type="number" class="form-control" id="exampleFormControlInput1"  name="price" placeholder="Add Price" value={{$result[0]->price}} required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Is Featured</label>
    <select class="form-control" id="exampleFormControlSelect1" name="featured" name="category" required>
      <option selected>Select</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Category</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category" required>
      <?php
      use App\Http\Controllers\admin\category;
       $result =  category::cat_list();

     ?>
      <option selected>Select</option>

     @foreach ($result as $list)
      <option value="{{$list->id}}">{{$list->title}}</option>

     @endforeach

    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Brand</label>
    <select class="form-control" id="exampleFormControlSelect1" name="brand">
      <?php
      use  App\Http\Controllers\admin\brands;
       $result =  brands::brand_list();

     ?>
      <option value="NULL">Select</option>

     @foreach ($result as $list)
      <option value="{{$list->id}}">{{$list->title}}</option>

     @endforeach

    </select>
    
  </div>


    <div class="form-group">
        <p class="text-center"><button type="submit" class="btn btn-primary" onclick="getval()">Submit</button></p>

    </div>
  </form>
  <script>
    function getval(){
    var quillHtml = quill.root.innerHTML.trim();
    document.getElementById('hidden-input').value = quillHtml;
  }
  </script>
</div>
    @endsection
