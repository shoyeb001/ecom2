@extends('admin/layout.layout')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Order Details</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url("/admin/orders")}}">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">details</li>
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
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Sl No</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Photo</th>
                  <th scope="col" class="sort" data-sort="budget">Price</th>
                  <th scope="col" class="sort" data-sort="budget">Quantity</th>
                  <th scope="col" class="sort" data-sort="budget">Total Price</th>
                </tr>
              </thead>
              <tbody class="list">
                 <?php
                   
                   $i=1;
                   $total = 0;
                  
                  ?>
                @foreach ($result as $list)

                <?php
                $product =DB::table('products')->select('title','photo','price')->where('id',$list->product_id)->get();
                
                ?>
                <tr>
                <td class="budget">

                    {{$i}}
                  </td>
                  <td class="budget">
                    @foreach($product as $data)
                    {{$data->title}}
                    @endforeach
                  </td>
                  <td>   
                    @foreach($product as $data)                   
                    <img alt="Image placeholder" src="{{asset('storage/product/'.$data->photo)}}" style="width: 180px; height:100px; object-fit:contain;">
                    @endforeach
                   </td>
                  <td class="budget">
                    @foreach($product as $data)
                    {{$data->price}}
                    @endforeach
                 </td>
                 <td class="budget">
                    {{$list->qty}}
                 </td>

                 <td class="budget">
                  {{$list->total}}
               </td>
                </tr>
                <?php
                $i = $i+1;
                $total = $total + $list->total;
                ?>
                @endforeach
              </tbody>
              <tfoot>
                <form action="{{url('admin/status/change/'.$result[0]->order_number)}}" method="POST">
                <td colspan="3">
                  @csrf
                    <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                        <option selected>Change Status</option>
                        <option value="process">process</option>
                        <option value="delivered">Delivered</option>
                      </select>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Change</button>
                </td>
                </form>
                <td>
                    <b>Total:</b>
                </td>
                <td>
                    {{$total}}
                </td>
            </tfoot>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            
          </div>
        </div>
      </div>
    </div>
    
    @endsection