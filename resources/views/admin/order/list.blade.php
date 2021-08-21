@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">Banner</a></li>
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
            <h3 class="mb-0">Light table</h3>
            <p style="font-size: 15px; color:red">{{session('msg')}}</p>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Sl No</th>
                  <th scope="col" class="sort" data-sort="budget">Order Number</th>
                  <th scope="col" class="sort" data-sort="budget">Customer Details</th>
                  <th scope="col" class="sort" data-sort="budget">Price</th>
                  <th scope="col" class="sort" data-sort="status">Quantity</th>
                  <th scope="col" class="sort" data-sort="status">Payment Status</th>
                  <th scope="col" class="sort" data-sort="status">Payment Method</th>
                  <th scope="col" class="sort" data-sort="status">Details</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col" class="sort" data-sort="completion">Added On</th>
                  <th scope="col">Action</th>
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
                     {{$list->order_number}}
                  </td>
                  <td class="budget">
                    {{$list->first_name}}  {{$list->last_name}}<br>
                    {{$list->email}}<br>
                    {{$list->phone}}<br>
                    {{$list->address1}},  {{$list->address2}}<br>
                    {{$list->country}}, {{$list->post_code}}
                 </td>
                 <td class="budget">
                    {{$list->total_amount}}
                 </td>
                 <td class="budget">
                  {{$list->quantity}}
                 </td>
                 <td class="budget">
                   <?php
                    if ($list->payment_status == "paid") {
                      ?>
                      {{$list->payment_status}}
                      <?php
                    }
                      else {
                        ?>
                        <a class="btn btn-sm btn-primary" href="{{url('admin/order/payment/paid/'.$list->id)}}">{{$list->payment_status}}</a>
                        <?php
                        
                      }

                    
                   ?>
               </td>
               <td class="budget">
                {{$list->payment_method}}
             </td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{url('admin/order/details/'.$list->order_number)}}">View Details</a>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{url('admin/order/details/'.$list->order_number)}}">{{$list->status}}</a>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">{{$list->created_at}}</span>
                      
                    </div>
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