@extends('front/layout.layout')

@section('container')
<div class="w3l_banner_nav_right">
    <div class="w3l_banner_nav_right_banner4" style="background: url({{asset('storage/categories/'.$category[0]->photo)}});">
        <h3>{{$category[0]->summary}}<span class="blink_me"></span></h3>
    </div>
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
        <h3>{{$category[0]->title}}</h3>
        @foreach ($data as $list)
        <div class="w3ls_w3l_banner_nav_right_grid1">
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
                                    <p>{{session('msg')}}</p>
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

            </div>
            @endforeach
            
        </div>
    </div>
</div>
<div class="clearfix">
    @csrf

</div>
</div>
<!-- //banner -->
@endsection