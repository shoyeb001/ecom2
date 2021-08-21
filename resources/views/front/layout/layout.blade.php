<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{asset('front_assets/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('front_assets/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="products.html">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="button" value="View your cart" class="button" id="myBtn" onclick="clicked()" />
                </fieldset>
            </form>
            
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
                                <?php
                                   if (session()->has('USER_ID')) {
                                ?>
                                <li><a href="{{url('/profile')}}">View Profile</a></li> 
                                <li><a href="{{url('/logout')}}">Logout</a></li> 

                                <?php
                                   }else {
                                       
                                   
                                ?>
								<li><a href="{{url('/login')}}">Login</a></li> 
								<li><a href="{{url('/login')}}">Sign Up</a></li>
                                <?php
                                   }
                                ?>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="/contact-us">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html"><span>Grocery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="/about">About Us</a><i>/</i></li>
					<li><a href="/best-deals">Best Deals</a><i>/</i></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>{{@config('constant.contact_no')}}</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:shoyebjio3398@gmail.com">{{@config('constant.email_add')}}</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<div class="banner">
    <div class="w3l_banner_nav_left"> <!---child-menu--->
        <nav class="navbar nav_bottom">
         <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header nav_2">
              <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
           </div> 
           <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <?php
                        $cat = DB::table('categories')->where('status','active')->get();
                    ?>
                    @foreach ($cat as $list)
                    <li><a href="{{url('category/'.$list->slug)}}">{{$list->title}}</a></li>    
                    @endforeach
                </ul>
             </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    @section('container')
    @show

<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="submit" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-4 w3_footer_grid">
            <h3>information</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{url('/about')}}">About Us</a></li>
                <li><a href="{{url('/best-deals')}}">Best Deals</a></li>
                <li><a href="{{url('/terms-condition')}}">Services</a></li>
            </ul>
        </div>
        <div class="col-md-4 w3_footer_grid">
            <h3>policy info</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{url('/privacy-policy')}}">privacy policy</a></li>
                <li><a href="{{url('/terms-condition')}}">terms of use</a></li>
            </ul>
        </div>
        <div class="col-md-4 w3_footer_grid">
            <h3>what in stores</h3>
            <ul class="w3_footer_grid_list">
                @foreach ($cat as $list)
                <li><a href="{{url('category/'.$list->slug)}}">{{$list->title}}</a></li>    
                @endforeach
            </ul>
        </div>
        
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="{{asset('front_assets/images/card.png')}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>connect with us</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>© <?php echo date('Y'); ?> Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">{{@config('constant.site_name')}}</a></p>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h3>Your Cart</h3>
      <?php
      function getUserIp(){
     switch (true) {
         case (!empty($_SERVER['HTTP_X_REAL_IP'])):
             return $_SERVER['HTTP_X_REAL_IP'];

         case(!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
         case(!empty($_SERVER['HTTP_X_FORWARED_FOR'])) :return $_SERVER['HTTP_X_FORWARDED_FOR'];


         default:
             return $_SERVER['REMOTE_ADDR'];
             break;
     }
 }


     $user_ip = getUserIp();
     $carts_no = DB::table('carts')->where('user_ip',$user_ip)->count();
     if ($carts_no == 0) {
         echo "<p>Your Cart is empty</p>";
     }else {
         
     
     $carts = DB::table('carts')->where('user_ip',$user_ip)->get();
     $total = 0;
     ?>
        <table class="table" style="width: 100%">
           
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($carts as $list)
                <?php
                $product = DB::table('products')->where('id',$list->product_id)->get();
                $total = $total + $list->amount;
                ?>
                <tr>
                    <th scope="row">{{$product[0]->title}}</th>
                    <td>{{$list->quantity}}</td>
                    <td>{{$list->amount}}</td>
                    <td><a class="btn" href="/remove-cart/{{$list->id}}"><i class="fa fa-trash-o" style="color: red; font-size:19px"></i></a></td>
                </tr>

                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td><h4>Total Price</h4></td>
                    <td colspan="2"><p>INR {{$total}}</p></td>
                    <td><a class="btn btn-primary" href="{{url('/checkout')}}">checkout</a></td>
                </tr>
            </tfoot>
            <?php
                }
            ?>

          </table>
    </div>
  
</div>

<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
$(".dropdown").hover(            
    function() {
        $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
        $(this).toggleClass('open');        
    },
    function() {
        $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
        $(this).toggleClass('open');       
    }
);
});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
            };
        */
                            
        $().UItoTop({ easingType: 'easeOutQuart' });
                            
        });
</script>
<!-- //here ends scrolling icon -->
<script type="text/javascript" src="{{asset('front_assets/js/popup.js')}}"></script>


</body>
</html>
