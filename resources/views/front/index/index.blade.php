@extends('front/layout/layout')

@section('container')

<div class="w3l_banner_nav_right">
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="w3l_banner_nav_right_banner">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner1">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner2">
                        <h3>upto <i>50%</i> off.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- flexSlider -->
        <link rel="stylesheet" href="{{asset('front_assets/css/flexslider.css')}}" type="text/css" media="screen" property="" />
        <script defer src="{{asset('front_assets/js/jquery.flexslider.js')}}"></script>
        <script type="text/javascript">
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
      </script>
    <!-- //flexSlider -->
</div>
<div class="clearfix"></div>
</div>
<!-- banner -->
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{asset('front_assets/images/4.jpg')}}" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{asset('front_assets/images/5.jpg')}}" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos">
                    <h3>introducing <span>best store</span> for <i>groceries</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{asset('front_assets/images/4.jpg')}}" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<div class="top-brands">
<div class="container">
    <h3>Hot Offers</h3>
    <div class="agile_top_brands_grids">
        <?php
        $product = DB::table('products')->where('is_featured','1')->where('status','active')->get();
        ?>

        @foreach ($product as $list)
            
        <div class="col-md-3 top_brand_left">
            <div class="hover14 column">
                <div class="agile_top_brand_left_grid">
                    <div class="tag"><img src="{{asset('storage/product/'.$list->photo)}}" alt=" " class="img-responsive" /></div>
                    <div class="agile_top_brand_left_grid1">
                        <figure>
                            <div class="snipcart-item block" >
                                <div class="snipcart-thumb">
                                    <a href="/product/{{$list->slug}}"><img title=" " alt=" " src="{{asset('storage/product/'.$list->photo)}}" /></a>		
                                    <p>{{$list->title}}</p>
                                    <h4>{{$list->price}}</h4>
                                    <p>{{session('msg')}}</p>
                                </div>
                                <div class="snipcart-details top_brand_home_details">
                                    <form action="/checkout" method="post">
                                        @csrf
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="p_id" value="{{$list->id}}"/>
                                            <div class="input-group mb-3" style="position: relative">
                                                <label class="input-group-text" for="inputGroupSelect01" style="float: left; margin-right:15px;">Quantity</label>
                                                <select class="form-select" id="inputGroupSelect01" style="float: right" name="add">
                                                    <option selected>1</option>

                                                    @for ($i = 2; $i < 11; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="{{$list->title}}" />
                                            <input type="hidden" name="amount" value="{{$list->price}}" />
                                            <input type="hidden" name="currency_code" value="INR" />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                            
                                    </form>
                            
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
<div class="container">
    <h3>Top Products</h3>
    <div class="w3l_fresh_vegetables_grids">
        <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
            <div class="w3l_fresh_vegetables_grid2">
                <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('/brands')}}">All Brands</a></li>
                    <?php
                    $cat = DB::table('categories')->where('status','active')->get();
                    ?>
                    @foreach($cat as $list)
                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url($list->slug)}}">{{$list->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9 w3l_fresh_vegetables_grid_right">
            <div class="col-md-4 w3l_fresh_vegetables_grid">
                <div class="w3l_fresh_vegetables_grid1">
                    <img src="{{asset('front_assets/images/8.jpg')}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-4 w3l_fresh_vegetables_grid">
                <div class="w3l_fresh_vegetables_grid1">
                    <div class="w3l_fresh_vegetables_grid1_rel">
                        <img src="{{asset('front_assets/images/7.jpg')}}" alt=" " class="img-responsive" />
                        <div class="w3l_fresh_vegetables_grid1_rel_pos">
                            <div class="more m1">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3l_fresh_vegetables_grid1_bottom">
                    <img src="{{asset('front_assets/images/10.jpg')}}" alt=" " class="img-responsive" />
                    <div class="w3l_fresh_vegetables_grid1_bottom_pos">
                        <h5>Special Offers</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 w3l_fresh_vegetables_grid">
                <div class="w3l_fresh_vegetables_grid1">
                    <img src="{{asset('front_assets/images/9.jpg')}}" alt=" " class="img-responsive" />
                </div>
                <div class="w3l_fresh_vegetables_grid1_bottom">
                    <img src="{{asset('front_assets/images/11.jpg')}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="agileinfo_move_text">
                <div class="agileinfo_marquee">
                    <h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
                </div>
                <div class="agileinfo_breaking_news">
                    <span> </span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>
@endsection
