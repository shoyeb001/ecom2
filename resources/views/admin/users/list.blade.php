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
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Sl No</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Email</th>
                  <th scope="col" class="sort" data-sort="status">status</th>
                  <th scope="col" class="sort" data-sort="status">photo</th>
                  <th scope="col" class="sort" data-sort="status">Created At</th>
                </tr>
              </thead>
              <tbody class="list">
                 <?php
                   
                   $i=1;
                  
                  ?>
                @foreach ($result as $list)
                <tr>
                <td class="budget">

                    {{$i}}
                  </td>
                  <td class="budget">
                     {{$list->name}}
                  </td>
                  <td class="budget">
                    {{$list->email}}
                 </td>
                 <td class="budget">
                    {{$list->status}}
                 </td>
                 <td>                  
                  <img alt="No Image" src="{{asset('storage/product/'.$list->photo)}}" style="width: 180px; height:100px; object-fit:contain;">
                 </td>
                 <td class="budget">
                  {{$list->created_at}}
               </td>
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