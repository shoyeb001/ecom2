@extends('front/layout.layout')

@section('container')
<div class="w3l_banner_nav_right">
    <!-- about -->
            <div class="privacy about">
                <h3>About Us</h3>
                <p class="animi">SKStore is a online ecommerce website for buying daily goods. We help you for buying your daily needs from home. Our services are the best service in this area. Here you will also get so many discounts in products. Hope we are able to inpress you by our products.</p>
                <div class="agile_about_grids">
                    <div class="col-md-6 agile_about_grid_right">
                        <img src="{{asset("front_assets/images/31.jpg")}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="col-md-6 agile_about_grid_left">
                        <ol>
                            <li>Online Fast Delivery</li>
                            <li>Online Payment Accept</li>
                            <li>Cash on Delivery Available</li>
                            <li>Different categories</li>

                        </ol>
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