@extends('front/layout.layout')

@section('container')
<div class="w3l_banner_nav_right">

<div class="w3l_banner_nav_right_banner3">
    <h3>Best Deals For New Products<span class="blink_me"></span></h3>
</div>

<div class="w3ls_w3l_banner_nav_right_grid">
    <h3 style="margin-top: 5rem">Best Deals</h3>

    @foreach ($result as $item)
        

    <div class="w3ls_w3l_banner_nav_right_grid1">
        <h6>{{$item->title}}</h6>
        <?php
         $product = DB::table('products')->where('status','active')->where('cat_id',$item->id)->take(4)->get();
        ?>
        @foreach ($product as $list)
        <div class="col-md-3 w3ls_w3l_banner_left">
            <div class="hover14 column">
            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                <div class="agile_top_brand_left_grid_pos">
                    <img src="{{asset('front_assets/images/offer.png')}}" alt=" " class="img-responsive" />
                </div>
                <div class="agile_top_brand_left_grid1">
                    <figure>
                        <div class="snipcart-item block">
                            <div class="snipcart-thumb">
                                <a href="/product/{{$list->slug}}"><img title=" " alt=" " src="{{asset('storage/product/'.$list->photo)}}" style="width: 100%"/></a>
                                <p>{{$list->title}}</p>
                                <h4>{{$list->price}}</h4>
                                <p>{{session('msg')}}</p>
                            </div>
                            <div class="snipcart-details">
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
        <div class="clearfix"> </div>
    </div>
    @endforeach
    
</div>
</div>
<div class="clearfix"></div>
</div>
@endsection