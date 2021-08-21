@extends('front/layout.layout')

@section('container')
<div class="w3l_banner_nav_right">

<div class="privacy about">
    <h3>Chec<span>kout</span></h3>
    
  <div class="checkout-right">
            <?php
                $count = DB::table('carts')->where('user_id',session('USER_ID'))->count();
            ?>
            <h4>Your shopping cart contains: <span>{{$count}} Products</span></h4>
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>SL No.</th>	
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Product Name</th>
                
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            @php
                $x = 1;
            @endphp
            <tbody>
                @foreach ($result as $list)
                <tr class="rem1">
                    <?php
                       $product = DB::table('products')->where('id',$list->product_id)->get();   
                    ?>
                    <td class="invert">{{$x}}</td>
                    <td class="invert-image"><a href="single.html"><img src="{{asset('storage/product/'.$product[0]->photo)}}" alt=" " class="img-responsive"></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value"><span>{{$list->quantity}}</span></div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{$product[0]->title}}</td>
                    
                    <td class="invert">INR {{$list->amount}}</td>
                    <td class="invert">
                        <div class="rem">
                            <a href="{{url('remove-cart/'.$list->id)}}"><div class="close1"> </div></a>
                        </div>
    
                    </td>
                </tr>
                @php
                    $x = $x+1;
                @endphp
                @endforeach

        </tbody></table>
    </div>
    <div class="checkout-left">	
        <div class="col-md-4 checkout-left-basket">
            <h4>Continue to basket</h4>
            <?php $i = 1; $total = 0; ?>
            <ul>
                @foreach ($result as $list)
                <li>Product {{$i}} <i>-</i> <span>INR {{$list->amount}} </span></li>
                @php
                    $total = $total + $list->amount;
                    $i = $i + 1;
                @endphp
                @endforeach
               <b> <li>Total <i>-</i> <span>INR {{$total}}</span></li></b>
            </ul>
        </div>
        <div class="col-md-8 address_form_agile">
              <h4>Add a new Details</h4>
        <form action="{{url('/order')}}" method="POST" class="creditly-card-form agileinfo_form">
            @csrf
                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">First name: </label>
                                            <input class="billing-address-name form-control" type="text" name="fname" placeholder="First name">
                                            <input type="hidden"  name="total" value="{{$total}}">
                                            <input type="hidden"  name="qty" value="{{$i}}">

                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Last name: </label>
                                            <input class="billing-address-name form-control" type="text" name="lname" placeholder="Last name">

                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Mobile number:</label>
                                                    <input class="form-control" type="text" placeholder="Mobile number" name="phone">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Email:</label>
                                                    <input class="form-control" type="text" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Landmark: </label>
                                                 <input class="form-control" type="text" name="landmark" placeholder="landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Post Code</label>
                                                 <input class="form-control" type="text" placeholder="Post Code" name="post_code">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Country</label>
                                                 <input class="form-control" type="text" placeholder="Country" name="country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Town/City: </label>
                                         <input class="form-control" type="text" placeholder="Town/City" name="city">
                                        </div>
                                            <div class="controls">
                                                    <label class="control-label">Payment Type </label>
                                             <select class="form-control option-w3ls" name="payment_method">
                                                                                    <option value="cod">Cash on Delivery</option>
                                                                                    <option value="online">Online<option>                    
                                                                            </select>
                                            </div>
                                    </div>
                                    <button class="submit check_out">Delivery to this Address</button>
                                </div>
                            </section>
                        </form>
                            <div class="checkout-right-basket">
                    <a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
              </div>
            </div>
    
        <div class="clearfix"> </div>
        
    </div>

</div>
<!-- //about -->
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->
@endsection