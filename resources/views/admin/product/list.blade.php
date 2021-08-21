@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{url('/admin/product/add')}}" class="btn btn-sm btn-neutral">Add Product</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Products</h3>
            <p style="font-size: 15px; color:red">{{session('msg')}}</p>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable" style="width: 100% !important">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Sl No</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="budget">Slug</th>
                  <th scope="col" class="sort" data-sort="budget">Description</th>
                  <th scope="col" class="sort" data-sort="status">Photo</th>
                  <th scope="col">Stock</th>
                  <th scope="col" class="sort" data-sort="status">status</th>
                  <th scope="col" class="sort" data-sort="status">price</th>
                  <th scope="col" class="sort" data-sort="status">Is featured</th>
                  <th scope="col" class="sort" data-sort="status">Category</th>
                  <th scope="col" class="sort" data-sort="status">Brand</th>
                  <th scope="col" class="sort" data-sort="completion">Added On</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                 <?php
                   
                   $i=1;
                  
                  ?>
                @foreach ($result as $list)

                <?php
                $category=DB::table('categories')->select('title')->where('id',$list->cat_id)->get();
              // dd($sub_cat_info);
              $brand=DB::table('brands')->select('title')->where('id',$list->brand_id)->get();
                
                ?>
                <tr>
                <td class="budget">

                    {{$i}}
                  </td>
                  <td class="budget">
                     {{$list->title}}
                  </td>
                  <td class="budget">
                    {{$list->slug}}
                 </td>
                 <td class="budget">
                    {{$list->description}}
                 </td>
                 <td>                      
                  <img alt="Image placeholder" src="{{asset('storage/product/'.$list->photo)}}" style="width: 180px; height:100px; object-fit:contain;">
                 </td>
                 <td class="budget">
                  {{$list->stock}}
               </td>
                 <td>
                  <a class="btn btn-sm btn-primary" href="{{url('admin/product/'.$list->status.'/'.$list->id)}}">{{$list->status}}</a>
                </td>
                <td class="budget">
                  {{$list->price}}
               </td>
               <td class="budget">
                 <?php
                  $a = $list->is_featured;
                  if ($a==0) {
                    echo "No";
                  }else {
                    echo "Yes";
                  }
                  ?>

             </td>
                 <td class="budget">
                  @foreach($category as $data)
                  {{$data->title}}
                  @endforeach
               </td>
               <td class="budget">
                @foreach($brand as $data)
                {{$data->title}}
                @endforeach
               </td>


                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">{{$list->created_at}}</span>
                      
                    </div>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-danger" href="{{url('admin/product/delete/'.$list->id)}}">Delete</a>
                    <a class="btn btn-sm btn-success" href="{{url('admin/product/edit/'.$list->id)}}">Edit</a>
                  </td>
                </tr>
                <?php
                $i = $i+1;
                ?>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            
          </div>
        </div>
      </div>
    </div>
    
    @endsection