@extends('front/layout.layout')

@section('container')

<div class="w3l_banner_nav_right">
    <div class="w3l_banner_nav_right_banner3">
        <h3>Best Deals For New Products<span class="blink_me"></span></h3>
    </div>
    <div class="agileinfo_single">
        <h5>{{$result[0]->title}}</h5>
        <div class="col-md-4 agileinfo_single_left">
            <img id="example" src="{{asset('storage/product/'.$result[0]->photo)}}" alt=" " class="img-responsive" width="100%"/>
        </div>
        <div class="col-md-8 agileinfo_single_right">
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked>
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <div class="w3agile_description">
                <h4>Description :</h4>
                <p>{!! $result[0]->description !!}</p>
            </div>
            <div class="snipcart-item block">
                <div class="snipcart-thumb agileinfo_single_right_snipcart">
                    <h4>INR {{$result[0]->price}} <span>INR {{$result[0]->price + 20}}</span></h4>
                    <p>{{session('msg')}}</p>
                </div>
                <div class="snipcart-details agileinfo_single_right_details">
                    <form action="/checkout" method="POST">
                        @csrf
                        <fieldset>

                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="p_id" value="{{$result[0]->id}}"/>
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
                                            <input type="hidden" name="item_name" value="{{$result[0]->title}}" />
                                            <input type="hidden" name="amount" value="{{$result[0]->price}}" />
                                            <input type="hidden" name="currency_code" value="INR" />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- brands -->
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
<div class="container">
    <h3>Related Products</h3>
        <div class="w3ls_w3l_banner_nav_right_grid1">
            <?php
               $r_product = DB::table('products')->where('cat_id',$result[0]->cat_id)->where('status','active')->take(8)->get();            
            ?>

            @foreach ($r_product as $list)
            <div class="col-md-3 top_brand_left" style="margin-bottom:30px;">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="tag"><img src="{{asset('front_assets/images/offer.png')}}" alt=" " class="img-responsive" /></div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="/product/{{$list->slug}}"><img title=" " alt=" " src="{{asset('storage/product/'.$list->photo)}}" style="width: 100%"/></a>		
                                        <p style="height: 43px">{{$list->title}}</p>
                                        <h4>INR {{$list->price}}</h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="/checkout" method="POST">
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
            </div>
            <div class="clearfix"> </div>
        </div>
</div>
</div>
<!-- //brands -->
@endsection